<?php
// templates/teacher/dashboard.php
include __DIR__ . '/../header.php';
?>
<link rel="stylesheet" href="style.css">
<h3 class="role-dashboard">Teacher Dashboard</h3>

<div class="mb-3">
  <a class="btn btn-primary" href="/student_management/routes/teacher_controller.php?action=add_score">Add Score</a>
  <a class="btn btn-secondary" href="/student_management/routes/teacher_controller.php?action=view_students">View Students</a>
</div>

<h5>All Scores</h5>
<table class="table table-sm">
  <thead>
    <tr>
      <th>STT</th>
      <th>Sinh viên</th>
      <th>Môn học</th>
      <th>Giữa kỳ</th>
      <th>Cuối kỳ</th>
      <th>Trung bình</th>
      <th>Thời gian</th>
      <th>Hành động</th>
    </tr>
  </thead>

  <tbody>
    <?php 
    $i = 1;
    foreach ($scores as $sc): 
      $avg = round(($sc['midterm'] + $sc['final']) / 2, 2);
    ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= htmlspecialchars($sc['student_name']) ?></td>
        <td><?= htmlspecialchars($sc['subject']) ?></td>
        <td><?= $sc['midterm'] ?></td>
        <td><?= $sc['final'] ?></td>
        <td><?= $avg ?></td>
        <td><?= $sc['created_at'] ?></td>
        <td>
          <a class="btn btn-danger btn-sm" 
             href="/student_management/routes/teacher_controller.php?action=dashboard&delete_id=<?= $sc['id']; ?>" 
             onclick="return confirm('Xóa?')">
             Delete
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../footer.php'; ?>
