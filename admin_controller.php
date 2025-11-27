<?php
// routes/admin_controller.php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Role.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Subject.php';
require_once __DIR__ . '/../models/ClassModel.php';
require_once __DIR__ . '/../models/Teacher.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role_name'] !== 'admin') {
    header('Location: ../templates/login.php'); 
    exit;
}

$action = $_GET['action'] ?? 'dashboard';


/* -----------------------------
    DASHBOARD
----------------------------- */
if ($action === 'dashboard') {
    include __DIR__ . '/../templates/admin/dashboard.php';
    exit;
}


/* -----------------------------
    QUẢN LÝ USERS
----------------------------- */
if ($action === 'manage_users') {

    $roles = Role::all();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $email = trim($_POST['email']);
        $role_id = (int)$_POST['role_id'];

        $msg = User::create($username, $password, $email, $role_id)
            ? 'Tạo user thành công'
            : 'Lỗi';
    }

    if (isset($_GET['delete_id'])) {
        User::delete((int)$_GET['delete_id']);
        header('Location: admin_controller.php?action=manage_users'); 
        exit;
    }

    $users = User::all();
    include __DIR__ . '/../templates/admin/manage_users.php';
    exit;
}


/* -----------------------------
    QUẢN LÝ SINH VIÊN
----------------------------- */
if ($action === 'manage_students') {

    if (isset($_GET['delete_id'])) {
        Student::delete((int)$_GET['delete_id']);
        header('Location: admin_controller.php?action=manage_students'); 
        exit;
    }

    $students = Student::all();
    include __DIR__ . '/../templates/admin/manage_students.php';
    exit;
}


/* -----------------------------
    QUẢN LÝ MÔN HỌC
----------------------------- */
if ($action === 'manage_subjects') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_subject'])) {
        $name = trim($_POST['name']);
        Subject::create($name);
    }

    if (isset($_GET['delete_id'])) {
        Subject::delete((int)$_GET['delete_id']);
        header('Location: admin_controller.php?action=manage_subjects'); 
        exit;
    }

    $subjects = Subject::all();
    include __DIR__ . '/../templates/admin/manage_subjects.php';
    exit;
}


/* -----------------------------
    QUẢN LÝ LỚP
----------------------------- */
if ($action === 'manage_classes') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_class'])) {
        $class_name = trim($_POST['class_name']);
        ClassModel::create($class_name);
    }

    if (isset($_GET['delete_id'])) {
        ClassModel::delete((int)$_GET['delete_id']);
        header('Location: admin_controller.php?action=manage_classes'); 
        exit;
    }

    $classes = ClassModel::all();
    include __DIR__ . '/../templates/admin/manage_classes.php';
    exit;
}


/* -----------------------------
    QUẢN LÝ GIÁO VIÊN
----------------------------- */
if ($action === 'manage_teachers') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_teacher'])) {
        $full_name = trim($_POST['name']);
        $email = trim($_POST['email']);

        // Tạo teacher + user tự động (ở Teacher.php)
        Teacher::create($full_name, $email);
    }

    if (isset($_GET['delete_id'])) {
        Teacher::delete((int)$_GET['delete_id']);
        header('Location: admin_controller.php?action=manage_teachers'); 
        exit;
    }

    $teachers = Teacher::all();
    include __DIR__ . '/../templates/admin/manage_teachers.php';
    exit;
}


/* -----------------------------
    PHÂN CÔNG GIÁO VIÊN CHO LỚP
----------------------------- */
if ($action === 'assign_teacher') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assign_teacher'])) {

        $teacher_id = (int)$_POST['teacher_id'];
        $class_id   = (int)$_POST['class_id'];

        Teacher::assignToClass($teacher_id, $class_id);

        header("Location: admin_controller.php?action=assign_teacher&success=1");
        exit;
    }

    $teachers = Teacher::all();
    $classes  = ClassModel::all();

    include __DIR__ . '/../templates/admin/assign_teacher.php';
    exit;
}


/* -----------------------------
    ACTION UNKNOWN
----------------------------- */
echo "Action not found.";
