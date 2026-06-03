<?php
// تفعيل جلسة المستخدم للتحقق من حالة تسجيل الدخول لاحقًا إذا لزم الأمر
session_start();
include 'db_connect.php'; 

// =========================================================
// 1. إعدادات الصفحة والمتغيرات
// =========================================================

$category = isset($_GET['cat']) ? $_GET['cat'] : 'words';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// --- تغيير العدد إلى 21 ---
$limit = 21; 
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

// التأكد من أن رقم الصفحة لا يتجاوز الحد الأقصى
if ($page > $total_pages) $page = $total_pages;

// ب) جلب البيانات (مع مراعاة البحث والصفحات)
$sql = "SELECT `COL 1` as term, `COL 2` as meaning 
        FROM `$table_name` 
        WHERE `COL 1` != 'Term' $search_sql
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

// بناء رابط الصفحة الأساسي
$link_prefix = "?cat=" . $category . "&search=" . urlencode($search_keyword) . "&page=";
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
            --brand-green: #116A4B; 
            --brand-gold: #CCA450;
            --bg-color: #f8f9fa;
        }
        body { 
            font-family: 'Tajawal', sans-serif;
            background: var(--bg-color); 
            margin: 0; 
            padding-top: 120px; 
            color: #333;
        }
        /* تم إزالة أنماط الـ Header المتعارضة هنا للسماح لـ styles.css بتطبيق تصميم الكويز */
        
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
            text-align: right;
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
            background: #0d523a;
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
        
        /* --- تنسيق الصفحات الجديدة --- */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 50px;
            align-items: center;
            flex-wrap: wrap;
        }
        .page-btn {
            padding: 8px 16px;
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
            background: #f1f1f1;
            color: #ccc;
            pointer-events: none;
            border-color: #eee;
        }
        .page-input-form {
            display: flex;
            gap: 5px;
        }
        .page-input {
            width: 50px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            font-family: 'Tajawal';
        }
        .page-submit {
            padding: 8px 12px;
            background: var(--brand-green);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }
        .page-submit:hover {
             background: #0d523a;
        }
    </style>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
        <link rel="stylesheet" href="CSS/auth.css">

</head>
<body>

<header id="mainHeader" class="scrolled">
    <div class="logo">
        <img src="assets/images/Logo.png" alt="شعار SaudiCulture">
    </div>

    <nav>
        <a href="arabic.php">الرئيسية</a>
        <a href="history_ar.php">التاريخ</a>
        <a href="traditions_ar.php">التقاليد</a>
        <a href="food_ar.php">الطعام</a>
        <a href="arts_ar.php">الفنون</a>
        <a href="culture_events_ar.php">الفعاليات الثقافية</a>
        <a href="quiz_ar.php">الاختبار</a>
        <a href="browse_ar.php" style="color: #116A4B; font-weight: 700;">المعجم</a> 
        <a href="Contact_ar.php">اتصل بنا</a>


        <div class="right-buttons" style="display: flex; align-items: center; gap: 10px;">
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="profile_ar.php" class="profile-square" title="الملف الشخصي" style="display: inline-flex;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg>
                </a>
            <?php else: ?>
                <button class="login-btn" onclick="window.location.href='login_ar.php'">تسجيل الدخول</button>
                <button class="signup-btn" onclick="window.location.href='signup_ar.php'">إنشاء حساب</button>
            <?php endif; ?>

        </div>
    </nav>
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
            // هذا الكود يحدد رابط الصفحة الأساسي المستخدم في الأزرار
            $link_prefix = "?cat=" . $category . "&search=" . urlencode($search_keyword) . "&page=";
        ?>
        
        <?php if($page > 1): ?>
            <a href="<?php echo $link_prefix . 1; ?>" class="page-btn">« أول صفحة</a>
        <?php endif; ?>

        <?php if($page > 1): ?>
            <a href="<?php echo $link_prefix . ($page - 1); ?>" class="page-btn">← السابق</a>
        <?php else: ?>
            <span class="page-btn disabled">← السابق</span>
        <?php endif; ?>

        <form method="GET" action="browse_ar.php" class="page-input-form" style="display:flex; align-items:center; gap:5px;">
            <input type="hidden" name="cat" value="<?php echo htmlspecialchars($category); ?>">
            <input type="hidden" name="search" value="<?php echo htmlspecialchars($search_keyword); ?>">
            
            <span class="page-info" style="color:#777; white-space: nowrap;">صفحة</span>
            
            <input type="number" name="page" min="1" max="<?php echo $total_pages; ?>" value="<?php echo $page; ?>" class="page-input" style="width: 70px;">
            
            <button type="submit" class="page-submit" style="height: 38px;">انتقال</button>
        </form>
        
        <?php if($page < $total_pages): ?>
            <a href="<?php echo $link_prefix . ($page + 1); ?>" class="page-btn">التالي →</a>
        <?php else: ?>
            <span class="page-btn disabled">التالي →</span>
        <?php endif; ?>
        
        <?php if($page < $total_pages): ?>
            <a href="<?php echo $link_prefix . $total_pages; ?>" class="page-btn">آخر صفحة »</a>
        <?php endif; ?>
        
    </div>
    <?php endif; ?>
    </div>
  
 <footer class="footer">
        <div class="footer-container">

            <!-- Left: logo + brief -->
            <div class="footer-about">
                <img src="assets/images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p>مشروع <strong>SaudiCulture</strong> – منصة تعرض جمال الموروث الثقافي والتاريخ السعودي.</p>
            </div>

            <!-- Middle: quick links -->
            <div class="footer-links">
                <h4>روابط سريعة</h4>
                <a href="arabic.php">الرئيسية</a>
                <a href="history_ar.php">التاريخ</a>
                <a href="traditions_ar.php">التقاليد</a>
                <a href="food_ar.php">الطعام</a>
                        <a href="arts_ar.php">الفنون</a>

                <a href="Contact_ar.php">اتصل بنا</a>
            </div>

            <!-- Right: contact info -->
            <div class="footer-contact">
                <h4>تواصل معنا</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 مكة، المملكة العربية السعودية</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. All rights reserved.</p>
        </div>
    </footer>
    
</div>

<script>
    // دالة فتح/إغلاق شريط البحث العلوي (مطلوبة لتشغيل الهيدر)
    function toggleTopSearch() {
        const searchBar = document.getElementById("topSearchBar");
        searchBar.style.display = (searchBar.style.display === "block") ? "none" : "block";
    }
</script>
</body>
</html>
