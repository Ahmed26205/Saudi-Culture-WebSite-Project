<?php
include 'db_connect.php'; 

// =========================================================
// 1. إعدادات الصفحة
// =========================================================

$category = isset($_GET['cat']) ? $_GET['cat'] : 'words';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$limit = 20;
$offset = ($page - 1) * $limit;

// =========================================================
// 2. اختيار الجدول المناسب
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
// 3. استعلامات قاعدة البيانات (التعديل هنا)
// =========================================================

// التعديل 1: حساب العدد الكلي (بدون استخدام id)
// نستثني الصف الذي تكون فيه الكلمة هي 'Term' (عنوان العمود)
$count_sql = "SELECT COUNT(*) as total FROM `$table_name` WHERE `COL 1` != 'Term'";
$count_result = $conn->query($count_sql);

// حماية إضافية في حال فشل الاستعلام
if ($count_result) {
    $total_rows = $count_result->fetch_assoc()['total'];
} else {
    $total_rows = 0;
    // عرض رسالة خطأ للمطور فقط
    // echo $conn->error; 
}

$total_pages = ceil($total_rows / $limit);
if ($total_pages == 0) $total_pages = 1;

// التعديل 2: جلب البيانات (بدون استخدام id)
// نستخدم LIMIT و OFFSET للتنقل بين الصفحات
$sql = "SELECT `COL 1` as term, `COL 2` as meaning 
        FROM `$table_name` 
        WHERE `COL 1` != 'Term' 
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تصفح الموروث السعودي</title>
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
        .category-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .cat-btn {
            padding: 12px 30px;
            background: white;
            border: 2px solid #e1e4e8;
            border-radius: 50px;
            text-decoration: none;
            color: #555;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .cat-btn:hover {
            border-color: var(--brand-green);
            color: var(--brand-green);
            transform: translateY(-2px);
        }
        .cat-btn.active {
            background: var(--brand-green);
            color: white;
            border-color: var(--brand-green);
            box-shadow: 0 5px 15px rgba(27, 77, 62, 0.3);
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border-top: 5px solid var(--brand-gold);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }
        .card h3 {
            margin: 0 0 10px 0;
            color: var(--brand-green);
            font-size: 1.5em;
        }
        .card p {
            color: #666;
            line-height: 1.6;
            margin: 0;
            font-size: 1.1em;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 50px;
            align-items: center;
            flex-wrap: wrap;
        }
        .page-btn {
            padding: 10px 20px;
            background: white;
            border: 1px solid #ddd;
            text-decoration: none;
            color: var(--brand-green);
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }
        .page-btn:hover {
            background: var(--brand-green);
            color: white;
        }
        .page-btn.disabled {
            background: #eee;
            color: #aaa;
            cursor: not-allowed;
            pointer-events: none;
        }
        .page-info {
            color: #777;
            font-weight: bold;
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

    <h1 style="text-align: center; color: var(--brand-green); margin-bottom: 30px;"><?php echo $title; ?></h1>

    <div class="category-tabs">
        <a href="?cat=words&page=1" class="cat-btn <?php echo ($category == 'words') ? 'active' : ''; ?>">
            📝 كلمات ومصطلحات
        </a>
        <a href="?cat=phrases&page=1" class="cat-btn <?php echo ($category == 'phrases') ? 'active' : ''; ?>">
            🗣️ جمل وعبارات
        </a>
        <a href="?cat=proverbs&page=1" class="cat-btn <?php echo ($category == 'proverbs') ? 'active' : ''; ?>">
            📜 أمثال شعبية
        </a>
    </div>

    <div class="grid-container">
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // فلترة إضافية للتأكد من عدم عرض صف العناوين
                if ($row['term'] == 'Term') continue;
                ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($row['term']); ?></h3>
                    <p><?php echo htmlspecialchars($row['meaning']); ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center; width:100%;'>لا توجد بيانات لعرضها.</p>";
        }
        ?>
    </div>

    <div class="pagination">
        <?php if($page > 1): ?>
            <a href="?cat=<?php echo $category; ?>&page=<?php echo $page - 1; ?>" class="page-btn">← السابق</a>
        <?php else: ?>
            <span class="page-btn disabled">← السابق</span>
        <?php endif; ?>

        <span class="page-info">صفحة <?php echo $page; ?> من <?php echo $total_pages; ?></span>

        <?php if($page < $total_pages): ?>
            <a href="?cat=<?php echo $category; ?>&page=<?php echo $page + 1; ?>" class="page-btn">التالي →</a>
        <?php else: ?>
            <span class="page-btn disabled">التالي →</span>
        <?php endif; ?>
    </div>

</div>

</body>
</html>