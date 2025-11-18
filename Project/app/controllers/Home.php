<?php
// Pastikan path ke Model benar menggunakan konstanta
require_once MODEL_PATH . '/SubjectModel.php';
require_once MODEL_PATH . '/LecturerModel.php'; 

class Home {
    protected $subjectModel;
    protected $lecturerModel;

    public function __construct() {
        $this->subjectModel = new SubjectModel();
        $this->lecturerModel = new LecturerModel();
    }

    // READ: Menampilkan semua subyek (Tampilan Home)
    public function index() {
        $data['subjects'] = $this->subjectModel->getAllSubjects();
        require_once VIEW_PATH . '/subject/index.php'; 
    }

    // CREATE: Tampilkan form
    public function create() {
        $data['lecturers'] = $this->lecturerModel->getAllLecturers(); 
        require_once VIEW_PATH . '/subject/create.php';
    }
    
    // CREATE: Simpan data
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $sks = (int)$_POST['sks'];
            // Ambil nilai dari form select. Jika memilih "-- Pilih Dosen (Opsional) --", nilainya adalah 'NULL' (string)
            $lecturer_id = $_POST['lecturer_id']; 

            $this->subjectModel->createSubject($name, $sks, $lecturer_id);
        }
        header('Location: index.php?url=home/index');
        exit;
    }
    
    // UPDATE: Tampilkan form dengan data lama
    public function edit($id) {
        $data['subject'] = $this->subjectModel->getSubjectById($id);
        $data['lecturers'] = $this->lecturerModel->getAllLecturers(); 
        
        if (!$data['subject']) {
            header('Location: index.php?url=home/index');
            exit;
        }
        require_once VIEW_PATH . '/subject/edit.php';
    }

    // UPDATE: Simpan perubahan
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $sks = (int)$_POST['sks'];
            // Ambil nilai dari form select
            $lecturer_id = $_POST['lecturer_id'];

            $this->subjectModel->updateSubject($id, $name, $sks, $lecturer_id);
        }
        header('Location: index.php?url=home/index');
        exit;
    }

    // DELETE: Hapus data
    public function delete($id) {
        $this->subjectModel->deleteSubject($id);
        header('Location: index.php?url=home/index');
        exit;
    }
}
?>