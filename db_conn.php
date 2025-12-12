<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "quiz_db";

// محاولة الاتصال
$conn = mysqli_connect($sname, $uname, $password, $db_name);

// فحص الاتصال
if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}
?>