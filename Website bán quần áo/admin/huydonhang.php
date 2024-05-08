<?php
// Ket noi CSDL
include('../ketnoi/ketnoi.php');

// Kiểm tra xem ID đơn hàng đã được truyền qua phương thức GET hay không
if(isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Thực hiện xử lý hủy đơn hàng tại đây, ví dụ:
    $cancelSql = "DELETE FROM thanhtoan WHERE thanhtoan_id = $orderId";

    if ($conn->query($cancelSql) === TRUE) {
        echo "Đã hủy đơn hàng thành công!";
    } else {
        echo "Lỗi khi hủy đơn hàng: " . $conn->error;
    }
    header("location: hienthidonhang.php");
    // Đóng kết nối CSDL
    $conn->close();
} else {
    echo "Không có ID đơn hàng được cung cấp!";
}
?>
