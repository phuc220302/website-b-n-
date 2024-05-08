<?php
    session_start();
    if(isset($_POST['dangnhap'])){
    include('../ketnoi/ketnoi.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Tài khoản hợp lệ, chuyển hướng đến trang chính
            // Lưu thông tin người dùng vào session
            $row = $result->fetch_assoc();
            $_SESSION['user_id']=$row['id'];
            $_SESSION['dangnhap'] = true;
            $_SESSION['ten']=$row['username'];
            echo"Đăng nhập thành công";
            header("location: ../index.php"); // Điều hướng đến trang chào mừng sau khi đăng nhập
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng";
        }
    
        $conn->close();

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <script src="js/trangchu.js" defer></script>
    <!-- <link rel="stylesheet" href="css/ttsanpham.css"> -->
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/header.css">
    <!-- <link rel="stylesheet" href="../css/footer.css"> -->
    <link rel="stylesheet" href="../css/trangchu.css">
    <title>Document</title>
</head>
<body>
    



<!-- <div class="header"> -->
        <div class="container py-1">
            <div class="row">
                <div class="col-md-1">
                    <div class="logo">
                        <a href="../index.php"><img src="../img/logo2.svg" alt=""></a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="menu">
                        <li><a href="../index.php">Sản phẩm nổi bật</a></li>
                        <li><a href="../index.php?quanli=aonu">Áo nữ</a></li>
                        <li><a href="../index.php?quanli=quannu">Quần nữ</a></li>
                        <li><a href="../index.php?quanli=dobo">Đồ bộ</a></li>
                        <li><a href="../index.php?quanli=dam">Đầm</a></li>
                        <li><a href="../index.php?quanli=chanvay">Chân váy</a></li>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                    <form action="../index.php?quanli=timkiem" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search.." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="login-sign">
                        <button type="button" id="gio-hang" class="btn btn-warning "><a href="../index.php?quanli=giohang"><i class="fa-solid fa-cart-shopping"style=" color:white;"></i></a></button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
       
    


<div class="login-container">
        <h2>Login</h2>
        <form action="#" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" name="dangnhap">Login</button>
        </form>
        
        <div class="options">
            <a href="../admin/loginadmin.php">Đăng nhập admin</a>
            <span>or</span>
            <a href="../page/sign.php">Đăng kí</a>
        </div>
    </div>
    </div>



    
</body>
</html>



    
<style>
    /* styles.css */
/* styles.css */
body{
    /* background-image: url('../img/bg_dangnhap.jpg'); */
  background-size: cover; /* Để ảnh phủ toàn bộ kích thước của background-container */
  background-position: center; /* Để căn giữa ảnh */
  height: 100%;
}
.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    margin: 0 auto; /* Căn giữa theo chiều ngang */
}

.login-container h2 {
    margin-bottom: 20px;
    color: #333;
}

.login-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.login-container button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.login-container button:hover {
    background-color: #45a049;
}

.options {
    margin-top: 20px;
}

.options a {
    text-decoration: none;
    color: #3498db;
    margin: 0 10px;
}

.options a:hover {
    text-decoration: underline;
}



.footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    display: flex;
}

.footer-section {
    flex: 1;
    text-align: center;
    padding: 0 20px;
}

.footer-section h3 {
    color: #fff;
    margin-bottom: 10px;
}

.footer-section p {
    font-size: 14px;
    line-height: 1.5;
}
</style>