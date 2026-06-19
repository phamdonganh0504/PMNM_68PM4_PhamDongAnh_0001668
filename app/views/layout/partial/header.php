
<div style="width: 100%; height: 80px; background-color: #2c3e50; color: white; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; box-sizing: border-box; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    
    <!-- TIÊU ĐỀ TRANG WEB  -->
    <div>
        <h3 style="margin: 0; color: #ecf0f1; text-transform: uppercase;">
             HỆ THỐNG QUẢN LÝ SINH VIÊN
        </h3>
    </div>
    
    <!-- MENU ĐIỀU HƯỚNG  -->
    <nav style="display: flex; align-items: center; gap: 20px;">
        <a href="<?= URLROOT ?>/sinhvien" 
           style="color: white; text-decoration: none; font-weight: bold; font-size: 16px;">
           <span style="font-size:18px;"></span> Quản Lý Sinh Viên
        </a> 
        
        <a href="<?= URLROOT ?>/lophoc" 
           style="color: #f1c40f; text-decoration: none; font-weight: bold; font-size: 16px;">
           <span style="font-size:18px;"></span> Quản Lý Lớp Học
        </a> 
        
        <div style="width: 1px; height: 20px; background-color: #7f8c8d;"></div> <!-- Thanh sổ dọc ngăn cách -->

        <a href="<?= URLROOT ?>/auth/logout" 
           style="padding: 6px 12px; background-color: #e74c3c; border-radius: 4px; color: white; text-decoration: none; font-weight: bold; transition: 0.3s;">
           Đăng xuất 
        </a>
    </nav>

</div>