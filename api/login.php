<?php
session_start(); // Start the session
include "db_conn.php"; // Database connection

$error = ""; // Initialize error message

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Search for the user ONLY by email (to retrieve the hashed password)
    // We must select the 'password' column to use password_verify
    $sql = "SELECT id, username, email, password FROM users WHERE email='$email'"; 
    $result = mysqli_query($conn, $sql);

    // 2. Check if a user was found
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        
        // 3. SECURE VERIFICATION: Use password_verify to check the plaintext password against the hash
        if (password_verify($password, $hashed_password)) {
            
            // User authenticated successfully: Store data in session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            header("Location: index.php"); 
            exit();
        } else {
            // Password verification failed
            $error = "Email or password is incorrect!"; 
        }
    } else {
        // User not found
        $error = "Email or password is incorrect!"; 
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
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body class="auth-page">

    <header id="mainHeader">
        <div class="logo">
            <img src="assets/images/Logo.png" alt="SaudiCulture Logo">
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
