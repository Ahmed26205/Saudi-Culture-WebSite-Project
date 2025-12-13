<?php
session_start();
include 'db_conn.php';

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // التحقق من وجود البريد سابقاً
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $msg = "هذا البريد الإلكتروني مسجل بالفعل!";
    } else {
        // تشفير كلمة المرور
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$hashed_password')";
        
        if ($conn->query($sql) === TRUE) {
            // تسجيل الدخول مباشرة بعد الإنشاء
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_name'] = $name;
            header("Location: arabic.php"); // التوجيه للصفحة الرئيسية
            exit();
        } else {
            $msg = "حدث خطأ: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - SaudiCulture</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Outfit:wght@500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body class="auth-page">
    <header id="mainHeader">
        <div class="logo">
            <img src="images/Logo.png" alt="شعار SaudiCulture">
        </div>
        <nav>
            <a href="arabic.php">الرئيسية</a>
            <a href="login_ar.php" class="login-btn">تسجيل الدخول</a>
            <a href="signup.php" class="lang-btn">EN</a>
        </nav>
    </header>
    <div class="auth-container">
        <h2>إنشاء حساب جديد</h2>
        <form id="signupForm" method="POST" action="">
            <input type="text" name="name" placeholder="الاسم" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit" class="auth-btn">إنشاء الحساب</button>
            <p>هل لديك حساب بالفعل؟ <a href="login_ar.php">تسجيل الدخول</a></p>
        </form>
        <?php if($msg): ?>
            <p class="msg" style="color: red; display:block;"><?php echo $msg; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>