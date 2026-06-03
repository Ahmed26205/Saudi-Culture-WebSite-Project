<?php
session_start();
// إعدادات الاتصال بقاعدة البيانات (يفترض أنها في db_conn.php، لكن سنبقيها هنا كما في ملفك)
include "db_conn.php";




$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // 1. التحقق من وجود البريد سابقاً
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $msg = "This email address is already registered!";
    } else {
        // 2. ** التشفير الآمن لكلمة المرور **
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // 3. إدراج اسم المستخدم، الإيميل، وكلمة المرور المشفرة
        $sql = "INSERT INTO users (username, email, password) 
                VALUES ('$username', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            // تسجيل الدخول مباشرة بعد الإنشاء (اختياري، لكن آمن)
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            $_SESSION['username'] = $username;
            header("Location: index.php"); 
            exit();
        } else {
            $msg = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - SaudiCulture</title>

    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Outfit:wght@500;700&display=swap"
        rel="stylesheet">
        <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body class="auth-page">

    <header id="mainHeader">
        <div class="logo">
            <img src="images/Logo.png" alt="SaudiCulture Logo">
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php" class="login-btn">Login</a>
            <a href="signup_ar.php" class="lang-btn">AR</a>
        </nav>
    </header>
    <div class="auth-container">
        <h2>Create Account</h2>
        
        <form action="signup.php" method="POST">
            
            <input type="text" name="username" id="name" placeholder="Full Name" required>
            
            <input type="email" name="email" id="email" placeholder="Email Address" required>
            
            <input type="password" name="password" id="password" placeholder="Password" required>
            
            <button type="submit" name="submit" class="auth-btn">Sign Up</button>
            
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
        
        <p id="message" class="msg"></p>
    </div>
    
    </body>
</html>