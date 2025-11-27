<?php
require_once __DIR__ . '/../models/ClassModel.php';
require_once __DIR__ . '/../models/Teacher.php';

$cls = new ClassModel();
$teacher = new Teacher();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'index':
        $classes = $cls->all();
        include __DIR__ . '/../templates/admin/manage_classes.php';
        break;

    case 'create':
        $cls->create($_POST['name']);
        header("Location: class_controller.php?action=index");
        break;

    case 'delete':
        $cls->delete($_GET['id']);
        header("Location: class_controller.php?action=index");
        break;

    case 'assign_form':
        $class = $cls->all();
        $teachers = $teacher->all();
        include __DIR__ . '/../templates/admin/assign_teacher.php';
        break;

    case 'assign':
        $cls->assignTeacher($_POST['class_id'], $_POST['teacher_id']);
        header("Location: class_controller.php?action=index");
        break;
}
