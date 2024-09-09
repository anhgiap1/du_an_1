<?php 
    $dsLoaiHang = load_All_Loai_Hang() ; 
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 30; 
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
    $offset = ($current_page - 1 ) * $item_per_page ; 
    $sqlTongTrang = "SELECT COUNT(hang_hoa.ma_hh) FROM hang_hoa INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  where hang_hoa.trang_thai = 1" ; 
    $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(hang_hoa.ma_hh)'] ; 
    $totalPages = ceil($toTalRecords / $item_per_page) ;
    $sql = "SELECT * from hang_hoa INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh where hang_hoa.trang_thai = 1  GROUP BY chi_tiet_hang_hoa.ma_hh order by hang_hoa.ma_hh DESC LIMIT $item_per_page OFFSET $offset" ;
    $dsHangHoa = pdo_query($sql) ; 
?>

<style>
.folder-product-list .folder-list-item {
    width: 95px;
    padding: 10px 0 !important;
}

.folder-product-list .folder-list-item:hover {
    border: 1px solid var(--orange);
}

.slide-show-img {
    height: 243px;
    overflow: hidden;
    position: relative;

}

.list-images {
    display: flex;
    transition: 0.5s;
    transform: translateX(0px);
}

.btn:hover {
    opacity: 0.5;
}

.btn {
    font-size: 13px;
    color: var(--black);
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    transition: 0.5s;
    cursor: pointer;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;

}

.hover-orange:hover {
    color: var(--yellow);
}

.btn-left-img {
    left: 16px;
}

.btn-right-img {
    right: 16px;
}


.index-images {
    position: absolute;
    bottom: 10px;
    display: flex;
    left: 50%;
    transform: translateX(-50%);
}

.index-item {
    border: 1px solid #fff;
    padding: 4px;
    margin: 5px;
    border-radius: 50%;
}

.active {
    background-color: #fff;
}


.banner-category img,
.banner-img {
    width: 100%;
    object-fit: cover;
    height: 243px;
}

.banner-category img {
    width: 100%;
    object-fit: cover;
}

.slide-show-img-min-pr,
.slide-show-pr,
.slide-show-post-pr {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.list-img-min-product,
.list-post-product {
    width: 100%;
    display: -webkit-inline-box;
    align-items: center;
    transition: 0.9s;

}

.img-product__item,
.post-product__item {
    width: 100%;
    display: flex;
    justify-content: space-around;
}

.post-product__item .post__item {
    transition: all 0.2s ease-in-out;
    border: 1px solid #ccc;
    text-decoration: none;
    position: relative;


}

.post-product__item .post__item a {
    text-decoration: none;

}

.post-product__item .post__item .deal-sale {
    position: absolute;
    top: 0;
    right: 0;
    background-color: var(--orange);
    color: var(--white);
    padding: 3px;
    font-weight: 300;
    font-size: 10px;
}

.post-product__item .post__item .price-number {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


.post-product__item .info-product-hot {
    padding: 10px;
}

.post__item .price-number .price-old {
    font-size: 12px;
    color: var(--gray);
    text-decoration: line-through;
}

.post__item .price-number .number-sale {
    font-size: 8px;
}


.post-product__item .post__item img {
    width: 134px;
    object-fit: cover;
}

.post-product__item .post__item h3 {
    font-size: 14px;
    color: var(--orange);
    padding: 5px 0;

}

.slide-show-pr .btn-left-pritem,
.slide-show-post-pr .btn-left-post {
    font-size: 14px;
    left: 0px;
}

.slide-show-pr .btn-right-pritem,
.slide-show-post-pr .btn-right-post {
    font-size: 14px;
    right: 0px;
}

.slide-show-pr .btn-left-pritem,
.slide-show-pr .btn-right-pritem,
.slide-show-post-pr .btn {
    background-color: #ccc;
    width: 25px;
    height: 25px;

}

.hide-slide-show {
    display: none;
}

.inforActive {
    color: var(--orange) !important;
    border-color: var(--orange) !important;
}
</style>

<section class="banner mg-t-b-16">
    <div class="banner-left">
        <div class="slide-show-img">
            <div class="list-images">
                <img class="banner-img" src="./assets/imgs/banner-1.jpg" alt="">
                <img class="banner-img" src="./assets/imgs/banner-4.jpg" alt="">
                <img class="banner-img" src="./assets/imgs/banner-5.jpg" alt="">
                <img class="banner-img" src="./assets/imgs/banner-6.jpg" alt="">
                <img class="banner-img" src="./assets/imgs/banner-7.jpg" alt="">
                <img class="banner-img" src="./assets/imgs/banner-8.jpg" alt="">
            </div>
            <div class="btns">
                <div class="btn-left-img btn btn-leftAuto-img"><i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="btn-right-img btn-rightAuto-img btn"><i class="fa-solid fa-chevron-right"></i></i></div>
            </div>
            <div class="index-images"> </div>
        </div>
    </div>
    <div class="banner-right">
        <img src="./assets/imgs/banner-2.jpg" alt="">
        <img src="./assets/imgs/banner-3.jpg" alt="">
    </div>
</section>
<!-- Bắt đầu Danh mục sản phẩm  -->
<section class="folder-product">
    <h3>Danh Mục</h3>
    <div class="folder-product-list">
        <?php foreach($dsLoaiHang as $loaiHang)  { ?>
        <a href="./index.php?act=danhmucsanpham&maloai=<?= $loaiHang['ma_loai'] ?>" class="folder-list-item">
            <div class="folder-img">
                <img src="<?= $loaiHang['hinh_anh'] ?>" alt="">
            </div>
            <p><?= $loaiHang['ten_loai'] ?> </p>
        </a>
        <?php  }  ?>
    </div>
</section>
<!-- Kết thúc Danh mục sản phẩm  -->
<!-- Banner nhỏ  -->
<section class="simple-banner mg-t-b-16">
    <img src="./assets/imgs/banner-min-1.png" alt="" width="100%">
</section>
<!-- Kết thúc Banner nhỏ  -->
<!-- Sản phẩm bán chạy -->
<section class="product-hot">
    <h3>Sản phẩm bán chạy</h3>
    <div class="slide-show-post-pr block-0">
        <div class="list-post-product">
            <?php for($i = 0;$i<3;$i++){
                        if($i == 0){  
                        $dsHangHoaBanChay = load_All_Hang_Hoa_Ban_Chay(0,8) ; 
                        ?>
            <?php }else if($i == 1){ 
                            $dsHangHoaBanChay = load_All_Hang_Hoa_Ban_Chay(8,8) ; 
                        ?>
            <?php }else{ 
                            $dsHangHoaBanChay = load_All_Hang_Hoa_Ban_Chay(16,8) ; 
                        ?>
            <?php } ?> 

            <div class="post-product__item">
                <?php foreach($dsHangHoaBanChay as $banChay) { ?>
                <div class="post__item">
                    <a href="./index.php?act=chitietsanpham&mahh=<?=$banChay['ma_hh'] ?>">
                        <img src="<?= load_Top1_Hinh_Anh($banChay['ma_hh'])['duong_dan'] ?>" alt="">
                        <div class="info-product-hot">
                            <h3><?= fomat_number($banChay['don_gia'] - $banChay['giam_gia']) ?>đ</h3>
                            <div class="price-number">
                                <p class="price-old"><?= !empty($banChay['giam_gia']) ? fomat_number($banChay['don_gia'])."đ" : "" ?></p>
                                <p class="number-sale">Đã bán: <?=$banChay['so_luot_ban']?> </p>
                            </div>
                        </div>
                        <div class="deal-sale">
                            <span>-30%</span>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="btns">
            <div class="btn-left-post btn"><i class="fa-solid fa-chevron-left"></i></div>
            <div class="btn-right-post btn"><i class="fa-solid fa-chevron-right"></i></i></div>
        </div>
    </div>
</section>
<!-- Kết thúc Sản phẩm bán chạy -->

<!-- Bắt đầu Sản phẩm gợi ý -->
<main id="content" class="mg-t-b-32">
    <h3>Gợi ý hôm nay</h3>
    <div class="list-product">
        <?php  foreach($dsHangHoa as $hangHoa) { ?>
        <a href="./index.php?act=chitietsanpham&mahh=<?=$hangHoa['ma_hh'] ?>" class="product-item">
            <img src="<?= load_Top1_Hinh_Anh($hangHoa['ma_hh'])['duong_dan'] ?>" alt="">
            <div class="info-product">
                <p class="product-name"><?=$hangHoa['ten_hh'] ?> </p>
                <h3><?=fomat_number($hangHoa['don_gia'] - $hangHoa['giam_gia']) ?>đ</h3>
                <div class="price-number">
                    <p class="price-old"><?= !empty($hangHoa['giam_gia']) ? fomat_number($hangHoa['don_gia'])."đ" : "" ?></p>
                    <p class="number-sale">Đã bán: <?=$hangHoa['so_luot_ban'] ?></p>
                </div>
            </div>
            <?php if(!empty($hangHoa['giam_gia']) ){ ?>
            <div class="deal-sale">
                <span>-<?= round($hangHoa['giam_gia']/$hangHoa['don_gia'] *100, 1)?>%</span>
            </div>
            <?php  } ?>
        </a>
        <?php } ?>

    </div>
</main>
<!-- Kết thúc sản phẩm gợi ý-->
<section class="btn-direction">
    <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
    <div class="btn-next"><a href="./index.php?per_page=30&page=<?=$prev_page?>"><i
                class="fa-solid fa-angle-left"></i></a></div>
    <?php } ?>
    <div class="number-page">
        <?php for($num = 1 ; $num <= $totalPages; $num++ ) {
                        if($num != $current_page ){ ?>
        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
        <a href="./index.php?per_page=30&page=<?=$num?>"><?=$num?></a>
        <?php } ?>
        <?php }else{ ?>
        <span href="" class="btn-check"><?=$num?></span>
        <?php } } ?>
    </div>
    <?php if($current_page < $totalPages - 1){ 
                    $next_page = $current_page + 1 ; ?>
    <div class="btn-pre"><a href="./index.php?per_page=30&page=<?=$next_page?>"><i
                class="fa-solid fa-angle-right"></i></a></div>
    <?php } ?>
</section>

<section class="banner-deal">
    <div class="banner-deal-item">
        <img src="./assets/imgs/bao-hanh-1.png" alt="">
        <h3>Siêu nhiều hàng tốt </h3>
        <p>Cần gì cũng có 26 ngành hàng & 10 triệu sản phẩm </p>
    </div>
    <div class="banner-deal-item">
        <img src="./assets/imgs/bao-hanh-2.png" alt="">
        <h3>Siêu yên tâm </h3>
        <p>Miễn phí đổi trả trong 48h </p>
    </div>
    <div class="banner-deal-item">
        <img src="./assets/imgs/bao-hanh-3.png" alt="">
        <h3>Siêu tiện lợi </h3>
        <p>Mang thế giới mua sắm của LGM Shopping trong tầm tay </p>
    </div>
    <div class="banner-deal-item">
        <img src="./assets/imgs/bao-hanh-4.png" alt="">
        <h3>Siêu tiết kiệm </h3>
        <p>Giá hợp lý vừa túi tiền. Luôn có nhiều chương trình khuyến mãi </p>
    </div>
</section>