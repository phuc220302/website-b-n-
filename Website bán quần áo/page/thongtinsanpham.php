<h1>Thông tin chi tiết sản phẩm</h1>
<?php
include('ketnoi/ketnoi.php');
if(isset($_GET['id'])){
    $idsanpham = $_GET['id'];
    $sql = "SELECT *FROM sanpham Where masanpham = '$idsanpham'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $gia_formatted = number_format($row['gia'], 0, ',', '.');
    echo '
    <div class="product-details">
    <div class="product-image">
        <img src="admin/upload/'.$row['loaisanpham'].'/'. $row['img'] .'" alt="Product Image">
    </div>
    <div class="product-info">
        <h2>'.$row['thongtinsanpham'].'</h2>
        <p>Giá: '.$gia_formatted.'đ</p>
        <P>Thông tin chi tiết sản phẩm:</p>
        <p>
            '.$row['thongtinchitietsanpham'].'
        </p>
        <a class="btn btn-warning" href="page/xulithemgiohang.php?id=' . $row['masanpham'] . '&quanli=giohang" role="button" style="color=white;">Đặt hàng</a>
    </div>
</div>
    ';
        }}
}

?>


<style>
    .product-details {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 20px;
    border: 1px solid #ccc;
}

.product-image img {
    max-width: 200px;
    height: auto;
}

.product-info {
    max-width: 60%;
}

.product-info h2 {
    color: #ff0000; /* Màu đỏ cho tiêu đề */
}

.product-info p {
    font-size: 16px; /* Cỡ chữ 16px cho đoạn văn bản */
}

.product-info button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

</style>