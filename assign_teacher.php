<?php include __DIR__ . '/../header.php'; ?>

<style>
    body {
        background: linear-gradient(135deg, #6bb8ff, #1a33a8);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", sans-serif;
    }

    .page-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .content-box {
        width: 90%;
        max-width: 500px;
        margin-top: 40px;
    }

    .card {
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        border: none;
        transition: .25s;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.22);
    }

    .form-select, .form-control {
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 17px;
        border: 2px solid #d9e6ff;
    }

    table th {
        background: #111 !important;
        color: #fff !important;
        font-size: 17px;
    }

    table td {
        font-size: 16px;
        background: #ffffffd8 !important;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1a73e8, #0053c7);
        border: none;
        border-radius: 12px;
        font-size: 18px;
    }
</style>

<div class="page-wrapper">
    <div class="content-box">

        <h3 class="text-center mb-4 fw-bold text-white">Phân công giáo viên cho lớp</h3>

        <!-- FLASH MESSAGE -->
        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="alert alert-success text-center fw-bold">
                <?= $_SESSION['flash_success'] ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['flash_error'])): ?>
            <div class="alert alert-danger text-center fw-bold">
                <?= $_SESSION['flash_error'] ?>
            </div>
            <?php unset($_SESSION['flash_error']); ?>
        <?php endif; ?>

        <!-- FORM PHÂN CÔNG -->
        <div class="card p-4 mb-4">
            <h4 class="text-center mb-4">Chọn lớp & giáo viên</h4>

            <form action="/student_management/routes/assign_teacher_controller.php?action=assign"
                  method="POST" class="row g-3">

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Lớp</label>
                    <select name="class_id" class="form-select" required>
                        <option value="">-- Chọn lớp --</option>

                        <?php foreach ($classes as $c): ?>
                            <option value="<?= $c['id'] ?>">
                                <?= $c['class_name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Giáo viên</label>
                    <select name="teacher_id" class="form-select" required>
                        <option value="">-- Chọn giáo viên --</option>

                        <?php foreach ($teachers as $t): ?>
                            <option value="<?= $t['id'] ?>">
                                <?= $t['full_name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="col-md-12 d-grid mt-3">
                    <button type="submit" class="btn btn-primary py-3">
                        ✔ Phân công
                    </button>
                </div>
            </form>
        </div>

        <!-- BẢNG DANH SÁCH PHÂN CÔNG -->
        <div class="card p-4">
            <h4 class="text-center mb-4">Danh sách phân công</h4>

            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>ID Lớp</th>
                        <th>Tên lớp</th>
                        <th>Giáo viên</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classes as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td class="fw-semibold"><?= $c['class_name'] ?></td>
                            <td>
                                <?= !empty($c['teacher_name']) 
                                    ? $c['teacher_name'] 
                                    : "<i style='color:gray'>Chưa phân công</i>" ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
