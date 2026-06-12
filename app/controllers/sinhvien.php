<?php
class sinhvien extends Controller {
    
    //   hiển thị danh sách
    public function index($page = 1) {
        $limit = 5; // Số bản ghi mỗi trang
        $page = (int)$page > 0 ? (int)$page : 1; 
        $offset = ($page - 1) * $limit;

        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset);

        // Truyền dữ liệu  sang view
        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/index",
            "sinhviens" => $result['data'],
            "totalPages" => $result['totalPages'],
            "currentPage" => $page,
            "title" => "Danh sách sinh viên"
        ]);
    }
    //   hiển thị Form thêm mới 
    public function create() {
        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/create",
            "title" => "Thêm mới sinh viên"
        ]);
    }
    //   xử lý lưu dữ liệu 
    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $mssv = $_POST['mssv'];

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->create($hoten, $gioitinh, $mssv);

            if($result) {
                // Chuyển hướng về trang danh sách 
                header("Location: /PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/index");
                exit();
            } else {
                echo "Thêm mới sinh viên thất bại";
            }
        }
    }
    // Hiển thị form sửa
    public function edit($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $sv = $sinhvienModel->getSinhVienById($id);

        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/edit",
            "sinhvien" => $sv,
            "title" => "Chỉnh sửa sinh viên"
        ]);
    }

    // Xử lý cập nhật dữ liệu
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $mssv = $_POST['mssv'];

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv);

            if ($result) {
                header("Location: /PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/index");
                exit();
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }

    // Xử lý xóa sinh viên
    public function delete($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->delete($id);

        if ($result) {
            header("Location: /PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/index");
            exit();
        } else {
            echo "Lỗi: Không thể xóa sinh viên này.";
        }
    }
}
?>