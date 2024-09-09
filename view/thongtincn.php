<?php
    $maKh = $_SESSION['khachhang']['ma_kh'] ; 
    $thongTinKh = load_Khach_Hang_by_Id($maKh) ;
    $_SESSION['khachhang'] = $thongTinKh ;
?>
<div class="thongtin" sty>
    <div> 
        <div class="info_user">
            <div class="avatar-user"> 
            <?php if(!empty($thongTinKh['hinh_anh'])) { ?>
                <img src="<?=$thongTinKh['hinh_anh']?>" alt="">
                <?php } else { ?>
                    <img src="./assets/imgs/user-default.png"  alt="">
                <?php } ?>
            </div>
            <div class="name-user"> 
                <p><?=$thongTinKh['tai_khoan']?></p>   
            </div>
        </div>
        <ul class="btn-user">
            <?php if($thongTinKh['vai_tro'] != 2 ) { ?>
            <li><a href=""><i class="fa-solid fa-user"></i>Hồ sơ của tôi</a></li>
            <li><a href="./index.php?act=doimatkhau"><i class="fa-solid fa-lock"></i>Thay đổi mật khẩu</a></li>
            <li><a href="./index.php?act=donhang"><i class="fa-solid fa-basket-shopping"></i>Đơn mua</a></li>
            <?php }else{ ?>
            <li><a href="./admin/index.php"><i class="fa-solid fa-user-tie"></i>Tới trang quản trị </a></li>
            <?php } ?>
            <li><a href="./index.php?dx=true"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>
        </ul>
    </div>
    <div class="hosolon">
        <div class="hosocuatoi">
            <div class="tren">
                <a>Hồ Sơ Của Tôi</a>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            </div>
            <div class="duoi">
                <div class="trai">
                    <form action="">
                        <div class="div-all">
                            <label for="">Họ và Tên</label>
                            <span><?=$thongTinKh['ho_ten']?></span>
                        </div>
                        <div class="div-all">
                            <label for="">Tên đăng nhập</label>
                            <span><?=$thongTinKh['tai_khoan']?></span>
                        </div>
                        <div class="div-all">
                            <label for="">Mật khẩu</label>
                            <span><?= str_repeat("*", strlen($thongTinKh['mat_khau'])) ?></span>
                        </div>
                        <div class="div-all">
                            <label for="">Email</label>
                        <?php if(!empty($thongTinKh['email'])){ ?>
                            <span><?=$thongTinKh['email']?></span>
                            <?php } else { ?>
                            <span>'Trống'</span>
                            <?php } ?>
                        </div>
                        <div class="div-all">
                            <label for="">Số điện thoại </label>
                        <?php if(!empty($thongTinKh['so_dien_thoai'])){ ?>
                            <span><?=$thongTinKh['so_dien_thoai']?></span>
                            <?php } else { ?>
                            <span>'Trống'</span>
                            <?php } ?>
                        </div>
                        <div class="div-all">
                            <label for="">Địa chỉ</label>
                            <?php if(!empty($thongTinKh['dia_chi'])){ ?>
                            <span><?=$thongTinKh['dia_chi']?></span>
                            <?php } else { ?>
                            <span>'Trống'</span>
                            <?php } ?>
                        </div>
                <?php if(isset($_SESSION['khachhang']) && $_SESSION['khachhang']['vai_tro'] == 1 ) { ?> 
                        <div class="div-all">
                            <label for="">Tên Shop</label>
                            <span><?=$thongTinKh['ten_shop']?></span>
                        </div>
                        <?php } ?>
                    </form>
                </div>
                <div class="phai">
                    <div class="anh">
                        <?php if(!empty($thongTinKh['hinh_anh'])) { ?>
                        <img src="<?=$thongTinKh['hinh_anh']?>" width="50%" alt="">
                        <?php } else { ?>
                        <img src="./assets/imgs/user-default.png" width="50%" alt="">
                        <?php } ?>
                    </div>
                </div>
                <div class="btn-setting-user"> 
                    <a href="./index.php?act=capnhatthongtin">Thay đổi thông tin</a>
                </div>
            </div>
        </div>
    </div>
</div>
