<?php require_once VIEW_PATH . '/templates/header.php';
$subjects = $data['subjects'];
?>

<div class="col-1 my-3">
    <a type="button" class="btn btn-primary nav-link active" href="index.php?url=home/create">Add New Subject</a>
</div>
<h2>Daftar Mata Kuliah (HOME)</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME (Mata Kuliah)</th>
            <th>SKS</th>
            <th>LECTURER NAME</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($subjects)): ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada data mata kuliah.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($subjects as $row) : ?>
            <tr>
                <th><?php echo $row['ID']; ?></th>
                <td><?php echo $row['NAME']; ?></td>
                <td><?php echo $row['SKS']; ?></td>
                <td>
                    <?php echo $row['LECTURER_NAME'] ?? 'Belum Ditentukan'; ?>
                </td>
                <td>
                    <a class='btn btn-sm btn-success' href='index.php?url=home/edit/<?php echo $row['ID']; ?>'>Edit</a>
                    <a class='btn btn-sm btn-danger' href='index.php?url=home/delete/<?php echo $row['ID']; ?>' onclick="return confirm('Yakin ingin menghapus <?php echo $row['NAME']; ?>?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once VIEW_PATH . '/templates/footer.php'; ?>