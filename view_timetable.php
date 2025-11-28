<?php include __DIR__ . '/../header.php'; ?>

<h2>Thời khóa biểu</h2>

<table class="table table-bordered">
    <tr>
        <th>Lớp</th>
        <th>Ngày</th>
        <th>Môn</th>
        <th>Giờ</th>
        <th>Phòng</th>
    </tr>

    <?php foreach ($timetables as $t): ?>
        <tr>
            <td><?= htmlspecialchars($t['class_name']) ?></td>
            <td><?= htmlspecialchars($t['day_of_week']) ?></td>
            <td><?= htmlspecialchars($t['subject']) ?></td>
            <td><?= htmlspecialchars($t['time_range']) ?></td>
            <td><?= htmlspecialchars($t['room']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include __DIR__ . '/../footer.php'; ?>
