<?php
$title = "Quản lý User - Admin";

// Lấy danh sách users từ controller
// Biến $users được truyền vào từ routes/admin_controller.php

ob_start(); // bắt đầu ghi nội dung
?>

<div class="container">
  <h2 class="mb-4">Trang quản trị Admin</h2>
  <div class="mb-3">
    <a href="../routes/admin_controller.php?action=manage_users" class="btn btn-primary btn-sm">Quản lý tài khoản</a>
    <a href="../templates/admin/add_user.php" class="btn btn-success btn-sm">Thêm tài khoản</a>
    <a href="../templates/logout.php" class="btn btn-secondary btn-sm">Đăng xuất</a>
  </div>

  <ul class="list-group">
    <?php if (!empty($users)) : ?>
      <?php foreach ($users as $u) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong><?php echo htmlspecialchars($u['username']); ?></strong>
            <span class="text-muted">— <?php echo htmlspecialchars($u['role']); ?></span>
          </div>
          <form action="../routes/admin_controller.php?action=delete_user&id=<?php echo $u['id']; ?>" method="post" onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản này không?');">
            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
          </form>
        </li>
      <?php endforeach; ?>
    <?php else : ?>
      <li class="list-group-item">Chưa có tài khoản nào.</li>
    <?php endif; ?>
  </ul>
</div>
<?php
$content = ob_get_clean();
include '../layout.php';
?>
<link rel="stylesheet" href="style.css">

