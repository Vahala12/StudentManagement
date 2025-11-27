<?php
require_once __DIR__ . '/../models/Subject.php';

$subject = new Subject();
$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'index':
        $subjects = $subject->all();
        include __DIR__ . '/../templates/admin/manage_subjects.php';
        break;

    case 'create':
        $subject->create($_POST['name']);
        header("Location: subject_controller.php?action=index");
        break;

    case 'delete':
        $subject->delete($_GET['id']);
        header("Location: subject_controller.php?action=index");
        break;
}
