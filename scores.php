<?php include __DIR__ . '/../header.php'; ?>

<div class="container py-4">
    <h2 class="mb-4 text-center">Nhập điểm cho sinh viên</h2>

    <!-- Form nhập điểm -->
    <form method="POST" action="">
        <div class="mb-3">
            <label for="student_name" class="form-label">Tên sinh viên</label>
            <input id="student_name" name="student_name" class="form-control" placeholder="Nhập tên sinh viên" list="student_list" required>
            <datalist id="student_list">
                <?php foreach ($students as $s): ?>
                    <option value="<?= htmlspecialchars($s['full_name']) ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Môn học</label>
            <input id="subject" name="subject_name" class="form-control" placeholder="Nhập tên môn học" required>
        </div>

        <div class="mb-3">
            <label for="midterm" class="form-label">Giữa kỳ</label>
            <input id="midterm" name="midterm" type="number" step="0.1" min="0" max="10" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="final" class="form-label">Cuối kỳ</label>
            <input id="final" name="final" type="number" step="0.1" min="0" max="10" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Lưu điểm</button>
    </form>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger mt-3">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>
</div>

<hr>

<h3 class="text-center mb-3">Danh sách điểm đã nhập</h3>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>Tên sinh viên</th>
                <th>Môn học</th>
                <th>Giữa kỳ</th>
                <th>Cuối kỳ</th>
                <th>Trung bình</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $sc): ?>
            <tr>
                <td><?= htmlspecialchars($sc['student_name']) ?></td>
                <td><?= htmlspecialchars($sc['subject']) ?></td>
                <td><?= $sc['midterm'] ?></td>
                <td><?= $sc['final'] ?></td>
                <td><?= round(($sc['midterm'] + $sc['final']) / 2, 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
