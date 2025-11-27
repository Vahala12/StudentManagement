<?php include __DIR__ . '/../header.php'; ?>

<h2>Thời khóa biểu</h2>

<?php if (empty($timetables)): ?>

    <p>Chưa có dữ liệu thực — bạn có thể bổ sung bảng timetable sau.</p>

<?php else: ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Lớp</th>
            <th>Ngày</th>
            <th>Môn</th>
            <th>Thời gian</th>
            <th>Phòng</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($timetables as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['class_name']) ?></td>
            <td><?= htmlspecialchars($row['day_of_week']) ?></td>
            <td><?= htmlspecialchars($row['subject']) ?></td>
            <td><?= htmlspecialchars($row['time_range']) ?></td>
            <td><?= htmlspecialchars($row['room']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>
