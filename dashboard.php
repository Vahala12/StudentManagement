<?php
// templates/student/dashboard.php
include __DIR__ . '/../header.php';
?>

<h3 class="role-dashboard">Trang Sinh Viên</h3>
<p class="hello-name">Xin chào <strong><?php echo e($_SESSION['user']['username']); ?></strong></p>

<div class="card mb-3">
  <div class="card-body">
    <h5>Thông tin sinh viên</h5>
    <?php if ($student): ?>
      <ul>
        <li>Họ tên: <?php echo e($student['full_name']); ?></li>
        <li>Mã SV: <?php echo e($student['student_code']); ?></li>
        <li>Lớp: <?php echo e($student['class_name']); ?></li>
        <li>Ngành: <?php echo e($student['major']); ?></li>
      </ul>
      <a class="btn btn-sm btn-primary" href="/student_management/routes/student_controller.php?action=profile">Sửa hồ sơ</a>
    <?php else: ?>
      <p>Chưa có hồ sơ. <a href="/student_management/routes/student_controller.php?action=profile">Tạo hồ sơ</a></p>
    <?php endif; ?>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5>Điểm</h5>
    <?php if (!empty($scores)): ?>
      <table class="table table-sm">
        <thead>
          <tr>
            <th>Môn học</th>
            <th>Giữa kỳ</th>
            <th>Cuối kỳ</th>
            <th>Trung bình</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($scores as $sc): ?>
            <?php $avg = round(($sc['midterm'] + $sc['final']) / 2, 2); ?>
            <tr>
              <td><?= e($sc['subject']); ?></td>
              <td><?= e($sc['midterm']); ?></td>
              <td><?= e($sc['final']); ?></td>
              <td><?= $avg; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Chưa có điểm.</p>
    <?php endif; ?>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
