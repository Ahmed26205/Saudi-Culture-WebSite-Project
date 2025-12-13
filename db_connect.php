<?php
$host = "ftpupload.net";
$user = "if0_40658591";
$pass = "0Vrj7r9Y77d";
$dbname = "quiz_db"; 

$conn = new mysqli($host, $user, $pass, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>