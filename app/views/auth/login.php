<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Hệ thống Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            background-color: var(--light-bg); 
            background-image: radial-gradient(circle at top right, #e0e8ff, #f5f6fa);
        }
        .login-box { 
            width: 400px; 
            background: var(--card-bg); 
            padding: 40px; 
            box-shadow: 0 8px 30px rgba(0,0,0,0.08); 
            border-radius: 16px; 
            text-align: center; 
            border: 1px solid rgba(255,255,255,0.8);
            backdrop-filter: blur(10px);
        }
        .login-box h2 { 
            margin-bottom: 30px; 
            color: var(--primary-color); 
            font-size: 24px;
            font-weight: 700;
        }
        .login-box h2 i {
            font-size: 32px;
            display: block;
            margin-bottom: 15px;
            color: var(--secondary-color);
        }
        .input-group { 
            margin-bottom: 20px; 
            text-align: left; 
        }
        .input-group input { 
            width: 100%; 
            padding: 14px; 
            border: 1.5px solid var(--border-color); 
            border-radius: 8px; 
            font-size: 15px; 
            font-family: inherit;
            transition: all 0.3s ease;
        }
        .input-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }
        .btn-login { 
            width: 100%; 
            padding: 14px; 
            background-color: var(--primary-color); 
            color: white; 
            border: none; 
            font-size: 16px; 
            font-weight: 600;
            border-radius: 8px; 
            cursor: pointer; 
            transition: all 0.3s ease; 
            margin-top: 10px;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.2);
        }
        .btn-login:hover { 
            background-color: var(--secondary-color); 
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>
            <i class="fa-solid fa-graduation-cap"></i>
            HỆ THỐNG QUẢN LÝ<br>SINH VIÊN
        </h2>
        
        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger" style="text-align: left;">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div>
                    <strong>Từ chối: </strong> <?php echo $errorMessage; ?>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?php echo URLROOT; ?>/auth/login" method="POST" autocomplete="off">
            <div class="input-group">
                <input type="text" name="username" placeholder="Nhập tên đăng nhập..." autocomplete="off" required> 
            </div>
            
            <div class="input-group">
                <input type="password" name="password" placeholder="Mật mã hệ thống..." autocomplete="new-password" required> 
            </div>
            
            <button type="submit" class="btn-login">ĐĂNG NHẬP</button>
        </form>
    </div>

</body>
</html>