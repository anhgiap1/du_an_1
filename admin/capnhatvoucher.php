<div class="shop-page-content">
    <a href="./index.php?act=dsvoucher" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Cập nhật mới voucher </p>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql= "select * from voucher where ma_voucher = '$id'";
            $movie =pdo_query_one($sql);

        }
        if(isset($_POST['button'])){
            $tenvoucher = $_POST['tenvoucher'];
            $giatri = $_POST['giatri'];
            $ngay = $_POST['ngay'];
            $error = validation(['name' => $tenvoucher,'giatri' => $giatri,'ngaynhap' => $ngay])  ; 
            if(empty($error)){
            $sql="UPDATE voucher SET ten_voucher='$tenvoucher', gia_tri ='$giatri',ngay_ket_thuc='$ngay' where ma_voucher= '$id' ";
            pdo_execute($sql);
            setcookie("massage","Cập nhật thành công ",time()+1) ; 
            header("Location: ./index.php?act=dsvoucher");
            }
        }
        ?>

        <form action="" method="post">
            <div class="add">
                <label for="">Tên voucher </label>
                <div>
                    <input name="tenvoucher" type="text" class="tennganhhang" id="" value="<?php echo $movie['ten_voucher'];?>">
                </div>
            </div>
            <div class="add">
                <label for="">Giá trị voucher  </label>
                <div>
                    <input name="giatri" type="text" class="tennganhhang" id="" value="<?php echo $movie['gia_tri'];?>">
                </div>
            </div>
            <div class="add">
                <label for="">Ngày kết thúc </label>
                <div>
                    <input name="ngay" type="date" class="tennganhhang" id="" value="<?php echo $movie['ngay_ket_thuc'];?>">
                </div>
            </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit">
                <button class="huy">Hủy</button>
                <button name="button" class="luu">Lưu và hiển thị</button>
            </div>
        </form>
    </div>

</div>