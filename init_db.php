<?php
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Role.php';
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/Student.php';
require_once __DIR__ . '/Score.php';

// Tạo bảng theo thứ tự (Role -> User -> Student -> Score)
Role::createTable($conn);
User::createTable($conn);
Student::createTable($conn);
Score::createTable($conn);

// Tạo role mặc định
Role::createDefault($conn);

echo "Đã tạo xong các bảng và roles.";
?>