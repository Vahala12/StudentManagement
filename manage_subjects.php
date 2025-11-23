<?php include __DIR__ . '/../header.php'; ?>

<style>
    .page-title {
        font-size: 30px;
        font-weight: bold;
        color: #fff;
        margin-bottom: 20px;
    }

    .container-box {
        background: rgba(255,255,255,0.15);
        padding: 25px;
        width: 600px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    label {
        font-size: 18px;
        color: #fff;
        margin-right: 10px;
    }

    input[type="text"] {
        width: 300px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #888;
        font-size: 16px;
    }

    button {
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        background: #007bff;
        font-size: 16px;
        color: white;
        cursor: pointer;
        margin-left: 10px;
        transition: 0.2s;
    }

    button:hover {
        background: #0062cc;
    }

    table {
        width: 100%;
        margin-top: 20px;
        background: white;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    table th {
        background: #007bff;
        color: white;
        padding: 12px;
        font-size: 16px;
    }

    table td {
        padding: 10px;
        font-size: 16px;
    }

    table tr:nth-child(even) {
        background: #f2f2f2;
    }

    .delete-link {
        color: red;
        font-weight: bold;
        text-decoration: none;
        font-size: 18px;
    }

    .delete-link:hover {
        text-decoration: underline;
        color: darkred;
    }
</style>


<div class="page-title">Quản lý môn học</div>

<div class="container-box">

    <!-- Form thêm môn học -->
    <form method="POST">
        <label>Tên môn</label>
        <input type="text" name="name" placeholder="Nhập tên môn..." required>
        <button type="submit" name="create_subject">Thêm</button>
    </form>

    <!-- Bảng danh sách môn học -->
    <table>
        <tr>
            <th>ID</th>
            <th>Tên môn</th>
            <th>Xóa</th>
        </tr>

        <?php foreach ($subjects as $s): ?>
            <tr>
                <td><?= $s['id'] ?></td>
                <td><?= $s['name'] ?></td>
                <td>
                    <a class="delete-link"
                       href="/student_management/routes/admin_controller.php?action=manage_subjects&delete_id=<?= $s['id'] ?>">
                       X
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<?php include __DIR__ . '/../footer.php'; ?>
