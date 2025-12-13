<?php
session_start();
include 'db_connect_en.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

// =========================================================
// 1. Helper Functions
// =========================================================

function parseEnglishRow($row) {
    $question = trim($row['COL 1']);
    $raw_options = trim($row['COL 2']);
    $correct_answer_text = trim($row['COL 3']);
    
    $data = [
        'q' => $question,
        'type' => 'text', 
        'opts' => [],
        'ans' => $correct_answer_text
    ];

    if (!empty($raw_options) && $raw_options !== '-' && strpos($raw_options, 'A.') !== false) {
        $data['type'] = 'mcq';
        $split = preg_split('/(?=[A-D]\.\s)/', $raw_options, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($split as $opt) {
            $clean_opt = preg_replace('/^[A-D]\.\s/', '', trim($opt));
            if(!empty($clean_opt)) {
                $data['opts'][] = trim($opt); 
            }
        }
    }
    return $data;
}

// =========================================================
// 2. Controller Logic
// =========================================================

$state = 'menu'; 
$score = 0;
$total = 0;
$should_scroll = false; 

// -- State: Result --
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_answers'])) {
    $state = 'result';
    $should_scroll = true; 
    
    $correct_map = isset($_SESSION['quiz_answers_en']) ? $_SESSION['quiz_answers_en'] : [];
    $user_answers = isset($_POST['ans']) ? $_POST['ans'] : [];
    
    $total = count($correct_map);
    $results_detail = []; 

    foreach ($correct_map as $q_id => $data) {
        $correct_text = strtolower(trim($data['ans'])); 
        $q_text = $data['q_text'];    
        
        $user_ans = isset($user_answers[$q_id]) ? trim($user_answers[$q_id]) : '';
        $user_ans_lower = strtolower($user_ans);

        $is_correct = false;
        if (strpos($user_ans_lower, $correct_text) !== false && !empty($correct_text)) {
            $is_correct = true;
        } 
        
        if ($is_correct) $score++;

        $results_detail[$q_id] = [
            'question' => $q_text,
            'user_full' => $user_ans,
            'is_correct' => $is_correct,
            'correct_text' => $data['ans']
        ];
    }
    
    if (isset($_SESSION['user_id'])) {
        $type_label = $_SESSION['quiz_region_label'] ?? 'General';
        
        // =========================================================
        // *** التعديل الوحيد: الحفظ في الجدول الإنجليزي الجديد ***
        // =========================================================
        $stmt = $conn->prepare("INSERT INTO quiz_results_en (user_id, score, total_questions, quiz_type) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $uid = $_SESSION['user_id'];
            $stmt->bind_param("iiis", $uid, $score, $total, $type_label);
            $stmt->execute();
        }
        // تنظيف الجلسة
        unset($_SESSION['quiz_region_label']);
    }

// -- State: Start Quiz --
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start_quiz'])) {
    $state = 'quiz';
    $should_scroll = true; 
    
    $limit = (int)$_POST['limit'];
    
    // التغيير هنا: نستقبل قيمة واحدة فقط (region) وليس مصفوفة
    $selected_region = isset($_POST['region']) ? $_POST['region'] : 'mixed';
    
    $tables = [];
    $valid_tables = ["centeral", "east", "north", "south", "west", "general"]; // إضافة general كجدول منطقة
    
    // منطق اختيار الجداول (من الكود الأصلي)
    if ($selected_region == 'mixed') {
        $tables = $valid_tables; // كل الجداول
        $_SESSION['quiz_region_label'] = 'Mixed';
    } else {
        // تأكد أن المنطقة المختارة موجودة في القائمة الصحيحة (حماية)
        if (in_array($selected_region, $valid_tables)) {
            $tables = [$selected_region];
            $_SESSION['quiz_region_label'] = ucfirst($selected_region) . ' Region'; // حفظ اسم المنطقة كاملاً (مثل Western Region)
        } else {
            // لو صار تلاعب، نرجع للـ Mixed
            $tables = $valid_tables;
            $_SESSION['quiz_region_label'] = 'Mixed';
        }
    }
    
    $quiz_questions = [];
    $answers_map = []; 

    for ($i = 0; $i < $limit; $i++) {
        $curr_table = $tables[array_rand($tables)];
        
        $badge_label = ucfirst($curr_table) . ' Region'; // عرض اسم المنطقة
        $badge_color = '#1b4d3e'; 
        // ... (منطق تحديد لون المنطقة) ...
        if($curr_table == 'west') $badge_color = '#c0392b';
        if($curr_table == 'east') $badge_color = '#2980b9';
        if($curr_table == 'centeral') $badge_color = '#f39c12';
        if($curr_table == 'north') $badge_color = '#8e44ad';
        if($curr_table == 'south') $badge_color = '#d35400';
        if($curr_table == 'general') $badge_color = '#116A4B';


        $res = $conn->query("SELECT * FROM `$curr_table` WHERE `COL 1` != '' AND `COL 1` NOT LIKE 'COL%' AND `COL 1` != 'Question' ORDER BY RAND() LIMIT 1");
        
        if ($res && $row = $res->fetch_assoc()) {
            $parsed = parseEnglishRow($row);
            
            if (!empty($parsed['q']) && $parsed['type'] == 'mcq') {
                $q_id = uniqid('q');
                $quiz_questions[] = [
                    'id' => $q_id,
                    'badge_label' => $badge_label,
                    'badge_color' => $badge_color,
                    'question' => $parsed['q'],
                    'type' => $parsed['type'], 
                    'options' => $parsed['opts']
                ];
                $answers_map[$q_id] = [
                    'ans' => $parsed['ans'],
                    'q_text' => $parsed['q']
                ];
            } else {
                $i--; 
            }
        } else {
             $i--; 
        }
    }
    $_SESSION['quiz_answers_en'] = $answers_map;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saudi Culture Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    
    <style>
        :root { 
            --brand-green: #116A4B; 
            --brand-gold: #CCA450; 
            --bg-color: #f8f9fa; 
        }
        body { font-family: 'Outfit', sans-serif; background: var(--bg-color); margin: 0; padding-top: 120px; color: #333; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; }

        .start-btn { width: 100%; padding: 15px; background: var(--brand-green); color: white; border: none; border-radius: 12px; font-size: 1.2em; font-weight: bold; cursor: pointer; margin-top: 20px; transition:0.3s; }
        .start-btn:hover { background: #0d523a; }
        
        .menu-box { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.05); 
            text-align: center; 
            border-top: 5px solid var(--brand-green); 
            margin-bottom: 40px; 
        }
        
        .select-group { margin-bottom: 25px; text-align: left; }
        .select-group label.main-label { display: block; margin-bottom: 10px; font-weight: bold; color: var(--brand-green); font-size: 1.1em; }
        .form-select { width: 100%; padding: 15px; border-radius: 10px; border: 1px solid #ddd; font-family: 'Outfit'; font-size: 1.1em; }
        
        /* Checkbox Grid Style - Modified for Radio Buttons */
        .checkbox-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .checkbox-label { display: flex; align-items: center; background: #fdfdfd; border: 2px solid #eee; padding: 15px; border-radius: 10px; cursor: pointer; transition: 0.2s; font-weight: 500; }
        .checkbox-label:hover { background: #f0fdf7; border-color: #a8d5c2; }
        
        /* تنسيق الراديو */
        .checkbox-label input[type="radio"] { 
            width: 20px; 
            height: 20px; 
            margin-right: 12px; 
            accent-color: var(--brand-green); 
        }
        /* تمييز الخيار المحدد */
        .checkbox-label input[type="radio"]:checked + span { 
            color: var(--brand-green); 
            font-weight: bold; 
        }
        /* إضافة حدود ملونة للخيار المحدد */
        .checkbox-label:has(input:checked) {
            border-color: var(--brand-green);
            background-color: #e8f5e9;
        }

        .quiz-container-area { animation: fadeIn 0.5s ease-in-out; }
        
        .quiz-item { background: white; border-radius: 15px; padding: 25px; margin-bottom: 30px; border: 1px solid #eee; box-shadow: 0 3px 10px rgba(0,0,0,0.02); text-align: left; }
        .header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .type-badge { padding: 5px 12px; border-radius: 20px; color: white; font-size: 0.85em; font-weight: bold; text-transform: uppercase; }
        
        .q-text { font-size: 1.3em; font-weight: 700; margin-bottom: 20px; color: #1b4d3e; line-height: 1.5; }

        .opt-label { display: flex; align-items: center; padding: 15px; margin: 10px 0; background: #fdfdfd; border: 2px solid #f0f0f0; border-radius: 8px; cursor: pointer; transition: 0.2s; }
        .opt-label:hover { border-color: var(--brand-green); background: #f4fcf7; }
        .opt-label input { margin-right: 15px; width: 20px; height: 20px; accent-color: var(--brand-green); }

        .result-header { text-align: center; background: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; border-top: 5px solid var(--brand-gold); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .score-big { font-size: 3em; color: var(--brand-green); font-weight: 800; }
        
        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 2000; justify-content: center; align-items: center; }
        .modal-box { background: white; width: 90%; max-width: 450px; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .btn-confirm { background: var(--brand-green); color: white; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; }
        .btn-cancel { background: #eee; color: #333; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; }
        
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
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
            <a href="culture_events.php">Cultural events</a>
            <a href="quiz.php" style="color: #116A4B; font-weight: 700;">Quiz</a>
                <a href="browse_ar.php">dictionary</a>

            <a href="Contact.php">Contact us</a>


            <div class="right-buttons" style="display: flex; align-items: center; gap: 10px;">
                
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="profile.php" class="profile-square" title="Profile" style="display: inline-flex;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                        </svg>
                    </a>
                <?php else: ?>
                    <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
                    <button class="signup-btn" onclick="window.location.href='signup.php'">Sign Up</button>
                <?php endif; ?>

                <button class="lang-btn" onclick="window.location.href='quiz_ar.php'">AR</button>
            </div>
        </nav>
    </header>

<div class="container">

    <div class="menu-box">
        <h1 style="color:var(--brand-green); margin-bottom:10px;">Test Your Knowledge 🧠</h1>
        <p style="color:#666; margin-bottom:30px;">Select a region and start the challenge!</p>
        
        <form method="POST">
            <div class="select-group">
                <label class="main-label">Number of Questions:</label>
                <select name="limit" class="form-select">
                    <option value="5" <?php if(isset($_POST['limit']) && $_POST['limit'] == 5) echo 'selected'; ?>>5 Questions</option>
                    <option value="10" <?php if(!isset($_POST['limit']) || $_POST['limit'] == 10) echo 'selected'; ?>>10 Questions</option>
                    <option value="15" <?php if(isset($_POST['limit']) && $_POST['limit'] == 15) echo 'selected'; ?>>15 Questions</option>
                    <option value="20" <?php if(isset($_POST['limit']) && $_POST['limit'] == 20) echo 'selected'; ?>>20 Questions</option>
                    <option value="25" <?php if(isset($_POST['limit']) && $_POST['limit'] == 25) echo 'selected'; ?>>25 Questions</option>
                    <option value="30" <?php if(isset($_POST['limit']) && $_POST['limit'] == 30) echo 'selected'; ?>>30 Questions</option>
                                        <option value="35" <?php if(isset($_POST['limit']) && $_POST['limit'] == 35) echo 'selected'; ?>>35 Questions</option>

                </select>
            </div>

            <div class="select-group">
                <label class="main-label">Select Region:</label>
                <div class="checkbox-grid">
                    
                    <label class="checkbox-label">
                        <input type="radio" name="region" value="mixed" checked> <span>🔀 Mix All Regions</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="region" value="centeral">
                        <span>🏙️ Central Region</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="region" value="west">
                        <span>🌊 Western Region</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="region" value="east">
                        <span>🌴 Eastern Region</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="region" value="north">
                        <span>⛺ Northern Region</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="region" value="south">
                        <span>⛰️ Southern Region</span>
                    </label>
                </div>
            </div>

            <button type="submit" name="start_quiz" class="start-btn">Start Quiz 🚀</button>
        </form>
    </div>

    <div id="quizScrollTarget"></div>

    <div class="quiz-container-area">

        <?php if ($state == 'quiz'): ?>
            <h2 style="text-align:center; margin-bottom:20px; color:#555;">Good Luck! 🍀</h2>
            <form method="POST" id="quizForm">
                <?php 
                $counter = 1;
                foreach($quiz_questions as $q): 
                ?>
                    <div class="quiz-item" data-id="<?php echo $q['id']; ?>" data-num="<?php echo $counter; ?>">
                        <div class="header-row">
                            <span style="font-weight:bold; color:#777;">Question <?php echo $counter++; ?></span>
                            <span class="type-badge" style="background-color: <?php echo $q['badge_color']; ?>;">
                                <?php echo $q['badge_label']; ?>
                            </span>
                        </div>

                        <div class="q-text"><?php echo $q['question']; ?></div>
                        
                        <div class="options-list">
                            <?php foreach($q['options'] as $opt): ?>
                                <label class="opt-label">
                                    <input type="radio" name="ans[<?php echo $q['id']; ?>]" value="<?php echo htmlspecialchars($opt); ?>">
                                    <span><?php echo htmlspecialchars($opt); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="button" onclick="checkAndSubmit()" class="start-btn">Submit Answers ✅</button>
                <input type="hidden" name="submit_answers" value="1">
            </form>

        <?php elseif ($state == 'result'): ?>
            <div class="result-header">
                <h2>Quiz Results</h2>
                <div class="score-big"><?php echo $score; ?> / <?php echo $total; ?></div>
                <p style="font-size:1.1em; color:#555; margin-top:10px;">
                    <?php 
                    if($score == $total) echo "Perfect Score! You know Saudi Arabia well! 🌟";
                    elseif($score >= $total/2) echo "Great Job! Keep exploring 💪";
                    else echo "Good Attempt! There is so much more to discover 😉";
                    ?>
                </p>
                <button onclick="window.scrollTo({top:0, behavior:'smooth'})" class="start-btn" style="display:inline-block; width:auto; padding:10px 40px; margin-top:15px;">Try Another Settings ⬆️</button>
            </div>

            <h3 style="text-align:center; color:#116A4B;">Review Answers</h3>
            <?php foreach($results_detail as $qid => $det): ?>
                <div class="quiz-item" style="padding:20px; border-left: 6px solid <?php echo $det['is_correct'] ? '#27ae60' : '#c0392b'; ?>;">
                    <div style="font-size:1em; color:#333; font-weight:bold; margin-bottom:10px;">
                        <?php echo $det['question']; ?>
                    </div>
                    <?php if($det['is_correct']): ?>
                        <span style="color:#27ae60; font-weight:bold;">✅ Correct Answer</span>
                    <?php else: ?>
                        <span style="color:#c0392b; font-weight:bold;">❌ Incorrect</span>
                        <div style="background:#fff5f5; padding:10px; border-radius:8px; margin-top:10px; font-size:0.95em; color:#c0392b;">
                            Your Answer: <?php echo empty($det['user_full']) ? 'Skipped' : htmlspecialchars($det['user_full']); ?><br>
                            Correct Answer: <b style="color:#27ae60;"><?php echo htmlspecialchars($det['correct_text']); ?></b>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    
    <div class="modal-overlay" id="confirmModal">
        <div class="modal-box">
            <h3 style="color:var(--brand-green); margin-bottom:10px;">Ready to Submit?</h3>
            <p id="modalMessage">Are you sure you want to finish the quiz?</p>
            <div id="unansweredBox" style="display:none; margin:15px 0; background:#fff3cd; color:#856404; padding:10px; border-radius:8px; text-align:left;">
                ⚠️ You skipped question(s): <span id="unansweredNumbers" style="font-weight:bold;"></span>
            </div>
            <div style="margin-top:20px; display:flex; gap:10px; justify-content:center;">
                <button class="btn-cancel" onclick="closeModal()">Go Back</button>
                <button class="btn-confirm" onclick="submitForm()">Yes, Submit</button>
            </div>
        </div>
    </div>

    <?php if($should_scroll): ?>
    <script>
        window.addEventListener('load', function() {
            const target = document.getElementById('quizScrollTarget');
            if(target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    </script>
    <?php endif; ?>

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
    <script>
        function toggleTopSearch() {
            const searchBar = document.getElementById("topSearchBar");
            searchBar.style.display = (searchBar.style.display === "block") ? "none" : "block";
        }
        function checkAndSubmit() {
            let unanswered = [];
            const items = document.querySelectorAll('.quiz-item');
            items.forEach((item) => {
                const qNum = item.getAttribute('data-num');
                const radios = item.querySelectorAll('input[type="radio"]');
                let isAnswered = false;
                if (radios.length > 0) {
                    radios.forEach(r => { if(r.checked) isAnswered = true; });
                }
                if (!isAnswered) unanswered.push(qNum);
            });
            const msgBox = document.getElementById('unansweredBox');
            const numsBox = document.getElementById('unansweredNumbers');
            if (unanswered.length > 0) {
                msgBox.style.display = 'block';
                numsBox.textContent = unanswered.join(', ');
            } else {
                msgBox.style.display = 'none';
            }
            document.getElementById('confirmModal').style.display = 'flex';
        }
        function closeModal() { document.getElementById('confirmModal').style.display = 'none'; }
        function submitForm() { document.getElementById('quizForm').submit(); }
    </script>
    
</div>
</body>
</html>