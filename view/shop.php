<?php 
    $maShop = $_GET['mashop'];
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 30; 
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
    $offset = ($current_page - 1 ) * $item_per_page ; 
    $sqlTongTrang = " SELECT COUNT(*) FROM hang_hoa 
    INNER JOIN khach_hang on khach_hang.ma_kh = hang_hoa.ma_shop 
    INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  
    where hang_hoa.ma_shop = '$maShop' and  hang_hoa.trang_thai = 1 
    GROUP BY chi_tiet_hang_hoa.ma_hh" ; 
    $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
    $totalPages = ceil($toTalRecords / $item_per_page) ;
    $dsHangHoaShop = load_Hang_Hoa_Shop($maShop,$item_per_page,$offset) ; 
    $countHangHoa = count_Hang_Hoa_Shop($maShop) ;
    $thongTinShop = load_Thong_Tin_Shop_by_Id($maShop) ; 
    $countDanhGia  = count_Danh_Gia_Shop($maShop) ; 
    if(isset($_GET['old'])){    
        $dsHangHoaShop = load_Hh_Shop_Old($maShop,$item_per_page,$offset) ;
    }

    
    if(isset($_GET['new'])){
        $dsHangHoaShop = load_Hh_Shop_New($maShop,$item_per_page,$offset) ;
    }
    
    if(isset($_GET['all'])){
    $dsHangHoaShop = load_Hang_Hoa_Shop($maShop,$item_per_page,$offset) ; 
    }

    if(isset($_GET['sale'])){
        $dsHangHoaShop = load_Hh_ban_chay($maShop,$item_per_page,$offset) ; 
    }
?>
<style> 
    .info-product .a{
    display: flex;
    justify-content: space-between;
    align-items: center;
    }
</style>

<div class="tai" style="margin-top: 16px;">
    <img src="<?= $thongTinShop['hinh_anh'] ?>" alt="" style="object-fit: cover;">
    <div class="khoan">
        <div class="tk">
            <h5><?= $thongTinShop['ten_shop'] ?></h5>
            <p>Sản Phẩm: <?= $countHangHoa['COUNT(ten_hh)'] ?></p>
            <p>Đánh Giá: <?= !empty($countDanhGia) ? $countDanhGia['COUNT(*)'] : 0 ?></p>
        </div>
  </div>    
</div>
<div class="right">
    <div class="menu">
        <ul class="vmenu">
            <li><a href="./index.php?act=shop&mashop=<?=$maShop?>&all=true">TẤT CẢ SẢN PHẨM</a></li>
            <li><a href="./index.php?act=shop&mashop=<?=$maShop?>&sale=true">SẢN PHẨM BÁN CHẠY</a></li>
        </ul>
    </div>
    <div class="operation-product">
        <div class="search-folder">
        <p>SẮP XẾP THEO<i class="fa-solid fa-angle-down"></i></p>
        <ul class="folder-product sidebar-item-menu-min">
            <li><a href="./index.php?act=shop&mashop=<?=$maShop?>&all=true">Tất cả</a></li>
            <li><a href="./index.php?act=shop&mashop=<?=$maShop?>&new=true">Mới nhất</a></li>
            <li><a href="./index.php?act=shop&mashop=<?=$maShop?>&old=true">Cũ nhất</a></li>
        </ul>
        </div>
        
    </div>
</div>
<div class="list-product"> 
    <?php foreach($dsHangHoaShop as $hangHoaShop ) { ?>
<a href="./index.php?act=chitietsanpham&mahh=<?=$hangHoaShop['ma_hh'] ?>" class="product-item"> 
    <img src="<?= load_Top1_Hinh_Anh($hangHoaShop['ma_hh'])['duong_dan'] ?>" alt="">
    <div class="info-product"> 
        <p class="product-name"><?= $hangHoaShop['ten_hh']?></p>
        <h3><?= fomat_number($hangHoaShop['don_gia'] - $hangHoaShop['giam_gia']) ?>đ</h3>
        <div class="a"> 
            <p class="price-old"><?= !empty($hangHoa['giam_gia']) ? fomat_number($hangHoa['don_gia'])."đ" : "" ?></p>
            <p class="number-sale">Đã bán: <?= $hangHoaShop['so_luot_ban']?></p>
         </div>
</div>
<?php if(!empty($hangHoaShop['giam_gia'])) { ?>
<div class="deal-sale"> 
    <span>-<?=  round($hangHoaShop['giam_gia']/$hangHoaShop['don_gia'] *100, 1)?>%</span>
</div>
<?php } ?>
</a>
<?php } ?>

</div>
<section class="btn-direction"> 
                <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
                <div class="btn-next"><a href="./index.php?per_page=30&page=<?=$prev_page?>"><i class="fa-solid fa-angle-left"></i></a></div>
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
                <div class="btn-pre"><a href="./index.php?per_page=30&page=<?=$next_page?>"><i class="fa-solid fa-angle-right"></i></a></div>
                <?php } ?>
            </section>

<script src="./main.js"></script>