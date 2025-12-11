<?php
session_start();
include 'db_connect.php'; 

// =========================================================
// 1. دوال مساعدة
// =========================================================

function parseQuizData($text) {
    $parts = explode('الإجابة الصحيحة:', $text);
    $main_text = $parts[0];
    $correct_char = isset($parts[1]) ? trim($parts[1]) : '';

    $main_text = str_replace(['السؤال:', 'الخيارات:', 'المهمة:'], ["\nالسؤال:", "\nالخيارات:", "\nالمهمة:"], $main_text);
    $lines = explode("\n", $main_text);
    
    $data = ['q' => '', 'opts' => [], 'ans' => $correct_char];
    $mode = '';

    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || mb_strpos($line, 'المهمة:') !== false) continue;

        if (mb_strpos($line, 'السؤال:') !== false) {
            $mode = 'q';
            $data['q'] .= trim(str_replace('السؤال:', '', $line));
            continue;
        }
        if (mb_strpos($line, 'الخيارات') !== false) { $mode = 'opt'; continue; }

        if ($mode == 'q') $data['q'] .= ' ' . $line;
        elseif ($mode == 'opt') {
            $split = preg_split('/(?=[أ-يA-D]\))/u', $line, -1, PREG_SPLIT_NO_EMPTY);
            foreach($split as $o) {
                if(!empty(trim($o))) $data['opts'][] = trim($o);
            }
        }
    }
    return $data;
}

// =========================================================
// 2. منطق التحكم
// =========================================================

$state = 'menu'; 
$questions_data = [];
$score = 0;
$total = 0;

// -- حالة: عرض النتيجة --
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_answers'])) {
    $state = 'result';
    $correct_map = isset($_SESSION['quiz_answers']) ? $_SESSION['quiz_answers'] : [];
    $user_answers = isset($_POST['ans']) ? $_POST['ans'] : [];
    
    $total = count($correct_map);
    $results_detail = []; 

    foreach ($correct_map as $q_id => $data) {
        $correct_char = $data['ans']; 
        $q_text = $data['q_text'];    
        $term = $data['term'];        
        
        $user_ans_full = isset($user_answers[$q_id]) ? $user_answers[$q_id] : '';
        
        $user_char = '';
        if (preg_match('/^([أ-يA-D])\)/u', $user_ans_full, $m)) {
            $user_char = trim($m[1]);
        }

        $is_correct = ($user_char == $correct_char && !empty($correct_char));
        if ($is_correct) $score++;

        $results_detail[$q_id] = [
            'term' => $term,
            'question' => $q_text,
            'user_full' => $user_ans_full,
            'is_correct' => $is_correct,
            'correct_char' => $correct_char
        ];
    }
    
    if (isset($_SESSION['user_id'])) {
        $type_label = $_SESSION['quiz_type_label'] ?? 'كوكتيل';
        $stmt = $conn->prepare("INSERT INTO quiz_results (user_id, score, total_questions, quiz_type) VALUES (?, ?, ?, ?)");
        $uid = $_SESSION['user_id'];
        $stmt->bind_param("iiis", $uid, $score, $total, $type_label);
        $stmt->execute();
    }

// -- حالة: بدء الاختبار --
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start_quiz'])) {
    $state = 'quiz';
    $limit = (int)$_POST['limit'];
    $type = $_POST['type'];
    
    $tables = [];
    if ($type == 'words') $tables = ["words___final_dataset"];
    elseif ($type == 'phrases') $tables = ["phrases___phrases_location_recognition"];
    elseif ($type == 'proverbs') $tables = ["proverbs___proverbs_location_recognition"];
    else $tables = ["words___final_dataset", "phrases___phrases_location_recognition", "proverbs___proverbs_location_recognition"];

    $_SESSION['quiz_type_label'] = ($type == 'mixed') ? 'كوكتيل' : (($type=='words')?'كلمات':(($type=='phrases')?'عبارات':'أمثال'));
    
    $quiz_questions = [];
    $answers_map = []; 

    for ($i = 0; $i < $limit; $i++) {
        $curr_table = $tables[array_rand($tables)];
        
        $source_type = 'كلمة';
        $badge_color = '#3498db'; 
        
        if (strpos($curr_table, 'phrases') !== false) {
            $source_type = 'عبارة';
            $badge_color = '#f1c40f'; 
        } elseif (strpos($curr_table, 'proverbs') !== false) {
            $source_type = 'مثل';
            $badge_color = '#27ae60'; 
        }

        $res = $conn->query("SELECT * FROM `$curr_table` WHERE `COL 1` != 'Term' ORDER BY RAND() LIMIT 1");
        if ($res && $row = $res->fetch_assoc()) {
            $valid_cols = [];
            foreach(range(4,9) as $c) if(!empty($row["COL $c"])) $valid_cols[] = "COL $c";
            
            if(!empty($valid_cols)) {
                $rand_col = $valid_cols[array_rand($valid_cols)];
                $parsed = parseQuizData($row[$rand_col]);
                
                if (!empty($parsed['q'])) {
                    $q_id = uniqid('q');
                    $quiz_questions[] = [
                        'id' => $q_id,
                        'term' => $row['COL 1'],
                        'type_label' => $source_type,
                        'badge_color' => $badge_color,
                        'question' => $parsed['q'],
                        'options' => $parsed['opts']
                    ];
                    $answers_map[$q_id] = [
                        'ans' => $parsed['ans'],
                        'term' => $row['COL 1'],
                        'q_text' => $parsed['q']
                    ];
                } else {
                    $i--;
                }
            } else {
                $i--; 
            }
        }
    }
    $_SESSION['quiz_answers'] = $answers_map;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحدي اللهجات السعودية</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    <style>
        :root { --brand-green: #1b4d3e; --brand-gold: #c5a059; --bg-color: #f8f9fa; }
        body { font-family: 'Tajawal', sans-serif; background: var(--bg-color); margin: 0; padding-top: 100px; color: #333; }
        header { background-color: var(--brand-green); position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; padding: 10px 0; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        nav a { color: #fff !important; font-weight: bold; margin: 0 10px; text-decoration: none; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; }

        /* Styles common */
        .start-btn { width: 100%; padding: 15px; background: var(--brand-green); color: white; border: none; border-radius: 50px; font-size: 1.2em; font-weight: bold; cursor: pointer; margin-top: 20px; transition:0.3s; }
        .start-btn:hover { background: #143a2f; }
        
        /* Menu */
        .menu-box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center; }
        .form-select { width: 100%; padding: 15px; border-radius: 10px; border: 1px solid #ddd; font-family: 'Tajawal'; font-size: 1.1em; }
        
        /* Quiz */
        .quiz-item { background: white; border-radius: 15px; padding: 25px; margin-bottom: 30px; border: 1px solid #eee; box-shadow: 0 3px 10px rgba(0,0,0,0.02); }
        .header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .type-badge { padding: 5px 12px; border-radius: 20px; color: white; font-size: 0.9em; font-weight: bold; }
        .q-term { font-size: 1.4em; color: var(--brand-green); font-weight: 800; }
        .opt-label { display: block; padding: 12px 15px; margin: 8px 0; background: #fdfdfd; border: 2px solid #f0f0f0; border-radius: 8px; cursor: pointer; transition: 0.2s; }
        .opt-label:hover { border-color: var(--brand-green); background: #f4fcf7; }
        .opt-label input { margin-left: 10px; accent-color: var(--brand-green); }

        /* Result */
        .result-header { text-align: center; background: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; }
        .score-big { font-size: 3em; color: var(--brand-green); font-weight: 800; }
        .correct-note { color: #27ae60; font-weight: bold; display: block; margin-top: 5px; }
        .wrong-note { color: #c0392b; font-weight: bold; display: block; margin-top: 5px; }
        .answer-reveal { background: #fff5f5; padding: 10px; border-radius: 8px; margin-top: 10px; font-size: 0.95em; color: #c0392b; }

        /* ==================== Modal Styles (النافذة المنبثقة) ==================== */
        .modal-overlay {
            display: none; /* مخفي افتراضياً */
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); z-index: 2000;
            justify-content: center; align-items: center;
        }
        .modal-box {
            background: white; width: 90%; max-width: 450px;
            padding: 30px; border-radius: 15px; text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            animation: fadeIn 0.3s;
        }
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
        .modal-title { font-size: 1.5em; font-weight: bold; color: var(--brand-green); margin-bottom: 15px; }
        .unanswered-list { background: #fff3e0; color: #e65100; padding: 10px; border-radius: 8px; margin: 15px 0; font-size: 0.95em; text-align: right; }
        .modal-actions { display: flex; gap: 10px; justify-content: center; margin-top: 20px; }
        .btn-confirm { background: var(--brand-green); color: white; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; font-family: 'Tajawal'; }
        .btn-cancel { background: #eee; color: #333; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; font-family: 'Tajawal'; }
        .btn-cancel:hover { background: #ddd; }
    </style>
</head>
<body>

<header id="mainHeader">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; padding: 0 20px;">
        <div class="logo"><img src="images/Logo.png" alt="SaudiCulture" style="height: 50px;"></div>
        <nav>
            <a href="arabic.html">الرئيسية</a>
            <a href="browse_ar.php">المعجم</a>
            <a href="quiz_ar.php" style="border-bottom: 2px solid #c5a059;">الاختبار</a>
            <a href="Contact_ar.html">اتصل بنا</a>
        </nav>
        <div class="nav-buttons">
                <button onclick="window.location.href='login_ar.html'" style="padding: 8px 15px; border-radius: 5px; border: 1px solid white; background: transparent; color: white; cursor: pointer;">تسجيل الدخول</button>
        </div>
    </div>
</header>

<div class="container">

    <?php if ($state == 'menu'): ?>
        <div class="menu-box">
            <h1 style="color:var(--brand-green); margin-bottom:10px;">تحدي اللهجات السعودية 🇸🇦</h1>
            <p style="color:#666; margin-bottom:30px;">اختر نوع التحدي والعدد وابدأ رحلتك!</p>
            
            <form method="POST">
                <div class="select-group">
                    <label>عدد الأسئلة:</label>
                    <select name="limit" class="form-select">
                        <option value="5">5 أسئلة (تسخين)</option>
                        <option value="10" selected>10 أسئلة (تحدي)</option>
                        <option value="15">15 سؤال (خبير)</option>
                        <option value="20">20 سؤال (مؤرخ)</option>
                    </select>
                </div>
                <div class="select-group">
                    <label>نوع التحدي:</label>
                    <select name="type" class="form-select">
                        <option value="mixed">🔀 كوكتيل (مشكل)</option>
                        <option value="words">📝 كلمات ومصطلحات</option>
                        <option value="phrases">🗣️ جمل وعبارات</option>
                        <option value="proverbs">📜 أمثال شعبية</option>
                    </select>
                </div>
                <button type="submit" name="start_quiz" class="start-btn">بدء الاختبار 🚀</button>
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
                        <span style="font-weight:bold; color:#777;">سؤال <?php echo $counter++; ?></span>
                        <span class="type-badge" style="background-color: <?php echo $q['badge_color']; ?>;">
                            <?php echo $q['type_label']; ?>
                        </span>
                    </div>

                    <div style="text-align:center; margin-bottom:15px;">
                        <span class="q-term"><?php echo htmlspecialchars($q['term']); ?></span>
                    </div>

                    <div class="q-text"><?php echo $q['question']; ?></div>
                    
                    <div class="options-list">
                        <?php if(!empty($q['options'])): ?>
                            <?php foreach($q['options'] as $opt): ?>
                                <label class="opt-label">
                                    <input type="radio" name="ans[<?php echo $q['id']; ?>]" value="<?php echo htmlspecialchars($opt); ?>">
                                    <?php echo htmlspecialchars($opt); ?>
                                </label>
                            <?php endforeach; ?>
                        <?php else: ?>
                             <input type="text" name="ans[<?php echo $q['id']; ?>]" class="form-select" placeholder="اكتب الإجابة هنا...">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="button" onclick="checkAndSubmit()" class="start-btn">إرسال الإجابات ✅</button>
            <input type="hidden" name="submit_answers" value="1">
        </form>

        <div class="modal-overlay" id="confirmModal">
            <div class="modal-box">
                <div class="modal-title">تأكيد التسليم</div>
                <p id="modalMessage">هل أنت متأكد أنك تريد إنهاء الاختبار وإرسال الإجابات؟</p>
                
                <div id="unansweredBox" style="display:none;">
                    <div class="unanswered-list">
                        ⚠️ <b>تنبيه:</b> لم تقم بحل الأسئلة التالية:<br>
                        <span id="unansweredNumbers"></span>
                    </div>
                </div>

                <div class="modal-actions">
                    <button class="btn-cancel" onclick="closeModal()">تراجع</button>
                    <button class="btn-confirm" onclick="submitForm()">نعم، إرسال</button>
                </div>
            </div>
        </div>

        <script>
            function checkAndSubmit() {
                let unanswered = [];
                // نمر على كل سؤال في الصفحة
                const items = document.querySelectorAll('.quiz-item');
                
                items.forEach((item) => {
                    const qNum = item.getAttribute('data-num');
                    const radios = item.querySelectorAll('input[type="radio"]');
                    const textField = item.querySelector('input[type="text"]');
                    
                    let isAnswered = false;
                    
                    // التحقق من الراديو
                    if (radios.length > 0) {
                        radios.forEach(r => { if(r.checked) isAnswered = true; });
                    } 
                    // التحقق من النص
                    else if (textField) {
                        if(textField.value.trim() !== "") isAnswered = true;
                    }

                    if (!isAnswered) {
                        unanswered.push(qNum);
                    }
                });

                // تحديث محتوى النافذة
                const msgBox = document.getElementById('unansweredBox');
                const numsBox = document.getElementById('unansweredNumbers');
                
                if (unanswered.length > 0) {
                    msgBox.style.display = 'block';
                    numsBox.textContent = unanswered.join('، ');
                } else {
                    msgBox.style.display = 'none';
                }

                // عرض النافذة
                document.getElementById('confirmModal').style.display = 'flex';
            }

            function closeModal() {
                document.getElementById('confirmModal').style.display = 'none';
            }

            function submitForm() {
                document.getElementById('quizForm').submit();
            }
        </script>


    <?php elseif ($state == 'result'): ?>
        <div class="result-header">
            <h2>نتيجتك النهائية</h2>
            <div class="score-big"><?php echo $score; ?> / <?php echo $total; ?></div>
            <p>
                <?php 
                if($score == $total) echo "ما شاء الله! علامة كاملة 🌟";
                elseif($score > $total/2) echo "كفو! أداء ممتاز 💪";
                else echo "يبيلك كبسة وتراجع المعلومات 😉";
                ?>
            </p>
            <a href="quiz_ar.php" class="start-btn" style="display:inline-block; width:auto; padding:10px 40px; text-decoration:none;">تحدي جديد 🔄</a>
        </div>

        <h3 style="text-align:center; color:#555;">تفاصيل الإجابات</h3>
        <?php foreach($results_detail as $qid => $det): ?>
            <div class="quiz-item" style="padding:15px; border-right: 6px solid <?php echo $det['is_correct'] ? '#27ae60' : '#c0392b'; ?>;">
                <div style="font-size:1.1em; font-weight:bold; margin-bottom:5px; color:#333;">
                    المصطلح: <span style="color:var(--brand-green);"><?php echo htmlspecialchars($det['term']); ?></span>
                </div>
                <div style="font-size:0.95em; color:#555; margin-bottom:10px;">
                    <?php echo $det['question']; ?>
                </div>

                <?php if($det['is_correct']): ?>
                    <span class="correct-note">✅ إجابة صحيحة</span>
                <?php else: ?>
                    <span class="wrong-note">❌ إجابة خاطئة (أو لم يتم الحل)</span>
                    <div class="answer-reveal">
                        إجابتك: <?php echo empty($det['user_full']) ? 'لم تجب' : htmlspecialchars($det['user_full']); ?><br>
                        الإجابة الصحيحة: <b><?php echo $det['correct_char']; ?></b>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

</div>
  <!-- تذييل الصفحة: حقوق النشر وبيانات التواصل -->
    <footer class="footer">
        <div class="footer-container">

            <!-- Left: logo + brief -->
            <div class="footer-about">
                <img src="images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p>مشروع <strong>SaudiCulture</strong> – منصة تعرض جمال الموروث الثقافي والتاريخ السعودي.</p>
            </div>

            <!-- Middle: quick links -->
            <div class="footer-links">
                <h4>روابط سريعة</h4>
                <a href="arabic.html">الرئيسية</a>
                <a href="history_ar.html">التاريخ</a>
                <a href="traditions_ar.html">التقاليد</a>
                <a href="food_ar.html">الطعام</a>
                <a href="Contact_ar.html">اتصل بنا</a>
            </div>

            <!-- Right: contact info -->
            <div class="footer-contact">
                <h4>تواصل معنا</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 مكة، المملكة العربية السعودية</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. All rights reserved.</p>
        </div>
    </footer>
    
</body>
</html>