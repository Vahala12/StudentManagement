<?php include __DIR__ . '/../header.php'; ?>

<h3 class="role-dashboard">Thời khóa biểu</h3>

<?php if (!empty($timetable)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Thứ</th>
                <th>Môn</th>
                <th>Giờ học</th>
                <th>Phòng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timetable as $tt): ?>
                <tr>
                    <td><?= htmlspecialchars($tt['day_of_week']) ?></td>
                    <td><?= htmlspecialchars($tt['subject']) ?></td>
                    <td><?= htmlspecialchars($tt['time_range']) ?></td>
                    <td><?= htmlspecialchars($tt['room']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Chưa có thời khóa biểu.</p>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>
