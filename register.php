<?php
// templates/register.php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/Role.php';
require_once __DIR__ . '/../models/User.php';

$msg = '';
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $email    = trim($_POST['email'] ?? '');

    if ($username === '' || $password === '') {
        $err = 'Vui lòng nhập username và password!';
    } else {

        // Check username trùng
        $exists = User::findByUsername($username);
        if ($exists) {
            $err = 'Username đã tồn tại!';
        } else {

            // -----------------------------
            // AUTO ROLE FIRST USER = ADMIN
            // -----------------------------
            $totalUsers = User::countUsers();

            if ($totalUsers == 0) {
                $role = Role::findByName('admin');
            } else {
                $role = Role::findByName('student');
            }

            $role_id = $role['id'];

            // Tạo tài khoản
            $ok = User::create($username, $password, $email, $role_id);

            if ($ok) {
                $msg = 'Đăng ký thành công! Mời bạn đăng nhập.';
            } else {
                $err = 'Lỗi khi tạo tài khoản!';
            }
        }
    }
}

include __DIR__ . '/header.php';
?>

<link rel="stylesheet" href="style.css">

<!-- ===========================
     KHỐI REGISTER CĂN GIỮA
=========================== -->
<div class="register-page">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Đăng ký tài khoản</h4>

            <?php if ($err): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($err); ?></div>
            <?php endif; ?>

            <?php if ($msg): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($msg); ?></div>
            <?php endif; ?>

            <form method="post">

                <div class="mb-3">
                    <label>Username</label>
                    <input name="username" class="form-control"
                           value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control"
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>

                <button class="btn btn-success">Đăng ký</button>
                <a href="login.php" class="btn btn-link">Đăng nhập</a>

            </form>
        </div>
    </div>

</div>

<?php include __DIR__ . '/footer.php'; ?>
