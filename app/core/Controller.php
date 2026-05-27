<?php
class Controller {
    // Hàm dùng để gọi Model
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Hàm dùng để gọi View và truyền dữ liệu
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
}