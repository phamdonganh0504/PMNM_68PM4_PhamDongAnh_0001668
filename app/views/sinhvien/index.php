<h2 style="text-align: center;">Danh sách sinh viên</h2>

<div style="text-align: center; margin-bottom: 20px;">
    <a href="/PMNM_68PM4_PhamDongAnh_0001668/public/sinhvien/create" 
       style="padding: 10px; background-color: green; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
       + Thêm sinh viên mới
    </a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>MSSV</th>
    </tr>
    <?php foreach ($sinhvien as $sv): ?>
    <tr>
        <td><?php echo $sv['id']; ?></td>
        <td><?php echo $sv['sinhvien']; ?></td>
        <td><?php echo $sv['giotinh']; ?></td>
        <td><?php echo $sv['mssv']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<p style="text-align: center; margin-top: 20px;">
    <a href="/PMNM_68PM4_PhamDongAnh_0001668/public/auth/logout">Đăng xuất</a>
</p>