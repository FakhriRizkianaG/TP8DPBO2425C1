<?php
require_once MODEL_PATH . '/LecturerModel.php';

class Lecturer {
    protected $model;

    public function __construct() {
        $this->model = new LecturerModel();
    }

    // READ: Tampilkan semua dosen
    public function index() {
        $data['lecturers'] = $this->model->getAllLecturers();
        require_once VIEW_PATH . '/lecturer/index.php'; 
    }

    // CREATE: Tampilkan form
    public function create() {
        require_once VIEW_PATH . '/lecturer/create.php';
    }
    
    // CREATE: Simpan data
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $nidn = $_POST['nidn'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];

            $this->model->createLecturer($name, $nidn, $phone, $join_date);
        }
        header('Location: index.php?url=lecturer/index');
        exit;
    }

    // UPDATE: Tampilkan form dengan data lama
    public function edit($id) {
        $data['lecturer'] = $this->model->getLecturerById($id);
        if (!$data['lecturer']) {
            header('Location: index.php?url=lecturer/index');
            exit;
        }
        require_once VIEW_PATH . '/lecturer/edit.php';
    }

    // UPDATE: Simpan perubahan
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $nidn = $_POST['nidn'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];

            $this->model->updateLecturer($id, $name, $nidn, $phone, $join_date);
        }
        header('Location: index.php?url=lecturer/index');
        exit;
    }

    // DELETE: Hapus data
    public function delete($id) {
        $this->model->deleteLecturer($id);
        header('Location: index.php?url=lecturer/index');
        exit;
    }
}
?>