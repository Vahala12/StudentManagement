<?php include __DIR__ . '/../header.php'; ?>

<style>
    body {
        color: #fff;
        font-family: "Segoe UI", sans-serif;
    }

    .page-title {
        font-size: 32px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 25px;
        color: #fff;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .container-box {
        background: rgba(255,255,255,0.15);
        padding: 30px;
        width: 700px;
        margin: 0 auto;
        border-radius: 18px;
        backdrop-filter: blur(10px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.25);
    }

    label {
        font-size: 18px;
        font-weight: 500;
        color: #fff;
        display: inline-block;
        width: 100px;
        margin-top: 8px;
    }

    input[type="text"] {
        width: 300px;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #aaa;
        font-size: 16px;
        margin-right: 20px;
    }

    button {
        padding: 12px 26px;
        border-radius: 10px;
        border: none;
        background: #0d6efd;
        font-size: 17px;
        color: white;
        cursor: pointer;
        transition: 0.2s;
        font-weight: bold;
    }

    button:hover {
        background: #0a58ca;
    }

    table {
        width: 100%;
        margin-top: 35px;
        background: white;
        border-collapse: collapse;
        border-radius: 12px;
        overflow: hidden;
        color: #000;
    }

    table th {
        background: #0d6efd;
        color: white;
        padding: 14px;
        font-size: 17px;
    }

    table td {
        padding: 12px;
        font-size: 16px;
    }

    table tr:nth-child(even) {
        background: #f5f5f5;
    }

    .delete-link {
        color: red;
        font-weight: bold;
        text-decoration: none;
        font-size: 19px;
    }

    .delete-link:hover {
        color: darkred;
        text-decoration: underline;
    }
</style>

<div class="page-title">Quản lý Lớp</div>

<div class="container-box">

    <!-- Form thêm lớp -->
    <form method="POST">
        <label>Tên lớp</label>
        <input type="text" name="class_name" placeholder="Nhập tên lớp..." required>

        <button type="submit" name="create_class">Thêm</button>
    </form>

    <!-- Bảng danh sách lớp -->
    <table>
        <tr>
            <th>ID</th>
            <th>Tên lớp</th>
            <th>Xóa</th>
        </tr>

        <?php foreach ($classes as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['class_name'] ?></td> <!-- ĐÃ SỬA -->
                <td>
                    <a class="delete-link"
                       href="/student_management/routes/admin_controller.php?action=manage_classes&delete_id=<?= $c['id'] ?>"
                       onclick="return confirm('Bạn có chắc muốn xóa lớp này không?')">
                       X
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<?php include __DIR__ . '/../footer.php'; ?>
