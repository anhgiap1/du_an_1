<?php 
    $maShop = $_SESSION['khachhang']['ma_kh'] ;
    $dsCtDanhGia = load_All_Ct_Danh_Gia_An($maShop) ; 

if(isset($_GET['maDg'])){
    $maDg = $_GET['maDg']; 
    hien_Thi_Danh_Gia($maDg) ;
    header("Location: index.php?act=danhgiaan") ;
}

?>
<div class="shop-page-content">
<h3 class="tieu-de-trang">Đánh giá đã ẩn</h3>
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
             <td><a href="index.php?act=danhgiaan&maDg=<?=$danhGia['ma_dg']?> " class="xoa"><i class="fa-solid fa-eye"></i></a></td>
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