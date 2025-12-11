<?php
// 1. إعدادات الاتصال (نفس الكود الذي أرسلته)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db_en"; // قاعدة البيانات الإنجليزية

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}

// 2. جلب 10 أسئلة عشوائية من جدول "general"
// ملاحظة: استخدمنا علامة ` ` لأن أسماء الأعمدة تحتوي على مسافات (COL 1, COL 2)
$sql = "SELECT `COL 1` AS question, `COL 2` AS options, `COL 3` AS answer FROM `general` ORDER BY RAND() LIMIT 10";
$stmt = $conn->prepare($sql);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saudi Culture Quiz</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .header-container { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .lang-btn { text-decoration: none; background: #2c3e50; color: white; padding: 8px 15px; border-radius: 5px; font-weight: bold; }
        
        .quiz-box { background: white; max-width: 800px; margin: auto; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .question-item { margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 20px; }
        .question-title { font-weight: bold; font-size: 1.2em; margin-bottom: 15px; color: #333; }
        
        .option-label { display: block; padding: 10px; border: 1px solid #ddd; margin-bottom: 5px; border-radius: 5px; cursor: pointer; transition: 0.2s; }
        .option-label:hover { background-color: #f9f9f9; border-color: #bbb; }
        input[type="radio"] { margin-right: 10px; }
        
        .submit-btn { background-color: #27ae60; color: white; border: none; padding: 15px 30px; font-size: 1.1em; border-radius: 5px; cursor: pointer; width: 100%; margin-top: 20px; }
        .submit-btn:hover { background-color: #219150; }
    </style>
</head>
<body>

<div class="quiz-box">
    <div class="header-container">
        <h1>General Quiz</h1>
        <a href="quiz_ar.php" class="lang-btn">اللغة العربية</a>
    </div>

    <form action="result.php" method="POST">
        <?php if (count($questions) > 0): ?>
            <?php foreach ($questions as $index => $row): ?>
                <div class="question-item">
                    <div class="question-title">
                        <?php echo ($index + 1) . ". " . $row['question']; ?>
                    </div>
                    
                    <div class="options-group">
                        <?php
                        // --- معالجة الخيارات ---
                        // العمود COL 2 يحتوي على نص مثل: "A. Option1 B. Option2..."
                        // نستخدم دالة preg_split لفصلها بناءً على الحروف A. B. C. D.
                        $options_raw = $row['options'];
                        $options = preg_split('/(?=[A-D]\.)/', $options_raw, -1, PREG_SPLIT_NO_EMPTY);
                        
                        foreach ($options as $opt): 
                            $opt = trim($opt); // تنظيف المسافات
                            // $opt الآن تساوي "A. Kabsa" مثلاً
                        ?>
                            <label class="option-label">
                                <input type="radio" name="q<?php echo $index; ?>" value="<?php echo htmlspecialchars($opt); ?>" required>
                                <?php echo htmlspecialchars($opt); ?>
                            </label>
                        <?php endforeach; ?>
                        
                        <input type="hidden" name="correct_ans_<?php echo $index; ?>" value="<?php echo htmlspecialchars($row['answer']); ?>">
                        <input type="hidden" name="question_text_<?php echo $index; ?>" value="<?php echo htmlspecialchars($row['question']); ?>">
                    </div>
                </div>
            <?php endforeach; ?>
            
            <button type="submit" class="submit-btn">Submit Answers</button>
        <?php else: ?>
            <p>No questions found in the database.</p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>