<?php include "db.php"; ?>

<?php
if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // جلب بيانات المستخدم عبر الايميل
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // التحقق من كلمة السر المشفرة
        if (password_verify($password, $user['password'])) {
            //اذا نجح تسجيل الدخول 
            header("Location: ../index.html");
            exit;
        } else {
            $error = "Incorrect email or password.";
        }
    } else {
        $error = "Incorrect email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

<header id="mainHeader">
    <div class="logo">
        <img src="../images/Logo.png" alt="SaudiCulture">
    </div>

    <nav>
        <a href="../index.html">Home</a>
        <button class="signup-btn" onclick="window.location.href='signup.php'">Sign Up</button>
    </nav>
</header>

<section class="full-video-hero" style="height:auto; padding:140px 0;">
    <div class="hero-content" style="background:white; color:#0e6b4e; padding:40px; border-radius:16px; max-width:430px; margin:auto; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

        <h1>Login</h1>

        <form method="POST">
            <input style="padding:12px; width:100%; margin:10px 0;" type="email" name="email" placeholder="Email" required>
            <input style="padding:12px; width:100%; margin:10px 0;" type="password" name="password" placeholder="Password" required>

            <button class="login-btn" name="login" type="submit" style="width:100%;">Login</button>

            <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

            <p style="margin-top:15px;">
                Don't have an account?
                <a href="signup.php" style="color:#0e6b4e; font-weight:bold;">Create one</a>
            </p>
        </form>

    </div>
</section>

</body>
</html>
