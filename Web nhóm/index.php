<?php
    session_start();
    if (!isset($_SESSION['dangnhap']) || $_SESSION['dangnhap'] !== true) {
        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header("location: page/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <script src="js/trangchu.js" defer></script>
    <!-- <link rel="stylesheet" href="css/ttsanpham.css"> -->
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/trangchu.css">
    <title>Document</title>
</head>
<body>
    


    <div class="wrapper">
        <?php
            include("page/header.php");
            include("page/content.php");
            include("page/footer.php");
        ?>
    </div>
    
</body>
</html>