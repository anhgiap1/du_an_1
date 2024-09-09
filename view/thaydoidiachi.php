<?php 
    $maKh = $_GET['makh'] ;
    if(isset($_POST['capnhat'])){
        $viTriMoi = $_POST['diaChiMoi'] ;
        $sdt = $_POST['soDienThoai'] ;
        $error = validation(['name' => $viTriMoi,'sdt' => $sdt])  ; 
        if(empty($error)){
        update_Location($maKh,$viTriMoi,$sdt) ;
        header("Location: ./index.php?act=thanhtoan&update=true") ;
        }

    }

?>
<section class="shop-page-main">
    <!-- Bắt đầu làm vào trong này -->
    <div class="shop-page-content">
        <a href="./index.php?act=thanhtoan&check=true" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
        <div class="themdm">
            <p class="tieude">Thay đổi địa chỉ</p>
            <form action="" method="POST">
                <div class="add">
                    <label for="">Địa chỉ </label>
                    <div>
                        <input type="text" class="diachi" id="" placeholder="Nhập địa chỉ" name="diaChiMoi">
                    </div>
                </div>
                <div class="add">
                    <label for="">Số điện thoại </label>
                    <div>
                        <input type="number" class="diachi" id="" placeholder="Nhập địa chỉ" name="soDienThoai">
                    </div>
                </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
                <div class="submit">
                    <button class="huy" type="reset">Hủy</button>
                    <button class="luu" type="submit" name="capnhat">Cập nhật </button>
                </div>
            </form>
        </div>

    </div>
    <!-- Tới đây -->
</section>