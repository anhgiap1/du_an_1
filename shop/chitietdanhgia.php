<?php 
if(isset($_GET['maHh'])){
    $maHh  = $_GET['maHh'];
    $dsCtDanhGia = load_All_Ct_Danh_Gia($maHh) ; 
}

if(isset($_GET['maDg'])){
    $maDg = $_GET['maDg']; 
    an_Danh_Gia($maDg) ; 
    header("Location: index.php?act=chitietdanhgia&maHh=$maHh") ;
}

?>
<div class="shop-page-content">
    <div class="chu">
     <span>Sản phẩm : </span> <a href="#"><?= !empty($dsCtDanhGia[0]['ten_hh'])  ? $dsCtDanhGia[0]['ten_hh'] : "Trống" ?></a>
    </div>
     <table class="bang-shop">
         <tr class="tieude">
             <th><input type="checkbox"></th>
             <th>Hình ảnh đánh giá</th>
             <th>Nội dung</th>
             <th>Ngày đánh giá</th>
             <th>Người đánh giá</th>
             <th>Thao tác</th>
         </tr>
         <?php 
         if(isset($dsCtDanhGia) and count($dsCtDanhGia) > 0  ) {
         foreach ($dsCtDanhGia as $danhGia) { ?>
         <tr class="danh-gia">
             <td><input type="checkbox" name="" id=""></td>
             <td>
                <?php if(!empty($danhGia['hinh_anh_dg'])){ ?>
                <img src="<?=".".$danhGia['hinh_anh_dg'] ?>" alt="">
                <?php } else{ ?>
                    <span>'Trống'</span>
                <?php } ?> 
            </td>
             <td><?=$danhGia['noi_dung'] ?></td>
             <td><?=$danhGia['ngay_dg'] ?></td>
             <td><?=$danhGia['ho_ten'] ?></td>
             <td><a href="index.php?act=chitietdanhgia&maHh=<?=$maHh?>&maDg=<?=$danhGia['ma_dg']?> " class="xoa"><i class="fa-solid fa-eye-slash"></i></a></td>
         </tr>
         <?php } }else{ ?>
            <tr>
            <td colspan="6">
                <h3>Trống</h3>
            </td>
        </tr>
        <?php } ?>
     </table>
 </div>