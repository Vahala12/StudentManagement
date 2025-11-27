<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/ClassModel.php';
require_once __DIR__ . '/../models/Teacher.php';

// Chỉ start session nếu chưa chạy
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Chỉ Admin mới được dùng
if (!isset($_SESSION['user']) || $_SESSION['user']['role_name'] !== 'admin') {
    header("Location: /student_management/templates/login.php");
    exit;
}

$action = $_GET['action'] ?? 'index';

// =========================
// HIỂN THỊ FORM PHÂN CÔNG
// =========================
if ($action === 'index') {

    // Lấy flash message rồi xoá
    $flash_success = $_SESSION['flash_success'] ?? null;
    unset($_SESSION['flash_success']);

    $classes  = ClassModel::all(); 
    $teachers = Teacher::all();

    include __DIR__ . '/../templates/admin/assign_teacher.php';
    exit;
}

// =========================
// XỬ LÝ PHÂN CÔNG GIÁO VIÊN
// =========================
if ($action === 'assign') {
    $class_id   = $_POST['class_id'] ?? null;
    $teacher_id = $_POST['teacher_id'] ?? null;

    if (!$class_id || !$teacher_id) {
        die("Thiếu dữ liệu phân công!");
    }

    ClassModel::assignTeacher($class_id, $teacher_id);

    $_SESSION['flash_success'] = "✔ Đã phân công giáo viên thành công!";
    header("Location: /student_management/routes/assign_teacher_controller.php?action=index");
    exit;
}

// =========================
// ACTION SAI
// =========================
echo "Action không hợp lệ!";
