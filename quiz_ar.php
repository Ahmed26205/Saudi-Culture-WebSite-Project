<?php
include 'db_connect.php'; 

// متغيرات العرض
$show_menu = true;
$show_quiz = false;
$show_result = false;

// ----------------------------------------------------------------
// 1. معالجة النتيجة (عند ضغط زر التسليم)
// ----------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_quiz'])) {
    $show_menu = false;
    $show_result = true;
    
    $score = 0;
    $total_questions = 0;
    $results_log = [];

    // نعتمد الآن على قائمة "الإجابات الصحيحة" المخفية التي أرسلناها مع الفورم
    // لأنها تحتوي على *كل* الأسئلة التي ظهرت للمستخدم
    if (isset($_POST['correct_map']) && is_array($_POST['correct_map'])) {
        
        foreach ($_POST['correct_map'] as $enc_term => $correct_ans) {
            $total_questions++;
            
            // فك تشفير السؤال (لأنه كان مشفراً كـ base64 في الفورم للحماية)
            $term_text = base64_decode($enc_term);
            
            // جلب نوع السؤال (كلمة/مثل/عبارة)
            $q_type = $_POST['type_map'][$enc_term] ?? 'عام';

            // هل قام المستخدم باختيار إجابة؟
            $user_ans = null;
            if (isset($_POST['answers'][$enc_term])) {
                $user_ans = $_POST['answers'][$enc_term];
            }

            // التصحيح
            $is_correct = false;
            $status_text = "لم يتم الحل";
            
            if ($user_ans !== null) {
                if (trim($user_ans) == trim($correct_ans)) {
                    $is_correct = true;
                    $score++;
                    $status_text = "إجابة صحيحة";
                } else {
                    $status_text = "إجابة خاطئة";
                }
            }

            // حفظ النتيجة للعرض
            $results_log[] = [
                'question' => $term_text,
                'type' => $q_type,
                'user_ans' => $user_ans,      // قد يكون null
                'correct_ans' => $correct_ans,
                'is_correct' => $is_correct,
                'status' => $status_text
            ];
        }
    }
}

// ----------------------------------------------------------------
// 2. معالجة بدء الاختبار
// ----------------------------------------------------------------
elseif (isset($_POST['quiz_type'])) {
    $show_menu = false;
    $show_quiz = true;
    $quiz_type = $_POST['quiz_type'];
    $question_count = isset($_POST['num_questions']) ? (int)$_POST['num_questions'] : 10;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاختبار</title>
    <style>
        
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f8; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: 20px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h1, h2 { text-align: center; color: #2c3e50; margin-bottom: 25px; }

        
        
        /* أزرار القائمة */
        .menu-btn { display: block; width: 100%; padding: 18px; margin: 12px 0; background: #fff; border: 2px solid #e9ecef; border-radius: 10px; font-size: 1.1em; cursor: pointer; text-decoration: none; color: #495057; font-weight: 600; transition: all 0.2s; text-align: center; }
        .menu-btn:hover { border-color: #3498db; color: #3498db; background: #f8f9fa; transform: translateY(-2px); }
        .menu-btn.mixed { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; }
        .menu-btn.mixed:hover { opacity: 0.95; }

        /* صندوق السؤال */
        .q-box { border: 1px solid #e9ecef; padding: 25px; margin-bottom: 25px; border-radius: 12px; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 0.85em; color: white; margin-bottom: 12px; font-weight: normal; }
        
        /* خيارات الراديو */
        .option-label { display: block; padding: 12px 15px; margin: 8px 0; background: #f8f9fa; cursor: pointer; border-radius: 8px; border: 1px solid #e9ecef; transition: 0.2s; position: relative; }
        .option-label:hover { background: #e2e6ea; border-color: #adb5bd; }
        input[type="radio"] { margin-left: 10px; transform: scale(1.2); }

        /* زر التسليم */
        .submit-btn { background: #27ae60; color: white; padding: 15px; border: none; border-radius: 8px; width: 100%; font-size: 1.2em; cursor: pointer; margin-top: 10px; font-weight: bold; }
        .submit-btn:hover { background: #219150; }

        /* نتائج */
        .result-card { padding: 15px; margin-bottom: 15px; border-radius: 8px; border-right: 5px solid #ccc; background: #fff; border: 1px solid #eee; }
        .result-card.correct { border-right: 5px solid #27ae60; background-color: #f0fff4; }
        .result-card.wrong { border-right: 5px solid #e74c3c; background-color: #fff5f5; }
        .user-ans { font-weight: bold; color: #555; }
        .correct-ans { font-weight: bold; color: #27ae60; margin-top: 5px; display: block; }
        .not-answered { color: #e67e22; font-style: italic; }

        .retry-btn { display: inline-block; background: #34495e; color: white; padding: 10px 25px; border-radius: 25px; text-decoration: none; margin-top: 20px; }
    </style>

       <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet">
    <!-- ربط ملف التنسيقات الخارجية للموقع -->
    <link rel="stylesheet" href="CSS/styles.css">
    <!-- ربط ملف الجافاسكربت الخاص بالتفاعل في الواجهة -->
    <script src="JS/script.js" defer></script>
</head>
</head>
<body>
    <!-- شريط علوي (Header) يحتوي الشعار والقائمة الرئيسية -->
    <header id="mainHeader">
        <!-- شعار الموقع -->
        <div class="logo">
            <img src="images/Logo.png" alt="SaudiCulture">
        </div>

        <!-- قائمة التنقل الرئيسية للصفحات العربية -->
        <nav>
            <a href="arabic.html">الرئيسية</a>
            <a href="history_ar.html">التاريخ</a>
            <a href="traditions_ar.html">التقاليد</a>
            <a href="food_ar.html">الطعام</a>
            <a href="arts_ar.html">الفنون</a>
            <a href="culture_events_ar.html">الفعاليات الثقافية</a>
            <a href="quiz_ar.html">الاختبار</a>
            <a href="Contact_ar.html">اتصل بنا</a>

            <!-- مجموعة الأزرار (تسجيل الدخول – إنشاء حساب – تغيير اللغة) -->
            <div class="nav-buttons">
                <!-- زر تسجيل الدخول -->
                <button class="login-btn" onclick="window.location.href='login_ar.html'">
                    تسجيل الدخول
                </button>
                <!-- زر إنشاء حساب جديد -->
                <button class="signup-btn" onclick="window.location.href='signup_ar.html'">
                    إنشاء حساب
                </button>
                <!-- زر التبديل إلى النسخة الإنجليزية -->
                <button class="lang-btn" onclick="window.location.href='index.html'">
                    EN
                </button>
            </div>
        </nav>
    </header>
<div class="container">

    <?php if ($show_menu): ?>
        <h1>تحدي اللهجات السعودية🇸🇦</h1>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">اختر نوع الاختبار لبدء التحدي</p>
        <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
            <label for="num_questions" style="display: block; text-align: right; margin-bottom: 10px; font-weight: bold;">عدد الأسئلة:</label>
            <select id="num_questions" name="num_questions" onchange="document.getElementById('selected_count').value = this.value" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
                <option value="5">5 أسئلة</option>
                <option value="10" selected>10 أسئلة</option>
                <option value="15">15 سؤال</option>
                <option value="20">20 سؤال</option>
            </select>
        </div>
        <form id="quiz_form" method="POST" style="display: none;">
            <input type="hidden" id="selected_count" name="num_questions" value="10">
            <input type="hidden" id="selected_type" name="quiz_type" value="">
        </form>
        <a href="#" onclick="setQuizType('words'); return false;" class="menu-btn">كلمات ومصطلحات📝</a>
        <a href="#" onclick="setQuizType('phrases'); return false;" class="menu-btn">جمل وعبارات🗣️</a>
        <a href="#" onclick="setQuizType('proverbs'); return false;" class="menu-btn">أمثال شعبية📜</a>
        <a href="#" onclick="setQuizType('mixed'); return false;" class="menu-btn mixed">عشوائي 🔀</a>
        <script>
            function setQuizType(type) {
                document.getElementById('selected_type').value = type;
                document.getElementById('quiz_form').submit();
            }
        </script>
        
    <?php endif; ?>


    <?php if ($show_quiz): ?>
        <form action="" method="POST">
            <?php
            // بناء الاستعلام (مع استبعاد صف العناوين Header Row)
            $sql_questions = "";
            $limit = isset($question_count) ? (int)$question_count : 10;

            // ملاحظة: نستخدم `` حول أسماء الأعمدة COL 1 لأن فيها مسافة
            if ($quiz_type == 'words') {
                $sql_questions = "SELECT `COL 1` as term, `COL 2` as meaning, 'كلمة' as type FROM `words___final_dataset` WHERE `COL 2` != '' AND `COL 2` != 'Meaning_of_term' AND `COL 1` != 'Term' ORDER BY RAND() LIMIT $limit";
            } elseif ($quiz_type == 'phrases') {
                $sql_questions = "SELECT `COL 1` as term, `COL 2` as meaning, 'عبارة' as type FROM `phrases___phrases_location_recognition` WHERE `COL 2` != '' AND `COL 2` != 'Meaning_of_term' AND `COL 1` != 'Term' ORDER BY RAND() LIMIT $limit";
            } elseif ($quiz_type == 'proverbs') {
                $sql_questions = "SELECT `COL 1` as term, `COL 2` as meaning, 'مثل' as type FROM `proverbs___proverbs_location_recognition` WHERE `COL 2` != '' AND `COL 2` != 'Meaning_of_term' AND `COL 1` != 'Term' ORDER BY RAND() LIMIT $limit";
            } else {
                // الكوكتيل - توزيع متساوي تقريبا
                $words_limit = ceil($limit / 3);
                $phrases_limit = ceil($limit / 3);
                $proverbs_limit = $limit - $words_limit - $phrases_limit;
                
                $sql_questions = "
                    (SELECT `COL 1` as term, `COL 2` as meaning, 'كلمة' as type FROM `words___final_dataset` WHERE `COL 2` != '' AND `COL 2` != 'Meaning_of_term' AND `COL 1` != 'Term' ORDER BY RAND() LIMIT $words_limit)
                    UNION ALL
                    (SELECT `COL 1` as term, `COL 2` as meaning, 'عبارة' as type FROM `phrases___phrases_location_recognition` WHERE `COL 2` != '' AND `COL 2` != 'Meaning_of_term' AND `COL 1` != 'Term' ORDER BY RAND() LIMIT $phrases_limit)
                    UNION ALL
                    (SELECT `COL 1` as term, `COL 2` as meaning, 'مثل' as type FROM `proverbs___proverbs_location_recognition` WHERE `COL 2` != '' AND `COL 2` != 'Meaning_of_term' AND `COL 1` != 'Term' ORDER BY RAND() LIMIT $proverbs_limit)
                    ORDER BY RAND()
                ";
            }

            $result_q = $conn->query($sql_questions);

            if ($result_q && $result_q->num_rows > 0) {
                $i = 1;
                while($row = $result_q->fetch_assoc()) {
                    $term = $row['term'];
                    $correct_meaning = $row['meaning'];
                    $type = $row['type'];
                    
                    // مفتاح آمن للاستخدام في HTML (تشفير base64)
                    // هذا يحل مشكلة الرموز الغريبة أو المسافات في الأسماء
                    $enc_term = base64_encode($term);

                    // ألوان التصنيف
                    $color = "#6c757d";
                    if($type == 'كلمة') $color = "#3498db";
                    if($type == 'عبارة') $color = "#f1c40f";
                    if($type == 'مثل') $color = "#27ae60";

                    // -----------------------------------------------------------
                    // تصحيح الخيارات الخاطئة (Logic Fix)
                    // -----------------------------------------------------------
                    // نختار 3 خيارات عشوائية بشرط:
                    // 1. لا تساوي الإجابة الصحيحة
                    // 2. ليست فارغة
                    // 3. ليست ترويسة الجدول (Meaning_of_term)
                    $sql_wrong = "SELECT `COL 2` as meaning FROM `words___final_dataset` 
                                  WHERE `COL 2` != '" . $conn->real_escape_string($correct_meaning) . "' 
                                  AND `COL 2` != '' 
                                  AND `COL 2` != 'Meaning_of_term' 
                                  AND LENGTH(`COL 2`) > 2
                                  ORDER BY RAND() LIMIT 3";
                                  
                    $result_wrong = $conn->query($sql_wrong);
                    
                    $options = [];
                    $options[] = $correct_meaning; // إضافة الإجابة الصحيحة
                    
                    if ($result_wrong) {
                        while($w_row = $result_wrong->fetch_assoc()) {
                            $options[] = $w_row['meaning'];
                        }
                    }
                    
                    // خلط الخيارات
                    shuffle($options);

                    echo "<div class='q-box'>";
                    echo "<span class='badge' style='background:$color'>$type</span>";
                    echo "<h3>$i. ما معنى: <span style='color:#2c3e50'>\"$term\"</span>؟</h3>";
                    
                    foreach ($options as $opt) {
                        $safe_opt = htmlspecialchars($opt);
                        // نستخدم $enc_term كمفتاح للمصفوفة
                        echo "<label class='option-label'><input type='radio' name='answers[$enc_term]' value='$safe_opt'> $safe_opt</label>";
                    }
                    
                    // -------------------------------------------------------
                    // الحقول المخفية (السر في إظهار الإجابات لاحقاً)
                    // -------------------------------------------------------
                    // نرسل الإجابة الصحيحة ونوع السؤال مخفياً لنستلمها في صفحة النتيجة
                    echo "<input type='hidden' name='correct_map[$enc_term]' value='" . htmlspecialchars($correct_meaning) . "'>";
                    echo "<input type='hidden' name='type_map[$enc_term]' value='$type'>";
                    
                    echo "</div>";
                    $i++;
                }
                echo "<button type='submit' name='submit_quiz' class='submit-btn'>اعتماد الإجابات وعرض النتيجة</button>";
            } else {
                echo "<div style='text-align:center; padding:50px;'>عذراً، لم يتم العثور على أسئلة في قاعدة البيانات.<br>تأكد من أسماء الجداول والأعمدة.</div>";
            }
            ?>
        </form>
    <?php endif; ?>


    <?php if ($show_result): ?>
        <h2>نتيجتك: <?php echo "$score من $total_questions"; ?></h2>
        
        <?php foreach ($results_log as $res): ?>
            <div class="result-card <?php echo $res['is_correct'] ? 'correct' : 'wrong'; ?>">
                <div style="margin-bottom: 5px;">
                    <span class='badge' style='background:#95a5a6'><?php echo $res['type']; ?></span>
                    <strong>السؤال:</strong> ما معنى "<?php echo $res['question']; ?>"؟
                </div>
                
                <div style="margin-top: 10px; font-size: 0.95em;">
                    <?php if ($res['user_ans']): ?>
                        إجابتك: <span class="user-ans"><?php echo $res['user_ans']; ?></span>
                        <?php if (!$res['is_correct']): ?> 
                            <span style="color:red"> (❌ خطأ)</span> 
                        <?php else: ?>
                            <span style="color:green"> (✅ صحيح)</span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="not-answered">⚠️ لم تقم بالإجابة</span>
                    <?php endif; ?>

                    <span class="correct-ans">✅ الإجابة الصحيحة: <?php echo $res['correct_ans']; ?></span>
                </div>
            </div>

            
        <?php endforeach; ?>

        <div style="text-align:center">
            <a href="quiz_ar.php" class="retry-btn">🔄 العودة للصفحة الرئيسية</a>
        </div>
    <?php endif; ?>

</div>
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