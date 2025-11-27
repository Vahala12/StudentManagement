<?php
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../config.php'; // cần để dùng $_SESSION

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$action = $_GET['action'] ?? '';

switch ($action) {

    // ===================================
    // GỬI THÔNG BÁO CHO 1 HỌC SINH
    // ===================================
    case "send_student":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $student_id = $_POST['student_id'] ?? 0;
            $title      = trim($_POST['title'] ?? '');
            $content    = trim($_POST['content'] ?? '');

            if ($student_id && $title !== '' && $content !== '') {
                // Notification gốc chỉ có 3 tham số
                Notification::create($student_id, $title, $content);

                header("Location: ../views/notify/notify_list.php?sent=1");
                exit;
            }

            header("Location: ../views/notify/notify_list.php?error=missing_data");
            exit;
        }
        return;


    // ===================================
    // XÓA THÔNG BÁO
    // ===================================
    case "delete":
        $id = $_GET['id'] ?? 0;

        if ($id) {
            Notification::delete($id);
            header("Location: ../views/notify/notify_list.php?deleted=1");
            exit;
        }

        header("Location: ../views/notify/notify_list.php?error=invalid_id");
        exit;


    // ===================================
    // ACTION KHÔNG HỢP LỆ
    // ===================================
    default:
        echo "404 - Không tìm thấy action";
        return;
}
