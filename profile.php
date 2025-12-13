<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$msg = "";
$msg_type = ""; 

$type_translation = [
    // الأنواع المختلطة والجديدة 

    // أنواع المناطق (القيم المخزنة)
    'Central' => 'Central Region',   
    'West' => 'Western Region',     
    'East' => 'Eastern Region',    
    'North' => 'Northern Region', 
    'South' => 'Southern Region',
    'General' => 'General Topics',
    
    'Central Region' => 'Central Region',
    'Western Region' => 'Western Region',
    'Eastern Region' => 'Eastern Region',
    'Northern Region' => 'Northern Region',
    'Southern Region' => 'Southern Region',
];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_name'])) {
        $new_name = mysqli_real_escape_string($conn, $_POST['new_name']);
        if (!empty($new_name)) {
            $conn->query("UPDATE users SET username='$new_name' WHERE id='$user_id'");
            $_SESSION['user_name'] = $new_name; 
            $msg = "Username updated successfully!";
            $msg_type = "success";
        }
    }
    elseif (isset($_POST['update_password'])) {
        $new_pass = $_POST['new_password'];
        if (strlen($new_pass) >= 6) {
            $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
            $conn->query("UPDATE users SET password='$hashed' WHERE id='$user_id'");
            $msg = "Password changed successfully!";
            $msg_type = "success";
        } else {
            $msg = "Password must be at least 6 characters long.";
            $msg_type = "error";
        }
    }
    elseif (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// جلب سجل الاختبارات (من الجدول الإنجليزي في قاعدة البيانات الإنجليزية)
$history_sql = "SELECT * FROM quiz_db_en.quiz_results_en WHERE user_id='$user_id' ORDER BY created_at DESC LIMIT 10";
$history_res = $conn->query($history_sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile - SaudiCulture</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    <script src="JS/script.js" defer></script>
    <style>
        .status-msg { margin-top: 10px; font-weight: bold; }
        .success { color: green; }
        .error { color: red; }
        
        /* New Quiz History Table Styles (English LTR adjustment) */
        .history-table { width: 100%; border-collapse: collapse; margin-top: 15px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .history-table th, .history-table td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; } /* Alignment: Left for LTR */
        .history-table th { background-color: #116A4B; color: white; font-weight: bold; }
        .history-table tr:last-child td { border-bottom: none; }
        .history-table tr:hover { background-color: #f9f9f9; }
        .score-badge { display: inline-block; padding: 4px 10px; border-radius: 12px; font-weight: bold; font-size: 0.9em; }
        .score-high { background-color: #d4edda; color: #155724; }
        .score-low { background-color: #f8d7da; color: #721c24; }
        .no-records { text-align: center; color: #777; padding: 20px; background: #fdfdfd; border: 1px dashed #ccc; border-radius: 8px; margin-top: 15px; }
    </style>
</head>

<body>
    <header id="mainHeader" class="scrolled">
        <div class="logo">
            <img src="images/Logo.png" alt="SaudiCulture Logo">
        </div>

        <nav>
            <a href="index.php">Home</a>
            <a href="history.php">History</a>
            <a href="traditions.php">Traditions</a>
            <a href="food.php">Food</a>
            <a href="arts.php">Arts</a>
            <a href="culture_events.php">Cultural Events</a>
            <a href="quiz.php">Quiz</a>
                <a href="browse_ar.php">dictionary</a>

            <a href="Contact.php">Contact Us</a>

            <button class="nav-search-btn" onclick="toggleTopSearch()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="7" stroke="#0e6b4e" stroke-width="2"/>
                    <line x1="16.5" y1="16.5" x2="22" y2="22" stroke="#0e6b4e" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
            <div class="top-search-bar" id="topSearchBar">
                <input type="text" placeholder="Search the website..." />
            </div>

            <a href="profile.php" class="profile-square" title="Profile" style="display:inline-flex;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                </svg>
            </a>
            <button class="lang-btn" onclick="window.location.href='profile_ar.php'">عربي</button>
        </nav>
    </header>

    <section class="profile-section" style="display:block;">
        <h2>Profile Settings</h2>

        <?php if($msg): ?>
            <div style="text-align:center; margin-bottom:20px;">
                <p class="status-msg <?php echo $msg_type; ?>"><?php echo $msg; ?></p>
            </div>
        <?php endif; ?>

        <div class="profile-details">
            <h3>Account Information</h3>
            <p><strong>Name:</strong> <span><?php echo htmlspecialchars($user['username']); ?></span></p>
            <p><strong>Email:</strong> <span><?php echo htmlspecialchars($user['email']); ?></span></p>
            <hr style="border-top: 1px solid #ddd; margin: 15px 0;">
            <p><strong>Registration Date:</strong> <span><?php echo $user['created_at'] ?? 'Not Available'; ?></span></p>
        </div>

        <div class="profile-details" style="margin-top: 30px;">
            <h3>📊 Quiz History</h3>
            
            <?php if ($history_res && $history_res->num_rows > 0): ?>
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Quiz Type</th>
                            <th>Score</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($h_row = $history_res->fetch_assoc()): 
                            $percent = ($h_row['score'] / $h_row['total_questions']) * 100;
                            $badge_class = ($percent >= 60) ? 'score-high' : 'score-low';
                            
                            $quiz_type_key = $h_row['quiz_type'];
                            $quiz_type_en = $type_translation[$quiz_type_key] ?? $quiz_type_key;

                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($quiz_type_en); ?></td>
                                <td>
                                    <span class="score-badge <?php echo $badge_class; ?>">
                                        <?php echo $h_row['score'] . ' / ' . $h_row['total_questions']; ?>
                                    </span>
                                </td>
                                <td><?php echo date('Y-m-d H:i', strtotime($h_row['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-records">
                    You haven't taken any quizzes yet. <a href="quiz.php" style="color:#116A4B; font-weight:bold;">Start the challenge now!</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="profile-actions">
            <div class="action-card">
                <h3>Update Username</h3>
                <form method="POST">
                    <input type="text" name="new_name" placeholder="New Full Name" required>
                    <button type="submit" name="update_name" class="update-btn">Update Name</button>
                </form>
            </div>

            <div class="action-card">
                <h3>Change Password</h3>
                <form method="POST">
                    <input type="password" name="new_password" placeholder="New Password (min 6 characters)" required>
                    <button type="submit" name="update_password" class="update-btn">Change Password</button>
                </form>
            </div>
        </div>

        <form method="POST" style="text-align:center;">
            <button type="submit" name="logout" class="auth-btn" style="background: #e74c3c; margin-top: 30px;">Log Out</button>
        </form>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <img src="images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p><strong>SaudiCulture</strong> Project – A platform showcasing the beauty of Saudi cultural heritage and history.</p>
            </div>

     <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <img src="images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p>
                    <strong>SaudiCulture</strong> is a digital window into the rich history,
                    heritage, and cultural diversity of Saudi Arabia.
                </p>
            </div>

            <div class="footer-links">
                <h4>Quick Links</h4>
                <a href="index.php">Home</a>
                <a href="history.php">History</a>
                <a href="traditions.php">Traditions</a>
                <a href="food.php">Food</a>
                <a href="arts.php">Arts</a>
                <a href="contact.php">Contact Us</a>
            </div>

            <div class="footer-contact">
                <h4>Contact</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 Makkah, Saudi Arabia</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>