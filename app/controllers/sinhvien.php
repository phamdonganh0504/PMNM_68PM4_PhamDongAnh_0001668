<?php
class sinhvien extends Controller {
    public function index() {
        //  Gọi model
        $svModel = $this->model('sinhvienModel');
        
        //  Lấy dữ liệu từ DB
        $list_sv = $svModel->getAllSinhVien();
        
        
        $this->view("sinhvien/index", [
            "sinhvien" => $list_sv, 
            "title" => "Danh sách sinh viên lớp 68PM4"
        ]);
    }
}