<?php
session_start(); // بدء الجلسة لحفظ بيانات المستخدم المتصل
include "db_conn.php"; // الاتصال بالقاعدة

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // البحث عن المستخدم بنفس الإيميل والباسورد
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        // تم العثور على المستخدم
        $row = mysqli_fetch_assoc($result);
        
        // تخزين بياناته في الجلسة لاستخدامها في الصفحات الأخرى
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        // توجيه المستخدم للصفحة الرئيسية (سنحولها لـ php لاحقاً)
header("Location: index.php");
        exit();
    } else {
        // بيانات خاطئة
        $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SaudiCulture</title>

    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
</head>

<body class="auth-page">

    <header id="mainHeader">
        <div class="logo">
            <img src="images/Logo.png" alt="SaudiCulture Logo">
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="signup.php" class="signup-btn">Sign Up</a> <a href="login_ar.php" class="lang-btn">AR</a>
        </nav>
    </header>
    <div class="auth-container">
        <h2>Welcome Back</h2>
        
        <form action="login.php" method="POST">
            
            <?php if (isset($error)) { echo "<p class='error' style='color:red;'>$error</p>"; } ?>

            <input type="email" name="email" id="email" placeholder="Email Address" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            
            <button type="submit" name="submit" class="auth-btn">Login</button>
            
            <p>Don't have an account? <a href="signup.php">Create one</a></p>
        </form>
    </div>
    
    </body>
</html>