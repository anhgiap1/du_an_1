<?php 
ob_start() ;  
session_start() ; 
if(!isset($_SESSION['khachhang']) ||  $_SESSION['khachhang']['vai_tro'] != 2 ){
    header("Location: ../index.php") ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de44c2f79a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/shop.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div class="home-page">
        <?php require "./header.php" ?>
        <div class="container container-shop">
        <?php
        require "../model/pdo.php" ;
        require "../model/khachhang.php" ;
        require "../model/validate.php" ; 
        require "../model/hanghoa.php" ; 

         ?>          
            <!-- <a href="../index.php" class="btn-quaylai-trang-chu" ><i style="margin-right:8px;font-size:12px;" class="fa-solid fa-chevron-left"></i>Trang chủ</a> -->
            <main>
                <section class="shop-page">
                 <?php include "./navbar.php" ?>
                    <?php 
                    if(isset($_GET['act']) && $_GET['act'] != ""){
                        $act = $_GET['act'] ; 
                            switch ($act) {
                                case 'themmoinganhhang':
                                require "./themmoinganhhang.php" ; 
                                break;
                                case 'capnhatnganhhang':
                                require "./capnhatnganhhang.php" ; 
                                break;
                                case 'dsloaihang':
                                require "./quanlydm.php" ; 
                                break;
                                case 'themmoiloaihang':
                                require "./themdanhmuc.php" ; 
                                break;
                                case 'capnhatloaihang':
                                require "./capnhatdanhmuc.php" ; 
                                break;
                                case 'dsvoucher':
                                require "./dsvoucher.php" ; 
                                break;
                                case 'themmoivoucher':
                                require "./themmoivoucher.php" ; 
                                break;
                                case 'capnhatvoucher':
                                require "./capnhatvoucher.php" ; 
                                break;
                                case 'dskhachhang':
                                require "./qlykhachhang.php" ; 
                                break;
                                case 'themmoikh':
                                require "./themmoikhachhang.php" ; 
                                break;
                                case 'capnhatkh':
                                require "./capnhatkhachhang.php" ; 
                                break;
                                case 'thongkeshop':
                                require "./thongkeshop.php" ; 
                                break;
                                case 'chitietkhachhang':
                                require "./chitietkhachhang.php" ; 
                                break;
                                default:
                                break;
                            }
                        }else{
                            require "./home.php" ; 
                        } 
                    ?>
                </section>
            </main>
        </div>
    </div>
    <?php require "../global/footer.php" ?>

</body>
<script src="../main.js"></script>

</html>