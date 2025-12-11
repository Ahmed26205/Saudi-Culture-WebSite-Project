<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db_en"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    // ضبط وضع الخطأ لإظهار المشاكل إن وجدت
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>