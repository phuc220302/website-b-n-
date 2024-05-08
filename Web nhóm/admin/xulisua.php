<?php
include('../ketnoi/ketnoi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['new_id']) && 
        isset($_POST['loaisanpham']) && 
        isset($_FILES['new_img']) && 
        isset($_POST['new_thongtinsanpham']) && 
        isset($_POST['new_thongtinchitietsanpham']) &&
        isset($_POST['new_gia'])
    ) {
        $new_id = $_POST['new_id'];
        $loaisanpham = $_POST['loaisanpham'];
        $new_thongtinsanpham = nl2br($_POST['new_thongtinsanpham']);
        $new_ttchitiet = $_POST['new_thongtinchitietsanpham'];
        $new_gia = $_POST['new_gia'];

        // Kiểm tra xem trường chọn file ảnh mới có dữ liệu không
        if ($_FILES['new_img']['name'] !== '') {
            $file_name = $_FILES['new_img']['name']; // Tên file
            $file_tmp = $_FILES['new_img']['tmp_name']; // Đường dẫn tạm thời
            $file_destination = "upload/" . $loaisanpham . "/" . $file_name; // Đường dẫn đích để lưu file

            // Xóa tệp tin ảnh cũ trước khi di chuyển file ảnh mới vào thư mục upload
            $sql_select_img = "SELECT img FROM sanpham WHERE masanpham='$new_id'";
            $result = $conn->query($sql_select_img);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $old_img_name = $row['img'];
                $old_image_path = "upload/" . $loaisanpham . "/" . $old_img_name;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp tin ảnh cũ
                }
            }

            // Di chuyển file ảnh mới từ đường dẫn tạm thời vào thư mục upload
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // Cập nhật thông tin mới vào cơ sở dữ liệu, bao gồm cả tên file ảnh mới
                $sql = "UPDATE sanpham
                        SET img='$file_name', thongtinsanpham='$new_thongtinsanpham', gia='$new_gia',thongtinchitietsanpham='$new_ttchitiet' 
                        WHERE masanpham='$new_id'";

                if ($conn->query($sql) === TRUE) {
                    header("location: index.php");
                } else {
                    echo "Lỗi khi cập nhật dữ liệu: " . $conn->error;
                }
            } else {
                echo "Lỗi khi di chuyển file ảnh";
            }
        } else {
            // Nếu không có file ảnh mới được chọn, chỉ cập nhật thông tin văn bản (không cập nhật ảnh)
            $sql = "UPDATE sanpham
                    SET thongtinsanpham='$new_thongtinsanpham', gia='$new_gia',thongtinchitietsanpham='$new_ttchitiet' 
                    WHERE masanpham='$new_id'";

            if ($conn->query($sql) === TRUE) {
                header("location: index.php");
            } else {
                echo "Lỗi khi cập nhật dữ liệu: " . $conn->error;
            }
        }
    } else {
        echo "Dữ liệu từ form không hợp lệ";
    }
}

$conn->close();
?>
