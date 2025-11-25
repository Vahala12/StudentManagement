<?php
// templates/admin/manage_users.php
include __DIR__ . '/../header.php';
?>

<h3>Quản lý Users</h3>

<?php if (isset($msg)): ?>
  <div class="alert alert-info"><?php echo e($msg); ?></div>
<?php endif; ?>

<!-- FORM TẠO USER (1 HÀNG NGANG, KHÔNG CÓ Ô TRẮNG) -->
<form method="post" class="user-form-row mb-4">
    <input type="hidden" name="create_user" value="1">

    <input 
        type="text" 
        class="form-control" 
        name="username" 
        placeholder="username"
        required
    >

    <input 
        type="password" 
        class="form-control" 
        name="password" 
        placeholder="password"
        required
    >

    <input 
        type="email" 
        class="form-control" 
        name="email" 
        placeholder="email"
    >

    <select class="form-control" name="role_id">
        <?php foreach ($roles as $r): ?>
            <option value="<?php echo $r['id']; ?>">
                <?php echo e($r['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn btn-success">
        Tạo
    </button>
</form>


<!-- BẢNG DANH SÁCH USER -->
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên đăng nhập</th>
      <th>Email</th>
      <th>Vai trò</th>
      <th>Ngày tạo</th>
      <th>Hành động</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($users as $u): ?>
      <tr>
        <td><?php echo $u['id']; ?></td>
        <td><?php echo e($u['username']); ?></td>
        <td><?php echo e($u['email']); ?></td>
        <td><?php echo e($u['role_name'] ?? $u['role']); ?></td>
        <td><?php echo e($u['created_at'] ?? ''); ?></td>
        <td>
          <?php if ($u['id'] != $_SESSION['user']['id']): ?>
            <a class="btn btn-danger btn-sm"
               href="/student_management/routes/admin_controller.php?action=manage_users&delete_id=<?php echo $u['id']; ?>"
               onclick="return confirm('Xóa user?')">
               Delete
            </a>
          <?php else: ?>
            <span class="text-muted">You</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../footer.php'; ?>
