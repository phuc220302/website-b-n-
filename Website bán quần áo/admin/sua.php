<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        
<?php
include('../ketnoi/ketnoi.php');

if(isset($_GET['id'])) {
    $id_to_edit = $_GET['id'];
    $sql = "SELECT masanpham, img , thongtinsanpham, gia,loaisanpham,thongtinchitietsanpham FROM sanpham WHERE masanpham='$id_to_edit'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Lấy thông tin từ CSDL và điền vào form sửa
        $masanpham = $row["masanpham"];
        $img = $row["img"];
        $thongtinsanpham = $row["thongtinsanpham"];
        $gia = $row["gia"];
        $loaisanpham = $row["loaisanpham"];
        $ttchitiet = $row["thongtinchitietsanpham"];
    } else {
        echo "Không có dữ liệu";
    }
}

$conn->close();
?>
<h1>Chỉnh sửa</h1>
<!-- Form sửa với dữ liệu được điền sẵn từ CSDL -->
<form action="xulisua.php" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th>ID:</th>
            <td><input type="text" name="new_id" value="<?php echo $masanpham; ?>" readonly></td>
        </tr>
        <tr>
            <th>Loại sản phẩm:</th>
            <td><input type="text" name="loaisanpham" value="<?php echo $loaisanpham; ?>" readonly></td>
        </tr>
        <tr>
            <th>Ảnh cũ:</th>
            <td><img src="upload/<?php echo $loaisanpham; ?>/<?php echo $img; ?>" alt="" width="100"></td>
        </tr>
        <tr>
            <th>Chọn ảnh mới:</th>
            <td><input type="file" name="new_img"></td> <!-- Trường chọn file ảnh mới -->
        </tr>
        <tr>
            <th>Thông tin:</th>
            <td><input type="text" name="new_thongtinsanpham" value="<?php echo $thongtinsanpham; ?>"></td>
        </tr>
        <tr>
            <td>Thông tin chi tiết:</td> 
            <td><textarea name="new_thongtinchitietsanpham" style="width: 400px; height: 100px; resize: both;"><?php echo $ttchitiet; ?></textarea></td>
        </tr>
        <tr>
            <th>Giá:</th>
            <td><input type="text" name="new_gia" value="<?php echo $gia; ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="btn btn-warning" type="submit" value="Sửa">
                <a class="btn btn-warning" href="index.php" role="button">Quay lại</a>
            </td>
        </tr>
    </table>
</form>


    </div>
</body>
</html>