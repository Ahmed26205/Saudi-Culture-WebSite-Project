<?php
session_start();
include 'db_connect_en.php'; 

// =========================================================
// 1. Helper Functions
// =========================================================

function parseEnglishRow($row) {
    $question = trim($row['COL 1']);
    $raw_options = trim($row['COL 2']);
    $correct_answer_text = trim($row['COL 3']);
    
    $data = [
        'q' => $question,
        'type' => 'text', // Default to text (open-ended)
        'opts' => [],
        'ans' => $correct_answer_text
    ];

    // Check if it's MCQ (has options A. B. ...)
    if (!empty($raw_options) && $raw_options !== '-' && strpos($raw_options, 'A.') !== false) {
        $data['type'] = 'mcq';
        
        // Split options carefully
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

// -- State: Result --
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_answers'])) {
    $state = 'result';
    $correct_map = isset($_SESSION['quiz_answers_en']) ? $_SESSION['quiz_answers_en'] : [];
    $user_answers = isset($_POST['ans']) ? $_POST['ans'] : [];
    
    $total = count($correct_map);
    $results_detail = []; 

    foreach ($correct_map as $q_id => $data) {
        $correct_text = strtolower(trim($data['ans'])); 
        $q_text = $data['q_text'];    
        
        $user_ans = isset($user_answers[$q_id]) ? trim($user_answers[$q_id]) : '';
        $user_ans_lower = strtolower($user_ans);

        // Check Answer
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
    
    // Save Result
    if (isset($_SESSION['user_id'])) {
        $type_label = $_SESSION['quiz_region_label'] ?? 'General';
        $stmt = $conn->prepare("INSERT INTO quiz_db.quiz_results (user_id, score, total_questions, quiz_type) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $uid = $_SESSION['user_id'];
            $stmt->bind_param("iiis", $uid, $score, $total, $type_label);
            $stmt->execute();
        }
    }

// -- State: Start Quiz --
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start_quiz'])) {
    $state = 'quiz';
    $limit = (int)$_POST['limit'];
    $region = $_POST['region'];
    
    $tables = [];
    if ($region == 'mixed') {
        $tables = ["centeral", "east", "north", "south", "west", "general"];
    } else {
        $tables = [$region];
    }

    $_SESSION['quiz_region_label'] = ucfirst($region);
    
    $quiz_questions = [];
    $answers_map = []; 

    for ($i = 0; $i < $limit; $i++) {
        $curr_table = $tables[array_rand($tables)];
        
        $badge_label = ucfirst($curr_table);
        $badge_color = '#1b4d3e'; 
        if($curr_table == 'west') $badge_color = '#c0392b';
        if($curr_table == 'east') $badge_color = '#2980b9';
        if($curr_table == 'centeral') $badge_color = '#f39c12';

        $res = $conn->query("SELECT * FROM `$curr_table` WHERE `COL 1` != '' AND `COL 1` NOT LIKE 'COL%' AND `COL 1` != 'Question' ORDER BY RAND() LIMIT 1");
        
        if ($res && $row = $res->fetch_assoc()) {
            
            $parsed = parseEnglishRow($row);
            
            // 🔴 التعديل هنا: أضفنا شرط (&& $parsed['type'] == 'mcq')
            // هذا يعني: إذا كان السؤال له خيارات، اقبله. إذا مقالي، ارفضه ودور غيره.
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
                $i--; // حاول مرة أخرى للعثور على سؤال خيارات
            }
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    
    <style>
        :root { --brand-green: #1b4d3e; --brand-gold: #c5a059; --bg-color: #f8f9fa; }
        body { font-family: 'Inter', sans-serif; background: var(--bg-color); margin: 0; padding-top: 110px; color: #333; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; }

        .start-btn { width: 100%; padding: 15px; background: var(--brand-green); color: white; border: none; border-radius: 50px; font-size: 1.2em; font-weight: bold; cursor: pointer; margin-top: 20px; transition:0.3s; }
        .start-btn:hover { background: #143a2f; }
        
        .menu-box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center; }
        .select-group { margin-bottom: 20px; text-align: left; }
        .select-group label { display: block; margin-bottom: 8px; font-weight: bold; color: var(--brand-green); }
        .form-select { width: 100%; padding: 15px; border-radius: 10px; border: 1px solid #ddd; font-family: 'Inter'; font-size: 1.1em; }
        
        .quiz-item { background: white; border-radius: 15px; padding: 25px; margin-bottom: 30px; border: 1px solid #eee; box-shadow: 0 3px 10px rgba(0,0,0,0.02); text-align: left; }
        .header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .type-badge { padding: 5px 12px; border-radius: 20px; color: white; font-size: 0.85em; font-weight: bold; text-transform: uppercase; }
        
        .q-text { font-size: 1.3em; font-weight: 700; margin-bottom: 20px; color: #1b4d3e; line-height: 1.5; }

        .opt-label { display: flex; align-items: center; padding: 15px; margin: 10px 0; background: #fdfdfd; border: 2px solid #f0f0f0; border-radius: 8px; cursor: pointer; transition: 0.2s; }
        .opt-label:hover { border-color: var(--brand-green); background: #f4fcf7; }
        .opt-label input { margin-right: 15px; width: 20px; height: 20px; accent-color: var(--brand-green); }

        .result-header { text-align: center; background: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; }
        .score-big { font-size: 3em; color: var(--brand-green); font-weight: 800; }
        .correct-note { color: #27ae60; font-weight: bold; display: block; margin-top: 5px; }
        .wrong-note { color: #c0392b; font-weight: bold; display: block; margin-top: 5px; }
        .answer-reveal { background: #fff5f5; padding: 10px; border-radius: 8px; margin-top: 10px; font-size: 0.95em; color: #c0392b; text-align: left; }

        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 2000; justify-content: center; align-items: center; }
        .modal-box { background: white; width: 90%; max-width: 450px; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2); animation: fadeIn 0.3s; }
        .modal-title { font-size: 1.5em; font-weight: bold; color: var(--brand-green); margin-bottom: 15px; }
        .unanswered-list { background: #fff3e0; color: #e65100; padding: 10px; border-radius: 8px; margin: 15px 0; font-size: 0.95em; text-align: left; }
        .modal-actions { display: flex; gap: 10px; justify-content: center; margin-top: 20px; }
        .btn-confirm { background: var(--brand-green); color: white; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; }
        .btn-cancel { background: #eee; color: #333; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>

    <header id="mainHeader" class="solid-header">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; padding: 0 20px;">
            <div class="logo">
                <img src="images/Logo.png" alt="Mawrooth" style="height: 50px;">
            </div>
            <nav>
                <a href="index.html">Home</a>
                <a href="history.html">History</a>
                <a href="traditions.html">Traditions</a>
                <a href="food.html">Food</a>
                <a href="quiz.php" style="border-bottom: 2px solid #c5a059;">Quiz</a>
                <a href="contact.html">Contact</a>
            </nav>
            <div class="nav-buttons">
                 <button onclick="window.location.href='login.html'" class="login-btn" style="padding: 8px 15px; margin-right:5px; border-radius: 5px; border: 1px solid #1b4d3e; background: transparent; color: #1b4d3e; font-weight:bold; cursor: pointer;">Login</button>
                 <button onclick="window.location.href='signup.html'" class="signup-btn" style="padding: 8px 15px; border-radius: 5px; border: none; background: #1b4d3e; color: white; font-weight:bold; cursor: pointer; margin-right: 10px;">Sign Up</button>
                 <button onclick="window.location.href='quiz_ar.php'" style="padding: 8px 15px; border-radius: 5px; border: none; background: #1b4d3e; color: white; font-weight:bold; cursor: pointer;">AR</button>
            </div>
        </div>
    </header>

<div class="container">

    <?php if ($state == 'menu'): ?>
        <div class="menu-box">
            <h1 style="color:var(--brand-green); margin-bottom:10px;">Test Your Knowledge 🧠</h1>
            <p style="color:#666; margin-bottom:30px;">Discover Saudi culture through its diverse regions</p>
            
            <form method="POST">
                <div class="select-group">
                    <label>Number of Questions:</label>
                    <select name="limit" class="form-select">
                        <option value="5">5 Questions</option>
                        <option value="10" selected>10 Questions</option>
                        <option value="15">15 Questions</option>
                        <option value="20">20 Questions</option>
                    </select>
                </div>

                <div class="select-group">
                    <label>Select Region / Topic:</label>
                    <select name="region" class="form-select">
                        <option value="mixed">🔀 Mixed (All Regions)</option>
                        <option value="general">🌍 General Info</option>
                        <option value="centeral">🏙️ Central Region</option>
                        <option value="west">🕋 Western Region</option>
                        <option value="east">⚓ Eastern Region</option>
                        <option value="north">🏜️ Northern Region</option>
                        <option value="south">⛰️ Southern Region</option>
                    </select>
                </div>

                <button type="submit" name="start_quiz" class="start-btn">Start Quiz 🚀</button>
            </form>
        </div>

    <?php elseif ($state == 'quiz'): ?>
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

        <div class="modal-overlay" id="confirmModal">
            <div class="modal-box">
                <div class="modal-title">Ready to Submit?</div>
                <p id="modalMessage">Are you sure you want to finish the quiz?</p>
                
                <div id="unansweredBox" style="display:none;">
                    <div class="unanswered-list">
                        ⚠️ <b>Warning:</b> You skipped question(s):<br>
                        <span id="unansweredNumbers"></span>
                    </div>
                </div>

                <div class="modal-actions">
                    <button class="btn-cancel" onclick="closeModal()">Go Back</button>
                    <button class="btn-confirm" onclick="submitForm()">Yes, Submit</button>
                </div>
            </div>
        </div>

        <script>
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

    <?php elseif ($state == 'result'): ?>
        <div class="result-header">
            <h2>Quiz Results</h2>
            <div class="score-big"><?php echo $score; ?> / <?php echo $total; ?></div>
            <p>
                <?php 
                if($score == $total) echo "Perfect Score! You know Saudi Arabia well! 🌟";
                elseif($score > $total/2) echo "Great Job! Keep exploring 💪";
                else echo "Good Attempt! There is so much more to discover 😉";
                ?>
            </p>
            <a href="quiz.php" class="start-btn" style="display:inline-block; width:auto; padding:10px 40px; text-decoration:none;">Try Again 🔄</a>
        </div>

        <h3 style="text-align:center; color:#555;">Review Answers</h3>
        <?php foreach($results_detail as $qid => $det): ?>
            <div class="quiz-item" style="padding:15px; border-left: 6px solid <?php echo $det['is_correct'] ? '#27ae60' : '#c0392b'; ?>;">
                <div style="font-size:0.95em; color:#555; margin-bottom:10px;">
                    <?php echo $det['question']; ?>
                </div>
                <?php if($det['is_correct']): ?>
                    <span class="correct-note">✅ Correct Answer</span>
                <?php else: ?>
                    <span class="wrong-note">❌ Incorrect</span>
                    <div class="answer-reveal">
                        Your Answer: <?php echo empty($det['user_full']) ? 'Skipped' : htmlspecialchars($det['user_full']); ?><br>
                        Correct Answer: <b><?php echo htmlspecialchars($det['correct_text']); ?></b>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

      </script>

    <script type="module">
        import { auth } from "./JS/firebase-config.js";
        import { onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";

        onAuthStateChanged(auth, (user) => {
            const loginBtn = document.querySelector(".login-btn");
            const signupBtn = document.querySelector(".signup-btn");
            const profileIcon = document.querySelector(".profile-square");

            if (user) {
                // Hide login & signup
                loginBtn.style.display = "none";
                signupBtn.style.display = "none";

                // Show profile icon
                profileIcon.style.display = "inline-flex";
            } else {
                // Show login & signup
                loginBtn.style.display = "inline-block";
                signupBtn.style.display = "inline-block";

                // Hide profile icon
                profileIcon.style.display = "none";
            }
        });
    </script>

</div>

</body>
</html>