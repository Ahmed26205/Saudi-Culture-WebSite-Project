<?php
session_start();
include 'db_conn.php';

// التحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    header("Location: login_ar.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$msg = "";
$msg_type = ""; // success or error

// =========================================================
// 1. خريطة الترجمة (للقيم العربية المخزنة فقط)
// =========================================================
$type_translation = [
    'كوكتيل' => 'تحدي كوكتيل', 
    'كلمات' => 'كلمات ومصطلحات',
    'عبارات' => 'جمل وعبارات',
    'أمثال' => 'أمثال شعبية',
    'mixed' => 'تحدي كوكتيل',
    'Mixed' => 'تحدي كوكتيل',
];

// Handle data updates... (unchanged)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. تحديث الاسم
    if (isset($_POST['update_name'])) {
        $new_name = mysqli_real_escape_string($conn, $_POST['new_name']);
        if (!empty($new_name)) {
            $conn->query("UPDATE users SET username='$new_name' WHERE id='$user_id'");
            $_SESSION['user_name'] = $new_name;
            $msg = "تم تحديث الاسم بنجاح!";
            $msg_type = "success";
        }
    }
    // 2. تغيير كلمة المرور
    elseif (isset($_POST['update_password'])) {
        $new_pass = $_POST['new_password'];
        if (strlen($new_pass) >= 6) {
            $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
            $conn->query("UPDATE users SET password='$hashed' WHERE id='$user_id'");
            $msg = "تم تغيير كلمة المرور بنجاح!";
            $msg_type = "success";
        } else {
            $msg = "يجب أن تكون كلمة المرور 6 أحرف على الأقل.";
            $msg_type = "error";
        }
    }
    // 3. تسجيل الخروج
    elseif (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login_ar.php");
        exit();
    }
}

// جلب بيانات المستخدم
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// =========================================================
// 2. جلب سجل الاختبارات (من الجدول العربي فقط)
// ** تم التحديث لـ quiz_results_ar **
// =========================================================
$history_sql = "SELECT * FROM quiz_results_ar WHERE user_id='$user_id' ORDER BY created_at DESC LIMIT 10";
$history_res = $conn->query($history_sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الملف الشخصي - SaudiCulture</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    <script src="JS/script.js" defer></script>
    <style>
        .status-msg { margin-top: 10px; font-weight: bold; }
        .success { color: green; }
        .error { color: red; }
        
        /* تنسيقات جدول النتائج */
        .history-table { width: 100%; border-collapse: collapse; margin-top: 15px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .history-table th, .history-table td { padding: 12px 15px; text-align: right; border-bottom: 1px solid #eee; }
        .history-table th { background-color: #116A4B; color: white; font-weight: bold; }
        .history-table tr:last-child td { border-bottom: none; }
        .history-table tr:hover { background-color: #f9f9f9; }
        .score-badge { display: inline-block; padding: 4px 10px; border-radius: 12px; font-weight: bold; font-size: 0.9em; }
        .score-high { background-color: #d4edda; color: #155724; }
        .score-low { background-color: #f8d7da; color: #721c24; }
        .no-records { text-align: center; color: #777; padding: 20px; background: #fdfdfd; border: 1px dashed #ccc; border-radius: 8px; margin-top: 15px; }
    </style>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
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
                    <a href="browse_ar.php">المعجم</a>

            <a href="Contact_ar.php">اتصل بنا</a>

          

            <a href="profile_ar.php" class="profile-square" title="الملف الشخصي" style="display:inline-flex;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                </svg>
            </a>
            <button class="lang-btn" onclick="window.location.href='profile.php'">EN</button>
        </nav>
    </header>

    <section class="profile-section" style="display:block;">
        <h2>إعدادات ملفك الشخصي</h2>

        <?php if($msg): ?>
            <div style="text-align:center; margin-bottom:20px;">
                <p class="status-msg <?php echo $msg_type; ?>"><?php echo $msg; ?></p>
            </div>
        <?php endif; ?>

        <div class="profile-details">
            <h3>معلومات الحساب</h3>
            <p><strong>الاسم:</strong> <span><?php echo htmlspecialchars($user['username']); ?></span></p>
            <p><strong>البريد الإلكتروني:</strong> <span><?php echo htmlspecialchars($user['email']); ?></span></p>
            <hr style="border-top: 1px solid #ddd; margin: 15px 0;">
            <p><strong>تاريخ التسجيل:</strong> <span><?php echo $user['created_at'] ?? 'غير متوفر'; ?></span></p>
        </div>

        <div class="profile-details" style="margin-top: 30px;">
            <h3>📊 سجل التحديات السابقة</h3>
            
            <?php if ($history_res && $history_res->num_rows > 0): ?>
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>نوع التحدي</th>
                            <th>النتيجة</th>
                            <th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($h_row = $history_res->fetch_assoc()): 
                            
                            // تطبيق الترجمة بناءً على الخريطة المحددة 
                            $quiz_type_key = $h_row['quiz_type'];
                            $quiz_type_ar = $type_translation[$quiz_type_key] ?? $quiz_type_key;
                            
                            $totalQ = (int)$h_row['total_questions'];
                            $percent = ($totalQ > 0) ? ((int)$h_row['score'] / $totalQ) * 100 : 0;
                            $badge_class = ($percent >= 60) ? 'score-high' : 'score-low';
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($quiz_type_ar); ?></td>
                                <td>
                                    <span class="score-badge <?php echo $badge_class; ?>">
                                        <?php echo $h_row['score'] . ' / ' . $h_row['total_questions']; ?>
                                    </span>
                                </td>
                                <td><?php echo date('Y-m-d H:i', strtotime($h_row['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-records">
                    لم تقم بأي اختبارات بعد. <a href="quiz_ar.php" style="color:#116A4B; font-weight:bold;">ابدأ التحدي الآن!</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="profile-actions">
            <div class="action-card">
                <h3>تحديث اسم المستخدم</h3>
                <form method="POST">
                    <input type="text" name="new_name" placeholder="الاسم الكامل الجديد" required>
                    <button type="submit" name="update_name" class="update-btn">تحديث الاسم</button>
                </form>
            </div>

            <div class="action-card">
                <h3>تغيير كلمة المرور</h3>
                <form method="POST">
                    <input type="password" name="new_password" placeholder="كلمة المرور الجديدة (6 أحرف كحد أدنى)" required>
                    <button type="submit" name="update_password" class="update-btn">تغيير كلمة المرور</button>
                </form>
            </div>
        </div>

        <form method="POST" style="text-align:center;">
            <button type="submit" name="logout" class="auth-btn" style="background: #e74c3c; margin-top: 30px;">تسجيل الخروج</button>
        </form>
    </section>


    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <img src="assets/images/Logo.png" alt="شعار SaudiCulture Logo" class="footer-logo">
                <p>مشروع <strong>SaudiCulture</strong> – منصة تعرض جمال الموروث الثقافي والتاريخ السعودي.</p>
            </div>

            <div class="footer-links">
                <h4>روابط سريعة</h4>
                <a href="arabic.php">الرئيسية</a>
                <a href="history_ar.php">التاريخ</a>
                <a href="traditions_ar.php">التقاليد</a>
                <a href="food_ar.php">الطعام</a>
                <a href="Contact_ar.php">اتصل بنا</a>
            </div>

            <div class="footer-contact">
                <h4>تواصل معنا</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 مكة، المملكة العربية السعودية</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
    
</body>
</html>
