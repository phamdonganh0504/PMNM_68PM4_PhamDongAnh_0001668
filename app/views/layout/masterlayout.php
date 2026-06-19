<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'Quản lý sinh viên' ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php require_once "../app/views/layout/partial/header.php"; ?>

    <div class='main-content'>
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>

    <?php require_once "../app/views/layout/partial/footer.php"; ?>
</body>
</html>