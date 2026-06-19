<?php
class home extends Controller {
    public function index(){
        echo "Day la trang chu";
        echo "<br><a href='. URLROOT ./sinhvien'>Vào danh sách sinh viên</a>";
    }

    public function login(){
        // Gọi view login.php trong thư mục views/auth/
        $this->view("auth/login");
    }
}