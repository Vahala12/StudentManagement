<?php
// config.php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'student_management');
define('DB_USER', 'root');
define('DB_PASS', '');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_error) {
    die('Database connection error: ' . $mysqli->connect_error);
}

$mysqli->set_charset('utf8mb4');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// escape helper
function e($str) {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}
