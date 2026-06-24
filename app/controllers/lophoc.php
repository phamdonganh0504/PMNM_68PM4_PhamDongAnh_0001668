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
            
            // Kiểm tra trùng mã lớp
            $existing = $lophocModel->conn->prepare("SELECT id FROM tbl_lophoc WHERE malop = :malop");
            $existing->bindParam(':malop', $malop);
            $existing->execute();
            if ($existing->rowCount() > 0) {
                $_SESSION['error'] = "Mã lớp '$malop' đã tồn tại trong hệ thống! Vui lòng chọn mã khác.";
                header("Location: " . URLROOT . "/lophoc/create");
                exit();
            }

            $result = $lophocModel->create($malop, $tenlop, $ghichu);

            if($result) {
                $_SESSION['success'] = "Thêm mới lớp học thành công!";
                header("Location: " . URLROOT . "/lophoc/index");
                exit();
            } else {
                $_SESSION['error'] = "Không thể thêm lớp học!";
                header("Location: " . URLROOT . "/lophoc/create");
                exit();
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
            $lop = $lophocModel->getLopHocById($id);

            if (!$lop) {
                $_SESSION['error'] = "Lớp học không tồn tại!";
                header("Location: " . URLROOT . "/lophoc/index");
                exit();
            }

            // Nếu thay đổi mã lớp, phải kiểm tra xem mã mới có trùng với lớp khác không
            if ($lop['malop'] !== $malop) {
                // Kiểm tra trùng mã lớp
                $existing = $lophocModel->conn->prepare("SELECT id FROM tbl_lophoc WHERE malop = :malop AND id != :id");
                $existing->bindParam(':malop', $malop);
                $existing->bindParam(':id', $id, PDO::PARAM_INT);
                $existing->execute();
                if ($existing->rowCount() > 0) {
                    $_SESSION['error'] = "Mã lớp mới '$malop' đã được sử dụng bởi lớp khác!";
                    header("Location: " . URLROOT . "/lophoc/edit/" . $id);
                    exit();
                }

                // Nếu lớp học đang có sinh viên, không cho sửa mã lớp (vì liên kết bằng mã lớp)
                if ($lophocModel->hasStudents($lop['malop'])) {
                    $_SESSION['error'] = "Không thể thay đổi Mã lớp của lớp này vì vẫn còn sinh viên đang học!";
                    header("Location: " . URLROOT . "/lophoc/edit/" . $id);
                    exit();
                }
            }

            $result = $lophocModel->update($id, $malop, $tenlop, $ghichu);

            if ($result) {
                $_SESSION['success'] = "Cập nhật thông tin lớp học thành công!";
                header("Location: " . URLROOT . "/lophoc/index");
                exit();
            } else {
                $_SESSION['error'] = "Cập nhật thất bại!";
                header("Location: " . URLROOT . "/lophoc/edit/" . $id);
                exit();
            }
        }
    }

    //  Xóa dữ liệu
    public function delete($id) {
        $lophocModel = $this->model('lophocModel');
        $lop = $lophocModel->getLopHocById($id);

        if ($lop) {
            if ($lophocModel->hasStudents($lop['malop'])) {
                $_SESSION['error'] = "Không thể xóa lớp học " . htmlspecialchars($lop['tenlop'], ENT_QUOTES, 'UTF-8') . " (Mã: " . htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8') . ") vì vẫn còn sinh viên thuộc lớp này!";
                header("Location: " . URLROOT . "/lophoc/index");
                exit();
            }

            $result = $lophocModel->delete($id);
            if ($result) {
                $_SESSION['success'] = "Xóa lớp học thành công!";
            } else {
                $_SESSION['error'] = "Không thể xóa lớp học do lỗi cơ sở dữ liệu!";
            }
        } else {
            $_SESSION['error'] = "Lớp học không tồn tại!";
        }

        header("Location: " . URLROOT . "/lophoc/index");
        exit();
    }
}
?>