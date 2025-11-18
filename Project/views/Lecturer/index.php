<?php require_once VIEW_PATH . '/templates/header.php'; ?>

<div class="col-1 my-3">
    <a type="button" class="btn btn-primary nav-link active" href="index.php?url=lecturer/create">Add New Lecturer</a>
</div>
<h2>Daftar Dosen</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>NIDN</th>
            <th>PHONE</th>
            <th>JOIN DATE</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['lecturers'] as $row) : ?>
        <tr>
            <th><?php echo $row['ID']; ?></th>
            <td><?php echo $row['NAME']; ?></td>
            <td><?php echo $row['NIDN']; ?></td>
            <td><?php echo $row['PHONE']; ?></td>
            <td><?php echo $row['JOIN_DATE']; ?></td>
            <td>
                <a class='btn btn-sm btn-success' href='index.php?url=lecturer/edit/<?php echo $row['ID']; ?>'>Edit</a>
                <a class='btn btn-sm btn-danger' href='index.php?url=lecturer/delete/<?php echo $row['ID']; ?>' onclick="return confirm('Yakin menghapus dosen <?php echo $row['NAME']; ?>?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once VIEW_PATH . '/templates/footer.php'; ?>