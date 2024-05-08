<!-- add_to_cart.php -->
<?php
    include('../ketnoi/ketnoi.php');
    session_start();

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $userId = $_SESSION['user_id'];
        $sql = "INSERT INTO giohang (id, user_id, sanpham_id, soluong) VALUES ('', '$userId', '$product_id', 1)";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm vào giỏ hàng thành công";
        } else {
            echo "Lỗi: " . $conn->error;
        }
        
        // Thêm sản phẩm vào giỏ hàng
        if(!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 1; // Thêm sản phẩm mới vào giỏ hàng với số lượng là 1
        } else {
            $_SESSION['cart'][$product_id]++; // Tăng số lượng nếu sản phẩm đã tồn tại trong giỏ hàng
        }

        header("Location: ../index.php?quanli=giohang"); // Chuyển hướng về trang sản phẩm sau khi thêm vào giỏ hàng
        exit();
    }
?>

