<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="page-title" style="justify-content: center;">
        <i class="fa-solid fa-user-plus"></i> Thêm sinh viên mới
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

    <form action="<?php echo URLROOT; ?>/sinhvien/store" method="post">
        
        <div class="form-group">
            <label class="form-label">Họ tên:</label>
            <input type="text" name="hoten" required class="form-control" placeholder="Nhập họ tên sinh viên...">
        </div>

        <div class="form-group">
            <label class="form-label">Giới tính:</label>
            <input type="text" name="gioitinh" required class="form-control" placeholder="Nhập giới tính (Nam/Nữ)...">
        </div>

        <div class="form-group">
            <label class="form-label">MSSV:</label>
            <input type="text" name="mssv" required class="form-control" placeholder="Nhập mã số sinh viên...">
        </div>

        <div class="form-group">
            <label class="form-label">Mã lớp thuộc về:</label>
            <select name="malop" required class="form-control">
                <option value="">-- Chọn một lớp học --</option>
                <?php foreach($danhsachLop as $lop): ?>
                    <option value="<?= htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($lop['tenlop'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Lưu dữ liệu
            </button>
            <a href="<?php echo URLROOT; ?>/sinhvien/index" class="btn btn-secondary">Hủy bỏ</a>
        </div>
    </form>
</div>