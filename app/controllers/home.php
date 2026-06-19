<?php
class home extends Controller {
    public function index(){
        header("Location: " . URLROOT . "/sinhvien/index");
        exit();
    }

    public function login(){
        
        $errorMessage = '';
        if (isset($_GET['msg']) && $_GET['msg'] === 'error_password') {
            $errorMessage = 'LỖI: Tên đăng nhập hoặc mật khẩu không chính xác!';
        }

        
        $this->view("auth/login", [
            'errorMessage' => $errorMessage
        ]);
    }
}