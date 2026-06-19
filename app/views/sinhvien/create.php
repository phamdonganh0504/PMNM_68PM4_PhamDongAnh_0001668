<h2 style="text-align: center;">Thêm sinh viên mới</h2>
<?php if(!empty($error)): ?>
        <div style="width: 50%; margin: 10px auto; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; text-align: center;">
            <strong style="font-size:18px;">LỖI XẢY RA!</strong> <br>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
<form action="<?php echo URLROOT; ?>/sinhvien/store" method="post" style="width: 50%; margin: 0 auto; border: 1px solid #ccc; padding: 20px; border-radius: 10px;">
    
    <label>Họ tên:</label><br>
    <input type="text" name="hoten" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>Giới tính:</label><br>
    <input type="text" name="gioitinh" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <label>MSSV:</label><br>
    <input type="text" name="mssv" required style="width: 100%; padding: 8px; margin-top: 5px;"><br><br>

    <!-- ======== PHẦN ĐIỀN THÊM DROP-DOWN MENU NẰM Ở ĐÂY ======== -->
    <label>Mã lớp thuộc về:</label><br>
    <select name="malop" required style="width: 100%; padding: 8px; margin-top: 5px;">
        <option value="">-- Chọn một lớp học --</option>
        
        <?php foreach($danhsachLop as $lop): ?>
            <option value="<?= htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($lop['tenlop'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
        
    </select><br><br>
    <!-- ========================================================= -->

    <div style="text-align: center;">
        <button type="submit" 
                style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Lưu dữ liệu
        </button>
        <a href="<?php echo URLROOT; ?>/sinhvien/index" 
           style="margin-left: 10px; text-decoration: none; color: #666;">Hủy bỏ</a>
    </div>
</form>