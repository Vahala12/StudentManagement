<?php
// templates/teacher/add_score.php
include __DIR__ . '/../header.php';
?>
<h3>Thêm điểm</h3>
<form method="post" class="row g-3">
  <div class="col-md-4">
    <label for="student_name" class="form-label">Tên học sinh</label>
    <input name="student_name" id="student_name" class="form-control" placeholder="Nhập tên học sinh" required>
  </div>
  <div class="col-md-3">
    <label for="subject_name" class="form-label">Môn học</label>
    <input name="subject_name" id="subject_name" class="form-control" placeholder="Nhập tên môn học" required>
  </div>
  <div class="col-md-2">
    <label for="midterm" class="form-label">Điểm giữa kỳ</label>
    <input name="midterm" id="midterm" type="number" step="0.01" min="0" max="10" class="form-control" placeholder="0.00" required>
  </div>
  <div class="col-md-2">
    <label for="final" class="form-label">Điểm cuối kỳ</label>
    <input name="final" id="final" type="number" step="0.01" min="0" max="10" class="form-control" placeholder="0.00" required>
  </div>
  <div class="col-12">
    <button class="btn btn-success">Lưu điểm</button>
    <a class="btn btn-secondary" href="/student_management/routes/teacher_controller.php?action=dashboard">Quay lại</a>
  </div>
</form>
<?php include __DIR__ . '/../footer.php'; ?>
