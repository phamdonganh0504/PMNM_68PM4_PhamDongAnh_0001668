<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'Quản lý sinh viên' ?></title>
    <style>
        body { margin: 0; display: flex; flex-direction: column; min-height: 100vh; font-family: Arial, sans-serif; }
        .content { width: 80%; margin: 20px auto; flex: 1; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; text-align: center; padding: 10px; }
        th { background-color: #eeeeee; }
        .pagination { margin-top: 20px; text-align: center; }
        .pagination a { padding: 5px 10px; border: 1px solid #ccc; text-decoration: none; margin: 0 2px; color: black; }
        .active-page { background-color: #407cff; color: white !important; font-weight: bold; }
    </style>
</head>
<body>
    <?php require_once "../app/views/layout/partial/header.php"; ?>

    <div class='content'>
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>

    <?php require_once "../app/views/layout/partial/footer.php"; ?>
</body>
</html>