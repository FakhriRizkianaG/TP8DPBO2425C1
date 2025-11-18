<?php
class Database {
    private $host = 'localhost';
    private $user = 'root'; // Ganti dengan username database Anda
    private $pass = '';     // Ganti dengan password database Anda
    private $dbName = 'elMVC'; // Nama database yang sudah Anda buat
    
    protected $conn;

    public function __construct() {
        // Buat koneksi baru
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbName);

        // Cek koneksi
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk mendapatkan koneksi
    public function getConnection() {
        return $this->conn;
    }
}
?>