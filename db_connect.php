<?php
$host = "sql100.infinityfree.com";
$user = "if0_40658591";
$pass = "0Vrj7r9Y77d";
$dbname = "if0_40658591_quiz_db"; 

$conn = new mysqli($host, $user, $pass, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>