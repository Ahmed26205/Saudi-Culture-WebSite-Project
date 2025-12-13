<?php
session_start();
include 'db_conn.php'; 

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_ar.php"); 
    exit();
}

// =========================================================
// 1. دوال مساعدة (تحليل النصوص العربية)
// =========================================================

function parseQuizData($text) {
    // فصل النص الأساسي عن حرف الإجابة الصحيحة
    $parts = explode('الإجابة الصحيحة:', $text);
    $main_text = $parts[0];
    $correct_char = isset($parts[1]) ? trim($parts[1]) : '';

    // إصلاح الفواصل والأسطر
    $main_text = str_replace(['السؤال:', 'الخيارات:', 'المهمة:'], ["\nالسؤال:", "\nالخيارات:", "\nالمهمة:"], $main_text);
    $lines = explode("\n", $main_text);
    
    $data = ['q' => '', 'opts' => [], 'ans_char' => $correct_char, 'ans_text' => ''];
    $mode = '';
    $option_char_map = []; 

    $arabic_chars = ['أ', 'ب', 'ج', 'د'];
    $char_index = 0;

    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || mb_strpos($line, 'المهمة:') !== false) continue;

        if (mb_strpos($line, 'السؤال:') !== false) {
            $mode = 'q';
            $data['q'] .= trim(str_replace('السؤال:', '', $line));
            continue;
        }
        
        if (mb_strpos($line, 'الخيارات') !== false) { $mode = 'opt'; continue; }

        if ($mode == 'q') {
            $data['q'] .= ' ' . $line;
        } elseif ($mode == 'opt') {
            
            // تقسيم النص بناءً على (حرف)
            $split = preg_split('/(?=\([أ-يA-Da-d]\))/', $line, -1, PREG_SPLIT_NO_EMPTY);
            
            foreach($split as $o) {
                
                // 1. **التعديل لحل مشكلة الترقيم المكرر (أ) أ) تعبير يصف...**
                // نحذف أي ترقيم يكون على شكل (حرف) أو حرف) أو حرف. أو حرف
                $clean_opt = preg_replace('/^\s*[\(]?[أ-يA-Da-d][\)\.]?\s*/u', '', $o); 
                $full_option_text = trim($clean_opt);
                
                if(!empty($full_option_text)) {
                    if (count($data['opts']) < 4) {
                        // هنا نضيف الترقيم الجديد (أ)، (ب)، إلخ. 
                        $data['opts'][] = $full_option_text;
                        
                        if (isset($arabic_chars[$char_index])) {
                            $option_char_map[$arabic_chars[$char_index]] = $full_option_text;
                            
                            if ($arabic_chars[$char_index] == $data['ans_char']) {
                                $data['ans_text'] = $full_option_text;
                            }
                        }
                        $char_index++;
                    }
                }
            }
        }
    }
    if (empty($data['ans_text']) && isset($option_char_map[$data['ans_char']])) {
        $data['ans_text'] = $option_char_map[$data['ans_char']];
    }
    
    return $data;
}

// =========================================================
// 2. منطق التحكم (Controller Logic)
// =========================================================

$user_id = $_SESSION['user_id'];
$state = 'menu'; 
$score = 0;
$total = 0;
$should_scroll = false; 

// الجداول المصدر الفعلية في قاعدة البيانات (باستخدام 3 شرطات سفلية)
$source_tables = [
    'words' => 'words___final_dataset',
    'phrases' => 'phrases___phrases_location_recognition',
    'proverbs' => 'proverbs___proverbs_location_recognition',
];

// -- حالة: عرض النتيجة --
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_answers'])) {
    $state = 'result';
    $should_scroll = true;

    $correct_map = isset($_SESSION['quiz_answers_ar']) ? $_SESSION['quiz_answers_ar'] : [];
    $user_answers = isset($_POST['ans']) ? $_POST['ans'] : [];
    
    $total = count($correct_map);
    $results_detail = []; 

    foreach ($correct_map as $q_id => $data) {
        $correct_char = $data['ans_char']; 
        $correct_text = $data['ans_text']; 
        $q_text = $data['q_text'];    
        $term = $data['term'];        
        
        $user_ans_full = isset($user_answers[$q_id]) ? trim($user_answers[$q_id]) : '';
        
        // ** تنظيف إجابة المستخدم من الترقيم قبل المقارنة **
        $user_clean_text = preg_replace('/^\s*[أ-يA-Da-d]\)\s*/u', '', $user_ans_full); 
        
        // مقارنة النص النظيف بالإجابة الصحيحة المحفوظة
        $is_correct = (trim($user_clean_text) == $correct_text);

        if ($is_correct) $score++;

        $results_detail[$q_id] = [
            'term' => $term,
            'question' => $q_text,
            'user_full' => $user_ans_full,
            'is_correct' => $is_correct,
            'correct_char' => $correct_char, 
            'correct_text' => $correct_text  
        ];
    }
    
    // حفظ النتيجة في قاعدة البيانات
    if (isset($_SESSION['user_id'])) {
        $type_label = $_SESSION['quiz_type_label'] ?? 'كوكتيل';
        
        $stmt = $conn->prepare("INSERT INTO quiz_results_ar (user_id, score, total_questions, quiz_type) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $uid = $_SESSION['user_id'];
            $stmt->bind_param("iiis", $uid, $score, $total, $type_label);
            $stmt->execute();
        }
    }
    unset($_SESSION['quiz_type_label']); 
    unset($_SESSION['quiz_answers_ar']); 

// -- حالة: بدء الاختبار --
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start_quiz'])) {
    $state = 'quiz';
    $should_scroll = true;

    $limit = (int)$_POST['limit'];
    $type = isset($_POST['type']) ? $_POST['type'] : 'mixed';
    
    $tables_keys = []; 
    if ($type == 'words') $tables_keys = ['words'];
    elseif ($type == 'phrases') $tables_keys = ['phrases'];
    elseif ($type == 'proverbs') $tables_keys = ['proverbs'];
    
    else $tables_keys = array_keys($source_tables); 

    $_SESSION['quiz_type_label'] = ($type == 'mixed') ? 'كوكتيل' : (($type=='words')?'كلمات':(($type=='phrases')?'عبارات':'أمثال'));
    
    $quiz_questions = [];
    $answers_map = []; 
    $total_questions_fetched = 0; 
    $arabic_chars = ['أ', 'ب', 'ج', 'د']; 

    // محاولة جلب الأسئلة
    while ($total_questions_fetched < $limit) {
        $attempts = 0;
        $found_valid_q = false;

        while(!$found_valid_q && $attempts < 15) { 
            $attempts++;
            
            $curr_table_key = $tables_keys[array_rand($tables_keys)];
            
            $curr_table_name = $source_tables[$curr_table_key]; 
            
            $source_type = 'كلمة';
            $badge_color = '#2980b9'; 

            if ($curr_table_key == 'phrases') {
                $source_type = 'عبارة';
                $badge_color = '#CCA450'; 
            } elseif ($curr_table_key == 'proverbs') {
                $source_type = 'مثل';
                $badge_color = '#27ae60'; 
            }

            // الاستعلام الحاسم (الذي يعمل على الخادم المحلي)
            $res = $conn->query("SELECT * FROM `quiz_db`.`{$curr_table_name}` WHERE `COL 1` != 'Term' ORDER BY RAND() LIMIT 1"); 
            if ($res && $row = $res->fetch_assoc()) {
                
                $valid_cols = [];
                foreach(range(4,9) as $c) {
                    if(!empty($row["COL $c"]) && $row["COL $c"] != 'NULL') {
                        $valid_cols[] = "COL $c";
                    }
                }
                
                if(!empty($valid_cols)) {
                    $rand_col = $valid_cols[array_rand($valid_cols)];
                    $parsed = parseQuizData($row[$rand_col]);
                    
                    if (!empty($parsed['q']) && count($parsed['opts']) >= 4 && !empty($parsed['ans_char'])) { 
                        
                        $options_with_chars = [];
                        for($j=0; $j<4; $j++) {
                            if (isset($parsed['opts'][$j])) {
                                $options_with_chars[] = $arabic_chars[$j] . ') ' . $parsed['opts'][$j];
                            }
                        }
                        
                        if(count($options_with_chars) == 4) {
                            $q_id = uniqid('q');
                            $quiz_questions[] = [
                                'id' => $q_id,
                                'term' => $row['COL 1'],
                                'type_label' => $source_type,
                                'badge_color' => $badge_color,
                                'question' => $parsed['q'],
                                'options' => $options_with_chars 
                            ];
                            $answers_map[$q_id] = [
                                'ans_char' => $parsed['ans_char'],
                                'ans_text' => $parsed['ans_text'], 
                                'term' => $row['COL 1'],
                                'q_text' => $parsed['q']
                            ];
                            $found_valid_q = true;
                            $total_questions_fetched++; 
                        }
                    }
                }
            }
        }
        if(!$found_valid_q && $attempts >= 15) {
             break; 
        }
    }
    $_SESSION['quiz_answers_ar'] = $answers_map;
    $total = count($quiz_questions); 
    if ($total == 0) $state = 'menu'; 
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحدي اللهجات السعودية</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    
    <style>
        :root { 
            --brand-green: #116A4B; 
            --brand-gold: #CCA450; 
            --bg-color: #f8f9fa; 
        }
        body { 
            font-family: 'Almarai', 'Tajawal', sans-serif; 
            background: var(--bg-color); 
            margin: 0; 
            padding-top: 120px; 
            color: #333; 
        }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; min-height: 60vh; } 

        .start-btn { width: 100%; padding: 15px; background: var(--brand-green); color: white; border: none; border-radius: 12px; font-size: 1.2em; font-weight: bold; cursor: pointer; margin-top: 20px; transition:0.3s; font-family: inherit; }
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
        
        .select-group { margin-bottom: 25px; text-align: right; }
        .select-group label.main-label { display: block; margin-bottom: 10px; font-weight: bold; color: var(--brand-green); font-size: 1.1em; }
        .form-select { width: 100%; padding: 15px; border-radius: 10px; border: 1px solid #ddd; font-family: inherit; font-size: 1.1em; }
        
        .checkbox-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .checkbox-label { display: flex; align-items: center; background: #fdfdfd; border: 2px solid #eee; padding: 15px; border-radius: 10px; cursor: pointer; transition: 0.2s; font-weight: 500; }
        .checkbox-label:hover { background: #f0fdf7; border-color: #a8d5c2; }
        
        .checkbox-label input[type="radio"] { 
            width: 20px; height: 20px; margin-left: 12px; accent-color: var(--brand-green); 
        }
        .checkbox-label input[type="radio"]:checked + span { 
            color: var(--brand-green); font-weight: bold; 
        }
        .checkbox-label:has(input:checked) {
            border-color: var(--brand-green);
            background-color: #e8f5e9;
        }

        .quiz-container-area { animation: fadeIn 0.5s ease-in-out; }
        
        .quiz-item { background: white; border-radius: 15px; padding: 25px; margin-bottom: 30px; border: 1px solid #eee; box-shadow: 0 3px 10px rgba(0,0,0,0.02); text-align: right; }
        .header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .type-badge { padding: 5px 12px; border-radius: 20px; color: white; font-size: 0.9em; font-weight: bold; }
        
        .q-text { font-size: 1.2em; font-weight: 600; margin-bottom: 20px; color: #333; line-height: 1.8; }

        .opt-label { display: flex; align-items: center; padding: 15px; margin: 10px 0; background: #fdfdfd; border: 2px solid #f0f0f0; border-radius: 8px; cursor: pointer; transition: 0.2s; }
        .opt-label:hover { border-color: var(--brand-green); background: #f4fcf7; }
        .opt-label input { margin-left: 15px; width: 20px; height: 20px; accent-color: var(--brand-green); }

        .result-header { text-align: center; background: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; border-top: 5px solid var(--brand-gold); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .score-big { font-size: 3em; color: var(--brand-green); font-weight: 800; }
        
        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 2000; justify-content: center; align-items: center; }
        .modal-box { background: white; width: 90%; max-width: 450px; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .btn-confirm { background: var(--brand-green); color: white; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; font-family: inherit; }
        .btn-cancel { background: #eee; color: #333; border: none; padding: 10px 25px; border-radius: 25px; cursor: pointer; font-weight: bold; font-family: inherit; }
        
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        @media (max-width: 600px) {
            .checkbox-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

        <header id="mainHeader" class="scrolled">
        <div class="logo">
            <img src="images/Logo.png" alt="شعار SaudiCulture">
        </div>

        <nav>
            <a href="arabic.php">الرئيسية</a>
            <a href="history_ar.php">التاريخ</a>
            <a href="traditions_ar.php">التقاليد</a>
            <a href="food_ar.php">الطعام</a>
            <a href="arts_ar.php">الفنون</a>
            <a href="culture_events_ar.php">الفعاليات الثقافية</a>
            <a href="quiz_ar.php">الاختبار</a>
                    <a href="browse_ar.php">المعجم</a>

            <a href="Contact_ar.php">اتصل بنا</a>

            <button class="nav-search-btn" onclick="toggleTopSearch()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="7" stroke="#0e6b4e" stroke-width="2"/>
                    <line x1="16.5" y1="16.5" x2="22" y2="22" stroke="#0e6b4e" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
            <div class="top-search-bar" id="topSearchBar">
                <input type="text" placeholder="ابحث في الموقع..." />
            </div>

            <a href="profile_ar.php" class="profile-square" title="الملف الشخصي" style="display:inline-flex;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                </svg>
            </a>
            <button class="lang-btn" onclick="window.location.href='quiz.php'">EN</button>
        </nav>
    </header>


<div class="container">

    <div class="menu-box">
        <h1 style="color:var(--brand-green); margin-bottom:10px;">تحدي اللهجات السعودية 🇸🇦</h1>
        <p style="color:#666; margin-bottom:30px;">اختر نوع التحدي والعدد وابدأ رحلتك!</p>
        
        <form method="POST">
            <div class="select-group">
                <label class="main-label">عدد الأسئلة:</label>
                <select name="limit" class="form-select">
                    <option value="5" <?php if(isset($_POST['limit']) && $_POST['limit'] == 5) echo 'selected'; ?>>5 أسئلة (تسخين)</option>
                    <option value="10" <?php if(!isset($_POST['limit']) || $_POST['limit'] == 10) echo 'selected'; ?>>10 أسئلة (تحدي)</option>
                    <option value="15" <?php if(isset($_POST['limit']) && $_POST['limit'] == 15) echo 'selected'; ?>>15 سؤال (خبير)</option>
                    <option value="20" <?php if(isset($_POST['limit']) && $_POST['limit'] == 20) echo 'selected'; ?>>20 سؤال (مؤرخ)</option>
                </select>
            </div>

            <div class="select-group">
                <label class="main-label">نوع التحدي:</label>
                <div class="checkbox-grid">
                    
                    <label class="checkbox-label">
                        <input type="radio" name="type" value="mixed" checked> 
                        <span>🔀 كوكتيل (مشكل)</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="type" value="words">
                        <span>📝 كلمات ومصطلحات</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="type" value="phrases">
                        <span>🗣️ جمل وعبارات</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="radio" name="type" value="proverbs">
                        <span>📜 أمثال شعبية</span>
                    </label>

                </div>
            </div>

            <button type="submit" name="start_quiz" class="start-btn">بدء الاختبار 🚀</button>
        </form>
    </div>

    <div id="quizScrollTarget"></div>

    <div class="quiz-container-area">

        <?php if ($state == 'quiz'): ?>
            <h2 style="text-align:center; margin-bottom:20px; color:#555;">بالتوفيق! 🍀</h2>
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

                        <div class="q-text"><?php echo $q['question']; ?></div>
                        
                        <div class="options-list">
                            <?php 
                            // يتم عرض 4 خيارات مرقمة (أ) (ب) (ج) (د)
                            foreach($q['options'] as $opt): 
                            ?>
                                <label class="opt-label">
                                    <input type="radio" name="ans[<?php echo $q['id']; ?>]" value="<?php echo htmlspecialchars($opt); ?>">
                                    <span><?php echo htmlspecialchars($opt); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="button" onclick="checkAndSubmit()" class="start-btn">إرسال الإجابات ✅</button>
                <input type="hidden" name="submit_answers" value="1">
            </form>

        <?php elseif ($state == 'result'): ?>
            <div class="result-header">
                <h2>نتيجتك النهائية</h2>
                <div class="score-big"><?php echo $score; ?> / <?php echo $total; ?></div>
                <p style="font-size:1.1em; color:#555; margin-top:10px;">
                    <?php 
                    if($score == $total) echo "ما شاء الله! قفلت ملف اللهجات! 🌟";
                    elseif($score >= $total*0.6) echo "كفو! مستواك ممتاز 💪";
                    else echo "حاول مرة ثانية، لسى فيه كثير تتعلمه 😉";
                    ?>
                </p>
                <button onclick="window.scrollTo({top:0, behavior:'smooth'})" class="start-btn" style="display:inline-block; width:auto; padding:10px 40px; margin-top:15px;">جرب إعدادات أخرى ⬆️</button>
            </div>

            <h3 style="text-align:center; color:#116A4B;">تفاصيل الإجابات</h3>
            <?php foreach($results_detail as $qid => $det): ?>
                <div class="quiz-item" style="padding:20px; border-right: 6px solid <?php echo $det['is_correct'] ? '#27ae60' : '#c0392b'; ?>;">
                    <div style="font-size:1em; font-weight:bold; margin-bottom:5px; color:#333;">
                        المصطلح: <span style="color:var(--brand-green);"><?php echo htmlspecialchars($det['term']); ?></span>
                    </div>
                    
                    <?php if($det['is_correct']): ?>
                        <span style="color:#27ae60; font-weight:bold;">✅ إجابة صحيحة</span>
                    <?php else: ?>
                        <span style="color:#c0392b; font-weight:bold;">❌ إجابة خاطئة</span>
                        <div style="background:#fff5f5; padding:10px; border-radius:8px; margin-top:10px; font-size:0.95em; color:#c0392b;">
                            إجابتك: <?php echo empty($det['user_full']) ? 'لم تجب' : htmlspecialchars($det['user_full']); ?><br>
                            الحرف الصحيح: <b style="color:#27ae60;"><?php echo $det['correct_char']; ?></b> - نص الإجابة: <b style="color:#27ae60;"><?php echo htmlspecialchars($det['correct_text']); ?></b>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    
    <div class="modal-overlay" id="confirmModal">
        <div class="modal-box">
            <h3 style="color:var(--brand-green); margin-bottom:10px;">تأكيد التسليم</h3>
            <p id="modalMessage">هل أنت متأكد من إنهاء الاختبار؟</p>
            <div id="unansweredBox" style="display:none; margin:15px 0; background:#fff3cd; color:#856404; padding:10px; border-radius:8px; text-align:right;">
                ⚠️ لم تقم بحل الأسئلة التالية: <span id="unansweredNumbers" style="font-weight:bold;"></span>
            </div>
            <div style="margin-top:20px; display:flex; gap:10px; justify-content:center;">
                <button class="btn-cancel" onclick="closeModal()">تراجع</button>
                <button class="btn-confirm" onclick="submitForm()">نعم، إرسال</button>
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

</div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <img src="images/Logo.png" alt="شعار SaudiCulture Logo" class="footer-logo">
                <p>مشروع <strong>SaudiCulture</strong> – منصة تعرض جمال الموروث الثقافي والتاريخ السعودي.</p>
            </div>

            <div class="footer-links">
                <h4>روابط سريعة</h4>
                <a href="arabic.html">الرئيسية</a>
                <a href="history_ar.html">التاريخ</a>
                <a href="traditions_ar.html">التقاليد</a>
                <a href="food_ar.html">الطعام</a>
                <a href="Contact_ar.html">اتصل بنا</a>
            </div>

            <div class="footer-contact">
                <h4>تواصل معنا</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 مكة، المملكة العربية السعودية</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
    
<script>
    // الدوال الخاصة بـ JavaScript
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
            numsBox.textContent = unanswered.join('، ');
        } else {
            msgBox.style.display = 'none';
        }
        document.getElementById('confirmModal').style.display = 'flex';
    }
    function closeModal() { document.getElementById('confirmModal').style.display = 'none'; }
    function submitForm() { document.getElementById('quizForm').submit(); }
</script>
</body>
</html>