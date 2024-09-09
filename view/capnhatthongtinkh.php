<?php
    $maKh = $_SESSION['khachhang']['ma_kh'] ; 
    $sql = "select * from khach_hang where ma_kh = $maKh";
    $khachHang = pdo_query_one($sql);
    if (isset($_POST['submit'])){
        $hoten = $_POST['hoten'];
        $taikhoan = $_POST['taikhoan'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $tenShop = $_POST['tenshop'] ;
        $diachi = $_POST['diachi'];
            if ($_FILES['hinhanh']['name'] === "") {
                $new = $khachHang['hinh_anh'];
            }else{
                $new = "./assets/imgs/" . basename($_FILES['hinhanh']['name']);
                $dest = $_FILES['hinhanh']['tmp_name'];
            }
        $error = validation(['user' => $taikhoan, 'name' => $hoten, 'email' => $email,'sdt' => $sdt, 'image' => $new,'diachi'=>$diachi],$maKh) ; 
        if(empty($error)){
        move_uploaded_file($dest, $new);
        $sql = "UPDATE khach_hang SET ho_ten = '$hoten' , tai_khoan = '$taikhoan',email = '$email',so_dien_thoai = '$sdt',dia_chi = '$diachi',hinh_anh = '$new',ten_shop = '$tenShop' WHERE ma_kh = $maKh";
        pdo_execute($sql);
        setcookie("massage","Cập nhật thành công ",time()+1) ; 
        header("Location: ./index.php?act=thongtincanhan") ;
        }
        }

?>
<div class="shop-page-content">
    <a href="./index.php?act=thongtincanhan" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm" style="margin-left:153px;">
        <p class="tieude">Cập nhật khách hàng</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="add">
                <label for="">Họ và Tên</label>
                <div>
                <input type="text" class="tendm" id="" placeholder="Nhập họ và tên của bạn" name="hoten" value="<?= $khachHang['ho_ten'] ?>">
                </div>
            </div>
            <div class="add">
                <label for="">Tài Khoản</label>
                <div>
                <input type="text" class="dc" id="" placeholder="Nhập tài khoản của bạn" name="taikhoan" value="<?= $khachHang['tai_khoan'] ?>">
                </div>
            </div>
            <div class="add">
                <label for="">Email</label>
                <div>
                <input type="text" class="email" id="" placeholder="Nhập email" name="email" value="<?= $khachHang['email'] ?>">
                </div>
            </div>
            <div class="add">
                <label for="">Số điện thoại </label>
                <div>
                <input type="number" class="email" id="" placeholder="Nhập số điện thoại " name="sdt" value="<?= $khachHang['so_dien_thoai'] ?>">
                </div>
            </div>
            <div class="add">
                <label for="">Địa chỉ</label>
                <div>
                <input type="text" class="dc" id="" placeholder="Nhập địa chỉ" name="diachi" value="<?= $khachHang['dia_chi'] ?>">
                </div>
            </div>
            <div class="add"> 
                <label for="">Hình ảnh cũ </label>
                <div> 
                    <img src="<?=$khachHang['hinh_anh']?>" alt="" style="width:50px;">
                </div>
            </div>
            <div class="add">
                <label for="">Hình ảnh</label>
                <div>
                <input type="file" class="email" style="padding-top: 5px;" placeholder="Nhập hình ảnh" name="hinhanh">
                </div>
            </div>
            <?php if(isset($_SESSION['khachhang']) && $_SESSION['khachhang']['vai_tro'] == 1 ) { ?>
            <div class="add">
                <label for="">Tên Shop</label>
                <div>
                <input type="text" class="email" style="padding-top: 5px;" placeholder="Nhập tên shop" name="tenshop" value="<?= $khachHang['ten_shop'] ?>">
                </div>
            </div>
            <?php } ?>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit" style="margin-right: 193px;">
                <button class="huy" type="reset">Hủy</button>
                <button class="luu" type="submit" name="submit">Lưu và hiển thị</button>
            </div>
        </form>
    </div>

</div>