<?php
// templates/login.php
session_start();
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/User.php';

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $err = 'Nhập username và password';
    } else {
        $user = User::attempt($username, $password);

        if ($user) {

            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role_name' => $user['role_name']
            ];

            // Redirect theo role
            if ($_SESSION['user']['role_name'] === 'admin') {
                header('Location: ../routes/admin_controller.php?action=dashboard');
            } elseif ($_SESSION['user']['role_name'] === 'teacher') {
                header('Location: ../routes/teacher_controller.php?action=dashboard');
            } else {
                header('Location: ../routes/student_controller.php?action=dashboard');
            }
            exit;
        } else {
            $err = 'Sai thông tin đăng nhập';
        }
    }
}

include __DIR__ . '/header.php';
?>
<link rel="stylesheet" href="style.css">

<!-- ===========================
     KHỐI LOGIN CĂN GIỮA TOÀN MÀN HÌNH
=========================== -->
<div class="login-page">

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Đăng nhập</h4>

            <?php if ($err): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($err); ?></div>
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

                <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
                <a href="register.php" class="btn btn-link">Đăng ký</a>
            </form>
        </div>
    </div>

</div>

<?php include __DIR__ . '/footer.php'; ?>
