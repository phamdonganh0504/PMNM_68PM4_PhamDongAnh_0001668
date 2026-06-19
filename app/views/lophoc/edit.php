<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="page-title" style="justify-content: center;">
        <i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa Lớp Học
    </div>

    <form action="<?php echo URLROOT; ?>/lophoc/update/<?php echo $lophoc['id']; ?>" method="post">
        
        <div class="form-group">
            <label class="form-label">Mã Lớp:</label>
            <input type="text" name="malop" value="<?php echo htmlspecialchars($lophoc['malop'], ENT_QUOTES, 'UTF-8'); ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Tên Lớp:</label>
            <input type="text" name="tenlop" value="<?php echo htmlspecialchars($lophoc['tenlop'], ENT_QUOTES, 'UTF-8'); ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Ghi chú:</label>
            <textarea name="ghichu" rows="4" class="form-control"><?php echo htmlspecialchars($lophoc['ghichu'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-check"></i> Cập nhật DB
            </button>
            <a href="<?php echo URLROOT; ?>/lophoc/index" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>