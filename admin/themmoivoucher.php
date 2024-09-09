<div class="shop-page-content">
    <a href="./index.php?act=dsvoucher" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm mới voucher </p>
        <?php
        if(isset($_POST['button'])){
            $tenvoucher = $_POST['tenvoucher'];
            $giatri = $_POST['giatri'];
            $ngay = $_POST['ngay'];
            $error = validation(['name' => $tenvoucher,'giatri' => $giatri,'ngaynhap' => $ngay])  ; 
            if(empty($error)){
                $sql = "INSERT INTO voucher(ten_voucher, gia_tri,ngay_ket_thuc) VALUES ('$tenvoucher', '$giatri', '$ngay')";
                pdo_execute($sql);
                setcookie("massage","Thêm thành công ",time()+1) ; 
                header("Location: index.php?act=dsvoucher ");
            }

        }
        ?>

        <form action="" method="post">
            <div class="add">
                <label for="">Tên voucher </label>
                <div>
                    <input name="tenvoucher" type="text" class="tennganhhang" id="" >
                </div>
            </div>
            <div class="add">
                <label for="">Giá trị voucher  </label>
                <div>
                    <input name="giatri" type="text" class="tennganhhang" id="" >
                </div>
            </div>
            <div class="add">
                <label for="">Ngày kết thúc </label>
                <div>
                    <input name="ngay" type="date" class="tennganhhang" id="" >
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