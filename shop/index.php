<?php ob_start() ; 
session_start() ;  
if(!isset($_SESSION['khachhang']) ||  $_SESSION['khachhang']['vai_tro'] != 1 ){
    header("Location: ../index.php") ;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kênh Bán Hàng </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de44c2f79a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/shop.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/capnhattk.css">
    <link rel="stylesheet" href="./assets/css/ctsp.css">
    <link rel="stylesheet" href="./assets/css/thanhtoan.css">


    <script src="https://kit.fontawesome.com/de44c2f79a.js" crossorigin="anonymous"></script>
</head>
<style>
</style>

<body>
    <div class="home-page">
       <?php require "./header.php" ?>
        <div class="container container-shop"  style="padding-bottom:0;">
        <?php require "../model/pdo.php" ;
             require "../model/hanghoa.php" ;
             require "../model/bienthe.php" ;
             require "../model/loaihang.php" ;
             require "../model/danhgia.php" ;
             require "../model/donhang.php" ;
             require "../model/validate.php" ;
         ?>
            <!-- <a href="../index.php" class="btn-quaylai-trang-chu" ><i style="margin-right:8px;font-size:12px;" class="fa-solid fa-chevron-left"></i>Trang chủ</a> -->

            <main>
                <section class="shop-page">
                <?php require "./navbar.php" ?> 
                    <!-- Bắt đầu làm vào trong này -->
                        <?php
                        if(isset($_GET['act']) && $_GET['act'] != ""){
                            $act = $_GET['act'] ; 
                                switch ($act) {
                                    case 'themsanpham':
                                    require "./themsanpham.php" ; 
                                    break;
                                    case 'capnhatsanpham':
                                    require "./capnhatsanpham.php" ; 
                                    break;
                                    case 'quanlydonhang':
                                    require "./quanlydonhang.php" ; 
                                    break;
                                    case 'thongkesoluong':
                                    require "./thongkesoluong.php" ; 
                                    break;
                                    case 'thongkesoluongban':
                                    require "./thongkesoluongban.php" ; 
                                    break;
                                    case 'quanlydanhgia':
                                    require "./qlydanhgia.php" ; 
                                    break;
                                    case 'chitietdanhgia':
                                    require "./chitietdanhgia.php" ; 
                                    break;
                                    case 'dsmausac':
                                    require "./dsmausac.php" ; 
                                    break;
                                    case 'capnhatmausac':
                                    require "./capnhatmausac.php" ; 
                                    break;
                                    case 'dskichco':
                                    require "./dskichco.php" ; 
                                    break;
                                    case 'capnhatkichco':
                                    require "./capnhatkichco.php" ; 
                                    break;
                                    case 'themmoikichco':
                                    require "./themmoikichco.php" ; 
                                    break;
                                    case 'themmoimausac':
                                    require "./themmoimausac.php" ; 
                                    break;
                                    case 'chitiethanghoa':
                                    require "./chitiethanghoa.php" ; 
                                    break;
                                    case 'thembienthesp':
                                    require "./thembienthesp.php" ; 
                                    break;
                                    case 'capnhatbienthesp':
                                    require "./capnhatbienthesp.php" ; 
                                    break;
                                    case 'danhgiaan':
                                    require "./danhgiaan.php" ; 
                                    break;
                                    case 'khoiphucsanpham':
                                    require "./khoiphucsanpham.php" ; 
                                    break;
                                    case 'chitietdonhang':
                                    require "./chitietdonhang.php" ; 
                                    break;
                                    case 'thongkedoanhthu':
                                    require "./thongkedoanhthu.php" ; 
                                    break;
                                    default:
                                    break;
                                }
                            }else{
                                require "./home.php" ; 
                            }
                        ?>
                    <!-- Tới đây -->
                </section>
            </main>
        </div>
       <?php require "../global/footer.php" ?>
    </div>
</body>
<script src="../main.js"></script>

</html>