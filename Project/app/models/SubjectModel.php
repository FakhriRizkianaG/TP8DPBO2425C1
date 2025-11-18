<?php
// Pastikan path ke Database.php benar menggunakan konstanta
require_once MODEL_PATH . '/connection.php'; 

class SubjectModel extends Database {
    // READ: Ambil semua data subyek, gabungkan dengan nama dosen
    public function getAllSubjects() {
        $sql = "SELECT s.*, l.NAME AS LECTURER_NAME 
                FROM subject s
                LEFT JOIN lecturers l ON s.LECTURER_ID = l.ID
                ORDER BY s.ID DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // CREATE: Tambah subyek baru
    public function createSubject($name, $sks, $lecturer_id) {
        // PERBAIKAN UTAMA:
        // mysqli_stmt_bind_param tidak bisa mengikat nilai NULL untuk tipe integer 'i'
        // Solusi: Gunakan query terpisah jika nilai LECTURER_ID adalah NULL.
        
        $sks = (int)$sks;

        if ($lecturer_id === 'NULL') {
            // Jika dosen tidak dipilih, masukkan NULL ke kolom LECTURER_ID
            $stmt = $this->conn->prepare("INSERT INTO subject (NAME, SKS, LECTURER_ID) VALUES (?, ?, NULL)");
            $stmt->bind_param("si", $name, $sks); // Hanya 2 parameter yang tersisa
        } else {
            // Jika dosen dipilih, masukkan ID dosen (sebagai integer)
            $lecturer_id = (int)$lecturer_id;
            $stmt = $this->conn->prepare("INSERT INTO subject (NAME, SKS, LECTURER_ID) VALUES (?, ?, ?)");
            $stmt->bind_param("sii", $name, $sks, $lecturer_id); // 3 parameter
        }
        
        return $stmt->execute();
    }

    // READ ONE: Ambil data subyek berdasarkan ID
    public function getSubjectById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM subject WHERE ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // UPDATE: Perbarui data subyek
    public function updateSubject($id, $name, $sks, $lecturer_id) {
        // PERBAIKAN UTAMA: Penanganan NULL pada proses Update
        
        $sks = (int)$sks;
        $id = (int)$id;
        
        if ($lecturer_id === 'NULL') {
            // Jika dosen diubah menjadi NULL
            $stmt = $this->conn->prepare("UPDATE subject SET NAME = ?, SKS = ?, LECTURER_ID = NULL WHERE ID = ?");
            $stmt->bind_param("sii", $name, $sks, $id); // Hanya 3 parameter
        } else {
            // Jika dosen dipilih
            $lecturer_id = (int)$lecturer_id;
            $stmt = $this->conn->prepare("UPDATE subject SET NAME = ?, SKS = ?, LECTURER_ID = ? WHERE ID = ?");
            $stmt->bind_param("siii", $name, $sks, $lecturer_id, $id); // 4 parameter
        }
        
        return $stmt->execute();
    }

    // DELETE: Hapus subyek
    public function deleteSubject($id) {
        $stmt = $this->conn->prepare("DELETE FROM subject WHERE ID = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>