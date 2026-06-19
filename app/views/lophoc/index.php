<h2 style="text-align: center;"><?php echo $title ?></h2>

<div style="text-align: right; margin-bottom: 10px;">
    <a href="<?php echo URLROOT; ?>/lophoc/create" style="padding: 8px; background: green; color: white; text-decoration: none;">
        + Thêm mới lớp học
    </a>
</div>

<table>
    <thead>
        <tr>
            <th>STT (ID)</th>
            <th>Mã Lớp</th>
            <th>Tên Lớp</th>
            <th>Ghi Chú</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lophocs as $lop): ?>
        <tr>
            <td><?php echo htmlspecialchars($lop['id'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($lop['malop'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($lop['tenlop'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($lop['ghichu'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
                <a href="<?php echo URLROOT; ?>/lophoc/edit/<?php echo $lop['id']; ?>" style="padding: 3px; background-color: #f4f40f; color: black; text-decoration: none;">Sửa</a>  
                <a href="<?php echo URLROOT; ?>/lophoc/delete/<?php echo $lop['id']; ?>" style="padding: 3px; background-color: red; color: white; text-decoration: none;" onclick="return confirm('Bạn chắc chắn xóa lớp này?');">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Pagination -->
<div class="pagination">
    <span>Trang: </span>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="<?php echo URLROOT; ?>/lophoc/index/<?php echo $i; ?>" class="<?php echo ($i == $currentPage) ? 'active-page' : ''; ?>">
           <?php echo $i; ?>
        </a>
    <?php endfor; ?>
</div>