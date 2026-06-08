<?php

class sinhvien extends Controller {

    public function index() { 
        $sinhvienModel = $this->model('sinhvienModel'); 
        $sinhvien = $sinhvienModel->getALLSinhVien(); 
        
        // Gọi masterlayout
        $this->view("layout/masterlayout", [ 
            "viewname" => "sinhvien/index", 
            "sinhvien" => $sinhvien, 
            "title" => "Danh sach sinh vien" 
        ]); 
    }

    public function create() {
        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/create",
            "title" => "Them moi sinh vien"
        ]);
    }
    
    // Thêm các hàm khác nếu có...
}
?>