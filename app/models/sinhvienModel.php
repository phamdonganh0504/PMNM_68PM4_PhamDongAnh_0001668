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

    // Kiểm tra xem MSSV đã có trong hệ thống chưa (Trả về true nếu trùng)
    public function checkMssvExist($mssv, $currentId = null) {
        $sql = "SELECT id FROM tbl_sinhvien WHERE mssv = :mssv";
        
        
        if ($currentId !== null) {
            $sql .= " AND id != :id";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mssv', $mssv);
        if ($currentId !== null) {
            $stmt->bindParam(':id', $currentId);
        }
        
        $stmt->execute();
        
        
        return $stmt->rowCount() > 0;
    }

    //  Thêm mới sinh viên
       public function create($hoten, $gioitinh, $mssv, $malop) {
        $query = "INSERT INTO tbl_sinhvien (sinhvien, giotinh, mssv, malop) VALUES (:hoten, :gioitinh, :mssv, :malop)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':malop', $malop);
        
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
    public function update($id, $hoten, $gioitinh, $mssv, $malop) {
        $query = "UPDATE tbl_sinhvien SET sinhvien = :hoten, giotinh = :gioitinh, mssv = :mssv, malop = :malop WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':malop', $malop); // Thêm dòng này
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