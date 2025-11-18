# TP8DPBO2425C1
TP 8 Frizkia (Fakhri Rizkiana)

# Janji
Saya Fakhri Rizkiana Sya'ban Kusnendar dengan NIM 2405534 mengerjakan<br> 
TP 6 dalam mata kuliah Desain dan Pemrograman<br>
Berorientasi Objek untuk keberkahanNya maka saya tidak<br>
melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.<br>

# Penjelasan Program
Ceritanya anda adalah seorang operator di suatu kamupus yang bertanggung jawab menambah data dosen dan mata kuliah, anda juga bertugas untuk meng-assigned dosen ke tiap mata kuliah.

# Alur Program
<ol>
  <li>
    Titik Masuk (Front Controller): index.php<br>
    <ul>
      <li>Semua permintaan URL (misalnya, index.php?url=lecturer/edit/5) pertama kali masuk ke file ini.</li>
          <li>index.php menganalisis URL untuk menentukan Controller mana (lecturer atau home) dan Method/Action mana (index, create, edit, dll.) yang harus dipanggil, serta     parameter (ID) apa yang diteruskan.</li>
      <li>index.php mendefinisikan jalur absolut (ROOT_PATH, APP_PATH) untuk memastikan require_once tidak gagal.</li>
    </ul>
  </li>
  <li>
    Pemanggilan Controller<br>
    <ul>
      <li>index.php memuat Controller yang relevan (misalnya, Lecturer.php).</li>
      <li>Controller memproses logika aplikasi:<br>
          <ul>
            <li>Jika itu adalah permintaan Read, Controller memanggil Model untuk mengambil data.</li>
            <li>Jika itu adalah permintaan Create/Update/Delete (CUD), Controller mengambil data dari $_POST atau $_GET dan memanggil Model untuk memanipulasi data di database.</li>
          </ul>
      </li>
    </ul>
  </li>
  <li>
    Interaksi Model<br>
    <ul>
      <li>Controller memanggil fungsi di Model (LecturerModel.php atau SubjectModel.php).</li>
      <li>Model berinteraksi dengan Database (Database.php) untuk menjalankan query SQL (INSERT, SELECT, UPDATE, DELETE).</li>
    </ul>
  </li>
  <li>
    Tampilan View<br>
    <ul>
      <li>Setelah Controller mendapatkan data dari Model (untuk Read/Edit) atau setelah operasi CUD berhasil, Controller memuat View yang sesuai.</li>
      <li>View (file .php di folder /views/) menggunakan data yang dilewatkan oleh Controller untuk menghasilkan output HTML yang akan ditampilkan kepada pengguna.</li>
    </ul>
  </li>  
</ol>

# Fungsi file di program
<table style="width:100%; border-collapse: collapse; border: 1px solid #ccc;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left; width: 25%;">File/Folder</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left; width: 25%;">Lokasi</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left; width: 50%;">Fungsi Utama</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>index.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><i>Root Directory</i></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><strong>Front Controller/Routing.</strong> Menerima semua permintaan URL, menentukan Controller/Method, dan mendefinisikan konstanta jalur absolut.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/app/models/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Folder</td>
            <td style="border: 1px solid #ccc; padding: 10px;">Menyimpan semua file yang berinteraksi langsung dengan database.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>Database.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/app/models/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Mengelola koneksi ke database <code>elMVC</code> (sebagai <i>Parent Class</i>).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>LecturerModel.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/app/models/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Berisi semua fungsi CRUD (SQL) spesifik untuk tabel <strong><code>lecturers</code></strong>.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>SubjectModel.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/app/models/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Berisi semua fungsi CRUD (SQL) spesifik untuk tabel <strong><code>subject</code></strong>.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/app/controllers/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Folder</td>
            <td style="border: 1px solid #ccc; padding: 10px;">Menyimpan semua logika alur program dan penghubung Model & View.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>Lecturer.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/app/controllers/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Mengelola semua permintaan CRUD yang berhubungan dengan <strong>Dosen</strong>.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>Home.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/app/controllers/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Mengelola semua permintaan CRUD yang berhubungan dengan <strong>Mata Kuliah</strong> (dijadikan halaman utama).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Folder</td>
            <td style="border: 1px solid #ccc; padding: 10px;">Menyimpan semua file tampilan (HTML + PHP).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>header.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/templates/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><strong>Template</strong> bagian atas HTML dan navigasi (<i>navbar</i>).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>footer.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/templates/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><strong>Template</strong> penutup HTML.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>index.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/lecturer/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Menampilkan <strong>tabel daftar Dosen</strong> (Read).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>create.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/lecturer/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Form untuk <strong>menambah</strong> data Dosen (Create).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>edit.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/lecturer/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Form untuk <strong>mengubah</strong> data Dosen (Update).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>index.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/subject/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Menampilkan <strong>tabel daftar Mata Kuliah</strong> (Home/Read).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>create.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/subject/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Form untuk <strong>menambah</strong> data Mata Kuliah (Create).</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>edit.php</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;"><code>/views/subject/</code></td>
            <td style="border: 1px solid #ccc; padding: 10px;">Form untuk <strong>mengubah</strong> data Mata Kuliah (Update).</td>
        </tr>
    </tbody>
</table>

# Dokumentasi
https://github.com/user-attachments/assets/9f6398a7-972d-4936-8fbb-4baf4fbcc456

