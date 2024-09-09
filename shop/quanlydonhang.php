<?php 
$dsHangXacNhan =load_All_Don_Hang_Shop($_SESSION['khachhang']['ma_kh']);
if(isset($_GET['confirm'])){
    $maCtdh = $_GET['confirm'];
    update_Trang_Thai_Don_Hang_1($maCtdh) ;
    setcookie("massage","Xác nhận thành công ",time()+1) ; 
    header("Location: ./index.php?act=quanlydonhang") ;
}

switch(true) {
    case isset($_GET['all']):
        $dsHangXacNhan = load_All_Don_Hang_Shop($_SESSION['khachhang']['ma_kh']);
        break;
    case isset($_GET['duyet']):
        $dsHangXacNhan = load_Ct_Don_Hang_By_0($_SESSION['khachhang']['ma_kh']);
        break;
    case isset($_GET['giao']):
        $dsHangXacNhan = load_Ct_Don_Hang_By_1($_SESSION['khachhang']['ma_kh']);
        break;
    case isset($_GET['dagiao']):
        $dsHangXacNhan = load_Ct_Don_Hang_By_2($_SESSION['khachhang']['ma_kh']);
        break;
    default:
        // Xử lý khi không có tham số truyền vào
        break;
}


?>

<div class="shop-page-content">
    <h3 class="tieu-de-trang">Quản lý đơn hàng</h3>
    <ul class="filter-shop-product">
        <li><a href="./index.php?act=quanlydonhang&all=true">Tất cả</a></li>
        <li><a href="./index.php?act=quanlydonhang&duyet=true">Chờ duyệt</a></li>
        <li><a href="./index.php?act=quanlydonhang&giao=true">Đang giao</a></li>
        <li><a href="./index.php?act=quanlydonhang&dagiao=true">Đã giao</a></li>
    </ul>
    <table class="bang-shop">
        <tr class="tieude">
            <th></th>
            <th>Sản phẩm</th>
            <th>Tên hàng</th>
            <th>Loại hàng </th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php
        if(count($dsHangXacNhan) !== 0){
        foreach($dsHangXacNhan as $hangXacNhan){ ?>
        <tr class="danh-gia">
            <td></td>
            <td><a href="./index.php?act=chitietdonhang&maCtdh=<?=$hangXacNhan['ma_ctdh']?>"><img width="100px" height="auto" src="<?=".".load_Ma_Hinh_By_Id_Hh($hangXacNhan['ma_hh'])[0]['duong_dan']?>" alt=""></a></td>
            <td style="font-size:13px;"><a href="./index.php?act=chitietdonhang&maCtdh=<?=$hangXacNhan['ma_ctdh']?>"><?=$hangXacNhan['ten_hh'] ?></a></td>
            <td><?= !empty($hangXacNhan['ma_kc']) ? load_Kich_Co_By_Id($hangXacNhan['ma_kc'])['gia_tri'] : "" ?>,<?= !empty($hangXacNhan['ma_ms']) ? load_Mau_Sac_By_Id($hangXacNhan['ma_ms'])['gia_tri'] : "" ?>
            <td><?=$hangXacNhan['so_luong_giao'] ?></td>
            <td class="noi-bat"><?=fomat_number($hangXacNhan['thanh_tien']) ?>đ</td>
            <?php if($hangXacNhan['trang_thai_giao'] == 0 ) {  ?>
            <td class="noi-bat">Chờ xác nhận</td>
            <td><a href="./index.php?act=quanlydonhang&confirm=<?=$hangXacNhan['ma_ctdh'] ?>" class="thao-tac">Xác nhận</a></td>
            <?php } else if($hangXacNhan['trang_thai_giao'] == 2) {?>    
            <td class="noi-bat" style="color:#20c997;">Đã nhận</td>
            <td><a href="" class="thao-tac da-nhan-hang">Hoàn thành</a></td>
            <?php } else if($hangXacNhan['trang_thai_giao'] == 1) { ?>
                <td class="noi-bat">Đang giao</td>
            <td><a href="./index.php?act=quanlydonhang&confirm=<?=$hangXacNhan['ma_ctdh'] ?>" class="thao-tac">Đang giao...</a></td>
            <?php } ?>
        </tr>
        <?php }}else{ ?>
            <tr>
                <td colspan="10"><h3>Trống</h3></td>
                </tr>
        <?php } ?>
    </table>
</div>