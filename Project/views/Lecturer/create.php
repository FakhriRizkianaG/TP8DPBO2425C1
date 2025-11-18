<?php require_once './views/templates/header.php'; // Memuat Header/Navbar ?>

<div class="col-lg-6 m-auto">
    <h2 class="text-center my-4">➕ Tambah Dosen Baru</h2>
    
    <form method="post" action="index.php?url=lecturer/store"> 
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white text-center">Data Dosen</h4>
            </div><br>

            <label> NAME: </label>
            <input type="text" name="name" class="form-control" required> <br>

            <label> NIDN: </label>
            <input type="text" name="nidn" class="form-control" required> <br>

            <label> PHONE: </label>
            <input type="text" name="phone" class="form-control" required> <br>

            <label> JOIN DATE: </label>
            <input type="date" name="join_date" class="form-control" required> <br>

            <button class="btn btn-success" type="submit" name="submit">Simpan</button><br>
            <a class="btn btn-info" href="index.php?url=lecturer/index">Batal</a><br>
        </div>
    </form>
</div>

<?php require_once './views/templates/footer.php'; // Anggap ada file footer.php ?>