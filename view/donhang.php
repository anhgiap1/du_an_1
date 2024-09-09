<?php 
$keys = [] ; 

if(isset($_SESSION['khachhang']) && $_SESSION['khachhang']['ma_kh'] !== ""){
    $maKh = $_SESSION['khachhang']['ma_kh'] ; 

}else{
    header("Location: ./index.php") ;

}

if(isset($_POST['dathang'])){   
    if(isset($_SESSION['thanhToan'])){
        $tongTien = $_POST['tongtien'] ; 
        $maVc = $_POST['maVc'] ; 
        $giaTriVoucher = $maVc != 0 ? load_Voucher_By_Id($maVc)['gia_tri'] : 0 ; 
        $maHh =  $_POST['makh'] ;   
        $ngay_dat = date('Y-m-d');
        $maCthh = "" ; 
        insert_All_Don_Hang($tongTien,$ngay_dat,$maKh) ;
        $dsdonHang =  $_SESSION['thanhToan'] ; 
        for ($i=0; $i < count($dsdonHang); $i++) { 
            $keys[] = array_keys($_SESSION['giohang'],$dsdonHang[$i]) ;
            $maCthh = get_ma_Cthh($dsdonHang[$i][0],$dsdonHang[$i][4],$dsdonHang[$i][5]) ;
            $thanhTien = (($dsdonHang[$i][2]-$dsdonHang[$i][8]) *$dsdonHang[$i][6]) - $giaTriVoucher; 
            insert_All_Ctdh($dsdonHang[$i][6],$thanhTien,0,$maCthh['ma_cthh'],get_Id_Don_Hang()) ;
            update_So_Luot_Ban_Tang($maCthh['ma_cthh']) ; 
            update_So_Luong_Giam($maCthh['ma_cthh'],$dsdonHang[$i][6]) ; 
        }
        setcookie("massage","Đặt hàng thành công ",time()+1) ; 
        header("Location: ./index.php?act=donhang") ;
    }
}


foreach($keys as $key){
    foreach($key as $value){
        unset($_SESSION['giohang'][$value]) ; 
    } 
}


if(isset($_GET['mactdh']) && isset($_GET['macthh'])){
    $maCtDh = $_GET['mactdh'] ;
    $maCtHh = $_GET['macthh'] ;
    $soLuong = $_GET['sl'] ;
    huy_Don_Hang($maCtDh) ; 
    update_So_Luot_Ban_Giam($maCtHh) ;
    update_So_Luong_Tang($maCtHh,$soLuong) ;
    setcookie("massage","Hủy đơn hàng thành công ",time()+1) ; 
    header("Location: ./index.php?act=donhang") ;
}


if(isset($_GET['receive'])){
    $maCtDh = $_GET['receive'] ; 
    update_Trang_Thai_Dh($maCtDh) ;
}



if(isset($_SESSION['khachhang']) && $_SESSION['khachhang'] !== ""){
    $dsHienThiDonHang = load_All_Don_Hang_By_Makh($maKh) ;
}

unset($_SESSION['thanhToan']) ; 


 ?>
<h3 class="tieu-de-gio-hang"><i class="fa-solid fa-basket-shopping"></i>Đơn mua</h3>
<form action="">
    <table class="giohang">
        <tr>
            <th><input type="checkbox"></th>
            <th>Sản phẩm</th>
            <th>Tên hàng</th>
            <th>Loại hàng</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền </th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php 
    if(isset($dsHienThiDonHang) && count($dsHienThiDonHang) > 0) {
    foreach($dsHienThiDonHang as $donHang) { ?>
        <tr>
            <td><input type="checkbox" name="check"></td>
            <td><a href="./index.php?act=chitietdonhang&maCtdh=<?=$donHang['ma_ctdh']?>"><img width="100px" height="auto" src="<?=load_Ma_Hinh_By_Id_Hh($donHang['ma_hh'])[0]['duong_dan']?>"
                    alt=""></a></td>
            <td><a href="./index.php?act=chitietdonhang&maCtdh=<?=$donHang['ma_ctdh']?>"><?= $donHang['ten_hh'] ?></a></td>
            <td><?= !empty($donHang['ma_kc']) ? load_Kich_Co_By_Id($donHang['ma_kc'])['gia_tri'] : "" ?>,<?= !empty($donHang['ma_ms']) ? load_Mau_Sac_By_Id($donHang['ma_ms'])['gia_tri'] : "" ?>
            </td>
            <td><?= fomat_number($donHang['don_gia'] - $donHang['giam_gia']) ?>đ</td>
            <td><?= $donHang['so_luong_giao'] ?></td>
            <td>
                <p><?= fomat_number($donHang['thanh_tien']) ?>đ</p>
            </td>
            <td>
                <p><?php if($donHang['trang_thai_giao'] == 0 ){echo "Chờ xác nhận" ;}else if($donHang['trang_thai_giao'] == 1){echo "Đang giao" ;}else if($donHang['trang_thai_giao'] == 2) {echo "Đã nhận" ;} ?>
                </p>
            </td>
            <td>
                <?php if($donHang['trang_thai_giao'] == 2 ){ ?>
                <a href="./index.php?act=chitietsanpham&mahh=<?= $donHang['ma_hh']?>" class="mua-lai da-nhan-hang">Mua lại</a><a
                    href="./index.php?act=danhgia&maDh=<?=$donHang['ma_ctdh']?>" class="danh-gia da-nhan-hang">Đánh giá</a>
                <?php }else if($donHang['trang_thai_giao'] == 1 ) { ?>
                <a href="./index.php?act=donhang&receive=<?= $donHang['ma_ctdh']?>" class="mua-lai">Đã nhận hàng </a>
                <?php }else if($donHang['trang_thai_giao'] == 0){ ?>
                <a href="./index.php?act=donhang&mactdh=<?= $donHang['ma_ctdh']?>&macthh=<?=$donHang['ma_cthh'] ?>&sl=<?=$donHang['so_luong_giao']?>"
                    class="mua-lai">Hủy hàng </a>
                <?php } ?>
            </td>
        </tr>
        <?php }}else { ?>
        <tr>
            <td colspan="9">
                <h3>Trống</h3>
            </td>
        </tr>
        <?php } ?>
    </table>
</form>