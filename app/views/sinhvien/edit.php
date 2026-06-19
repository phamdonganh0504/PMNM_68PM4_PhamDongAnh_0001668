<h2 style="text-align: center;">Chỉnh sửa thông tin sinh viên</h2>

<form action="<?php echo URLROOT; ?>/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="post" style="width: 50%; margin: 0 auto; border: 1px solid #ccc; padding: 20px;">
    
    <label>Họ tên:</label><br>
    <input type="text" name="hoten" value="<?php echo $sinhvien['sinhvien']; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>Giới tính:</label><br>
    <input type="text" name="gioitinh" value="<?php echo $sinhvien['giotinh']; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>MSSV:</label><br>
    <input type="text" name="mssv" value="<?php echo $sinhvien['mssv']; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <div style="text-align: center;">
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">
            Cập nhật dữ liệu
        </button>
        <a href="<?php echo URLROOT; ?>/sinhvien/index" style="margin-left: 10px; text-decoration: none; color: black;">[Hủy]</a>
    </div>
</form>