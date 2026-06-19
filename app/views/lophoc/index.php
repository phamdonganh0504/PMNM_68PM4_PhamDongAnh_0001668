<div class="card">
    <div class="page-title">
        <i class="fa-solid fa-chalkboard-user"></i> <?php echo $title ?>
    </div>

    <div class="controls-header">
        <form action="<?php echo URLROOT; ?>/lophoc/index" method="GET" class="search-form">
            <select name="limit" onchange="this.form.submit()" class="form-control" style="width: auto;">
                <option value="5" <?php echo (isset($limit) && $limit == 5) ? 'selected' : ''; ?>>5 dòng</option>
                <option value="10" <?php echo (isset($limit) && $limit == 10) ? 'selected' : ''; ?>>10 dòng</option>
                <option value="20" <?php echo (isset($limit) && $limit == 20) ? 'selected' : ''; ?>>20 dòng</option>
            </select>
        </form>
        <a href="<?php echo URLROOT; ?>/lophoc/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm mới</a>
    </div>

    <div class="table-wrapper">
    <table class="table">
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
                    <div style="display:flex; gap:5px; justify-content:center;">
                        <a href="<?php echo URLROOT; ?>/lophoc/edit/<?php echo $lop['id']; ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>  
                        <a href="<?php echo URLROOT; ?>/lophoc/delete/<?php echo $lop['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn xóa lớp này? (Nếu có Sinh viên đang dùng mã lớp này có thể phát sinh rủi ro)');"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <div class="pagination">
        <?php 
            $queryString = (isset($limit) && $limit != 5) ? '?limit=' . $limit : '';
        ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="<?php echo URLROOT; ?>/lophoc/index/<?php echo $i; ?><?php echo $queryString; ?>" class="page-link <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
            <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
</div>