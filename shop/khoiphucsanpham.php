<?php
    $maShop = $_SESSION['khachhang']['ma_kh'] ; 
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10; 
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
    $offset = ($current_page - 1 ) * $item_per_page ;  
    $sqlTongTrang = "select COUNT(*) from hang_hoa where ma_shop = '$maShop' and trang_thai = 0  " ; 
    $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
    $totalPages = ceil($toTalRecords / $item_per_page) ;
    $sql = "SELECT * from hang_hoa INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai where hang_hoa.ma_shop = '$maShop' and trang_thai = 0 order by ma_hh DESC LIMIT $item_per_page OFFSET $offset" ;
    $dsHangHoa =  pdo_query($sql) ;

    if(isset($_GET['xoa'])){
        $maHh = $_GET['xoa'] ; 
        delete_Hang_Hoa($maHh) ; 
        delete_Ct_Hang_Hoa_By_Mahh($maHh) ;
        delete_Hinh_Anh_Hh($maHh) ;  
        setcookie("massage","Xóa thành công ",time()+1) ; 
        header("Location: ./index.php?act=khoiphucsanpham") ; 

    }

    if (isset($_POST['xoanhieu'])) {
        if (isset($_POST['xoaNhieuKh']) && count($_POST['xoaNhieuKh']) > 0) {
            $xoaAll = $_POST['xoaNhieuKh']; 
            foreach ($xoaAll as $xoaLh) {
                delete_Hang_Hoa($xoaLh) ; 
                delete_Ct_Hang_Hoa_By_Mahh($xoaLh) ;
                delete_Hinh_Anh_Hh($xoaLh) ;  
            }
            header("Location: ./index.php?act=khoiphucsanpham") ; 
    
        }
    }

    if(isset($_GET['reset'])){
        $maHh = $_GET['reset'];
        update_Trang_Thai_Hang_Hoa_1($maHh) ; 
        header("Location: ./index.php?act=khoiphucsanpham") ; 
    }
?>
<div class="shop-page-content">
<h3 class="tieu-de-trang">Danh sách sản phẩm đã xóa</h3>

<form action="" method="POST" style="margin:0;">
    <table class="bang-shop">
        <tr class="tieude">
            <th></th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Loại hàng</th>
            <th>Số lượt xem</th>
            <th>Thao tác</th>
        </tr>
        <?php
                            if(isset($dsHangHoa) && count($dsHangHoa) > 0){ 
                            foreach($dsHangHoa as $hangHoa) { ?>
        <tr class="danh-gia">
            <td><input type="checkbox" <?php if(isset($_GET['chontat'])){ echo "checked" ;}?> name="xoaNhieuKh[]"
                    value="<?=$hangHoa['ma_hh']?>"></td>
            <td><?= $hangHoa['ten_hh'] ?></td>
            <td>
                <?php 
                                    $dsHinhAnh = select_Hinh_Anh($hangHoa['ma_hh']);
                                    foreach($dsHinhAnh as $hinh) { 
                                    ?>
                <img src="<?=  ".".$hinh['duong_dan'] ?>" alt=""
                    style="border: 1px solid var(--gray);margin-right: 4px;">
                <?php } ?>
            </td>
            <td><?= $hangHoa['ten_loai'] ?></td>
            <td><?= $hangHoa['so_luot_xem'] ?></td>
            <td><a href="./index.php?act=khoiphucsanpham&reset=<?= $hangHoa['ma_hh'] ?>" class="cap-nhat"><i class="fa-solid fa-rotate-left"></i></a>
            <a href="./index.php?act=khoiphucsanpham&xoa=<?= $hangHoa['ma_hh'] ?>" class="cap-nhat" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"><i class="fa-solid fa-trash-can"></i></td>
        </tr>
        <?php }} ?>
    </table>
    <div class="btn-delete-all">
        <div class="btn-select-all">
            <a href="./index.php?act=khoiphucsanpham&chontat=true">Chọn tất cả </a>
            <a href="./index.php?act=khoiphucsanpham">Hủy</a>
        </div>
        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" type="submit" name="xoanhieu">Xóa tất
            cả</button>
    </div>
    </form>
    <section class="btn-direction"> 
                <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
                <div class="btn-next"><a href="./index.php?per_page=10&page=<?=$prev_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-left"></i></a></div>
                <?php } ?>
                <div class="number-page"> 
                    <?php for($num = 1 ; $num <= $totalPages; $num++ ) {
                        if($num != $current_page ){ ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a href="./index.php?per_page=10&page=<?=$num?>"><?=$num?></a>
                        <?php } ?>
                    <?php }else{ ?>
                    <span  style="padding: 2px 8px;font-size: 16px;" href="" class="btn-check"><?=$num?></span>
                    <?php } } ?>
                </div>
                <?php if($current_page < $totalPages - 1){ 
                    $next_page = $current_page + 1 ; ?>
                <div class="btn-pre"><a href="./index.php?per_page=10&page=<?=$next_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-right"></i></a></div>
                <?php } ?>
            </section>
            </div>
