<?php
class auth extends Controller {
    protected $user = [
        "admin" => "123456",
        "user" => "123456"
    ];

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if (isset($this->user[$username]) && $this->user[$username] == $password) {
                $_SESSION['user'] = $username; // Đổi thành 'user' cho khớp middleware
                header("Location: /PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/index");
                exit();
            } else {
                header('Location: /PMNM_68PM4_PhamDongAnh_0001668/public/home/login');
                exit();
            }
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /PMNM_68PM4_PhamDongAnh_0001668/public/home/login');
        exit();
    }
}