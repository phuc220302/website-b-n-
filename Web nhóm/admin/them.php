<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    #thongtinchitietsanpham {
        resize: both; 
        width: 500px; 
        height: 100px;
}

</style>
<body>
<div class="container">
        <h2>Thêm Sản phẩm Mới</h2>
        <form action="xulithem.php" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td><label for="loaisanpham">Loại sản phẩm:</label></td>
                <td>
                    <select name="loaisanpham" id="loaisanpham">
                        <option value="aonu">Áo nữ</option>
                        <option value="quannu">Quần nữ</option>
                        <option value="chanvay">Chân váy</option>
                        <option value="dam">Đầm</option>
                        <option value="dobo">Đồ bộ</option>
                        <option value="banchay">Bán chạy</option>
                        <option value="giamgia">Giảm giá</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="img">Chọn hình ảnh:</label></td>
                <td><input type="file" id="img" name="img"></td>
            </tr>
            <tr>
                <td><label for="thongtinsanpham">Thông tin:</label></td>
                <td><input type="text" id="thongtinsanpham" name="thongtinsanpham"></td>
            </tr>
            <tr>
                <td><label for="thongtinchitietsanpham">Thông tin chi tiết:</label></td>
                <td><textarea id="thongtinchitietsanpham" name="thongtinchitietsanpham"></textarea></td>
            </tr>

            <tr>
                <td><label for="gia">Giá:</label></td>
                <td><input type="text" id="gia" name="gia"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="btn btn-warning" type="submit" value="Thêm">
                    <a class="btn btn-warning" href="index.php" role="button">Quay lại</a>
                </td>
                
            </tr>
        </table>
        </form>
    </div>
</body>
</html>
