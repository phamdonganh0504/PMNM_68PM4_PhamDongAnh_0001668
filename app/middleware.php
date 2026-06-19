<?php
class middleware {
    function checklogin() {
        // Làm sạch URL trước khi check
        $url = isset($_GET['url']) ? filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL) : 'home/index';
        
        $publicPages = ['home/login', 'auth/login'];

        if(!isset($_SESSION['user']) && !in_array($url, $publicPages)) {
            header('Location: ' . URLROOT . '/home/login');
            exit();
        }
    }
}