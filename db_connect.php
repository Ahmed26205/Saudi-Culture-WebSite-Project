<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "quiz_db"; 

$conn = new mysqli($host, $user, $pass, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>