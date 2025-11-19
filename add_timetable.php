<?php include __DIR__ . '/../header.php'; ?>

<h2>Thêm thời khóa biểu</h2>

<form action="/student_management/routes/timetable_controller.php?action=add" method="POST" class="form_box">

    <label>Lớp học:</label>
    <input type="text" name="class_name" required placeholder="VD: CNTT1">

    <label>Ngày trong tuần:</label>
    <select name="day_of_week" required>
        <option value="Thứ 2">Thứ 2</option>
        <option value="Thứ 3">Thứ 3</option>
        <option value="Thứ 4">Thứ 4</option>
        <option value="Thứ 5">Thứ 5</option>
        <option value="Thứ 6">Thứ 6</option>
        <option value="Thứ 7">Thứ 7</option>
    </select>

    <label>Môn học:</label>
    <input type="text" name="subject" required>

    <label>Thời gian:</label>
    <input type="text" name="time_range" required placeholder="VD: 7:30 - 9:30">

    <label>Phòng học:</label>
    <input type="text" name="room" required placeholder="VD: B1">

    <button type="submit">Thêm thời khóa biểu</button>

</form>

<?php include __DIR__ . '/../footer.php'; ?>
