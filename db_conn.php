<?php
// Retrieve database connection parameters from environment variables (set in Vercel)
// Fallback to local XAMPP configuration if environment variables are not set
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : '';
$dbname = getenv('DB_NAME') ?: 'quiz_db';
$port = getenv('DB_PORT') ?: '3306';

// Create connection using mysqli
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Set charset to utf8mb4 to handle Arabic characters correctly
$conn->set_charset("utf8mb4");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
