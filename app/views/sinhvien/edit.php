<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="page-title" style="justify-content: center;">
        <i class="fa-solid fa-user-pen"></i> Chỉnh sửa thông tin sinh viên
    </div>

    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
                <strong>LỖI XẢY RA!</strong> <br>
                <?php echo $error; ?>
            </div>
        </div>
    <?php endif; ?>

    <form action="<?php echo URLROOT; ?>/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="post">
        
        <div class="form-group">
            <label class="form-label">Họ tên:</label>
            <input type="text" name="hoten" value="<?php echo htmlspecialchars($sinhvien['sinhvien'], ENT_QUOTES, 'UTF-8'); ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Giới tính:</label>
            <input type="text" name="gioitinh" value="<?php echo htmlspecialchars($sinhvien['giotinh'], ENT_QUOTES, 'UTF-8'); ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">MSSV:</label>
            <input type="text" name="mssv" value="<?php echo htmlspecialchars($sinhvien['mssv'], ENT_QUOTES, 'UTF-8'); ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Cập nhật Lớp học:</label>
            <select name="malop" required class="form-control">
                <option value="">-- Chọn một lớp học --</option>
                <?php foreach($danhsachLop as $lop): ?>
                    <option 
                        value="<?= htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8') ?>"
                        <?= ($lop['malop'] === $sinhvien['malop']) ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($lop['tenlop'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-check"></i> Cập nhật dữ liệu
            </button>
            <a href="<?php echo URLROOT; ?>/sinhvien/index" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>