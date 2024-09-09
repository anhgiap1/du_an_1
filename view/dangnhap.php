<?php 
$error = "" ;
    if(isset($_POST['login'])){
        $taiKhoan = $_POST['taikhoan'] ;
        $matKhau = $_POST['matkhau'] ; 
        $khachHang = check_login($taiKhoan,$matKhau) ; 
         if($khachHang === false){
            $error =  "Tài khoản hoặc Mật khẩu không chính xác ! " ;
        }else{
            setcookie("massage","Đăng nhập thành công ",time()+1) ; 
            $_SESSION['khachhang'] = $khachHang ; 
            if($khachHang['vai_tro'] === 2){
                header("Location: ./admin/index.php") ; 
            }else if(isset($_GET['add'])){
                header("Location: ./index.php?act=chitietsanpham&mahh=".$_GET['add']) ; 
            }else{
                header("Location: ./index.php") ; 
            }
        }
    }
?>

<div class="dangnhap">
    <form action="" method="post">
        <h3>Đăng Nhập</h3>
        <input type="text" placeholder="Tài khoản ..." name="taikhoan">
        <br>
        <input type="password" placeholder="Mật khẩu ..." name="matkhau">
        <br>
        <p id="error"><?= isset($error) ? $error : "" ?></p>
        <input class="nut-dangnhap" type="submit" name="login" value="Đăng Nhập">
        <br>
        <div class="just">
            <a href="./index.php?act=quenmatkhau">Quên mật khẩu</a>
            <a href="./index.php?act=dangky">Đăng Ký</a>
        </div>
    </form>
</div>