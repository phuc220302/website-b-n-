<?php
    session_start();
    if (!isset($_SESSION['dangnhap']) || $_SESSION['dangnhap'] !== true) {
        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header("location: loginadmin.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Admin</title>
</head>
<body>
    
<div class="container">
    <h1>Admin shop yody</h1>
    <h2>Danh sách sản phẩm của shop</h2>
        <a class="btn btn-warning" href="them.php" role="button">Thêm</a>
        <a class="btn btn-warning" href="index.php?dangxuat=1" role="button">Đăng xuất</a>   
        <a class="btn btn-warning" href="hienthidonhang.php" role="button">Danh sách đơn hàng</a>    
<table class="table">
<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
        unset($_SESSION['dangnhap']);
        header('location:loginadmin.php');
    }
?>
<tr>
    <form action="" method="post">
    <th>ID</th>
    <th>IMG</th>
    <th>Thông tin</th>
    <th>Giá</th>
    <th>Sửa</th>
    <th>Xóa</th>
    <th>
        <select name="loaisanpham" id="loaisanpham">
            <option value="aonu">Áo nữ</option>
            <option value="quannu">Quần nữ</option>
            <option value="chanvay">Chân váy</option>
            <option value="dam">Đầm</option>
            <option value="dobo">Đồ bộ</option>
            <option value="banchay">Bán chạy</option>
            <option value="giamgia">Giảm giá</option>
        </select>
    </th>
    <th>
        <input class="btn btn-warning" type="submit" name="submit" id="submit" value="Hiển thị">
        
    </th>
    </form>
</tr>
<?php
include('../ketnoi/ketnoi.php');

    if(isset($_GET['action'])=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('location:loginadmin.php');
    }


// $tb = $_POST['loaisanpham'];
$khoitao = 'aonu'; // Default value for loaisanpham

// Set $tb to the default option if not set in POST
$tb = isset($_POST['loaisanpham']) ? $_POST['loaisanpham'] : $khoitao;

if(isset($_POST['submit'])){
    $sql = "SELECT masanpham, img , thongtinsanpham, gia,loaisanpham FROM sanpham ";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($tb ==  $row["loaisanpham"] ){
            echo "<tr>";
        echo "<td>" . $row["masanpham"] . "</td>";
        echo "<td><img src='upload/".$tb."/" . $row["img"] . "' alt='' width='100'></td>";
        echo "<td>" . $row["thongtinsanpham"] . "</td>";
        echo "<td>" . $row["gia"] . "đ</td>";
        echo "<td><a class='btn btn-warning' href='sua.php?id=" . $row["masanpham"] . "'>Sửa</a></td>";
        echo "<td><a class='btn btn-warning' href='xoa.php?id=" . $row["masanpham"] . "'>Xóa</a></td>";
        echo "</tr>";
        }
    }
} else {
    echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
}
}


$conn->close();
?>
</table>
</div>
</body>
</html>