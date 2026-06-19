<nav class="navbar">
    <div class="nav-brand">
        <i class="fa-solid fa-graduation-cap"></i>
        Hệ thống Quản lý Sinh viên
    </div>
    
    <div class="nav-menu">
        <?php
            $currentPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
            $isSinhvien = strpos($currentPath, 'sinhvien') !== false;
            $isLophoc = strpos($currentPath, 'lophoc') !== false;
        ?>
        <a href="<?= URLROOT ?>/sinhvien" class="nav-link <?= $isSinhvien ? 'active' : '' ?>">
            <i class="fa-solid fa-users"></i> Sinh Viên
        </a> 
        
        <a href="<?= URLROOT ?>/lophoc" class="nav-link <?= $isLophoc ? 'active' : '' ?>">
            <i class="fa-solid fa-chalkboard-user"></i> Lớp Học
        </a> 
        
        <div style="width: 1px; height: 24px; background-color: var(--border-color); margin: 0 10px;"></div>

        <a href="<?= URLROOT ?>/auth/logout" class="btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất 
        </a>
    </div>
</nav>