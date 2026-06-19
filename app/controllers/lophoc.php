<?php
class lophoc extends Controller {
    
    //  Hiển thị danh sách
    public function index($page = 1) {
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5; 
        if ($limit <= 0) $limit = 5;
        $page = (int)$page > 0 ? (int)$page : 1; 
        $offset = ($page - 1) * $limit;

        $lophocModel = $this->model('lophocModel');
        $result = $lophocModel->paging($limit, $offset);

        $this->view("layout/masterlayout", [
            "viewname" => "lophoc/index",
            "lophocs" => $result['data'],
            "totalPages" => $result['totalPages'],
            "currentPage" => $page,
            "limit" => $limit,
            "title" => "Quản lý Lớp học"
        ]);
    }

    //  Giao diện thêm
    public function create() {
        $this->view("layout/masterlayout", [
            "viewname" => "lophoc/create",
            "title" => "Thêm mới Lớp học"
        ]);
    }

    //  Xử lý lưu DB 
    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $malop = trim($_POST['malop']);
            $tenlop = trim($_POST['tenlop']);
            $ghichu = trim($_POST['ghichu']);

            $lophocModel = $this->model('lophocModel');
            $result = $lophocModel->create($malop, $tenlop, $ghichu);

            if($result) {
                header("Location: " . URLROOT . "/lophoc/index");
                exit();
            } else {
                echo "Lỗi: Không thể thêm lớp học";
            }
        }
    }

    //  Giao diện sửa
    public function edit($id) {
        $lophocModel = $this->model('lophocModel');
        $lop = $lophocModel->getLopHocById($id);

        
        if(!$lop) {
            echo "Lớp học không tồn tại!"; 
            exit();
        }

        $this->view("layout/masterlayout", [
            "viewname" => "lophoc/edit",
            "lophoc" => $lop,
            "title" => "Chỉnh sửa Lớp học"
        ]);
    }

    //  Cập nhật vào DB
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $malop = trim($_POST['malop']);
            $tenlop = trim($_POST['tenlop']);
            $ghichu = trim($_POST['ghichu']);

            $lophocModel = $this->model('lophocModel');
            $result = $lophocModel->update($id, $malop, $tenlop, $ghichu);

            if ($result) {
                header("Location: " . URLROOT . "/lophoc/index");
                exit();
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }

    //  Xóa dữ liệu
    public function delete($id) {
        $lophocModel = $this->model('lophocModel');
        $result = $lophocModel->delete($id);

        if ($result) {
            header("Location: " . URLROOT . "/lophoc/index");
            exit();
        }
    }
}
?>