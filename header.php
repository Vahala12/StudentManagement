<!-- templates/header.php -->
<?php
// Chỉ include config.php 1 lần, nơi đã khai báo e() và session_start()
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Sinh Viên</title>

    <link rel="stylesheet" href="/student_management/static/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
  <div class="container-fluid">

    <a class="navbar-brand" href="/student_management/">Quản Lý Sinh Viên</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if (isset($_SESSION['user'])): ?>

          <!-- ======================= ADMIN MENU ======================= -->
          <?php if ($_SESSION['user']['role_name'] === 'admin'): ?>

            <li class="nav-item">
                <a class="nav-link" href="/student_management/routes/admin_controller.php?action=dashboard">Dashboard</a>
            </li>

          <!-- ======================= TEACHER MENU ======================= -->
          <?php elseif ($_SESSION['user']['role_name'] === 'teacher'): ?>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/teacher_controller.php?action=dashboard">Dashboard</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/teacher_controller.php?action=notify">Notify</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/teacher_controller.php?action=timetable">Timetable</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/teacher_controller.php?action=add_timetable">Add Timetable</a>
            </li>

          <!-- ======================= STUDENT MENU ======================= -->
          <?php else: ?>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/student_controller.php?action=dashboard">Dashboard</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/student_controller.php?action=profile">Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/student_controller.php?action=notifications">Notifications</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/student_management/routes/student_controller.php?action=timetable">Timetable</a>
            </li>

          <?php endif; ?>
        <?php endif; ?>

      </ul>

      <!-- ======================= USER INFO + LOGOUT ======================= -->
      <div class="d-flex align-items-center">

        <?php if (isset($_SESSION['user'])): ?>
        
          <span class="navbar-text text-white me-3">
            <?php echo e($_SESSION['user']['username']) . ' (' . e($_SESSION['user']['role_name']) . ')'; ?>
          </span>

          <a class="btn btn-outline-light btn-sm" href="/student_management/templates/logout.php">Đăng Xuất</a>

        <?php else: ?>

          <a class="btn btn-outline-light btn-sm me-2" href="/student_management/templates/login.php">Đăng Nhập</a>
          <a class="btn btn-light btn-sm" href="/student_management/templates/register.php">Đăng Ký</a>

        <?php endif; ?>

      </div>

    </div>

  </div>
</nav>

<div class="container">
