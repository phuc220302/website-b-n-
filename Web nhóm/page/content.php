<div class="content">
        <?php
            if(isset($_GET['quanli'])){
                $kt = $_GET['quanli'];
            }else{
                $kt = '';
            }

            if($kt=='aonu'){
                include("menu/aonu.php");
            }else if($kt=='chanvay'){
                include("menu/chanvay.php");
            }else if($kt=='dam'){
                include("menu/dam.php");
            }else if($kt=='dobo'){
                include("menu/dobo.php");
            }else if($kt=='quannu'){
                include("menu/quannu.php");
            }else if($kt=='login'){
                include("page/login.php");
            }else if($kt=='sign'){
                include("page/sign.php");
            }else if($kt=='thongtinsanpham'){
                include("page/thongtinsanpham.php");
            }else if($kt=='giohang'){
                include("page/giohang.php");
            }else if($kt=='timkiem'){
                include("page/timkiem.php");
            }else if($kt=='donhangdadat'){
                include("menu/donhangdadat.php");
            }else{
                include("menu/index.php");
            }

        ?>
</div>