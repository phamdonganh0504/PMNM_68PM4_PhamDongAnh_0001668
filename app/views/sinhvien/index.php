<div class="card">
    <div class="page-title">
        <i class="fa-solid fa-users"></i> <?php echo $title ?>
    </div>

    <div class="controls-header">
        <!-- Form tìm kiếm -->
        <form action="<?php echo URLROOT; ?>/sinhvien/index" method="GET" class="search-form">
            <select name="limit" onchange="this.form.submit()" class="form-control" style="width: auto;">
                <option value="5" <?php echo ($limit == 5) ? 'selected' : ''; ?>>5 dòng</option>
                <option value="10" <?php echo ($limit == 10) ? 'selected' : ''; ?>>10 dòng</option>
                <option value="20" <?php echo ($limit == 20) ? 'selected' : ''; ?>>20 dòng</option>
            </select>
            <input type="text" name="search" placeholder="Tìm mssv, họ tên, lớp..." value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control search-input">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm</button>
            <?php if(!empty($search)): ?>
                <a href="<?php echo URLROOT; ?>/sinhvien/index" class="btn btn-secondary">Hủy</a>
            <?php endif; ?>
            <?php if(isset($sort_by)): ?><input type="hidden" name="sort_by" value="<?php echo $sort_by; ?>"><?php endif; ?>
            <?php if(isset($order)): ?><input type="hidden" name="order" value="<?php echo $order; ?>"><?php endif; ?>
        </form>

        <a href="<?php echo URLROOT; ?>/sinhvien/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm mới</a>
    </div>

    <div class="table-wrapper">
    <table class="table">
        <?php 
            $searchQuery = '';
            $queryParams = [];
            if (!empty($search)) $queryParams['search'] = $search;
            if (isset($limit)) $queryParams['limit'] = $limit;
            if (!empty($queryParams)) $searchQuery = '&' . http_build_query($queryParams);
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
                <th><a href="<?php echo $sort_hoten['url']; ?>">Họ và tên<?php echo $sort_hoten['icon']; ?></a></th>
                <th>Giới tính</th>
                <th><a href="<?php echo $sort_mssv['url']; ?>">MSSV<?php echo $sort_mssv['icon']; ?></a></th>
                <th>Mã Lớp</th>
                <th width="150px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // KHẮC PHỤC LỖI STT VỚI LIMIT ĐỘNG
                $currentLimit = isset($limit) ? $limit : 5; 
                $stt = ($currentPage - 1) * $currentLimit + 1;
            ?>
            <?php foreach ($sinhviens as $sv): ?>
            <tr>
                <!-- Bỏ in id ra, đổi thành in biến stt -->
                <td><strong><?php echo $stt++; ?></strong></td> 
                <td><?php echo htmlspecialchars($sv['sinhvien'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($sv['giotinh'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($sv['mssv'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><span class="badge badge-blue"><?php echo htmlspecialchars($sv['malop'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                <td>
                    <div style="display:flex; gap:5px; justify-content:center;">
                        <a href="<?php echo URLROOT; ?>/sinhvien/edit/<?php echo $sv['id']; ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>  
                        <a href="<?php echo URLROOT; ?>/sinhvien/delete/<?php echo $sv['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xóa dữ liệu này?');"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <div class="pagination">
        <?php 
            $queryParams = [];
            if (!empty($search)) $queryParams['search'] = $search;
            if (isset($sort_by)) $queryParams['sort_by'] = $sort_by;
            if (isset($order)) $queryParams['order'] = $order;
            if (isset($limit)) $queryParams['limit'] = $limit;
            $queryString = !empty($queryParams) ? '?' . http_build_query($queryParams) : '';
        ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="<?php echo URLROOT; ?>/sinhvien/index/<?php echo $i; ?><?php echo $queryString; ?>" class="page-link <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
            <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
</div>