-- 1. MEMBUAT DATABASE
-- Pastikan tidak ada database dengan nama yang sama sebelum membuatnya
CREATE DATABASE IF NOT EXISTS elMVC;

-- 2. MENGGUNAKAN DATABASE
USE elMVC;

-- 3. MEMBUAT TABEL lecturers
-- Menyimpan data dosen
CREATE TABLE IF NOT EXISTS lecturers (
    -- ID sebagai Kunci Utama (Primary Key) dan Auto-Increment
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    
    -- Informasi Dasar Dosen
    NAME VARCHAR(100) NOT NULL,
    NIDN VARCHAR(15) UNIQUE, -- NIDN harus unik
    PHONE VARCHAR(15),
    JOIN_DATE DATE
);

-- 4. MEMBUAT TABEL subject
-- Menyimpan data mata kuliah dan membuat relasi ke tabel lecturers
CREATE TABLE IF NOT EXISTS subject (
    -- ID sebagai Kunci Utama (Primary Key) dan Auto-Increment
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    
    -- Informasi Mata Kuliah
    NAME VARCHAR(100) NOT NULL,
    SKS TINYINT,
    
    -- LECTURER_ID sebagai Kunci Asing (Foreign Key)
    -- Ini menghubungkan mata kuliah ke dosen pengampu (ID di tabel lecturers)
    LECTURER_ID INT,
    
    -- Definisi Kunci Asing
    FOREIGN KEY (LECTURER_ID) 
        REFERENCES lecturers(ID) 
        ON DELETE SET NULL 
        ON UPDATE CASCADE
);

-- Keterangan:
-- ON DELETE SET NULL: Jika dosen dihapus, kolom LECTURER_ID di tabel subject akan disetel menjadi NULL.
-- ON UPDATE CASCADE: Jika ID dosen (di tabel lecturers) diubah, LECTURER_ID di tabel subject juga akan otomatis diperbarui.

-- 5. DATA SAMPEL (OPSIONAL)
-- Anda bisa menambahkan data sampel ini untuk menguji struktur:

-- Memasukkan data ke tabel lecturers
INSERT INTO lecturers (NAME, NIDN, PHONE, JOIN_DATE) VALUES
('Dr. Budi Santoso, S.Kom, M.T.', '0012098001', '081234567890', '2015-08-17'),
('Ibu Rina Wati, M.Sc.', '0005047802', '085098765432', '2019-02-01');

-- Memasukkan data ke tabel subject
-- LECTURER_ID 1 -> Dr. Budi Santoso
-- LECTURER_ID 2 -> Ibu Rina Wati
INSERT INTO subject (NAME, SKS, LECTURER_ID) VALUES
('Pemrograman Berbasis Web', 3, 1),
('Sistem Basis Data', 4, 1),
('Jaringan Komputer', 3, 2),
('Aljabar Linear', 2, NULL); -- NULL berarti belum ada dosen yang ditetapkan