<?php
include('../ketnoi/ketnoi.php');

$sql = "SELECT t.thanhtoan_id, u.username, t.hoten, t.diachi, t.sdt, t.thanhtien 
        FROM thanhtoan t 
        INNER JOIN user u ON t.user_id = u.id";
$result = $conn->query($sql);

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
        <h1>Danh sách đơn hàng</h1>
        <a class="btn btn-warning" href="index.php" role="button">Quay lại</a>     
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Họ tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Hủy đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result !== false && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["thanhtoan_id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["hoten"] . "</td>";
                        echo "<td>" . $row["diachi"] . "</td>";
                        echo "<td>" . $row["sdt"] . "</td>";
                        echo "<td>" . $row["thanhtien"] . "đ</td>";
                        echo "<td><a href='huydonhang.php?id=" . $row["thanhtoan_id"] . "' class='btn btn-warning'>Hủy đơn hàng</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
