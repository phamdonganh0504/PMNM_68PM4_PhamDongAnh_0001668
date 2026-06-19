<style>
    /* CSS nhúng làm đẹp UI bảng Sinh Viên */
    .table-container { margin: 20px auto; width: 90%; background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 15px;}
    .my-table { width: 100%; border-collapse: collapse; }
    .my-table th { background-color: #2c3e50; color: white; padding: 12px; font-weight: normal; }
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
        <!-- Form tìm kiếm -->
        <form action="<?php echo URLROOT; ?>/sinhvien/index" method="GET" style="display: flex; gap: 5px; align-items: center;">
            <input type="text" name="search" placeholder="Tìm mssv, họ tên, lớp..." value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>" style="padding: 6px; width: 220px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="padding: 6px 12px; background: #2c3e50; color: white; border: none; border-radius: 4px; cursor: pointer;">Tìm kiếm</button>
            <?php if(!empty($search)): ?>
                <a href="<?php echo URLROOT; ?>/sinhvien/index" style="padding: 6px 12px; background: #e74c3c; color: white; text-decoration: none; border-radius: 4px; font-size: 13px;">Hủy</a>
            <?php endif; ?>
        </form>

        <a href="<?php echo URLROOT; ?>/sinhvien/create" class="btn-add"> + Thêm mới sinh viên</a>
    </div>

    <table class="my-table">
        <?php 
            $searchQuery = !empty($search) ? '&search=' . urlencode($search) : '';
            function buildSortUrl($column, $current_sort, $current_order, $searchQuery) {
                $new_order = ($current_sort === $column && $current_order === 'ASC') ? 'DESC' : 'ASC';
                $icon = '';
                if ($current_sort === $column) {
                    $icon = $current_order === 'ASC' ? ' &#9650;' : ' &#9660;';
                }
                return ['url' => "?sort_by=$column&order=$new_order$searchQuery", 'icon' => $icon];
            }
            $sort_mssv = buildSortUrl('mssv', $sort_by ?? '', $order ?? '', $searchQuery);
            $sort_hoten = buildSortUrl('sinhvien', $sort_by ?? '', $order ?? '', $searchQuery);
        ?>
        <thead>
            <tr>
                <th>STT</th>
                <th><a href="<?php echo $sort_hoten['url']; ?>" style="color: white; text-decoration: none;">Họ và tên<?php echo $sort_hoten['icon']; ?></a></th>
                <th>Giới tính</th>
                <th><a href="<?php echo $sort_mssv['url']; ?>" style="color: white; text-decoration: none;">MSSV<?php echo $sort_mssv['icon']; ?></a></th>
                <th>Mã Lớp</th>
                <th width="150px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // CÔNG THỨC KHẮC PHỤC LỖI STT VỚI LIMIT LÀ 5
                $limit = 5; 
                $stt = ($currentPage - 1) * $limit + 1;
            ?>
            <?php foreach ($sinhviens as $sv): ?>
            <tr>
                <!-- Bỏ in id ra, đổi thành in biến stt -->
                <td><strong><?php echo $stt++; ?></strong></td> 
                <td><?php echo htmlspecialchars($sv['sinhvien'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($sv['giotinh'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($sv['mssv'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><span style="background: #e1f5fe; padding:4px 8px; border-radius:4px; font-weight:bold; color:#0288d1;"><?php echo htmlspecialchars($sv['malop'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/sinhvien/edit/<?php echo $sv['id']; ?>" class="btn-action btn-edit">Sửa</a>  
                    <a href="<?php echo URLROOT; ?>/sinhvien/delete/<?php echo $sv['id']; ?>" class="btn-action btn-del" onclick="return confirm('Xác nhận xóa dữ liệu này?');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination" style="margin-top: 25px; padding-bottom:20px;">
        <span style="font-weight:bold;">Trang: </span>
        <?php 
            $queryParams = [];
            if (!empty($search)) $queryParams['search'] = $search;
            if (isset($sort_by)) $queryParams['sort_by'] = $sort_by;
            if (isset($order)) $queryParams['order'] = $order;
            $queryString = !empty($queryParams) ? '?' . http_build_query($queryParams) : '';
        ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="<?php echo URLROOT; ?>/sinhvien/index/<?php echo $i; ?><?php echo $queryString; ?>" class="<?php echo ($i == $currentPage) ? 'active-page' : ''; ?>">
            <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
</div>