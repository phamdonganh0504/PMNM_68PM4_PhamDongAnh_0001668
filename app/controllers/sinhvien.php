<?php
class sinhvien extends Controller {
    
    //   hiển thị danh sách
    public function index() {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel->getALLSinhVien();

        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/index",
            "sinhvien" => $sinhvien, 
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
}
?>