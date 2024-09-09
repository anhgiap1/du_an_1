<?php 

?>
<header> 
        <div class="container">
            <nav> 
                <div class="shop-click"> 
                <?php if(!isset($_SESSION['khachhang']) || $_SESSION['khachhang']['vai_tro'] == 1 || $_SESSION['khachhang']['vai_tro'] == 0){ ?>
                    <a href="./shop/index.php">Kênh người bán</a>
                    <?php } ?>
                    <?php if(!isset($_SESSION['khachhang']) || $_SESSION['khachhang']['vai_tro'] == 0){ ?>
                    <span>|</span>
                    <a href="./index.php?act=dangkyshop">Trở thành người bán hàng</a>
                    <?php } ?>
                </div>
                <div class="login"> 

                    <?php if(isset($_SESSION['khachhang']) && $_SESSION['khachhang'] !== "") { ?>
                    <a class="info_user" href="./index.php?act=thongtincanhan&<?= $_SESSION['khachhang']['ma_kh'] ?>"> 
                    <?php if(!empty($_SESSION['khachhang']['hinh_anh'])) { ?>
                        <img src="<?= $_SESSION['khachhang']['hinh_anh'] ?>" alt="" style="object-fit: cover;">
                        <?php } else { ?>
                        <img src="./assets/imgs/user-default.png" alt="" style="object-fit: cover;">
                        <?php } ?>
                        <p><?= $_SESSION['khachhang']['tai_khoan'] ?></p>
                    </a>
                    <?php }else{ ?>
                        <a href="#"><i class="fa-solid fa-bell"></i>Thông báo</a>
                    <a href="./index.php?act=dangky">Đăng ký</a>
                    <span>|</span>
                    <a href="./index.php?act=dangnhap">Đăng nhập</a>
                    <?php } ?>
                </div>
            </nav>
            <div class="logo_search"> 
                <a href="./index.php" class="header-logo"> 
                    <img src="./assets/imgs/Logo.png" alt="">
                </a>    
                <div class="header-search"> 
                    <form action="./index.php?act=danhmucsanpham" method="POST"> 
                        <div class="search-btn">
                            <input type="text" placeholder="Tìm kiếm" name="timkiem">
                            <button type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="header-cart"> 
                    <a href="./index.php?act=giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                    <p class="number-cart"><?= isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0  ?></p>
                </div>
            </div>
        </div>
        <?php if(isset($_COOKIE['massage']) && $_COOKIE['massage'] !== "") { ?>
         <?php require "./global/message.php" ; ?>
        <?php } ?>
        </header>