<?php include __DIR__ . '/../header.php'; ?>

<h2>Thông Báo</h2>

<?php if (empty($notifs)): ?>
    <div class="alert alert-info">Không có thông báo nào.</div>

<?php else: ?>
    <ul class="list-group">
        <?php foreach ($notifs as $n): ?>
            <li class="list-group-item">
                <strong><?php echo e($n['title']); ?></strong><br>
                <?php echo e($n['content']); ?><br>
                <small class="text-muted"><?php echo $n['created_at']; ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>
