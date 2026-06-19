<h2 style="text-align: center;">Thêm sinh viên mới</h2>

<form action="<?php echo URLROOT; ?>/sinhvien/store" method="post" style="width: 50%; margin: 0 auto; border: 1px solid #ccc; padding: 20px; border-radius: 10px;">
    
    <label>Họ tên:</label><br>
    <input type="text" name="hoten" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>Giới tính:</label><br>
    <input type="text" name="gioitinh" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>MSSV:</label><br>
    <input type="text" 
           name="mssv" 
           required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <div style="text-align: center;">
        <button type="submit" 
                style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Lưu dữ liệu
        </button>
        <a href="<?php echo URLROOT; ?>/sinhvien/index" 
           style="margin-left: 10px; text-decoration: none; color: #666;">Hủy bỏ</a>
    </div>
</form>