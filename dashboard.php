<?php include __DIR__ . '/../header.php'; ?>

<h3 class="role-dashboard">Trang Admin</h3>
<p class="hello-name">Chào <strong><?php echo $_SESSION['user']['username']; ?></strong></p>

<div class="row">

    <!-- Quản lý Users -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Quản lý Users</h5>
                <a class="btn btn-primary btn-sm" 
                   href="/student_management/routes/admin_controller.php?action=manage_users">Xem</a>
            </div>
        </div>
    </div>

    <!-- Quản lý Sinh viên -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Quản lý Sinh viên</h5>
                <a class="btn btn-primary btn-sm" 
                   href="/student_management/routes/admin_controller.php?action=manage_students">Xem</a>
            </div>
        </div>
    </div>

    <!-- Quản lý Môn học -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Quản lý Môn học</h5>
                <a class="btn btn-primary btn-sm" 
                   href="/student_management/routes/admin_controller.php?action=manage_subjects">Xem</a>
            </div>
        </div>
    </div>

    <!-- Quản lý Lớp -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Quản lý Lớp</h5>
                <a class="btn btn-primary btn-sm" 
                   href="/student_management/routes/admin_controller.php?action=manage_classes">Xem</a>
            </div>
        </div>
    </div>

    <!-- Quản lý Giáo viên -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Quản lý Giáo viên</h5>
                <a class="btn btn-primary btn-sm" 
                   href="/student_management/routes/admin_controller.php?action=manage_teachers">Xem</a>
            </div>
        </div>
    </div>

    <!-- Phân công Giáo viên (ĐÃ SỬA: đưa vào col-md-4) -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Phân công Giáo viên</h5>
                <a href="/student_management/routes/admin_controller.php?action=assign_teacher" 
                   class="btn btn-primary btn-sm">Xem</a>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/../footer.php'; ?>
