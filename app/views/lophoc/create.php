<h2 style="text-align: center;">Thêm lớp học mới</h2>

<form action="<?php echo URLROOT; ?>/lophoc/store" method="post" style="width: 50%; margin: 0 auto; border: 1px solid #ccc; padding: 20px; border-radius: 10px;">
    
    <label>Mã Lớp :</label><br>
    <input type="text" name="malop" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>Tên Lớp:</label><br>
    <input type="text" name="tenlop" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>Ghi Chú:</label><br>
    <textarea name="ghichu" rows="4" style="width: 100%; padding: 8px; margin-top: 5px;"></textarea><br><br>

    <div style="text-align: center;">
        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">Thêm mới</button>
        <a href="<?php echo URLROOT; ?>/lophoc/index" style="margin-left: 10px; color: #666; text-decoration: none;">Hủy bỏ</a>
    </div>
</form>