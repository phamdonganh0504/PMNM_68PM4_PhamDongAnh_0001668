<?php
require_once '../app/core/DB.php';

class sinhvienModel extends ConnectDB {
    public function __construct(){
        $this->connect();
    }

    public function getALLSinhVien() {
        $query = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //  Thêm mới sinh viên
    public function create($hoten, $gioitinh, $mssv) {
        $query = "INSERT INTO tbl_sinhvien (sinhvien, giotinh, mssv) VALUES (:hoten, :gioitinh, :mssv)";
        $stmt = $this->conn->prepare($query);
        
        // Sử dụng bindParam để bảo mật (chống SQL Injection)
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        
        return $stmt->execute();
    }
}