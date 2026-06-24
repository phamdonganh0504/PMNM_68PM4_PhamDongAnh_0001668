<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'Quản lý sinh viên' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        /* Navbar */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            padding: 0 20px;
            height: 65px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .nav-brand {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .nav-link {
            color: #555;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 4px;
            transition: all 0.2s;
        }
        .nav-link:hover, .nav-link.active {
            color: #1e3a8a;
            background-color: #eff6ff;
        }
        .btn-logout {
            background: #fee2e2;
            color: #dc2626;
            padding: 6px 15px;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            transition: all 0.2s;
        }
        .btn-logout:hover {
            background: #dc2626;
            color: white;
        }
        /* Main content */
        .main-content {
            flex: 1;
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 15px;
        }
        .card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
            border: 1px solid #e2e8f0;
        }
        .page-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .controls-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        /* Buttons */
        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-primary {
            background: #2563eb;
            color: white;
        }
        .btn-primary:hover {
            background: #1d4ed8;
        }
        .btn-success {
            background: #16a34a;
            color: white;
        }
        .btn-success:hover {
            background: #15803d;
        }
        .btn-danger {
            background: #dc2626;
            color: white;
        }
        .btn-danger:hover {
            background: #b91c1c;
        }
        .btn-warning {
            background: #d97706;
            color: white;
        }
        .btn-warning:hover {
            background: #b45309;
        }
        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }
        .btn-secondary:hover {
            background: #cbd5e1;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 4px;
        }
        /* Forms */
        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font-size: 14px;
            transition: all 0.2s;
            color: #333;
            background: white;
        }
        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }
        .search-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .search-input {
            min-width: 250px;
        }
        /* Tables */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        .table th {
            background: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #e2e8f0;
        }
        .table th a {
            color: #64748b;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .table th a:hover {
            color: #2563eb;
        }
        .table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 13px;
            vertical-align: middle;
        }
        .table tr:last-child td {
            border-bottom: none;
        }
        .table tr:hover td {
            background-color: #f8fafc;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }
        .badge-blue {
            background: #dbeafe;
            color: #1e40af;
        }
        .badge-red {
            background: #fee2e2;
            color: #991b1b;
        }
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin-top: 20px;
        }
        .page-link {
            min-width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.2s;
            background: white;
            padding: 0 6px;
        }
        .page-link:hover {
            border-color: #2563eb;
            color: #2563eb;
        }
        .page-link.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }
        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
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
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #86efac;
            color: #166534;
        }
        /* Footer */
        .footer {
            text-align: center;
            padding: 15px;
            color: #64748b;
            font-size: 13px;
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <?php require_once "../app/views/layout/partial/header.php"; ?>

    <div class='main-content'>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div>
                    <strong>Lỗi: </strong> <?php echo $_SESSION['error']; ?>
                </div>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <div>
                    <strong>Thành công: </strong> <?php echo $_SESSION['success']; ?>
                </div>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>

    <?php require_once "../app/views/layout/partial/footer.php"; ?>
</body>
</html>