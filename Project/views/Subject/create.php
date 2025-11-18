<?php 
require_once './views/templates/header.php'; 
// Asumsi $data['lecturers'] berisi semua dosen dari LecturerModel
$lecturers = $data['lecturers']; 
?>

<div class="col-lg-6 m-auto">
    <h2 class="text-center my-4">➕ Tambah Mata Kuliah Baru</h2>
    
    <form method="post" action="index.php?url=home/store"> 
        <div class="card">
            <div class="card-header bg-success">
                <h4 class="text-white text-center">Data Mata Kuliah</h4>
            </div><br>

            <label> NAME: </label>
            <input type="text" name="name" class="form-control" required> <br>

            <label> SKS: </label>
            <input type="number" name="sks" class="form-control" min="1" max="6" required> <br>

            <label> Dosen Pengampu: </label>
            <select name="lecturer_id" class="form-control">
                <option value="NULL">-- Pilih Dosen (Opsional) --</option>
                <?php foreach ($lecturers as $lecturer) : ?>
                    <option value="<?php echo $lecturer['ID']; ?>">
                        <?php echo $lecturer['NAME'] . " (" . $lecturer['NIDN'] . ")"; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <button class="btn btn-success" type="submit" name="submit">Simpan</button><br>
            <a class="btn btn-info" href="index.php?url=home/index">Batal</a><br>
        </div>
    </form>
</div>

<?php require_once './views/templates/footer.php'; ?>