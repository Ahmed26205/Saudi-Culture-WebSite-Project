<?php include "db.php"; ?>

<?php
if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // جلب بيانات المستخدم طريق الايميل
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // التحقق من وجود المستخدم
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // التحقق من كلمة السر المشفرة
        if (password_verify($password, $user['password'])) {

            //اذا نجح تسجيل دخول 
            header("Location: ../arabic.html");
            exit;

        } else {
            $error = "بيانات الدخول غير صحيحة";
        }

    } else {
        $error = "بيانات الدخول غير صحيحة";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>تسجيل دخول</title>
<link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

<header id="mainHeader">
    <div class="logo">
        <img src="../images/Logo.png">
    </div>

    <nav>
        <a href="../arabic.html">الرئيسية</a>
        <button class="signup-btn" onclick="window.location.href='signup_ar.php'">إنشاء حساب</button>
    </nav>
</header>

<section class="full-video-hero" style="height:auto; padding:140px 0;">
    <div class="hero-content" style="background:white; color:#0e6b4e; padding:40px; border-radius:16px; max-width:430px; margin:auto; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

        <h1>تسجيل دخول</h1>

        <form method="POST">
            <input style="padding:12px; width:100%; margin:10px 0;" type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input style="padding:12px; width:100%; margin:10px 0;" type="password" name="password" placeholder="كلمة المرور" required>

            <button class="login-btn" name="login" type="submit" style="width:100%;">تسجيل دخول</button>

            <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

            <p style="margin-top:15px;">
                مستخدم جديد؟
                <a href="signup_ar.php" style="color:#0e6b4e;">إنشاء حساب</a>
            </p>
        </form>

    </div>
</section>

</body>
</html>
