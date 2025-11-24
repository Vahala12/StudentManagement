<?php include __DIR__ . '/../header.php'; ?>

<style>
    .page-title {
        font-size: 30px;
        font-weight: bold;
        color: #fff;
        margin-bottom: 25px;
    }

    .container-box {
        background: rgba(255,255,255,0.15);
        padding: 25px;
        width: 900px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        margin-bottom: 40px;
    }

    .form-row {
        display: flex;
        align-items: center;
        gap: 25px;
        flex-wrap: nowrap;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        color: #fff;
    }

    .form-group input {
        width: 220px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #bbb;
        font-size: 16px;
        background: rgba(255,255,255,0.9);
    }

    .btn-add {
        height: 45px;
        padding: 10px 24px;
        border-radius: 8px;
        border: none;
        background: #007bff;
        font-size: 16px;
        color: white;
        cursor: pointer;
        transition: 0.2s;
        margin-top: 24px;
    }

    table {
        width: 100%;
        margin-top: 30px;
        background: white;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    table th {
        background: #007bff;
        color: white;
        padding: 12px;
    }

    table td {
        padding: 10px;
        font-size: 16px;
    }

    table tr:nth-child(even) {
        background: #f4f4f4;
    }

    .delete-link {
        color: red;
        font-weight: bold;
        text-decoration: none;
        font-size: 18px;
    }
</style>

<div class="page-title">Quản lý Giáo viên</div>

<div class="container-box">

    <form method="POST">
        <div class="form-row">

            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" name="name" placeholder="Nhập tên giáo viên..." required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Nhập email..." required>
            </div>

            <button type="submit" name="create_teacher" class="btn-add">Thêm</button>

        </div>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Xóa</th>
        </tr>

        <?php foreach ($teachers as $t): ?>
            <tr>
                <td><?= $t['id'] ?></td>
                <td><?= $t['full_name'] ?></td>
                <td><?= $t['email'] ?></td>
                <td>
                    <a class="delete-link"
                       href="/student_management/routes/admin_controller.php?action=manage_teachers&delete_id=<?= $t['id'] ?>">
                        X
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<?php include __DIR__ . '/../footer.php'; ?>
