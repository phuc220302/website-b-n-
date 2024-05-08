 
        <h1>Áo nữ</h1>
        <div class="row">
            <div class="main-content">
                <div class="container">
                    <div class="row">
                    <?php
                        include('ketnoi/ketnoi.php');

                        // Truy vấn dữ liệu từ CSDL
                        $sql = "SELECT masanpham, img , thongtinsanpham, gia,loaisanpham FROM sanpham ";
                        $result = $conn->query($sql);
                        $kt = $_GET["quanli"];

                        // Kiểm tra và hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if($kt == $row["loaisanpham"]){
                                    $gia_formatted = number_format($row['gia'], 0, ',', '.');
                                    echo '<div class="col-xl-2 col-lg-3 col-md-3 col-6">
                                            <div class="item">
                                                <a href="index.php?quanli=thongtinsanpham&id='.$row['masanpham'].'"><img src="admin/upload/'.$kt.'/'. $row['img'] .'" alt=""></a>
                                                <a href="index.php?quanli=thongtinsanpham">' . $row['thongtinsanpham'] . '</a>
                                                <p>' . $gia_formatted . 'đ</p>
                                                <a class="btn btn-warning" href="page/xulithemgiohang.php?id=' . $row['masanpham'] . '&quanli=giohang" role="button" style="color=white;">Đặt hàng</a> 
                                            </div>
                                        </div>';
                                }
                            }
                        } else {
                            echo "No images found";
                        }

                        // Đóng kết nối
                        $conn->close();
                        ?>

                    
                    </div>
                </div>
            </div>
        </div>
     