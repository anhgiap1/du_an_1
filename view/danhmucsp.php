<?php 
$dsLoaiHang = load_All_Loai_Hang() ; 
if(isset($_POST['timkiem'])){
    $tuKhoa = $_POST['timkiem'] ; 
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 15; 
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
    $offset = ($current_page - 1 ) * $item_per_page ; 
    $sqlTongTrang = "SELECT COUNT(*) FROM hang_hoa INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh WHERE ten_hh LIKE '%$tuKhoa%' and  hang_hoa.trang_thai = 1  " ; 
    $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
    $totalPages = ceil($toTalRecords / $item_per_page) ;
    $dsHangHoa = load_All_Hang_Hoa_By_Search($tuKhoa,$item_per_page,$offset) ; 
    if(count($dsHangHoa) > 0 && isset($dsHangHoa) ){
        $maLoai =  $dsHangHoa[0]['ma_loai']; 
    }
}


if(isset($_GET['maloai'])){
    $maLoai = $_GET['maloai'];
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 15; 
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
    $offset = ($current_page - 1 ) * $item_per_page ; 
    $sqlTongTrang = "SELECT COUNT(*) from hang_hoa where ma_loai = '$maLoai' and hang_hoa.trang_thai = 1" ; 
    $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
    $totalPages = ceil($toTalRecords / $item_per_page) ;
    $dsHangHoa = load_All_Hang_Hoa_by_maLh($maLoai,$item_per_page,$offset)  ; 

    if(isset($_GET['sale'])){
        $dsHangHoa = load_All_Hang_Hoa_by_maLh_Sale($maLoai,$item_per_page,$offset);
    }
    
    if(isset($_GET['new'])){
        $dsHangHoa  = load_All_Hang_Hoa_by_maLh_New($maLoai,$item_per_page,$offset) ;
    }
    
    if(isset($_GET['all'])){
        $dsHangHoa  =  load_All_Hang_Hoa_by_maLh($maLoai,$item_per_page,$offset) ;
    }
}



if(isset($_POST['loc'])){
    $maLoai = $_POST['ml'] ;
    $giaTien = $_POST['giatien'] ; 
    $giamGia = $_POST['giamgia'] ; 
    $tenHh = $_POST['tenHangHoa'] ; 
    $newDonGia = explode("-",$giaTien) ; 
    $newGiamGia = explode("-",$giamGia) ;  
    $sqlMaLoai = empty($maLoai) ? "1": " hang_hoa.ma_loai = ".$maLoai ;
    $sqlDonGia = empty($giaTien)?"":"and  chi_tiet_hang_hoa.don_gia>".$newDonGia[0]." and  chi_tiet_hang_hoa.don_gia<=".$newDonGia[1] ; 
    $sqlGiamGia = empty($giamGia)?"":"and  chi_tiet_hang_hoa.giam_gia>".$newGiamGia[0]." and  chi_tiet_hang_hoa.giam_gia<".$newGiamGia[1] ;  
    $sqltenHh = empty($tenHh)?"":"and  hang_hoa.ten_hh like "."'%".$tenHh."%'" ; 
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 15; 
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
    $offset = ($current_page - 1 ) * $item_per_page ; 
    $sqlTongTrang = "select COUNT(*) from hang_hoa  INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  where"." ".$sqlMaLoai." ".$sqlDonGia." ".$sqlGiamGia." ".$sqltenHh."and hang_hoa.trang_thai = 1" ; 
    $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
    $totalPages = ceil($toTalRecords / $item_per_page) ;
    $sql = "select * from hang_hoa  INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  where"." ".$sqlMaLoai." ".$sqlDonGia." ".$sqlGiamGia." ".$sqltenHh." and hang_hoa.trang_thai = 1 GROUP BY chi_tiet_hang_hoa.ma_hh LIMIT $item_per_page OFFSET $offset" ; 
    $dsHangHoa = pdo_query($sql) ;
  }




?>

<style>
    .info-product .a{
        display: flex;
    justify-content: space-between;
    align-items: center;
    }

    .check-btn-filter{
        border-radius:3px ; 
        padding:8px !important;
        font-size:13px !important;
    }

    .check-btn-filter:hover{
        opacity:0.6; 
    }

    .input-filter select{
        border-radius: 3px;
    }

    .input-filter input{
        width: 100%;
        height: 38px;
        border: 1px solid var(--gray);
        margin-bottom: 8px; 
        padding-left: 4px;
        border-radius: 3px;
    }
</style>
<main id="main"> 
            <div class="filter-product-left">
                <h3>Bộ lọc tìm kiếm</h3>
                <form action="" method="POST"> 
                    <div class="input-filter">
                        <select name="ml">
                            <option value="">Tìm kiếm theo danh mục </option>
                            <?php foreach($dsLoaiHang as $loaiHang) { ?>
                            <option value="<?=$loaiHang['ma_loai'] ?>"><?=$loaiHang['ten_loai'] ?> </option>
                            <?php } ?> 
                            </select>
                    </div>
                    <div class="input-filter">
                            <input type="text" placeholder="Tìm kiếm theo tên" name="tenHangHoa">
                    </div>
                    <div class="input-filter">
                        <select name="giatien">
                            <option value="">Giá tiền</option>
                            <option value="50000-100000">Từ 50.000đ - 100.000đ</option>
                            <option value="100000-300000">100.000đ - 300.000đ </option>
                            <option value="300000-500000">300.000đ - 500.000đ </option>
                            <option value="500000-1000000">500.000đ - 1.000.000đ </option>
                            </select>
                    </div>
                    <div class="input-filter">
                        <select name="giamgia">
                            <option value="">Giảm giá</option>
                            <option value="0-10000">Từ 0 - 10.000đ</option>
                            <option value="10000-100000">10.000đ - 100.000đ</option>
                            <option value="100000-1000000">100.000đ - 1.000.000đ</option>
                            </select>
                    </div>
                    <button type="submit" name="loc" style="border-radius:3px;">Tìm kiếm</button>
                </form>
            </div>
            <div class="result-product">
                <?php  if(isset($_POST['timkiem'])){ ?>
                <h3>Kết quả tìm kiếm : <span><?= $_POST['timkiem']?> </span></h3>
                <?php } ?>
                <div class="filter-product-right"> 
                    <ul>
                        <li style="font-size: 15px;">Sắp xếp theo</li>
                        <li class="filter-right-btn"><a href="./index.php?act=danhmucsanpham&maloai=<?=$maLoai?>&all=true" class="check-btn-filter">Tất cả</a></li>
                        <li class="filter-right-btn"><a href="./index.php?act=danhmucsanpham&maloai=<?=$maLoai?>&new=true" class="check-btn-filter">Mới nhất</a></li>
                        <li class="filter-right-btn"><a href="./index.php?act=danhmucsanpham&maloai=<?=$maLoai?>&sale=true" class="check-btn-filter">Bán chạy</a></li>
                    </ul>
                </div>
                <div class="list-product"> 
                    <?php if(isset($_GET['maloai']) || isset($_POST['timkiem']) || isset($_POST['loc'])) {
                    foreach($dsHangHoa as $hangHoa) { ?>
                    <a href="./index.php?act=chitietsanpham&mahh=<?=$hangHoa['ma_hh'] ?>" class="product-item"> 
                        <img src="<?= load_Top1_Hinh_Anh($hangHoa['ma_hh'])['duong_dan'] ?>" alt="">
                        <div class="info-product"> 
                            <p class="product-name"><?=$hangHoa['ten_hh'] ?> </p>
                            <h3><?= fomat_number($hangHoa['don_gia'] - $hangHoa['giam_gia']) ?></h3>
                            <div class="a"> 
                                <p class="price-old"><?= !empty($hangHoa['giam_gia']) ? fomat_number($hangHoa['don_gia'])."đ" : "" ?></p>
                                <p class="number-sale">Đã bán: <?=$hangHoa['so_luot_ban'] ?></p>
                             </div>
                    </div>
                    <?php if(!empty($hangHoa['giam_gia'])) { ?>
                    <div class="deal-sale"> 
                        <span>-<?=round($hangHoa['giam_gia']/$hangHoa['don_gia'] *100, 1) ?>%</span>
                    </div>
                    <?php } ?>
                    </a>
                    <?php } }?>
                </div>
                <section class="btn-direction"> 
                <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
                <div class="btn-next"><a href="./index.php?per_page=15&page=<?=$prev_page?>"><i class="fa-solid fa-angle-left"></i></a></div>
                <?php } ?>
                <div class="number-page"> 
                    <?php for($num = 1 ; $num <= $totalPages; $num++ ) {
                        if($num != $current_page ){ ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a href="./index.php?per_page=15&page=<?=$num?>"><?=$num?></a>
                        <?php } ?>
                    <?php }else{ ?>
                    <span href="" class="btn-check"><?=$num?></span>
                    <?php } } ?>
                </div>
                <?php if($current_page < $totalPages - 1){ 
                    $next_page = $current_page + 1 ; ?>
                <div class="btn-pre"><a href="./index.php?per_page=15&page=<?=$next_page?>"><i class="fa-solid fa-angle-right"></i></a></div>
                <?php } ?>
            </section>
        
            </div>
            
        </main>
