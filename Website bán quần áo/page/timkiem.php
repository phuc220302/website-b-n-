<h1>Kết quả tìm kiếm</h1>
<div class="row">
    <div class="main-content">
        <div class="container">
            <div class="row">
                <?php
                include('ketnoi/ketnoi.php');

                if (isset($_POST['keyword'])) {
                    $keyword = $_POST['keyword'];
                    

                    $sql = "SELECT masanpham, img, thongtinsanpham, gia, loaisanpham FROM sanpham WHERE thongtinsanpham LIKE '%$keyword%'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $gia_formatted = number_format($row['gia'], 0, ',', '.');
                            echo '<div class="col-xl-2 col-lg-3 col-md-3 col-6">
                                    <div class="item">
                                        <a href="index.php?quanli=thongtinsanpham"><img src="admin/upload/'.$row['loaisanpham'].'/'. $row['img'] .'" alt=""></a>
                                        <a href="index.php?quanli=thongtinsanpham">' . $row['thongtinsanpham'] . '</a>
                                        <p>' . $gia_formatted . 'đ</p>
                                        <a class="btn btn-warning" href="page/xulithemgiohang.php?id=' . $row['masanpham'] . '&quanli=giohang" role="button" style="color: white;">Đặt hàng</a> 
                                    </div>
                                </div>';
                        }
                    } else {
                        echo "Không tìm thấy sản phẩm.";
                    }

                    $conn->close();
                } else {
                    echo "Vui lòng nhập từ khóa tìm kiếm.";
                }
                ?>
            </div>
        </div>
    </div>
</div>
