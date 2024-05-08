


<div class="header">
        <div class="container py-1">
            <div class="row">
                <div class="col-md-1">
                    <div class="logo">
                        <a href="index.php"><img src="img/logo2.svg" alt=""></a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="menu">
                        <li><a href="index.php">Sản phẩm nổi bật</a></li>
                        <li><a href="index.php?quanli=aonu">Áo nữ</a></li>
                        <li><a href="index.php?quanli=quannu">Quần nữ</a></li>
                        <li><a href="index.php?quanli=dobo">Đồ bộ</a></li>
                        <li><a href="index.php?quanli=dam">Đầm</a></li>
                        <li><a href="index.php?quanli=chanvay">Chân váy</a></li>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group mb-3">
                    <form action="index.php?quanli=timkiem" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search.." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="login-sign">
                        <button type="button" id="gio-hang" class="btn btn-warning "><a href="index.php?quanli=giohang"><i class="fa-solid fa-cart-shopping"style=" color:white;"></i></a></button>
                        <a class="btn btn-warning" href="index.php?dangxuat=1" role="button">Đăng xuất:<?php
                            if(isset($_SESSION['dangnhap'])) {
                                echo '<span> ' . $_SESSION['ten'] . '</span>';
                            }
                            ?></a> 
                        
                        <?php
                            if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
                                unset($_SESSION['dangnhap']);
                                //session_destroy();
                                header('location:page/login.php');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
    