<?php
class sinhvien extends Controller {
    
    //   hiển thị danh sách
    public function index($page = 1) {
        $limit = 5; // Số bản ghi mỗi trang
        $page = (int)$page > 0 ? (int)$page : 1; 
        $offset = ($page - 1) * $limit;

        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search);

        // Truyền dữ liệu  sang view
        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/index",
            "sinhviens" => $result['data'],
            "totalPages" => $result['totalPages'],
            "currentPage" => $page,
            "search" => $search,
            "title" => "Danh sách sinh viên"
        ]);
    }
    //     Form thêm mới 
    public function create() {
        $lophocModel = $this->model('lophocModel');
        $danhsachLop = $lophocModel->getAllLopHoc();

        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/create",
            "danhsachLop" => $danhsachLop, 
            "title" => "Thêm mới sinh viên"
        ]);
    }
    // lưu dữ liệu 
    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hoten = trim($_POST['hoten']);
            $gioitinh = trim($_POST['gioitinh']);
            $mssv = trim($_POST['mssv']);
            $malop = trim($_POST['malop']);

            $sinhvienModel = $this->model('sinhvienModel');
            
            // ============== KIỂM TRA BẮT LỖI TRƯỚC KHI THÊM ==============
            if ($sinhvienModel->checkMssvExist($mssv)) {
                
                $lophocModel = $this->model('lophocModel');
                $danhsachLop = $lophocModel->getAllLopHoc();
                
                
                $this->view("layout/masterlayout", [
                    "viewname" => "sinhvien/create",
                    "danhsachLop" => $danhsachLop,
                    "title" => "Thêm mới sinh viên",
                    "error" => "Cảnh báo: Sinh viên với MSSV $mssv đã tồn tại! Vui lòng nhập mã khác." 
                ]);
                exit(); 
            }
            // =============================================================

            // Chỉ cho insert khi logic kiểm tra bị sai (Tức là mã hợp lệ an toàn)
            $result = $sinhvienModel->create($hoten, $gioitinh, $mssv, $malop);

            if($result) {
                header("Location: " . URLROOT . "/sinhvien/index");
                exit();
            } else {
                echo "Thêm mới thất bại ở lỗi hệ thống...";
            }
        }
    }
    //   form sửa
    public function edit($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $sv = $sinhvienModel->getSinhVienById($id);

        
        $lophocModel = $this->model('lophocModel');
        $danhsachLop = $lophocModel->getAllLopHoc();

        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/edit",
            "sinhvien" => $sv,
            "danhsachLop" => $danhsachLop, // [NEW] truyền mảng sang
            "title" => "Chỉnh sửa sinh viên"
        ]);
    }

    //   cập nhật dữ liệu
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hoten = trim($_POST['hoten']);
            $gioitinh = trim($_POST['gioitinh']);
            $mssv = trim($_POST['mssv']);
            $malop = trim($_POST['malop']);

            $sinhvienModel = $this->model('sinhvienModel');

            // ============== KIỂM TRA BẮT LỖI TRƯỚC KHI SỬA ==============
            if ($sinhvienModel->checkMssvExist($mssv, $id)) {
                
                
                $lophocModel = $this->model('lophocModel');
                $danhsachLop = $lophocModel->getAllLopHoc();
                
                $svGoc = $sinhvienModel->getSinhVienById($id);

                $this->view("layout/masterlayout", [
                    "viewname" => "sinhvien/edit",
                    "sinhvien" => $svGoc, // Trả lại form để họ xem cái gốc 
                    "danhsachLop" => $danhsachLop,
                    "title" => "Chỉnh sửa sinh viên",
                    "error" => "Bạn không thể đổi thành mã: $mssv. Đã bị đăng ký bởi sv khác."
                ]);
                exit(); 
            }
            // ==============================================================

            $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv, $malop);

            if ($result) {
                header("Location: " . URLROOT . "/sinhvien/index");
                exit();
            }
        }
    }

    //   xóa sinh viên
    public function delete($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->delete($id);

        if ($result) {
            header("Location: " . URLROOT . "/sinhvien/index");
            exit();
        } else {
            echo "Lỗi: Không thể xóa sinh viên này.";
        }
    }

    
}
?>