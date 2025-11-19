<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?? "Hệ thống quản lý sinh viên"; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Thanh điều hướng -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="/student_management/">Quản lý sinh viên</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/student_management/routes/admin_controller.php?action=dashboard">Admin</a></li>
        <li class="nav-item"><a class="nav-link" href="/student_management/routes/teacher_controller.php?action=dashboard">Giáo viên</a></li>
        <li class="nav-item"><a class="nav-link" href="/student_management/routes/student_controller.php?action=dashboard">Sinh viên</a></li>
      </ul>
    </div>
  </nav>

  <main class="container">
    <?php
      // vùng hiển thị nội dung chính
      if (isset($content)) echo $content;
      else echo "<p>Chưa có nội dung!</p>";
    ?>
  </main>

  <footer class="text-center mt-4 text-muted">
    <p>© 2025 Hệ thống quản lý sinh viên</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
