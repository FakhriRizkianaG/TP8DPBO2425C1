<?php 
require_once './views/templates/header.php'; 
// Asumsi $data['lecturer'] berisi data dosen yang akan diedit dari Controller
$lecturer = $data['lecturer'];
?>

<div class="col-lg-6 m-auto">
    <h2 class="text-center my-4">✏️ Edit Data Dosen</h2>

    <form method="post" action="index.php?url=lecturer/update"> 
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="text-white text-center">Update Data Dosen</h4>
            </div><br>

            <input type="hidden" name="id" value="<?php echo $lecturer['ID']; ?>" class="form-control"> <br>

            <label> NAME: </label>
            <input type="text" name="name" value="<?php echo $lecturer['NAME']; ?>" class="form-control" required> <br>

            <label> NIDN: </label>
            <input type="text" name="nidn" value="<?php echo $lecturer['NIDN']; ?>" class="form-control" required> <br>

            <label> PHONE: </label>
            <input type="text" name="phone" value="<?php echo $lecturer['PHONE']; ?>" class="form-control" required> <br>

            <label> JOIN DATE: </label>
            <input type="date" name="join_date" value="<?php echo $lecturer['JOIN_DATE']; ?>" class="form-control" required> <br>

            <button class="btn btn-success" type="submit" name="submit">Update Data</button><br>
            <a class="btn btn-info" href="index.php?url=lecturer/index">Batal</a><br>
        </div>
    </form>
</div>

<?php require_once './views/templates/footer.php'; ?>