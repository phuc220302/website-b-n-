
        <h1>Sản phẩm nổi bật</h1>
        <div class="row">
            <div class="main-content">
                <div class="container">
                    <h3>Bộ sưu tập</h3>
                    <div class="bst-img">
                        <a href="index.php?quanli=aonu"><img src="img/trangchu_bosuutap_a1.webp" alt=""></a>
                        <a href="index.php?quanli=dobo"><img src="img/trangchu_bosuutap_a2.webp" alt=""></a>
                        <a href="index.php?quanli=chanvay"><img src="img/trangchu_bosuutap_a3.webp" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="container">
                    <h3>Bán chạy nhất</h3>
                    <div class="row">
                    <?php
                        include('ketnoi/ketnoi.php');

                        // Truy vấn dữ liệu từ CSDL
                        $sql = "SELECT masanpham, img , thongtinsanpham, gia,loaisanpham FROM sanpham ";
                        $result = $conn->query($sql);
                        $kt = 'banchay';

                        // Kiểm tra và hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if($kt == $row["loaisanpham"]){
                                    $gia_formatted = number_format($row['gia'], 0, ',', '.');
                                    echo '<div class="col-xl-2 col-lg-3 col-md-3 col-6">
                                            <div class="item">
                                                <a href="index.php?quanli=thongtinsanpham&id='.$row['masanpham'].'"><img src="admin/upload/'.$row['loaisanpham'].'/'. $row['img'] .'" alt=""></a>
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
            <div class="main-content">
                <div class="container">
                    <h3>Đang giảm giá 30%</h3>
                    <div class="row">
                    <?php
                        include('ketnoi/ketnoi.php');

                        // Truy vấn dữ liệu từ CSDL
                        $sql = "SELECT masanpham, img , thongtinsanpham, gia,loaisanpham FROM sanpham ";
                        $result = $conn->query($sql);
                        $kt = 'giamgia';
                        
                        // Kiểm tra và hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if($kt == $row["loaisanpham"]){
                                    $gia_formatted = number_format($row['gia'], 0, ',', '.');
                                    $sale =number_format($row['gia'] + ($row['gia']*3)/10, 0, ',', '.');
                                    echo '<div class="col-xl-2 col-lg-3 col-md-3 col-6">
                                            <div class="item">
                                                <a href="index.php?quanli=thongtinsanpham&id='.$row['masanpham'].'"><img src="admin/upload/'.$row['loaisanpham'].'/'. $row['img'] .'" alt=""></a>
                                                <a href="index.php?quanli=thongtinsanpham">' . $row['thongtinsanpham'] . '</a>
                                                <span style="display: inline-block; vertical-align: top;">
                                                    <p style="display: inline-block; margin: 0;text-decoration: line-through;">' . $sale . 'đ</p>
                                                    <p style="display: inline-block; margin: 0;">' . $gia_formatted . 'đ</p>                                                   
                                                </span>    
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
        


