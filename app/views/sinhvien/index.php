<h2 style="text-align: center;"><?php echo $title ?></h2>

<div style="text-align: right; margin-bottom: 10px;">
    <a href="/PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/create" style="padding: 8px; background: green; color: white; text-decoration: none;">+ Thêm mới</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>MSSV</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sinhviens as $sv): ?>
        <tr>
            <td><?php echo $sv['id']; ?></td>
            <td><?php echo $sv['sinhvien']; ?></td>
            <td><?php echo $sv['giotinh']; ?></td>
            <td><?php echo $sv['mssv']; ?></td>
            <td>
                <!-- Update -->
                <a href="/PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/edit/<?php echo $sv['id']; ?>"
                    style="color: blue; text-decoration: none;">[Sửa]</a>  

                <!-- Delete -->
                <a href="/PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/delete/<?php echo $sv['id']; ?>" 
                    style="color: red; text-decoration: none;" 
                    onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">
                        [Xóa]
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Phân trang đơn giản -->
<div class="pagination">
    <span>Trang: </span>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="/PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/index/<?php echo $i; ?>" 
           class="<?php echo ($i == $currentPage) ? 'active-page' : ''; ?>">
           <?php echo $i; ?>
        </a>
    <?php endfor; ?>
</div>

<p style="text-align: center;">
    <a href="/PMNM_68PM4_PhamDongAnh_0001668/public/auth/logout">Đăng xuất</a>
</p>