<style>
    /* Dung chung css */
    .table-container { margin: 20px auto; width: 85%; background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 15px;}
    .my-table { width: 100%; border-collapse: collapse; }
    .my-table th { background-color: #2980b9; color: white; padding: 12px; font-weight: normal; }
    .my-table td { padding: 12px; border-bottom: 1px solid #ddd; text-align: center; }
    .my-table tr:hover { background-color: #f1f1f1; }
    .btn-action { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: #fff; font-size: 13px; margin: 0 2px; }
    .btn-edit { background-color: #f1c40f; color: #000; font-weight: bold; }
    .btn-del { background-color: #e74c3c; font-weight: bold;}
    .btn-add { background: #27ae60; color: #fff; text-decoration: none; padding: 10px 15px; border-radius: 4px; font-weight: bold; }
</style>

<div class="table-container">
    <h2 style="text-align: center; margin-top:0; color:#333;"><?php echo $title ?></h2>

    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
        <form action="<?php echo URLROOT; ?>/lophoc/index" method="GET" style="display: flex; align-items: center;">
            <select name="limit" onchange="this.form.submit()" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="5" <?php echo (isset($limit) && $limit == 5) ? 'selected' : ''; ?>>5 dòng</option>
                <option value="10" <?php echo (isset($limit) && $limit == 10) ? 'selected' : ''; ?>>10 dòng</option>
                <option value="20" <?php echo (isset($limit) && $limit == 20) ? 'selected' : ''; ?>>20 dòng</option>
            </select>
        </form>
        <a href="<?php echo URLROOT; ?>/lophoc/create" class="btn-add"> + Thêm mới Lớp học</a>
    </div>

    <table class="my-table">
        <thead>
            <tr>
                <th width="80px">STT</th>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Ghi Chú</th>
                <th width="150px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // KHẮC PHỤC LỖI STT VỚI LIMIT ĐỘNG
                $currentLimit = isset($limit) ? $limit : 5; 
                $stt = ($currentPage - 1) * $currentLimit + 1;
            ?>
            <?php foreach ($lophocs as $lop): ?>
            <tr>
                <!-- Gắn thẻ chạy biến đếm thay cho in ID cơ sở dữ liệu -->
                <td><strong><?php echo $stt++; ?></strong></td>
                <td><strong style="color: #c0392b;"><?php echo htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8'); ?></strong></td>
                <td style="text-align: left; font-weight:500;"><?php echo htmlspecialchars($lop['tenlop'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td style="color:#7f8c8d; font-size:14px; text-align: left;"><?php echo htmlspecialchars($lop['ghichu'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/lophoc/edit/<?php echo $lop['id']; ?>" class="btn-action btn-edit">Sửa</a>  
                    <a href="<?php echo URLROOT; ?>/lophoc/delete/<?php echo $lop['id']; ?>" class="btn-action btn-del" onclick="return confirm('Bạn chắc chắn xóa lớp này? (Nếu có Sinh viên đang dùng mã lớp này có thể phát sinh rủi ro)');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination" style="margin-top: 25px; padding-bottom: 20px;">
        <span style="font-weight:bold;">Trang: </span>
        <?php 
            $queryString = (isset($limit) && $limit != 5) ? '?limit=' . $limit : '';
        ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="<?php echo URLROOT; ?>/lophoc/index/<?php echo $i; ?><?php echo $queryString; ?>" class="<?php echo ($i == $currentPage) ? 'active-page' : ''; ?>">
            <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
</div>