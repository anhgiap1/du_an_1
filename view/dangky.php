<div class="dangky">
    <?php
    if(isset($_POST['them'])){
        $hoten = $_POST['hoten'];
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        $email = $_POST['email'];
        $nhaplaimatkhau = $_POST['nhaplaimatkhau'];
        // $address = $_POST['address'];
        // $hinhanh = $_FILES['hinhanh'];
        // if($hinhanh['name'] == ''){
        //     $err = "Loi anh";
        // }else{
        //     $duongdananh = "../assets/imgs/".basename($hinhanh['name']);
        //     $anh_tam = $hinhanh['tmp_name'];
        //     move_uploaded_file($anh_tam,$duongdananh);
        // }
        // $duongdananh ="./assets/imgs/".basename($_FILES['hinhanh']['name']);
        // $anh_tam= $_FILES['hinhanh']['tmp_name'];
        $error = validation(['user' => $taikhoan, 'name' => $hoten, 'email' => $email,'pass' => $matkhau]);
        if($matkhau !== $nhaplaimatkhau){
            $error = "Mật khẩu nhập lại không chính xác !" ; 
        }
        if(empty($error)){
            $sql = "INSERT INTO khach_hang(ho_ten,tai_khoan,mat_khau,email,vai_tro) values('$hoten','$taikhoan','$matkhau','$email',0)";
            pdo_execute($sql);
            setcookie("massage","Đăng ký thành công ",time()+1) ; 
            header("Location: ./index.php?act=dangnhap") ;
           
        }


    }
    ?>
    <div class="form">
        <form action="" method="post" class="sign-in" enctype="multipart/form-data">
            <h3>Đăng Ký</h3>
            <input type="text" name="hoten" placeholder="Họ và Tên ...">
            <br>
            <input type="text" name="taikhoan" placeholder="Tài khoản ...">
            <br>
            <input type="password" name="matkhau" placeholder="Mật khẩu ...">
            <br>
            <input type="password" name="nhaplaimatkhau" placeholder="Nhập lại mật khẩu ...">
            <br>
            <input type="text" name="email" placeholder="Email ...">
            <br>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <input class="hay" type="submit" name="them" value="Đăng Ký">
            <br>
            <div class="dn">
                <a href="./index.php?act=dangnhap">Đăng Nhập</a>
            </div>
        </form>
    </div>
</div>