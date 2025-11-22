<?php
// templates/admin/manage_students.php
include __DIR__ . '/../header.php';
?>
<h3>Quản lý Students</h3>

<table class="table table-bordered">
  <thead><tr><th>STT</th><th>Tên</th><th>Họ Và Tên</th><th>Mã số sinh viên</th><th>Lớp</th><th>Ngành</th><th></th></tr></thead>
  <tbody>
    <?php foreach ($students as $s): ?>
      <tr>
        <td><?php echo $s['id']; ?></td>
        <td><?php echo e($s['username']); ?></td>
        <td><?php echo e($s['full_name']); ?></td>
        <td><?php echo e($s['student_code']); ?></td>
        <td><?php echo e($s['class_name']); ?></td>
        <td><?php echo e($s['major']); ?></td>
        <td>
          <a class="btn btn-danger btn-sm" href="/student_management/routes/admin_controller.php?action=manage_students&delete_id=<?php echo $s['id']; ?>" onclick="return confirm('Xóa student?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../footer.php'; ?>
