<?php
$maKh = $_SESSION['khachhang']['ma_kh'] ; 
if(isset($_SESSION['khachhang']) && $_SESSION['khachhang'] !== ""){
    $diaChi = load_Dia_Chi_Kh($maKh) ; 
}else{
    header("Location: ./index.php") ;
}

if(isset($_POST['check'])){
$tongGia = $_POST['tong-gia'];
$maHh = $_POST['check'];
$_SESSION['tongGia'] =  $_POST['tong-gia'];
$_SESSION['giaCu'] =  $_POST['tong-gia'];
$dsThanhToan = array();
foreach ($maHh as $ma) {
    $filteredArray = array_filter($_SESSION['giohang'], function($list) use ($ma) {
        return $list[0] == $ma;
    });
    
    $dsThanhToan = array_merge($dsThanhToan, $filteredArray);
}
    $maLoai = [] ;
    for ($j=0; $j < count($dsThanhToan); $j++) { 
        $dsThanhToan[$j][6] = $_POST[$dsThanhToan[$j][0]] ; 
    }  
    $_SESSION['thanhToan'] = $dsThanhToan ; 
    setcookie("massage","Thanh toán thành công ",time()+1) ; 

}


if(isset($_GET['maVc'])){
    $giaTriVoucher = load_Voucher_By_Id($_GET['maVc']) ; 
    $_SESSION['tongGia'] = $_SESSION['tongGia'] - $giaTriVoucher['gia_tri'];
}else{
    $_SESSION['tongGia'] =  isset($_SESSION['giaCu']) ? $_SESSION['giaCu'] : 0 ;  
}

$dsVoucher = load_All_Vouchr() ; 

if(isset( $_SESSION['thanhToan']) && count( $_SESSION['thanhToan']) > 0 ){
    $dsThanhToan =  $_SESSION['thanhToan'] ;

}else{
    $_SESSION['tongGia'] = 0 ;
}

?>
<h3 class="tieu-de-thanh-toan"><i class="fa-solid fa-receipt"></i>Thanh toán</h3>
<div style="margin:16px 0;"><a class="quay-ve" href="./index.php?act=giohang" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại </a></div>
<form action="./index.php?act=donhang" method="POST" >
<div class="dau">
    <div class="so1">
        <div class="so">
            <span><i class="fa-solid fa-location-dot"></i>Địa chỉ nhận hàng </span>
        </div>
        <div class="dautien">
            <span><?= !empty($diaChi['so_dien_thoai']) && !empty($diaChi['dia_chi'])  ? $diaChi['so_dien_thoai']." | ".$diaChi['dia_chi'] : "'Trống' "?> </span>
            <?php if(!empty($diaChi['dia_chi']) && !empty($diaChi['so_dien_thoai'])) { ?>
            <a href="./index.php?act=thaydoidiachi&makh=<?= $maKh ?>">Thay đổi</a>
            <?php } else { ?>
            <a href="./index.php?act=thaydoidiachi&makh=<?= $maKh ?>">Thêm địa chỉ</a>
            <?php } ?>
        </div>
    </div>
    <div class="so2">
        <table class="bang-thanh-toan">
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Sản phẩm</th>
                <th>Phân loại </th>
                <th>Đơn Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php 
            if(isset($dsThanhToan) && count($dsThanhToan) > 0 )
            for($i=0;$i< count($dsThanhToan);$i++) {  ?>
            <tr>
                <input type="checkbox" name="makh[]" value="<?= $dsThanhToan[$i][0]?>" checked style="display:none;">
                <td><?= $i+1?></td>
                <td><img src="<?=$dsThanhToan[$i][3]?>" alt=""></td>
                <td><?=$dsThanhToan[$i][1]?></td>
                <td><?= !empty($dsThanhToan[$i][4]) ? load_Kich_Co_By_Id($dsThanhToan[$i][4])['gia_tri'] : "" ?>,<?= !empty($dsThanhToan[$i][5]) ? load_Mau_Sac_By_Id($dsThanhToan[$i][5])['gia_tri'] : "" ?></td>
                <td><?= isset($dsThanhToan[$i][8]) ? fomat_number($dsThanhToan[$i][2] - $dsThanhToan[$i][8]) : fomat_number($dsThanhToan[$i][2]) ?>đ</td>
                <td><?=$dsThanhToan[$i][6]?></td>
                <?php if(isset($giaTriVoucher) && count($giaTriVoucher) > 0 ) { ?>
                <td  class="tong-tien"><?= fomat_number((($dsThanhToan[$i][2] - $dsThanhToan[$i][8]) * $dsThanhToan[$i][6]) - $giaTriVoucher['gia_tri'] ) ?>đ</td>
                <?php } else{ ?>
                <td  class="tong-tien"><?= fomat_number(($dsThanhToan[$i][2] - $dsThanhToan[$i][8]) * $dsThanhToan[$i][6]) ?>đ</td>
                <?php } ?> 
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="tong-thanh-toan">
            <div class="pt-thanh-toan"> 
                <p>Voucher</p>
                <div class="operation-product">
                <p style="margin: 4px 0; font-size: 12px;color: var(--orange);"><?= isset($giaTriVoucher) && count($giaTriVoucher) > 0 ? $giaTriVoucher['ten_voucher'] : "" ?></p>
                            <div class="search-folder">
                            <p style="padding: 4px 10px;font-size: 12px;border: 1px solid var(--orange);border-radius: 3px;">Danh sách Voucher<i class="fa-solid fa-angle-down"></i></p>
                            <ul class="folder-product sidebar-item-menu-min" style="right:0;">
                            <li><a href="index.php?act=thanhtoan" style="padding: 8px 0 8px 8px; font-size:12px;">Hủy voucher</a></li>
                                <?php 
                                foreach($dsVoucher as $voucher){
                                ?>
                                <li><a href="index.php?act=thanhtoan&maVc=<?= $voucher['ma_voucher']  ?>" style="padding: 8px 0 8px 8px; font-size:12px;"><?= $voucher['ten_voucher']  ?></a></li>
                                <?php } ?>
                            </ul>
                            </div>
                        </div>
            </div>
        <div class="pt-thanh-toan"  style="padding-top: 16px;"> 
            <p>Phương thức thanh toán</p>
            <p class="khi-nhan-hang">Thanh toán khi nhận hàng</p>
        </div>
        <div class="dat-hang"> 
            <div class="so-tien"> 
                <p style="min-width: 160px;">Tổng tiền hàng: </p>
                <p class="gia-1-sp"><?= isset($_SESSION['giaCu']) && $_SESSION['giaCu'] != "" ? fomat_number($_SESSION['giaCu']) : "0" ?>đ</p>
            </div>
            <div class="so-tien"> 
                <p style="min-width: 160px;" >Tổng thanh toán: </p>
                <h3><?= isset($_SESSION['tongGia']) ? fomat_number($_SESSION['tongGia']) : "0" ?>đ</h3>
                <input style="display:none;" type="checked" name="tongtien" value="<?= isset($_SESSION['tongGia']) ? $_SESSION['tongGia'] : "0" ?>">
                <input style="display:none;" type="checked" name="maVc" value="<?= isset($giaTriVoucher) && count($giaTriVoucher) > 0  ? $giaTriVoucher['ma_voucher'] : "0" ?>">

            </div>
        </div>
        <div class="nut-dat-hang"> 
            <p>Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo Điều khoản LGM Shopping</p>
            <button type="submit" name="dathang" <?= !empty($diaChi['so_dien_thoai']) && !empty($diaChi['dia_chi']) && !empty($dsThanhToan) ? "" : "class='no-click name='dathang''" ?>>Đặt hàng</button>
        </div>
    </div>
</div>
</form>