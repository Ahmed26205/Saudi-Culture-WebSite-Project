<?php
include 'db_connect.php'; 

// =========================================================
// 1. إعدادات الصفحة والمتغيرات
// =========================================================

$category = isset($_GET['cat']) ? $_GET['cat'] : 'words';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$limit = 20; // عدد العناصر في الصفحة
$offset = ($page - 1) * $limit;

// استلام كلمة البحث (إن وجدت)
$search_keyword = isset($_GET['search']) ? trim($_GET['search']) : '';

// =========================================================
// 2. اختيار الجدول والعناوين
// =========================================================

$table_name = "";
$title = "";

switch ($category) {
    case 'phrases':
        $table_name = "phrases___phrases_location_recognition";
        $title = "🗣️ عبارات وجمل سعودية";
        break;
    case 'proverbs':
        $table_name = "proverbs___proverbs_location_recognition";
        $title = "📜 أمثال شعبية قديمة";
        break;
    default: 
        $table_name = "words___final_dataset";
        $title = "📝 كلمات ومصطلحات عامية";
        $category = 'words';
        break;
}

// =========================================================
// 3. بناء شرط البحث (SQL)
// =========================================================

$search_sql = "";
if (!empty($search_keyword)) {
    // تأمين النص المدخل
    $safe_search = $conn->real_escape_string($search_keyword);
    // البحث في العمود 1 (الكلمة) أو العمود 2 (المعنى)
    $search_sql = " AND (`COL 1` LIKE '%$safe_search%' OR `COL 2` LIKE '%$safe_search%')";
}

// =========================================================
// 4. تنفيذ الاستعلامات
// =========================================================

// أ) حساب العدد الكلي (مع مراعاة البحث)
$count_sql = "SELECT COUNT(*) as total FROM `$table_name` WHERE `COL 1` != 'Term' $search_sql";
$count_result = $conn->query($count_sql);

$total_rows = 0;
if ($count_result) {
    $total_rows = $count_result->fetch_assoc()['total'];
}

$total_pages = ceil($total_rows / $limit);
if ($total_pages == 0) $total_pages = 1;

// ب) جلب البيانات (مع مراعاة البحث والصفحات)
$sql = "SELECT `COL 1` as term, `COL 2` as meaning 
        FROM `$table_name` 
        WHERE `COL 1` != 'Term' $search_sql
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المعجم السعودي - <?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">

    <style>
        :root {
            --brand-green: #1b4d3e;
            --brand-gold: #c5a059;
            --bg-color: #f8f9fa;
        }
        body { 
            font-family: 'Tajawal', sans-serif;
            background: var(--bg-color); 
            margin: 0; 
            padding-top: 100px;
            color: #333;
        }
        header {
            background-color: var(--brand-green);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 10px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        nav a {
            color: #fff !important;
            font-weight: bold;
            margin: 0 10px;
            text-decoration: none;
        }
        .container { 
            max-width: 1000px; 
            margin: 40px auto; 
            padding: 20px;
        }
        
        /* --- تنسيق شريط البحث --- */
        .search-container {
            margin-bottom: 30px;
            text-align: center;
        }
        .search-form {
            display: inline-flex;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-radius: 50px;
            overflow: hidden;
            border: 1px solid #ddd;
        }
        .search-input {
            flex: 1;
            padding: 15px 25px;
            border: none;
            outline: none;
            font-family: 'Tajawal';
            font-size: 1.1em;
        }
        .search-btn {
            background: var(--brand-green);
            color: white;
            border: none;
            padding: 0 30px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Tajawal';
            font-size: 1.1em;
            transition: 0.3s;
        }
        .search-btn:hover {
            background: #143a2f;
        }

        /* --- التصنيفات والبطاقات --- */
        .category-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .cat-btn {
            padding: 10px 25px;
            background: white;
            border: 2px solid #e1e4e8;
            border-radius: 50px;
            text-decoration: none;
            color: #555;
            font-weight: bold;
            transition: 0.3s;
        }
        .cat-btn:hover, .cat-btn.active {
            border-color: var(--brand-green);
            background: var(--brand-green);
            color: white;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            border-top: 4px solid var(--brand-gold);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin: 0 0 10px 0;
            color: var(--brand-green);
            font-size: 1.4em;
        }
        .card p {
            color: #666;
            margin: 0;
            font-size: 1.05em;
            line-height: 1.5;
        }
        
        /* --- الصفحات --- */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 50px;
            align-items: center;
        }
        .page-btn {
            padding: 8px 16px;
            background: white;
            border: 1px solid #ddd;
            text-decoration: none;
            color: var(--brand-green);
            border-radius: 8px;
            font-weight: bold;
        }
        .page-btn:hover {
            background: var(--brand-green);
            color: white;
        }
        .page-btn.disabled {
            background: #f1f1f1;
            color: #ccc;
            pointer-events: none;
            border-color: #eee;
        }
    </style>
</head>
<body>

    <header id="mainHeader">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; padding: 0 20px;">
            <div class="logo">
                <img src="images/Logo.png" alt="SaudiCulture" style="height: 50px;">
            </div>
            <nav>
                <a href="arabic.html">الرئيسية</a>
                <a href="browse_ar.php" style="border-bottom: 2px solid #c5a059;">المعجم</a>
                <a href="quiz_ar.php">الاختبار</a>
                <a href="Contact_ar.html">اتصل بنا</a>
            </nav>
            <div class="nav-buttons">
                 <button onclick="window.location.href='login_ar.html'" style="padding: 8px 15px; border-radius: 5px; border: 1px solid white; background: transparent; color: white; cursor: pointer;">تسجيل الدخول</button>
            </div>
        </div>
    </header>

<div class="container">

    <h1 style="text-align: center; color: var(--brand-green); margin-bottom: 20px;"><?php echo $title; ?></h1>

    <div class="search-container">
        <form method="GET" action="browse_ar.php" class="search-form">
            <input type="hidden" name="cat" value="<?php echo htmlspecialchars($category); ?>">
            <input type="text" name="search" class="search-input" placeholder="ابحث عن كلمة، معنى..." value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button type="submit" class="search-btn">بحث</button>
        </form>
    </div>

    <div class="category-tabs">
        <a href="?cat=words" class="cat-btn <?php echo ($category == 'words') ? 'active' : ''; ?>">📝 كلمات</a>
        <a href="?cat=phrases" class="cat-btn <?php echo ($category == 'phrases') ? 'active' : ''; ?>">🗣️ عبارات</a>
        <a href="?cat=proverbs" class="cat-btn <?php echo ($category == 'proverbs') ? 'active' : ''; ?>">📜 أمثال</a>
    </div>

    <div class="grid-container">
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['term'] == 'Term') continue;
                ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($row['term']); ?></h3>
                    <p><?php echo htmlspecialchars($row['meaning']); ?></p>
                </div>
                <?php
            }
        } else {
            echo "<div style='text-align:center; width:100%; grid-column: 1/-1; padding: 40px; color:#777;'>";
            if (!empty($search_keyword)) {
                echo "عذراً، لم نجد نتائج تطابق بحثك: <b>" . htmlspecialchars($search_keyword) . "</b>";
            } else {
                echo "لا توجد بيانات متاحة حالياً.";
            }
            echo "</div>";
        }
        ?>
    </div>

    <?php if ($total_pages > 1): ?>
    <div class="pagination">
        <?php 
            // بناء رابط الصفحة مع الحفاظ على التصنيف وكلمة البحث
            $link_prefix = "?cat=" . $category . "&search=" . urlencode($search_keyword) . "&page=";
        ?>

        <?php if($page > 1): ?>
            <a href="<?php echo $link_prefix . ($page - 1); ?>" class="page-btn">← السابق</a>
        <?php else: ?>
            <span class="page-btn disabled">← السابق</span>
        <?php endif; ?>

        <span class="page-info" style="color:#777;">صفحة <?php echo $page; ?> من <?php echo $total_pages; ?></span>

        <?php if($page < $total_pages): ?>
            <a href="<?php echo $link_prefix . ($page + 1); ?>" class="page-btn">التالي →</a>
        <?php else: ?>
            <span class="page-btn disabled">التالي →</span>
        <?php endif; ?>
    </div>
    <?php endif; ?>

</div>

</body>
</html>