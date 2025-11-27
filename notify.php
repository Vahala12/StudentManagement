<?php include __DIR__ . '/../header.php'; ?>

<h2 class="mb-3">Gửi thông báo</h2>

<?php if (!empty($message)): ?>
    <div class="alert alert-success"><?php echo $message; ?></div>
<?php endif; ?>

<form method="post">

    <!-- Nhập tên sinh viên + datalist -->
    <div class="mb-3">
        <label class="form-label">Tên sinh viên</label>
        <input 
            type="text" 
            name="student_name" 
            class="form-control" 
            placeholder="Nhập tên sinh viên" 
            list="student_list" 
            required
        >
        <datalist id="student_list">
            <?php foreach ($students as $s): ?>
                <option value="<?php echo htmlspecialchars($s['full_name']); ?>">
            <?php endforeach; ?>
        </datalist>
    </div>

    <!-- Nội dung thông báo -->
    <div class="mb-3">
        <label class="form-label">Nội dung</label>
        <textarea 
            name="content" 
            class="form-control" 
            rows="4" 
            required
        ></textarea>
    </div>

    <button class="btn btn-primary">Gửi thông báo</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>
