<?php
class middleware {
    function checklogin() {
    
        $currentUrl = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
        
        

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