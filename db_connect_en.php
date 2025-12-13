<?php
$host = "sql100.infinityfree.com";
$user = "if0_40658591";
$pass = "0Vrj7r9Y77d";
$dbname = "if0_40658591_quiz_db_en"; // الفرق الوحيد هنا (اسم القاعدة الإنجليزية)

// إنشاء الاتصال
$conn = new mysqli($host, $user, $pass, $dbname);

// ضبط الترميز
$conn->set_charset("utf8mb4");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>