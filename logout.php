<?php
session_start();
session_unset();
session_destroy();

// إعادة التوجيه للصفحة الرئيسية بعد الخروج
header("Location: index.html");
exit();
?>