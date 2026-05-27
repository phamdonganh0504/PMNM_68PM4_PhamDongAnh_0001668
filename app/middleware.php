<?php
class middleware {
    function checklogin() {
        // Lấy URL và làm sạch
        $currentUrl = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
        
        // Bật dòng dưới đây để kiểm tra nếu vẫn bị lỗi (xem nó hiện ra chữ gì)
        // die("URL hien tai: " . $currentUrl); 

        $publicPages = [
            'home/login',
            'auth/login'
        ];

        if(!isset($_SESSION['user']) && !in_array($currentUrl, $publicPages)) {
            header('Location: /PMNM_68PM4_PhamDongAnh_0001668/public/home/login');
            exit();
        }
    }
}