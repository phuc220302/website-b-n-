<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kết nối đến cơ sở dữ liệu
    include('../ketnoi/ketnoi.php');

    // Lấy dữ liệu từ form
    $user_id = $_POST['user_id'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_address = $_POST['receiver_address'];
    $phone_number = $_POST['phone_number'];
    $total_amount = $_POST['total_amount'];

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng thanhtoan
    $insert_sql = "INSERT INTO thanhtoan (user_id, hoten, diachi, sdt, thanhtien)
                   VALUES ('$user_id', '$receiver_name', '$receiver_address', '$phone_number', '$total_amount')";

    // Thực hiện câu lệnh SQL
    if ($conn->query($insert_sql) === TRUE) {
        echo "Thanh toán thành công!";
    } else {
        echo "Lỗi khi thanh toán: " . $conn->error;
    }
   

        $delete_sql = "DELETE FROM giohang WHERE user_id = '$user_id'";

        // Thực hiện câu lệnh SQL
        if ($conn->query($delete_sql) === TRUE) {
            echo "Xóa dữ liệu trong giỏ hàng thành công!";
        } else {
            echo "Lỗi khi xóa dữ liệu: " . $conn->error;
        }
        header("Location: ../index.php?quanli=giohang"); 
        // header('location: ../index.php');
        exit();

    $conn->close();
}
?>
