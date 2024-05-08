<?php
$conn = new mysqli("localhost","root","","web_nhom");

// Check connection
if ($conn->connect_errno) {
    echo "Kết nối thất bại " . $conn->connect_error;
    exit();
}

// Xử lý khi nhấn nút "Update Cart" và xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['quantity'] as $product_id => $quantity) {
            $quantity = max(0, intval($quantity));
            $_SESSION['cart'][$product_id] = $quantity;

            $user_id = $_SESSION['user_id'];
            $update_sql = "UPDATE giohang SET soluong = $quantity WHERE user_id = $user_id AND sanpham_id = $product_id";
            if ($conn->query($update_sql) === FALSE) {
                echo "Lỗi khi cập nhật số lượng: " . $conn->error;
            }

        }
    } else if(isset($_POST['remove_product'])) {
        $product_id = $_POST['remove_product'];

        // Xóa sản phẩm trong CSDL dựa trên ID sản phẩm và ID người dùng
        $user_id = $_SESSION['user_id'];
        $delete_sql = "DELETE FROM giohang WHERE user_id = $user_id AND sanpham_id = $product_id";
        if ($conn->query($delete_sql) === TRUE) {
            header("Location: index.php?quanli=giohang");
        } else {
            echo "Lỗi khi xóa sản phẩm: " . $conn->error;
        }

        // Xóa sản phẩm khỏi phiên làm việc hiện tại
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    }
}
?>

<div class="container p-3">
    <h1>Giỏ hàng của bạn</h1>
    <div class="cart">
        <form method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Thông tin sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $total = 0;
                    $cart_info = array();


                    $giohang_sql = "SELECT giohang.id, giohang.user_id, giohang.sanpham_id, giohang.soluong,
                        user.fullname, user.username, user.email,
                        sanpham.masanpham, sanpham.img, sanpham.thongtinsanpham, sanpham.gia,
                        sanpham.loaisanpham, sanpham.thongtinchitietsanpham
                        FROM giohang
                        INNER JOIN user ON giohang.user_id = user.id
                        INNER JOIN sanpham ON giohang.sanpham_id = sanpham.masanpham
                        WHERE giohang.user_id = $user_id";

                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        // $product_ids = array_keys($_SESSION['cart']);
                        // $product_ids_str = implode(',', $product_ids);
                        
                        $giohang_result = $conn->query($giohang_sql);

                        while ($row = $giohang_result->fetch_assoc()) {
                            $cart_info[$row['sanpham_id']] = $row;
                        }
                    }

                    
                        
                        $giohang_result = $conn->query($giohang_sql);
                    if ($giohang_result->num_rows === 0) {
                        echo '<tr><td colspan="6">Không có sản phẩm trong giỏ hàng.</td></tr>';
                    } else {
                    foreach ($_SESSION['cart'] as $product_id => $quantity) {
                        if (isset($cart_info[$product_id])) {
                            $product_info = $cart_info[$product_id];
                            $price = $product_info['gia'];
                            $total_price = $price * $quantity;
                            $total += $total_price;
                            
                            echo '<tr>
                                    <td>' . $product_id . '</td>
                                    <td>' . $product_info['thongtinsanpham'] . '</td>
                                    <td>' . $price . 'đ</td>
                                    <td><input type="number" name="quantity[' . $product_id . ']" value="' . $quantity . '"></td>
                                    <td>' . $total_price . 'đ</td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="remove_product" value="' . $product_id . '">
                                            <button class="btn btn-warning" type="submit">Xóa</button>
                                        </form>
                                    </td>
                                </tr>';
                        }
                    }}

                    // Hiển thị tổng giá trị của giỏ hàng
                    echo '<tr class="total">
                            <td colspan="2">
                            <a class="btn btn-warning" href="index.php?quanli=donhangdadat" role="button" style="color=white;">Đơn hàng đã đặt</a>
                            </td>
                            <td>
                                <input class="btn btn-warning" type="submit" name="update_cart" value="Tính tiền">
                            </td>
                            <td>Thành tiền:</td>
                            <td>' . $total . 'đ</td>
                        </tr>';
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</div>


<!-- Phần thanh toán -->
<div class="container p-3">
    <div class="payment-section">
        <h1>Thanh toán</h1>
        <form method="post" action="page/xulithanhtoan.php">
            <table class="table">
                <tr>
                    <td><label for="receiver_name">Tên người mua:</label></td>
                    <td><input type="text" id="receiver_name" name="receiver_name" required></td>
                </tr>
                <tr>
                    <td><label for="receiver_address">Địa chỉ người nhận:</label></td>
                    <td><textarea id="receiver_address" name="receiver_address" required style="width: 400px; height: 100px; resize: both;"></textarea></td>
                </tr>
                <tr>
                    <td><label for="phone_number">Số điện thoại:</label></td>
                    <td><input type="tel" id="phone_number" name="phone_number" required></td>
                </tr>
                <!-- Các trường thông tin thanh toán khác có thể thêm vào đây -->
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
            </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
            </div>
        </form>
    </div>
</div>


