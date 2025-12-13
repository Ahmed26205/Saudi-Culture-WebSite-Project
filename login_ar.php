<?php
session_start(); // بدء الجلسة
include "db_conn.php"; // الاتصال بالقاعدة

$error = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // البحث عن المستخدم باستخدام البريد الإلكتروني
    $sql = "SELECT id, username, email, password FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    // التحقق مما إذا كان هناك مستخدم واحد بهذا البريد الإلكتروني
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // ** التحقق من كلمة المرور المشفرة باستخدام password_verify **
        if (password_verify($password, $row['password'])) {
            
            // تخزين بيانات المستخدم في الجلسة
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['username']; 
            $_SESSION['email'] = $row['email'];

            header("Location: arabic.php"); 
            exit();
        } else {
            // فشل التحقق من كلمة المرور
            $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة!";
        }
    } else {
        // لم يتم العثور على مستخدم
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
    <link rel="icon" type="image/png" href="images/logo.png">
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