<?php
require_once '../app/core/DB.php';

class sinhvienModel extends ConnectDB {
    public function __construct() {
        $this->connect();
    }

    public function getAllSinhVien() {
        $query = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}