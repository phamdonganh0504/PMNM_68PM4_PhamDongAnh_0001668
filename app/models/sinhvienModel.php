<?php
require_once '../app/core/DB.php';

class sinhvienModel extends ConnectDB {
    public function __construct(){
        $this->connect();
    }

    public function paging($limit, $offset) {
        // Logic 1: Lấy dữ liệu trang hiện tại
        // Dùng PDO bindValue để đảm bảo an toàn và đúng kiểu dữ liệu INT
        $sql = "SELECT * FROM tbl_sinhvien LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Logic 2: Tính tổng số trang
        $totalRows = $this->conn->query("SELECT COUNT(*) FROM tbl_sinhvien")->fetchColumn();
        $totalPages = ceil($totalRows / $limit);

        return [
            'data' => $data,
            'totalPages' => $totalPages,
            'totalRows' => $totalRows
        ];
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