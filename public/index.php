<?php
session_start(); 

require_once '../app/middleware.php';
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';

$middleware = new middleware();
$middleware->checklogin();

$app = new App();