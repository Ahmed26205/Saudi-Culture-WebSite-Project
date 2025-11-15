<?php
include "db.php"; 

if (isset($_POST['signup'])) {

    $fullname = $_POST['username'];  
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // التأكد إذا كان الايميل مستخدم من قبل
    $check = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $error = "This email is already registered.";
    } else {
        $sql = "INSERT INTO users (fullname, email, password)
                VALUES ('$fullname', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

<header id="mainHeader">
    <div class="logo">
        <img src="../images/Logo.png" alt="SaudiCulture">
    </div>

    <nav>
        <a href="../index.html">Home</a>
        <a href="../history.html">History</a>
        <a href="../traditions.html">Traditions</a>
        <a href="../food.html">Food</a>
        <a href="../arts.html">Arts</a>
        <a href="../culture_events.html">Events</a>
        <a href="../quiz.html">Quiz</a>
        <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
    </nav>
</header>

<section class="full-video-hero" style="height:auto; padding:140px 0;">
    <div class="hero-content" style="background:white; color:#0e6b4e; padding:40px; border-radius:16px; max-width:430px; margin:auto; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

        <h1>Create Account</h1>

        <form method="POST">
            <input style="padding:12px; width:100%; margin:10px 0;" type="text" name="username" placeholder="Username" required>
            <input style="padding:12px; width:100%; margin:10px 0;" type="email" name="email" placeholder="Email" required>
            <input style="padding:12px; width:100%; margin:10px 0;" type="password" name="password" placeholder="Password" required>

            <button class="login-btn" name="signup" type="submit" style="width:100%; margin-top:10px;">Create Account</button>

            <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

            <p style="margin-top:15px;">
                Already have an account? 
                <a href="login.php" style="color:#0e6b4e; font-weight:bold;">Login</a>
            </p>
        </form>

    </div>
</section>

</body>
</html>
