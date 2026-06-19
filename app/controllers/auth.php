<?php
class auth extends Controller {
    
    protected $user = [
        "admin" => "123456",
        "phamdonganh" => "123456"
    ];

    public function login() {
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . URLROOT . '/home/login');
            exit(); 
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        
         
        if (isset($this->user[$username]) && $this->user[$username] == $password) {
            $_SESSION['user'] = $username;
            header("Location: " . URLROOT . "/sinhvien/index");
            exit(); 
        } 
        
        else {
            
            header("Location: " . URLROOT . "/home/login?msg=error_password");
            exit(); 
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . URLROOT . '/home/login');
        exit();
    }
}