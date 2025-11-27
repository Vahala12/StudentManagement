<?php
// routes/teacher_controller.php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Score.php';
require_once __DIR__ . '/../models/Notification.php';

// Đảm bảo session đã chạy
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra quyền giáo viên
if (!isset($_SESSION['user']) || $_SESSION['user']['role_name'] !== 'teacher') {
    header('Location: /student_management/templates/login.php');
    exit;
}

// Lấy action
$action = $_GET['action'] ?? 'dashboard';


// =======================================
// 1. DASHBOARD
// =======================================
if ($action === 'dashboard') {
    $scores = Score::all();
    $students = Student::all();
    include __DIR__ . '/../templates/teacher/dashboard.php';
    exit;
}


// =======================================
// 2. ADD SCORE (THÊM ĐIỂM)
// =======================================
if ($action === 'add_score') {

    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $student_name = trim($_POST['student_name'] ?? '');
        $subject = trim($_POST['subject_name'] ?? '');
        $midterm = (float)($_POST['midterm'] ?? 0);
        $final = (float)($_POST['final'] ?? 0);

        // Tìm student theo tên
        $student = Student::findByName($student_name);

        if ($student) {
            Score::create($student['id'], $subject, $midterm, $final);
            header('Location: /student_management/routes/teacher_controller.php?action=dashboard');
            exit;
        } else {
            $error = "Không tìm thấy học sinh: " . htmlspecialchars($student_name);
        }
    }

    $students = Student::all();
    include __DIR__ . '/../templates/teacher/add_score.php';
    exit;
}


// =======================================
// 3. VIEW STUDENTS (DANH SÁCH HỌC SINH)
// =======================================
if ($action === 'view_students') {
    $students = Student::all();
    include __DIR__ . '/../templates/teacher/view_students.php';
    exit;
}


// =======================================
// 4. SCORES (BẢNG ĐIỂM)
// =======================================
if ($action === 'scores') {
    $scores = Score::all();
    include __DIR__ . '/../templates/teacher/scores.php';
    exit;
}


// =======================================
// 5. NOTIFY (GỬI THÔNG BÁO CHO HỌC SINH)
// =======================================
if ($action === 'notify') {

    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $student_name = trim($_POST['student_name'] ?? '');
        $content      = trim($_POST['content'] ?? '');

        // Tìm học sinh theo tên
        $student = Student::findByName($student_name);

        if ($student && $content !== '') {

            $student_id = $student['id'];
            $title = "Thông báo từ giáo viên";

            // Gửi thông báo — bản gốc chỉ có 3 tham số
            Notification::create($student_id, $title, $content);

            $message = "Gửi thông báo thành công cho: " . htmlspecialchars($student_name);

        } else {
            $message = "Không tìm thấy học sinh hoặc nội dung trống.";
        }
    }

    $students = Student::all();
    include __DIR__ . '/../templates/teacher/notify.php';
    exit;
}


// =======================================
// 6. TIMETABLE (THỜI KHÓA BIỂU GIÁO VIÊN)
// =======================================
// 6. TIMETABLE (THỜI KHÓA BIỂU)
if ($action === 'timetable') {

    require_once __DIR__ . '/../models/Timetable.php';

    // TẠM THỜI LẤY LỚP MẶC ĐỊNH (hoặc lấy theo giáo viên nếu muốn)
    $class_name = "T010";

    $timetables = Timetable::forClass($class_name);

    include __DIR__ . '/../templates/teacher/timetable.php';
    exit;
}
// =======================================
// 7. ADD TIMETABLE (GIÁO VIÊN NHẬP TKB)
// =======================================
if ($action === 'add_timetable') {

    require_once __DIR__ . '/../models/Timetable.php';

    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $class_name  = trim($_POST['class_name'] ?? '');
        $day_of_week = trim($_POST['day_of_week'] ?? '');
        $subject     = trim($_POST['subject'] ?? '');
        $time        = trim($_POST['time'] ?? '');
        $room        = trim($_POST['room'] ?? '');

        if ($class_name && $day_of_week && $subject && $time) {

            Timetable::create($class_name, $day_of_week, $subject, $time, $room);

            $message = "✔ Thêm thời khóa biểu thành công cho lớp $class_name";

        } else {
            $message = "⚠ Vui lòng nhập đầy đủ thông tin!";
        }
    }

    include __DIR__ . '/../templates/teacher/add_timetable.php';
    exit;
}
// =======================================
// 8. VIEW TIMETABLE (XEM TKB GIÁO VIÊN ĐÃ NHẬP)
// =======================================
if ($action === 'view_timetable') {

    require_once __DIR__ . '/../models/Timetable.php';

    $timetables = Timetable::forClass("T010"); // hoặc lấy theo lớp giáo viên dạy

    include __DIR__ . '/../templates/teacher/view_timetable.php';
    exit;
}
// =======================================
// ACTION SAI
// =======================================
echo "Hành động không hợp lệ.";
