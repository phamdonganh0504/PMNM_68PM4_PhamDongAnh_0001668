<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="page-title" style="justify-content: center;">
        <i class="fa-solid fa-chalkboard-user"></i> Thêm lớp học mới
    </div>

    <form action="<?php echo URLROOT; ?>/lophoc/store" method="post">
        
        <div class="form-group">
            <label class="form-label">Mã Lớp:</label>
            <input type="text" name="malop" required class="form-control" placeholder="Ví dụ: 68PM4">
        </div>

        <div class="form-group">
            <label class="form-label">Tên Lớp:</label>
            <input type="text" name="tenlop" required class="form-control" placeholder="Nhập tên lớp...">
        </div>

        <div class="form-group">
            <label class="form-label">Ghi Chú:</label>
            <textarea name="ghichu" rows="4" class="form-control" placeholder="Nhập ghi chú..."></textarea>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn btn-success" style="background: var(--success-color); color: white;">
                <i class="fa-solid fa-plus"></i> Thêm mới
            </button>
            <a href="<?php echo URLROOT; ?>/lophoc/index" class="btn btn-secondary">Hủy bỏ</a>
        </div>
    </form>
</div>