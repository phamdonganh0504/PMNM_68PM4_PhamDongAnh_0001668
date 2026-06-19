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
    // Phân trang
    public function paging($limit, $offset) {
        //  Lấy dữ liệu trang hiện tại
        $sql = "SELECT * FROM tbl_sinhvien LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //  tổng số trang
        $totalRows = $this->conn->query("SELECT COUNT(*) FROM tbl_sinhvien")->fetchColumn();
        $totalPages = ceil($totalRows / $limit);

        return [
            'data' => $data,
            'totalPages' => $totalPages,
            'totalRows' => $totalRows
        ];
    }

    //  Thêm mới sinh viên
    public function create($hoten, $gioitinh, $mssv) {
        $query = "INSERT INTO tbl_sinhvien (sinhvien, giotinh, mssv) VALUES (:hoten, :gioitinh, :mssv)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        
        return $stmt->execute();
    }


    // Sửa thông tin sinh viên
    public function getSinhVienById($id) {
        $query = "SELECT * FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //  Cập nhật thông tin sinh viên
    public function update($id, $hoten, $gioitinh, $mssv) {
        $query = "UPDATE tbl_sinhvien SET sinhvien = :hoten, giotinh = :gioitinh, mssv = :mssv WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        return $stmt->execute();
    }

    // Xóa sinh viên
    public function delete($id) {
        $query = "DELETE FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}