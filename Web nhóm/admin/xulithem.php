<?php
include('../ketnoi/ketnoi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tt = $_POST['thongtinsanpham'];
    $gia = $_POST['gia'];
    $loaisanpham = $_POST['loaisanpham'];
    $ttchitiet = nl2br($_POST['thongtinchitietsanpham']);
    $target_dir = "upload/$loaisanpham/"; // Thư mục lưu trữ file
    $target_file = $target_dir . basename($_FILES["img"]["name"]); // Đường dẫn file trên server
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra nếu file đã tồn tại
    // if (file_exists($target_file)) {
    //     echo "File đã tồn tại.";
    //     $uploadOk = 0;
    // }

    // Kiểm tra kích thước file
    

    // Cho phép chỉ những loại file ảnh cụ thể
    

    // Kiểm tra nếu $uploadOk = 0
    // if ($uploadOk == 0) {
    //     echo "File chưa được upload.";
    // } else {
        // Nếu mọi thứ đều ổn, tiến hành upload file
        //if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            // Lưu đường dẫn vào CSDL
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            $img = basename($_FILES["img"]["name"]); // Đường dẫn để lưu vào CSDL
            $mahang ="";
            
            $sql = "INSERT INTO sanpham (masanpham, img, thongtinsanpham, gia,loaisanpham,thongtinchitietsanpham) VALUES ('$mahang', '$img', '$tt', '$gia', '$loaisanpham','$ttchitiet')";

            if ($conn->query($sql) === TRUE) {
                header("location: them.php");
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        // } else {
        //     echo "Đã có lỗi xảy ra khi upload file.";
        // }
    //}
}

$conn->close();
?>
