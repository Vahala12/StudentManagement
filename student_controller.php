<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Score.php';
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../models/Timetable.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role_name'] !== 'student') {
    header('Location: ../templates/login.php');
    exit;
}

$action = $_GET['action'] ?? 'dashboard';
$user = $_SESSION['user'];
$student = Student::findByUserId($user['id']);

// ==========================
//       DASHBOARD
// ==========================
if ($action === 'dashboard') {
    $scores = $student ? Score::byStudent($student['id']) : [];
    $timetable = $student ? Timetable::forClass($student['class_name']) : [];
    include __DIR__ . '/../templates/student/dashboard.php';
    exit;
}

// ==========================
//       PROFILE
// ==========================
if ($action === 'profile') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $full_name = trim($_POST['full_name']);
        $student_code = trim($_POST['student_code']);
        $class_name = trim($_POST['class_name']);
        $major = trim($_POST['major']);
        $dob = $_POST['dob'] ?: null;
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);

        if ($student) {
            Student::update(
                $student['id'],
                $full_name,
                $student_code,
                $class_name,
                $major,
                $dob,
                $phone,
                $address
            );
        } else {
            Student::create(
                $user['id'],
                $full_name,
                $student_code,
                $class_name,
                $major,
                $dob,
                $phone,
                $address
            );
        }

        header('Location: student_controller.php?action=profile');
        exit;
    }

    include __DIR__ . '/../templates/student/profile.php';
    exit;
}

// ==========================
//      NOTIFICATIONS
// ==========================
if ($action === 'notifications') {
    $notifs = Notification::getByStudent($student['id']);
    include __DIR__ . '/../templates/student/notifications.php';
    exit;
}

// ==========================
//      TIMETABLE
// ==========================
if ($action === 'timetable') {

    if (!$student) {
        $timetable = [];
    } else {
        // FIX LỖI: lấy TKB THEO CLASS, không phải student_id
        $timetable = Timetable::forClass($student['class_name']);
    }

    include __DIR__ . '/../templates/student/timetable.php';
    exit;
}

echo "Action not found.";
