<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/Timetable.php';

$action = $_GET['action'] ?? '';

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $class_name = $_POST['class_name'];
    $day        = $_POST['day_of_week'];
    $subject    = $_POST['subject'];
    $time_range = $_POST['time_range'];   // ĐÚNG TÊN INPUT
    $room       = $_POST['room'];

    Timetable::create($class_name, $day, $subject, $time_range, $room);

    header("Location: /student_management/routes/teacher_controller.php?action=view_timetable&added=1");
    exit;
}

echo "404 - Action not found";
