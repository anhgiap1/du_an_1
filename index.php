<?php
ob_start() ;
 session_start() ; 
 if(isset($_GET['dx'])){
    unset($_SESSION['khachhang']) ; 
    unset($_SESSION['giohang']) ; 
    setcookie("massage","Đăng xuất thành công ",time()+1) ; 
    header("Location: ./index.php") ; 
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de44c2f79a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/shop.css">
    <link rel="stylesheet" href="./assets/css/xemshop.css">
    <link rel="stylesheet" href="./assets/css/giohang1.css">
    <link rel="stylesheet" href="./assets/css/thongtincn.css">
    <link rel="stylesheet" href="./assets/css/capnhattk.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/thanhtoan.css">
    <link rel="stylesheet" href="./assets/css/ctsp.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>  
        <?php  ?>
    <div class="home-page">
         <!--Bắt đầu header  -->
            <?php require "./view/header.php" ?>
         <!--kết thúc header  -->
        <div class="container container-main">
        <?php 
        require "./model/pdo.php" ;
             require "./model/hanghoa.php" ;
             require "./model/bienthe.php" ;
             require "./model/loaihang.php" ;
             require "./model/khachhang.php" ;
             require "./model/shop.php" ;
             require "./model/voucher.php" ;
             require "./model/donhang.php" ;
             require "./model/login.php" ;
             require "./model/danhgia.php" ;
             require "./model/validate.php" ;
             

        if(isset($_GET['act']) && $_GET['act'] != ""){
        $act = $_GET['act'] ; 
            switch ($act) {
                case 'danhmucsanpham':
                require "./view/danhmucsp.php" ; 
                break;
                case 'chitietsanpham':
                require "./view/chitietsanpham.php" ; 
                break;
                case 'shop':
                require "./view/shop.php" ; 
                break;
                case 'giohang':
                require "./view/giohang.php" ; 
                break;
                case 'thanhtoan':
                require "./view/thanhtoan.php" ; 
                break;
                case 'donhang':
                require "./view/donhang.php" ; 
                break;
                case 'thongtincanhan':
                require "./view/thongtincn.php" ; 
                break;
                case 'capnhatthongtin':
                require "./view/capnhatthongtinkh.php" ; 
                break;
                case 'dangky':
                require "./view/dangky.php" ; 
                break;
                case 'dangnhap':
                require "./view/dangnhap.php" ; 
                break;
                case 'dangkyshop':
                require "./view/dangkyshop.php" ; 
                break;
                case 'quenmatkhau':
                require "./view/quenmk.php" ; 
                break;
                case 'danhgia':
                require "./view/danhgia.php" ; 
                break;
                case 'thaydoidiachi':
                require "./view/thaydoidiachi.php" ; 
                break;
                case 'doimatkhau':
                require "./view/doimatkhau.php" ; 
                break;
                case 'xulybienthe':
                require "./view/xulybienthe.php" ; 
                break;
                case 'chitietdonhang':
                require "./view/chitietdonhang.php" ; 
                break;
                default:
                break;
            }
        }else{
            require "./view/home.php" ; 
        }
        ?>
        </div>
        <!-- Bắt đầu Footer -->
        <?php require "./view/footer.php" ?>
        <!-- Kết thúc Footer -->
    </div>
    <script src="./main.js"></script>
    <script src="./slider.js"></script>
</body>
</html>