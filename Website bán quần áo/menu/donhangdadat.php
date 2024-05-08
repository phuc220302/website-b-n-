<?php
$conn = new mysqli("localhost","root","","web_nhom");

// Check connection
if ($conn->connect_errno) {
    echo "Kết nối thất bại " . $conn->connect_error;
    exit();
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT t.thanhtoan_id, u.username, t.hoten, t.diachi, t.sdt, t.thanhtien 
        FROM thanhtoan t 
        INNER JOIN user u ON t.user_id = u.id
        WHERE u.id = $user_id";
$result = $conn->query($sql);

?>


<div class="container">
        <h1>Danh sách đơn hàng</h1>  
        <table class="table">
            <thead>
                <tr>
                    
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
                        
                        echo "<td>" . $row["hoten"] . "</td>";
                        echo "<td>" . $row["diachi"] . "</td>";
                        echo "<td>" . $row["sdt"] . "</td>";
                        echo "<td>" . $row["thanhtien"] . "đ</td>";
                        echo "<td><a href='menu/huydonhang.php?id=" . $row["thanhtoan_id"] . "' class='btn btn-warning'>Hủy đơn hàng</a></td>";
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