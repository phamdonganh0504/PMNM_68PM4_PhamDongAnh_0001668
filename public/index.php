<?php
session_start();


require_once '../app/config/config.php';


require_once '../app/core/DB.php';
require_once '../app/core/Controller.php';
require_once '../app/core/App.php';
require_once '../app/middleware.php';

// Chạy Middleware
$middleware = new middleware();
$middleware->checklogin();

// Khởi tạo ứng dụng
$app = new App();