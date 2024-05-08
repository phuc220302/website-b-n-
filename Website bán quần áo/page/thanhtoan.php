<div class="container p-3">
    <div class="payment-section">
        <h1>Thanh toán</h1>
        <form method="post" action="page/xulithanhtoan.php">
            <table class="table">
                <tr>
                    <td><label for="receiver_name">Tên người nhận:</label></td>
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