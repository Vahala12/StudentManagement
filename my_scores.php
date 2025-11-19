<?php include '../header.php'; ?>

<h2>Điểm của tôi</h2>

<table border="1">
<tr><th>Môn</th><th>Điểm</th></tr>

<?php foreach($scores as $s): ?>
<tr>
    <td><?= $s['subject_name'] ?></td>
    <td><?= $s['score'] ?></td>
</tr>
<?php endforeach; ?>

</table>

<?php include '../footer.php'; ?>
