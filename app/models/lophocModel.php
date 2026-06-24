<?php
require_once '../app/core/DB.php';

class lophocModel extends ConnectDB {
    public function __construct(){
        $this->connect();
    }

     public function getAllLopHoc() {
        $query = "SELECT malop, tenlop FROM tbl_lophoc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //  Phân trang và lấy dữ liệu
    public function paging($limit, $offset) {
        $sql = "SELECT * FROM tbl_lophoc LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalRows = $this->conn->query("SELECT COUNT(*) FROM tbl_lophoc")->fetchColumn();
        $totalPages = ceil($totalRows / $limit);

        return [
            'data' => $data,
            'totalPages' => $totalPages
        ];
    }

    //  Thêm lớp học
    public function create($malop, $tenlop, $ghichu) {
        $query = "INSERT INTO tbl_lophoc (malop, tenlop, ghichu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        return $stmt->execute();
    }

    //  Lấy thông tin 1 lớp để đưa vào form Sửa
    public function getLopHocById($id) {
        $query = "SELECT * FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //  Cập nhật lớp học
    public function update($id, $malop, $tenlop, $ghichu) {
        $query = "UPDATE tbl_lophoc SET malop = :malop, tenlop = :tenlop, ghichu = :ghichu WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        return $stmt->execute();
    }

    // Kiểm tra lớp học có sinh viên hay không
    public function hasStudents($malop) {
        $query = "SELECT COUNT(*) FROM tbl_sinhvien WHERE malop = :malop";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // 5. Xóa lớp học
    public function delete($id) {
        $query = "DELETE FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>