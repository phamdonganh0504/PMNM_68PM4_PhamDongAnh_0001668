<h2 style="text-align: center;">Chỉnh sửa Lớp Học</h2>

<form action="<?php echo URLROOT; ?>/lophoc/update/<?php echo $lophoc['id']; ?>" method="post" style="width: 50%; margin: 0 auto; border: 1px solid #ccc; padding: 20px;">
    
    <label>Mã Lớp:</label><br>
    <input type="text" name="malop" value="<?php echo htmlspecialchars($lophoc['malop'], ENT_QUOTES, 'UTF-8'); ?>" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>Tên Lớp:</label><br>
    <input type="text" name="tenlop" value="<?php echo htmlspecialchars($lophoc['tenlop'], ENT_QUOTES, 'UTF-8'); ?>" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>Ghi chú:</label><br>
    <textarea name="ghichu" rows="4" style="width: 100%; padding: 8px; margin-top: 5px;"><?php echo htmlspecialchars($lophoc['ghichu'], ENT_QUOTES, 'UTF-8'); ?></textarea><br><br>

    <div style="text-align: center;">
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">Cập nhật DB</button>
        <a href="<?php echo URLROOT; ?>/lophoc/index" style="margin-left: 10px; text-decoration: none; color: black;">[Quay lại]</a>
    </div>
</form>