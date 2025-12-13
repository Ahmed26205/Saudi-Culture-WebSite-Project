<?php
$host = "ftpupload.net";
$user = "if0_40658591";
$pass = "0Vrj7r9Y77d";
$dbname = "quiz_db";

// إنشاء الاتصال باستخدام أسلوب mysqli (الكائن) لزيادة الثبات
$conn = new mysqli($host, $user, $pass, $dbname);

// ضبط الترميز
$conn->set_charset("utf8mb4");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>