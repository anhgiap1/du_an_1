<?php
            if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                $giatri=$_POST['giatri'];
                $maShop = $_SESSION['khachhang']['ma_kh'] ; 
                $error = validation(['name' => $giatri])  ; 
                if(empty($error)){
                $sql="INSERT INTO mau_sac(gia_tri,ma_shop) VALUES('$giatri','$maShop')";
                pdo_execute($sql);
                setcookie("massage","Thêm thành công ",time()+1) ; 
                header("location: ./index.php?act=dsmausac");
                }
            }
        ?>
<div class="shop-page-content">
    <a href="./index.php?act=dsmausac" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm mới màu sắc </p>
        <form action="" method="POST">
            <div class="add">
                <label for="" class="gia-tri" style="width:80px;font-size: 16px">Giá trị </label>
                <div>
                    <input type="text" name="giatri" class="tennganhhang" id="" >
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit" style="margin-right: 204px;">
                    <button class="huy">Hủy</button>
                    <!-- <a href="#" style="text-decoration: none;" class="luu" name="themmoi">Lưu và hiển thị</a> -->
                    <input type="submit" name="themmoi" value="Lưu và hiển thị" style="text-decoration: none;" class="luu">
            </div>
        </form>

        
    </div>
</div>