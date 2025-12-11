<?php
include 'db_connect.php'; 

$search_results = [];
$search_keyword = "";

// إذا ضغط المستخدم زر البحث
if (isset($_GET['q'])) {
    $search_keyword = trim($_GET['q']); // الكلمة اللي كتبها المستخدم
    $safe_keyword = $conn->real_escape_string($search_keyword); // تأمين الكلمة

    if (!empty($search_keyword)) {
        // استعلام SQL يبحث في الـ 3 جداول
        // نستخدم LIKE %...% عشان يبحث عن أي شيء يشبه الكلمة
        $sql = "
            (SELECT `COL 1` as term, `COL 2` as meaning, 'كلمة' as type FROM `words___final_dataset` WHERE `COL 1` LIKE '%$safe_keyword%')
            UNION
            (SELECT `COL 1` as term, `COL 2` as meaning, 'عبارة' as type FROM `phrases___phrases_location_recognition` WHERE `COL 1` LIKE '%$safe_keyword%')
            UNION
            (SELECT `COL 1` as term, `COL 2` as meaning, 'مثل' as type FROM `proverbs___proverbs_location_recognition` WHERE `COL 1` LIKE '%$safe_keyword%')
            LIMIT 50
        ";

        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $search_results[] = $row;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البحث في المعجم السعودي</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; padding: 20px; margin: 0; }
        .container { max-width: 800px; margin: 40px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        
        /* مربع البحث */
        .search-box { display: flex; gap: 10px; margin-bottom: 30px; }
        .search-input { flex: 1; padding: 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 1.1em; outline: none; transition: 0.3s; }
        .search-input:focus { border-color: #007bff; }
        .search-btn { padding: 15px 30px; background: #007bff; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1em; font-weight: bold; }
        .search-btn:hover { background: #0056b3; }

        /* النتائج */
        .result-card { background: #fff; border: 1px solid #eee; padding: 20px; margin-bottom: 15px; border-radius: 10px; border-right: 5px solid #ccc; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .term { font-size: 1.4em; color: #2c3e50; font-weight: bold; margin-bottom: 10px; display: block; }
        .meaning { font-size: 1.1em; color: #555; line-height: 1.6; }
        .badge { display: inline-block; padding: 5px 12px; border-radius: 15px; color: white; font-size: 0.8em; margin-bottom: 10px; }
        
        .nav-link { display: block; text-align: center; margin-top: 20px; color: #666; text-decoration: none; }
        .nav-link:hover { color: #007bff; text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h1 style="text-align: center; color: #333;">🔍 البحث في اللهجات</h1>
    
    <form action="" method="GET" class="search-box">
        <input type="text" name="q" class="search-input" placeholder="اكتب الكلمة، المثل، أو العبارة..." value="<?php echo htmlspecialchars($search_keyword); ?>" required>
        <button type="submit" class="search-btn">بحث</button>
    </form>

    <?php if (isset($_GET['q'])): ?>
        <?php if (count($search_results) > 0): ?>
            <h3 style="color:#666">تم العثور على <?php echo count($search_results); ?> نتيجة لـ "<?php echo htmlspecialchars($search_keyword); ?>"</h3>
            
            <?php foreach ($search_results as $row): ?>
                <?php 
                    // تحديد اللون حسب النوع
                    $color = "#6c757d";
                    if($row['type'] == 'كلمة') $color = "#17a2b8";
                    if($row['type'] == 'عبارة') $color = "#ffc107";
                    if($row['type'] == 'مثل') $color = "#28a745";
                ?>
                
                <div class="result-card" style="border-right-color: <?php echo $color; ?>;">
                    <span class="badge" style="background: <?php echo $color; ?>;"><?php echo $row['type']; ?></span>
                    <span class="term"><?php echo $row['term']; ?></span>
                    <div class="meaning">
                        <strong>المعنى:</strong> <?php echo $row['meaning']; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <div style="text-align: center; padding: 40px; color: #777; background: #f9f9f9; border-radius: 10px;">
                🚫 لم يتم العثور على أي نتائج تطابق "<?php echo htmlspecialchars($search_keyword); ?>"
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <a href="quiz.php" class="nav-link">← العودة إلى صفحة التحدي والاختبارات</a>
</div>

</body>
</html>