
<?php
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $sql="select * from kich_co where ma_kc = '$id'";
                $kichco=pdo_query_one($sql);
            }
            if (isset($_POST['capnhat'])) {
                $gtri=$_POST['giatri'];
                $error = validation(['name' => $gtri])  ; 
                if(empty($error)){
                $update="update kich_co set gia_tri='$gtri' where ma_kc='$id'";
                pdo_execute($update);
                setcookie("massage","Cập nhật thành công ",time()+1) ; 
                header("location: ./index.php?act=dskichco");
                }
            }
        ?>
<div class="shop-page-content">
    <a href="./index.php?act=dskichco" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Cập nhật kích cỡ </p>
        <form action="" method="POST">
            <div class="add">
                <label for="" class="gia-tri" style="width:80px;font-size: 16px">Giá trị </label>
                <div>
                    <input type="text" name="giatri" class="tennganhhang" value="<?= $kichco['gia_tri']?>" >
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit" style="margin-right: 204px;">
                <button class="huy">Hủy</button>
                <input type="submit" name="capnhat" value="Lưu và hiển thị" style="text-decoration: none;" class="luu">
            </div>
        </form>
        

    </div>

</div>