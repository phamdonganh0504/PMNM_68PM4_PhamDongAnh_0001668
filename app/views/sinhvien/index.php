<h2 style="text-align: center;"><?php echo $title ?></h2>

<div style="text-align: right; margin-bottom: 10px;">
    <a href="<?php echo URLROOT; ?>/sinhvien/create" 
        style="padding: 8px; 
               background: green; 
               color: white; 
               text-decoration: none;"
            >+ Thêm mới sinh viên</a>
</div>

<table>
    <thead>
        <tr>
            <th>STT</th>
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
                <a href="<?php echo URLROOT; ?>/sinhvien/edit/<?php echo $sv['id']; ?>"
                    style="padding: 3px; 
                           background-color: #f4f40f;
                           color: black; 
                           text-decoration: none;"
                        >Sửa
                </a>  

                <!-- Delete -->
                <a href="<?php echo URLROOT; ?>/sinhvien/delete/<?php echo $sv['id']; ?>" 
                    style="padding: 3px; 
                           background-color: red; 
                           color: white; 
                            text-decoration: none;"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">
                        Xóa
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Phân trang   -->
<div class="pagination">
    <span>Trang: </span>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="<?php echo URLROOT; ?>/sinhvien/index/<?php echo $i; ?>" 
           class="<?php echo ($i == $currentPage) ? 'active-page' : ''; ?>">
           <?php echo $i; ?>
        </a>
    <?php endfor; ?>
</div>

<p style="text-align: center;">
    <a href="<?php echo URLROOT; ?>/auth/logout"
        >Đăng xuất</a>
</p>