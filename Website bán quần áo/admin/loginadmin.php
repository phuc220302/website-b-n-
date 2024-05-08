
<div class="login-container">
<div class="login-container">
        <h2>Login admin</h2>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" name="dangnhap">Login</button>
        </form>
        
        <div class="options">
            <a href="../page/login.php">Đăng nhập user</a>
        </div>
    </div>
    </div>


<?php
    session_start();
    if(isset($_POST['dangnhap'])){
    include('../ketnoi/ketnoi.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        

        $sql = "SELECT * FROM admin WHERE useradmin = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows ==1) {
            $_SESSION['dangnhap']=true;
            // Tài khoản hợp lệ, chuyển hướng đến trang chính
            // Lưu thông tin người dùng vào session
            echo"Đăng nhập thành công";
            header("location: ../admin/index.php"); // Điều hướng đến trang chào mừng sau khi đăng nhập
            exit();
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng";
        }
    
        $conn->close();

    }
?>


    
<style>
    /* styles.css */
/* styles.css */
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

</style>