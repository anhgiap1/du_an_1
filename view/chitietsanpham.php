<?php 
if(isset($_GET['mahh'])){
    $maHh = $_GET['mahh'] ; 
}else{
    header("Location: ./index.php");
}
// Chức năng lấy ra những kích cỡ trùng nhau 
$dsKc = [] ; 
$maKcDISTINCT = load_DISTINCT_Kc($maHh) ;
foreach($maKcDISTINCT as $ma){
    $dsKc[] = $ma['ma_kc'] ; 
}
$stringMakc = implode(',', $dsKc);
$dsKcDISTINCT =  load_All_Kich_Co_By_Ids($stringMakc) ; 
// Kết thúc chức năng ấy ra những kích cỡ trùng nhau
$dsMs = [] ; 
$maMsDISTINCT = load_DISTINCT_Ms($maHh) ; 
foreach($maMsDISTINCT as $ma){
    $dsMs[] = $ma['ma_ms'] ; 
}
$stringMaMs = implode(',', $dsMs);
$dsMsDISTINCT = load_All_Mau_Sac_By_Ids($stringMaMs) ; 

update_Hang_Hoa_So_Luot_Xem($maHh) ;
$hangHoa = load_Hang_Hoa_by_Id($maHh) ;
$sum = sum_So_Luot_Ban($maHh) ; 
$hinhAnhHh = load_Ma_Hinh_By_Id_Hh($maHh) ;
$dsKichCo = load_All_Kc_Hang_Hoa_by_ID($maHh) ;
$dsMauSac = load_All_Ms_Hang_Hoa_by_ID($maHh);
$thongTinShop = load_Khach_Hang_by_Id($hangHoa['ma_shop']) ;
$dsBinhLuan = load_All_Danh_Gia_By_Mahh($maHh) ; 
$soDanhGia = count_Danh_Gia($maHh); 
if(isset($_POST['muangay'])){
    if(isset($_SESSION['khachhang']) && $_SESSION['khachhang'] !== ""){
        $kichCo = $_POST['kichco'] ;
        $mauSac = $_POST['mausac'] ; 
        $soLuong = $_POST['soluong'] ;
        if(count(load_Kich_Co($maHh)) > 0 && count(load_Mau_Sac($maHh)) > 0){
            if( $kichCo !== "" && $mauSac !== ""){
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=true") ; 
            }
        }else if(count(load_Kich_Co($maHh)) > 0 && count(load_Mau_Sac($maHh)) == 0){
            if($kichCo !== ""){
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=true") ; 
            }
        }else if(count(load_Kich_Co($maHh)) == 0 && count(load_Mau_Sac($maHh)) > 0){
            if($mauSac !== ""){
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=true") ; 
            }
        }else{
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=true") ; 
        }
    }else{
        header("Location: ./index.php?act=dangnhap&add=$maHh") ;
    }

}



if(isset($_POST['addcart'])){
    if(isset($_SESSION['khachhang']) && $_SESSION['khachhang'] !== ""){
        $kichCo = $_POST['kichco'] ;
        $mauSac = $_POST['mausac'] ; 
        $soLuong = $_POST['soluong'] ;
        if(count(load_Kich_Co($maHh)) > 0 && count(load_Mau_Sac($maHh)) > 0){
            if( $kichCo !== "" && $mauSac !== ""){
                setcookie("massage"," Thêm sản phẩm  thành công ",time()+1) ; 
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=false") ; 
            }
        }else if(count(load_Kich_Co($maHh)) > 0 && count(load_Mau_Sac($maHh)) == 0){
            if($kichCo !== ""){
                setcookie("massage"," Thêm sản phẩm  thành công ",time()+1) ; 
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=false") ; 
            }
        }else if(count(load_Kich_Co($maHh)) == 0 && count(load_Mau_Sac($maHh)) > 0){
            if($mauSac !== ""){
                setcookie("massage"," Thêm sản phẩm  thành công ",time()+1) ; 
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=false") ; 
            }
        }else{
                setcookie("massage"," Thêm sản phẩm  thành công ",time()+1) ; 
                header("Location: ./index.php?act=giohang&mahh=".$maHh."&kc=".$kichCo."&ms=".$mauSac."&sl=".$soLuong."&buy=false") ; 
        }
    }else{
        header("Location: ./index.php?act=dangnhap&add=$maHh") ;
    }

}

?>

<style> 
    .add-cart{
    padding:16px;
    border: none;
    background-color: rgba(251,235,237,1);
    border-radius: 3px; 
    color:var(--orange) ;
    font-size:14px;
    }
</style>
 <main>
                <section class="product-detail">
                    <div class="product-detail-img">
                        <div class="product-detail-img-large">
                        <img  src="<?= $hinhAnhHh[0]['duong_dan'] ?>" alt="">
                        </div>
                        <div class="product-detail-img-min">
                            <?php foreach($hinhAnhHh as $hinhAnh) { ?>
                            <img src="<?= $hinhAnh['duong_dan'] ?>" alt="">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="product-detail-info">
                    <form action="" method="POST">
                        <h3 style="margin-bottom:8px;" class="product-name" ><?=$hangHoa['ten_hh'] ?></h3>
                        <div class="sales-info">
                            <span><?=!empty($soDanhGia['COUNT(danh_gia.ma_dg)']) ? $soDanhGia['COUNT(danh_gia.ma_dg)'] : 0 ?> đánh giá </span>
                            <span>|</span>
                            <span class="payed"><?=$hangHoa['so_luot_ban']?> đã bán</span>
                            <span>|</span>
                            <span class="payed"><?=$hangHoa['so_luot_xem']?> lượt xem</span>
                        </div>
                        <div class="product-detail-price">
                            <span class="price-old"<?= !empty($hangHoa['giam_gia']) ? "style='margin-right:16px;'" : "" ?> ><?= !empty($hangHoa['giam_gia']) ? fomat_number($hangHoa['don_gia'])."đ" : "" ?></span>
                            <h3 style="margin:0;" class="product-price"><?= fomat_number($hangHoa['don_gia'] - $hangHoa['giam_gia'] ) ?>đ</h3>
                        </div>
                        <?php if(isset($_SESSION['khachhang']) && $_SESSION['khachhang'] !== "") { ?>
                        <div class="product-detail-transport">
                            <p class="product-detail-text">Vận chuyển : </p>
                            <span><i class="fa-solid fa-truck"></i> Vận chuyển tới : <?= $_SESSION['khachhang']['dia_chi']?> </span>
                        </div>
                        <?php } ?>
                        <?php if(count($dsKichCo) > 0 ) { ?>
                        <div class="product-detail-variant">
                            <p class="product-detail-text">Kích cỡ : </p>
                            <ul class="list-size">
                                <?php if(isset($dsMauSac) && count($dsMauSac) > 0  ) { 
                                foreach($dsKcDISTINCT  as $kichCo) {
                                ?>
                                <li><a  data-size="<?=$kichCo['ma_kc']?>" class="btn-a" href="./view/xulybienthe.php?mkc=<?=$kichCo['ma_kc']?>&mahh=<?=$maHh?>"><?=$kichCo['gia_tri']?></a></li>
                                <?php } } else { ?>
                                <?php foreach($dsKichCo as $kichCo)  { ?>
                                <li><a
                                data-id="<?=$kichCo['ma_kc']?>"
                                data-sl="<?=$kichCo['so_luong']?>"
                                data-price="<?=$kichCo['don_gia']?>"
                                data-sale="<?= !empty($kichCo['giam_gia']) ? $kichCo['giam_gia'] : 0 ?>"
                                data-pay="<?=$kichCo['so_luot_ban']?>"
                                data-size="<?=$kichCo['ma_kc']?>" class="btn-a">
                                <?=$kichCo['gia_tri']?>
                                </a></li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?> 
                        <input type="text" name="kichco" class="kichco">
                        <?php if(count($dsMauSac) > 0 ) { ?>
                        <div class="product-detail-variant">
                            <p class="product-detail-text">Màu sắc : </p>
                            <ul class="list-color">
                                <?php if(isset($dsKichCo) && count($dsKichCo) > 0  ) { 
                                foreach($dsMsDISTINCT  as $mauSac) {
                                ?>
                                <li><a class="btn-color" data-color="<?=$mauSac['ma_ms']?>" href="./view/xulybienthe2.php?mms=<?=$mauSac['ma_ms']?>&mahh=<?=$maHh?>"><?=$mauSac['gia_tri']?></a></li>
                                <?php } } else { ?>
                                <?php foreach($dsMauSac as $mauSac) { ?>
                                <li><a data-id="<?=$mauSac['ma_ms']?>"
                                data-sl="<?=$mauSac['so_luong']?>"
                                data-price="<?=$mauSac['don_gia']?>"
                                data-sale="<?=!empty($mauSac['giam_gia']) ? $mauSac['giam_gia'] : 0 ?>"    
                                data-pay="<?=$mauSac['so_luot_ban']?>"
                                data-color="<?=$mauSac['ma_ms']?>" class="btn-color" >
                                <?=$mauSac['gia_tri']?></a></li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <input type="text" name="mausac" class="mausac">
                        <input type="text" name="mahh" style="display:none;" value="<?= $maHh ?>">
                        <div class="product-detail-transport">
                            <p class="product-detail-text">Số hàng : </p>
                            <span class="row-number"><?=$sum['SUM(so_luong)']?></span>
                        </div>
                        <div class="product-detail-quantity">
                            <p class="product-detail-text">Số lượng :</p>
                                <div class="btn-quantity">
                                    <div class="btn-quantity-pluss"><i class="fa-solid fa-plus"></i></div>
                                    <input class="number-quantity" type="text" value="1" name="soluong">
                                    <div class="btn-quantity-minus"><i class="fa-solid fa-minus"></i></div>
                                </div>
                        </div>
                        <?php 
                        if(isset($_SESSION['khachhang']['ma_kh']) && $_SESSION['khachhang']['ma_kh'] !== ""){
                        if($hangHoa['ma_shop'] !== $_SESSION['khachhang']['ma_kh']) { ?>
                        <div class="btn-product-detail-buy">
                            <button class="add-cart" type="submit" name="addcart"><i
                                        class="fa-solid fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                            <button class="buy-now" type="submit" name="muangay">Mua Ngay</button>
                        </div>
                        <?php }}else { ?>
                            <div class="btn-product-detail-buy">
                            <button class="add-cart" type="submit" name="addcart"><i
                                        class="fa-solid fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                            <button class="buy-now" type="submit" name="muangay">Mua Ngay</button>
                        </div>
                        <?php } ?>
                    </form>
                        </div>
                </section>
            </main>
            <div class="info-shop">
                <div class="shop-img">
                    <img src="<?= $thongTinShop['hinh_anh'] ?>" alt="" style="object-fit: cover;">
                </div>
                <div class="shop-name">
                    <h3><?= $thongTinShop['ten_shop'] ?></h3>
                    <div class="see-shop">
                        <a href="./index.php?act=shop&mashop=<?= $thongTinShop['ma_kh'] ?>"><i class="fa-solid fa-shop"></i>Xem shop</a>
                    </div>
                </div>
            </div>
            <div class="description-product">
                <h3>Mô Tả Sản Phẩm</h3>
                <p class="description-text">
                    <?= $hangHoa['mo_ta'] ?>
                </p>
            </div>
            <div class="product-reviews">
                <h3>Đánh Giá Sản Phẩm </h3>
                <?php
                if(isset($dsBinhLuan) && count($dsBinhLuan) > 0 ) {
                 foreach($dsBinhLuan as $binhLuan) { ?>
                <div class="info-reviews">
                    <div class="product-reviews-img">
                    <?php if(!empty($binhLuan['hinh_anh'])) { ?>
                        <img src="<?=$binhLuan['hinh_anh']?>" alt="" style="object-fit: cover;">
                        <?php } else { ?>
                        <img src="./assets/imgs/user-default.png" alt="" style="object-fit: cover;">
                        <?php } ?>
                    </div>
                    <div class="product-reviews-content">
                        <p class="name-user"><?=$binhLuan['ho_ten']?></p>
                        <p class="date-reviews"><?=$binhLuan['ngay_dg']?> | Phân loại hàng : <?= !empty($binhLuan['ma_kc']) ? load_Kich_Co_By_Id($binhLuan['ma_kc'])['gia_tri'] : "" ?>,<?= !empty($binhLuan['ma_ms']) ? load_Mau_Sac_By_Id($binhLuan['ma_ms'])['gia_tri'] : "" ?></p>
                        <p class="reviews-content"><?=$binhLuan['noi_dung']?></p>
                        <div class="reviews-content-img">
                            <?php if($binhLuan['hinh_anh_dg'] !== ""){ ?>
                            <img src="<?=$binhLuan['hinh_anh_dg']?>" alt="">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>

            <script> 
            $(document).ready(function(){
                $("a.btn-a").click(function(){
                    var url = this.href ;
                    $("ul.list-color").load(url);
                    return false;
                })
                $("a.btn-color").click(function(){
                    var url = this.href ;
                    $("ul.list-size").load(url);
                    return false;
                })
            })

            </script>