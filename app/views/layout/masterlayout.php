<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
    body { margin: 0; display: flex; flex-direction: column; min-height: 100vh; }
    .header { width: 100%; height: 80px; background-color: #ff0505; }
    .content { width: 80%; margin: 20px auto; flex: 1; }
    .footer { width: 100%; height: 80px; background-color: #407cff; }
    </style>
</head>
<body>
    <?php require_once "../app/views/layout/partial/header.php"; ?>

    <div class='content'>
        <!-- Nạp view động dựa vào biến $viewname truyền từ Controller -->
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>

    <?php require_once "../app/views/layout/partial/footer.php"; ?>
</body>
</html>