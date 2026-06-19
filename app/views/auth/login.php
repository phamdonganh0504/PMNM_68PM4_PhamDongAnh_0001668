<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Hệ thống Quản Lý Sinh Viên</title>
    <style>
        body { font-family: 'Arial', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; background-color: #ecf0f1; margin: 0; }
        .login-box { width: 360px; background: white; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 8px; text-align: center; }
        .login-box h2 { margin-bottom: 25px; color: #2c3e50; }
        .input-group { margin-bottom: 20px; text-align: left; }
        .input-group input { width: 90%; padding: 12px; margin-top: 5px; border: 1px solid #bdc3c7; border-radius: 4px; display: block; font-size:15px; margin:auto}
        .btn { width: 100%; padding: 12px; background-color: #3498db; color: white; border: none; font-size: 16px; border-radius: 4px; cursor: pointer; transition: 0.3s; margin-top: 15px;}
        .btn:hover { background-color: #2980b9; }
        .error { color: #e74c3c; background: #fadbd8; padding: 10px; margin-bottom: 20px; border-radius: 4px; text-align: left; font-size: 14px; border-left: 5px solid #c0392b;}
    </style>
</head>
<body>

    <div class="login-box">
        <h2>HỆ THỐNG QUẢN LÝ SINH VIÊN</h2>
        
        <!-- Bật khi thông số mật khẩu nạp qua array lỗi bị đón hụt -->
        <?php if (!empty($errorMessage)): ?>
            <div class="error">
                <strong>⚠ Từ chối: </strong> <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo URLROOT; ?>/auth/login" method="POST" autocomplete="off">
            <div class="input-group">
                <input type="text" name="username" placeholder="Nhập tên đăng nhập..." autocomplete="off" required> 
            </div>
            
            <div class="input-group">
                <input type="password" name="password" placeholder="Mật mã hệ thống..." autocomplete="new-password" required> 
            </div>
            
            <button type="submit" class="btn">ĐĂNG NHẬP</button>
        </form>
    </div>

</body>
</html>