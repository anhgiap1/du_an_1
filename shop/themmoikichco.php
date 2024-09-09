<?php
        if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
            $giatri=$_POST['giatri'];
            $maShop = $_SESSION['khachhang']['ma_kh'] ;
            $error = validation(['name' => $giatri])  ; 
            if(empty($error)){
            $sql="INSERT INTO kich_co(gia_tri,ma_shop) VALUES('$giatri','$maShop')";
            pdo_execute($sql);
            $thongbao="Thêm thành công";
            setcookie("massage",$thongbao,time()+1) ; 
            header("location: ./index.php?act=dskichco");
            }
        }
        ?>
<div class="shop-page-content">
    <a href="./index.php?act=dskichco" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm mới kích cỡ </p>
        <form action="" method="POST">
            <div class="add">
                <label for="" class="gia-tri" style="width:80px;font-size: 16px">Giá trị </label>
                <div>
                    <input type="text" name="giatri" class="tennganhhang" id="">
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit" style="margin-right: 204px;">
                <button class="huy">Hủy</button>
                <input type="submit" name="themmoi" value="Lưu và hiển thị" style="text-decoration: none;" class="luu">
            </div>
        </form>

    </div>
</div>