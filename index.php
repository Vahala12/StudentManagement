<?php
// index.php
require_once 'config.php';

// Nếu đã login => redirect theo role
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role_name'] ?? null;
    if ($role === 'admin') {
        header('Location: routes/admin_controller.php?action=dashboard'); exit;
    } elseif ($role === 'teacher') {
        header('Location: routes/teacher_controller.php?action=dashboard'); exit;
    } elseif ($role === 'student') {
        header('Location: routes/student_controller.php?action=dashboard'); exit;
    }
}

// Nếu chưa login => chuyển đến trang login
header('Location: templates/login.php'); exit;
