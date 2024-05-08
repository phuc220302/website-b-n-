<?php
include('../ketnoi/ketnoi.php');

if (isset($_GET['id'])) {
    $id_to_delete = $_GET['id'];


    // Xây dựng câu lệnh SQL để lấy tên file ảnh
    $sql_select_img = "SELECT img,loaisanpham FROM sanpham WHERE masanpham='$id_to_delete'";
    $result = $conn->query($sql_select_img);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $img_to_delete = $row['img'];

        // Xây dựng câu lệnh SQL để xóa dữ liệu từ CSDL
        $sql_delete_data = "DELETE FROM sanpham WHERE masanpham='$id_to_delete'";
        
        // Thực hiện xóa dữ liệu từ CSDL
        if ($conn->query($sql_delete_data) === TRUE) {
            // Xác định đường dẫn đến tệp tin ảnh cần xóa
            $image_path = 'upload/' . $row['loaisanpham'] . '/' . $img_to_delete;

            // Xóa tệp tin ảnh
            if (file_exists($image_path)) {
                unlink($image_path); // Xóa tệp tin ảnh
            }

            header("location: index.php");
        } else {
            echo "Lỗi khi xóa dữ liệu: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy dữ liệu để xóa";
    }
} else {
    echo "Thiếu thông tin cần thiết để xóa dữ liệu";
}

$conn->close();
?>
