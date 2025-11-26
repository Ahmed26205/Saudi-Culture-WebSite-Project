<?php
include "db.php";

if (isset($_POST['signup'])) {
    $fullname = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // التأكد إذا كان الايميل مستحدم من قبل
    $check = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $error = "هذا البريد الإلكتروني مسجل مسبقًا";
    } else {
        $sql = "INSERT INTO users (fullname, email, password)
                VALUES ('$fullname', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            header("Location: login_ar.php");
            exit;
        } else {
            $error = "خطأ: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إنشاء حساب</title>
<link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

<header id="mainHeader">
    <div class="logo">
        <img src="../images/Logo.png">
    </div>

    <nav>
        <a href="../arabic.html">الرئيسية</a>
        <button class="login-btn" onclick="window.location.href='login_ar.php'">تسجيل دخول</button>
    </nav>
</header>

<section class="full-video-hero" style="height:auto; padding:140px 0;">
    <div class="hero-content" style="background:white; color:#0e6b4e; padding:40px; border-radius:16px; max-width:430px; margin:auto; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

        <h1>إنشاء حساب</h1>

        <form method="POST">
            <input style="padding:12px; width:100%; margin:10px 0;" type="text" name="username" placeholder="اسم المستخدم" required>
            <input style="padding:12px; width:100%; margin:10px 0;" type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input style="padding:12px; width:100%; margin:10px 0;" type="password" name="password" placeholder="كلمة المرور" required>

            <button class="login-btn" name="signup" type="submit" style="width:100%;">إنشاء حساب</button>

            <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

            <p style="margin-top:15px;">
                لديك حساب؟  
                <a href="login_ar.php" style="color:#0e6b4e;">تسجيل الدخول</a>
            </p>
        </form>

    </div>
</section>

</body>
</html>
