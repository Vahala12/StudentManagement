<?php
// templates/student/profile.php
include __DIR__ . '/../header.php';
?>
<h3>Hồ sơ sinh viên</h3>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label>Họ tên</label>
    <input name="full_name" class="form-control" value="<?php echo e($student['full_name'] ?? ''); ?>" required>
  </div>
  <div class="col-md-3">
    <label>Mã SV</label>
    <input name="student_code" class="form-control" value="<?php echo e($student['student_code'] ?? ''); ?>" required>
  </div>
  <div class="col-md-3">
    <label>Lớp</label>
    <input name="class_name" class="form-control" value="<?php echo e($student['class_name'] ?? ''); ?>">
  </div>
  <div class="col-md-4">
    <label>Ngành</label>
    <input name="major" class="form-control" value="<?php echo e($student['major'] ?? ''); ?>">
  </div>
  <div class="col-md-2">
    <label>Ngày sinh</label>
    <input name="dob" type="date" class="form-control" value="<?php echo e($student['dob'] ?? ''); ?>">
  </div>
  <div class="col-md-3">
    <label>Số Điện Thoại</label>
    <input name="phone" class="form-control" value="<?php echo e($student['phone'] ?? ''); ?>">
  </div>
  <div class="col-12">
    <label>Địa chỉ</label>
    <textarea name="address" class="form-control"><?php echo e($student['address'] ?? ''); ?></textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-secondary" href="/student_management/routes/student_controller.php?action=dashboard">Quay lại</a>
  </div>
</form>

<?php include __DIR__ . '/../footer.php'; ?>
