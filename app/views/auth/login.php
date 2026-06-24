<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Hệ thống Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #2563eb;
            --light-bg: #f4f6f9;
            --card-bg: #ffffff;
            --border-color: #cbd5e1;
            --danger-color: #dc2626;
        }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            background-color: var(--light-bg); 
            background-image: radial-gradient(circle at top right, #e0e8ff, #f4f6f9);
        }
        .login-box { 
            width: 400px; 
            background: var(--card-bg); 
            padding: 40px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.08); 
            border-radius: 8px; 
            text-align: center; 
            border: 1px solid #e2e8f0;
        }
        .login-box h2 { 
            margin-bottom: 30px; 
            color: var(--primary-color); 
            font-size: 22px;
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
            padding: 12px; 
            border: 1px solid var(--border-color); 
            border-radius: 4px; 
            font-size: 14px; 
            font-family: inherit;
            transition: all 0.2s ease;
        }
        .input-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.15);
        }
        .btn-login { 
            width: 100%; 
            padding: 12px; 
            background-color: var(--primary-color); 
            color: white; 
            border: none; 
            font-size: 15px; 
            font-weight: 600;
            border-radius: 4px; 
            cursor: pointer; 
            transition: all 0.2s ease; 
            margin-top: 10px;
        }
        .btn-login:hover { 
            background-color: var(--secondary-color); 
        }
        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
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