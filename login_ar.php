<?php
session_start(); // بدء الجلسة
include "db_conn.php"; // الاتصال بالقاعدة

$error = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // البحث عن المستخدم (نفس منطق الملف الإنجليزي)
    // ملاحظة: يُفضل استخدام طرق أكثر أمانًا مثل الدوال المُجهزة والـ password_verify
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // التحقق من كلمة المرور (نفرض أنها مخزنة كـ Plain Text كما في login.php، أو تحقق من التشفير)
        // إذا كان الباسورد مشفراً (Hashing): استخدم if (password_verify($password, $row['password'])) 
        // إذا كان الباسورد غير مشفر (Plain Text - كما في login.php): 
        if ($password === $row['password']) {
            
            // تخزين بيانات المستخدم في الجلسة
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['username']; // استخدام user_name لتوحيدها
            $_SESSION['email'] = $row['email'];

            // التوجيه للصفحة الرئيسية العربية (افترضنا أنك قمت بتغييرها إلى arabic.php)
            header("Location: arabic.php"); 
            exit();
        } else {
            $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة!";
        }
    } else {
        $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة!";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - SaudiCulture</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
</head>

<body class="auth-page">
    <header id="mainHeader">
        <div class="logo">
            <img src="images/Logo.png" alt="شعار SaudiCulture">
        </div>
        <nav>
            <a href="arabic.php">الرئيسية</a>
            <a href="signup_ar.php" class="signup-btn">إنشاء حساب</a>
            <a href="login.php" class="lang-btn">EN</a>
        </nav>
    </header>
    <div class="auth-container">
        <h2>مرحباً بعودتك</h2>
        
        <form action="login_ar.php" method="POST">
            
            <?php if (!empty($error)) { echo "<p class='error' style='color:red;'>$error</p>"; } ?>
            
            <input type="email" name="email" id="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" id="password" placeholder="كلمة المرور" required>
            
            <button type="submit" name="submit" class="auth-btn">تسجيل الدخول</button>
            
            <p>ليس لديك حساب؟ <a href="signup_ar.php">إنشاء حساب</a></p>
        </form>

    </div>

</body>

</html>