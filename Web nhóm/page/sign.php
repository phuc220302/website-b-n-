<div class="signup-container">
        <h2>Sign Up</h2>
        <form action="#" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <br>
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="email" name="email" placeholder="Email" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        
        <div class="options">
            <span>Already have an account?</span>
            <a href="login.php">Login</a>
        </div>
    </div>


    <?php
include('../ketnoi/ketnoi.php');
if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    if(!empty($username)&&!empty($fullname)&&!empty($email)&&!empty($password)){
        
        print_r($_POST);

        $sql ="INSERT INTO `user` (`fullname`,`username`,`email`,`password`) VALUES('$fullname','$username','$email','$password')";
    if($conn->query($sql)===TRUE){
       
        header("Location: login.php");
        exit();


    }else {
        echo "Lỗi{$sql}".$conn->error;
    }
    }else{
        echo" Bạn cần nhập đầy đủ thông tin";
    }
}
?>



<style>
    /* styles.css */
.signup-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    margin: 0 auto; /* Căn giữa theo chiều ngang */
}

.signup-container h2 {
    margin-bottom: 20px;
    color: #333;
}

.signup-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.signup-container button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.signup-container button:hover {
    background-color: #2980b9;
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

