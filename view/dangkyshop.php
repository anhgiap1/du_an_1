<?php
if(isset($_SESSION['khachhang'])){
$maKh = $_SESSION['khachhang']['ma_kh'] ; 
if(isset($_POST['dangkyshop'])){
    $tenShop = $_POST['tenshop'];
    $diaChi = $_POST['diachi'];
    $dest = $_FILES['anhShop']['tmp_name'] ;
    $new = "./assets/imgs/".basename( $_FILES['anhShop']['name']);
    $error = validation(['name' => $tenShop,'image' => $new,'diachi'=>$diaChi]) ; 
    if(empty($error)){
    move_uploaded_file($dest,$new) ; 
    dang_Ky_Shop($tenShop,$diaChi,$new,$maKh) ; 
    $_SESSION['khachhang']['vai_tro'] = 1  ;
    setcookie("massage","Đăng ký shop thành công ",time()+1) ; 
    header("Location: ./shop/index.php") ;
    }
}
}
?>

<style> 
    .div-all{
        border:none;
    }
</style>
<div class="dau">
    <div class="dautien" style="color:var(--orange);display:block;">
        <h3> <i class="fa-solid fa-shop"></i> Đăng ký để trở thành người bán</h3>
    </div>
    <div class="giua" style="font-weight:500">
        Cài đặt thông tin của cửa hàng
    </div>
    <div class="cuoi">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="div-all">
                <label for="">Tên shop</label>
                <input type="text" name="tenshop">
            </div>
            <div class="div-all">
                <label for="">Địa chỉ</label>
                <input type="text" name="diachi">
            </div>
            <div class="div-all">
                <label for="">Ảnh đại diện shop </label>
                <input type="file" style="padding:6px 0;" name="anhShop"> 
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="all">
                <button type="reset">Hủy</button>
                <button type="submit" name="dangkyshop">Đăng ký</button>
            </div>

        </form>
    </div>
</div>