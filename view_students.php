<?php
// templates/teacher/view_students.php
include __DIR__ . '/../header.php';
?>
<h3>Danh sách sinh viên</h3>
<table class="table table-striped">
  <thead><tr><th>STT</th><th>Họ Và Tên</th><th>Mã Số Sinh Viên</th><th>Lớp</th><th>Ngành</th></tr></thead>
  <tbody>
    <?php foreach ($students as $s): ?>
      <tr>
        <td><?php echo $s['id']; ?></td>
        <td><?php echo e($s['full_name']); ?></td>
        <td><?php echo e($s['student_code']); ?></td>
        <td><?php echo e($s['class_name']); ?></td>
        <td><?php echo e($s['major']); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include __DIR__ . '/../footer.php'; ?>
