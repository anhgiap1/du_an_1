<div class="shop-page-content">
    <a href="./index.php?act=thongtincanhan" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <?php
    $maKh = $_SESSION['khachhang']['ma_kh'] ; 
    $sql = "select * from khach_hang where ma_kh =$maKh";
    $row = pdo_query_one($sql);
    // print_r($row) ;
    ?>
    <?php
    $error = "" ;
    if(isset($_POST['submit'])){
        $matkhaucu = $_POST['matkhaucu'];
        $matkhaumoi = $_POST['matkhaumoi'];
        $nhaplaimk = $_POST['nhaplaimk'];
        if($matkhaucu !== $row['mat_khau'] ){
            $error = "Mật Khẩu Cũ không chính xác !" ;
            }else if(strlen($matkhaumoi) <= 6){
                $error = "Mật khẩu phải lớn hơn 6 kí tự !" ;
            }else if($matkhaumoi !== $nhaplaimk){
            $error = "Mật Khẩu nhập lại không chính xác !" ;
            }

        if(empty($error)){
            $sql = "UPDATE khach_hang SET mat_khau = '$matkhaumoi' where ma_kh = $maKh ";
            pdo_execute($sql);
            setcookie("massage","Đổi mật khẩu thành công ",time()+1) ; 
            header("Location: ./index.php?act=thongtincanhan") ; 
        }
        
    }
    ?>
    <div class="themdm" style="margin-left:147px;">
        <p class="tieude">Đổi mật khẩu</p>
        <form action="" method="post">
            <div class="add">
                <label for="">Mật khẩu cũ</label>
                <div>
                <input type="password" name="matkhaucu" class="mkcu" id="" placeholder="Nhập mật khẩu cũ">
                </div>
            </div>
            <div class="add">
                <label for="">Mật khẩu mới</label>
                <div>
                <input type="password" name="matkhaumoi" class="mkmoi" id="" placeholder="Nhập mật khẩu mới">
                </div>
            </div>
            <div class="add">
                <label for="">Nhập lại mật khẩu</label>
                <div>
                <input type="password" name="nhaplaimk" class="nhaplaimk" id="" placeholder="Nhập lại mật khẩu">
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit" style="margin-right: 199px;">
                <button type="reset" class="huy">Hủy</button>
                <button type="submit" name="submit" class="luu">Cập nhật</button>
            </div>
        </form>
    </div>

</div>