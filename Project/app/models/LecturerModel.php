<?php
require_once MODEL_PATH . '/connection.php';

class LecturerModel extends Database {
    public function getAllLecturers() {
        $sql = "SELECT * FROM lecturers ORDER BY ID DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createLecturer($name, $nidn, $phone, $join_date) {
        $stmt = $this->conn->prepare("INSERT INTO lecturers (NAME, NIDN, PHONE, JOIN_DATE) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $nidn, $phone, $join_date);
        return $stmt->execute();
    }

    public function getLecturerById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lecturers WHERE ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateLecturer($id, $name, $nidn, $phone, $join_date) {
        $stmt = $this->conn->prepare("UPDATE lecturers SET NAME = ?, NIDN = ?, PHONE = ?, JOIN_DATE = ? WHERE ID = ?");
        $stmt->bind_param("ssssi", $name, $nidn, $phone, $join_date, $id);
        return $stmt->execute();
    }

    public function deleteLecturer($id) {
        $stmt = $this->conn->prepare("DELETE FROM lecturers WHERE ID = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>