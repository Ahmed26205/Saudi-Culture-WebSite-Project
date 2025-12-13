<?php
// إعدادات الاتصال بقاعدة البيانات
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "quiz_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// عند ضغط زر التسجيل
if (isset($_POST['submit'])) {
    $username = $_POST['username']; // يأخذ البيانات من الحقل الذي اسمه username
    $email = $_POST['email'];
    $password = $_POST['password'];

    // إضافة المستخدم للجدول
    $sql = "INSERT INTO users (username, email, password, score_west) 
            VALUES ('$username', '$email', '$password', 0)";

    if (mysqli_query($conn, $sql)) {
        // رسالة نجاح وتحويل لصفحة تسجيل الدخول
        echo "<script>alert('Account created successfully!'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
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
            
            <p>Already have an account? <a href="login.html">Login</a></p>
        </form>
        
        <p id="message" class="msg"></p>
    </div>
    
    </body>
</html>