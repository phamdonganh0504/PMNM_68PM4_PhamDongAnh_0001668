<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color: #456fc8; color: white; }
    </style>
</head>
<body>
    <h1 style="text-align: center;"><?php echo $title; ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>MSSV</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhvien as $sv): ?>
            <tr>
                <td><?php echo $sv['id']; ?></td>
                <td><?php echo $sv['sinhvien']; ?></td>
                <td><?php echo $sv['giotinh']; ?></td>
                <td><?php echo $sv['mssv']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center;"><a href="/PMNM_68PM4_PhamDongAnh_0001668/public/auth/logout">Đăng xuất</a></p>
</body>
</html>