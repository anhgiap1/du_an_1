<?php
        if(isset($_POST['submit'])){ 
        $tenKH = trim(htmlspecialchars($_REQUEST['hoten'])) ; 
        $taiKhoan = trim(htmlspecialchars($_REQUEST['taikhoan'])) ; 
        $email = htmlspecialchars($_REQUEST['email']) ; 
        $sdt = htmlspecialchars($_REQUEST['sdt'])  ; 
        $vaiTro = $_REQUEST['vaitro'] ; 
        $dest = $_FILES['hinhanh']['tmp_name'] ;
        $new = "./assets/imgs/".basename( $_FILES['hinhanh']['name']);
        $image =  $_FILES['hinhanh']['name'] ;
        $matKhau = trim(htmlspecialchars($_REQUEST['matkhau'])) ; 
        $diaChi = $_REQUEST['diachi'] ; 
        $tenShop = $_REQUEST['tenshop'] ; 
        $error = validation(['user' => $taiKhoan, 'name' => $tenKH, 'email' => $email,'sdt' => $sdt,'pass' => $matKhau, 'image' => $new, 'vaiTro' => $vaiTro,'diachi'=>$diaChi]) ; 
        if(empty($error)){
            move_uploaded_file($dest,".".$new) ; 
            insert_All_Khach_Hang($tenKH,$taiKhoan,$matKhau,$new,$email,$sdt,$diaChi,$vaiTro,$tenShop) ; 
            setcookie("massage","Thêm thành công ",time()+1) ; 
            header("Location:./index.php?act=dskhachhang");
        }
    }
?>
<div class="shop-page-content">
    <a href="./index.php?act=dskhachhang" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm khách hàng</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="add">
                <label for="">Họ và Tên</label>
                <div>
                <input type="text" class="tendm" id="" placeholder="Nhập họ và tên của bạn" name="hoten">
                </div>
            </div>
            <div class="add">
                <label for="">Tài Khoản</label>
                <div>
                <input type="text" class="tk" id="" placeholder="Nhập tài khoản của bạn" name="taikhoan">
                </div>
            </div>
            <div class="add">
                <label for="">Mật khẩu</label>
                <div>
                <input type="password" class="mk" id="" placeholder="Nhập mật khẩu" name="matkhau">
                </div>
            </div>
            <div class="add">
                <label for="">Email</label>
                <div>
                <input type="text" class="email" id="" placeholder="Nhập email" name="email">
                </div>
            </div>
            <div class="add">
                <label for="">Số điện thoại </label>
                <div>
                <input type="text" class="email" id="" placeholder="Nhập số điện thoại " name="sdt">
                </div>
            </div>
            <div class="add">
                <label for="">Vai trò</label>
                <div>
                <input type="number" class="email" id="" placeholder="Nhập vai trò" name="vaitro">
                </div>
            </div>
            <div class="add">
                <label for="">Địa chỉ</label>
                <div>
                <input type="text" class="dc" id="" placeholder="Nhập địa chỉ" name="diachi">
                </div>
            </div>
            <div class="add">
                <label for="">Hình ảnh</label>
                <div>
                <input type="file" class="anh" id="" placeholder="Nhập hình ảnh" name="hinhanh">
                </div>
            </div>
            <div class="add">
                <label for="">Tên shop</label>
                <div>
                <input type="text" class="dc" id="" placeholder="Nhập tên shop" name="tenshop">
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit">
                <button class="huy" type="reset">Hủy</button>
                <button class="luu" type="submit" name="submit">Lưu và hiển thị</button>
            </div>
        </form>
    </div>

</div>