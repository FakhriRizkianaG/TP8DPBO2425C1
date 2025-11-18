<?php 
require_once './views/templates/header.php'; 
// Asumsi $data['subject'] berisi data mata kuliah, dan $data['lecturers'] berisi semua dosen
$subject = $data['subject']; 
$lecturers = $data['lecturers'];
?>

<div class="col-lg-6 m-auto">
    <h2 class="text-center my-4">✏️ Edit Mata Kuliah</h2>

    <form method="post" action="index.php?url=home/update"> 
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="text-white text-center">Update Mata Kuliah</h4>
            </div><br>

            <input type="hidden" name="id" value="<?php echo $subject['ID']; ?>" class="form-control"> <br>

            <label> NAME: </label>
            <input type="text" name="name" value="<?php echo $subject['NAME']; ?>" class="form-control" required> <br>

            <label> SKS: </label>
            <input type="number" name="sks" value="<?php echo $subject['SKS']; ?>" class="form-control" min="1" max="6" required> <br>

            <label> Dosen Pengampu: </label>
            <select name="lecturer_id" class="form-control">
                <option value="NULL">-- Pilih Dosen (Opsional) --</option>
                <?php foreach ($lecturers as $lecturer) : ?>
                    <?php 
                        // Tambahkan atribut 'selected' jika ID dosen saat ini sama dengan LECTURER_ID di subyek
                        $selected = ($lecturer['ID'] == $subject['LECTURER_ID']) ? 'selected' : ''; 
                    ?>
                    <option value="<?php echo $lecturer['ID']; ?>" <?php echo $selected; ?>>
                        <?php echo $lecturer['NAME'] . " (" . $lecturer['NIDN'] . ")"; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <button class="btn btn-success" type="submit" name="submit">Update Data</button><br>
            <a class="btn btn-info" href="index.php?url=home/index">Batal</a><br>
        </div>
    </form>
</div>

<?php require_once './views/templates/footer.php'; ?>