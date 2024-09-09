<?php 
if(isset($_GET['kc']) && isset($_GET['ms']) && isset($_GET['sl']) && isset($_GET['mahh'])){    
$maHh = $_GET['mahh'];
$hinhAnhHh = load_Ma_Hinh_By_Id_Hh($maHh) ;
$maKc = $_GET['kc'];
$maMs = $_GET['ms'];
$soLuong = $_GET['sl'];
$buyNow = $_GET['buy'];
if(!isset($_SESSION['giohang'])){
    $_SESSION['giohang'] = [] ;
}


$maCthh = get_ma_Cthh($maHh,$maKc,$maMs) ; 
$hangHoa = load_Hang_Hoa_by_ma_Cthh($maHh,$maCthh['ma_cthh']) ;
$is_add = true ;
$length = count($_SESSION['giohang']) ; 
$sp = [$hangHoa['ma_hh'],$hangHoa['ten_hh'],$hangHoa['don_gia'],$hinhAnhHh[0]['duong_dan'],$maKc ,$maMs,$soLuong,$buyNow,$hangHoa['giam_gia'],$hangHoa['so_luong']] ; 
if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0 ){
    for ($i=0; $i < $length ; $i++) { 
        if($_SESSION['giohang'][$i][0] == $maHh){
            $_SESSION['giohang'][$i][6] = $soLuong ;
            $_SESSION['giohang'][$i][4] = $maKc ;
            $_SESSION['giohang'][$i][5] = $maMs ;
            $_SESSION['giohang'][$i][2] = $hangHoa['don_gia']   ;
            $_SESSION['giohang'][$i][8] = $hangHoa['giam_gia']   ;
            $is_add = false ; 
            break ; 
        } 
        
    }
    if($is_add){
        $_SESSION['giohang'][] = $sp ; 
        header("Location: ./index.php?act=giohang") ;
        }
}else{
$_SESSION['giohang'][] = $sp ; 
header("Location: ./index.php?act=giohang") ;

}

$_SESSION['giohang'] = array_reverse($_SESSION['giohang']) ; 

}


if(isset($_GET['xoa'])){
    array_splice($_SESSION['giohang'],$_GET['xoa'],1) ; 
    setcookie("massage"," Xóa sản phẩm  thành công ",time()+1) ; 
    header("Location: ./index.php?act=giohang") ;
}

if(isset($_GET['buy'])){
    if($_GET['buy'] === 'false'){
        header("Location: ./index.php?act=chitietsanpham&mahh=$maHh") ; 
    }
}

if(isset($_GET['dltAll'])){
    unset($_SESSION['giohang']) ;
    header("Location: ./index.php?act=giohang") ;

}

?>

<style> 
    .quay-ve{
    padding: 6px;
    background: var(--orange);
    text-decoration: none;
    color: var(--white);
    border-radius: 3px;
    font-size: 13px;
    display: inline-flex;
    align-items: center;
    }

    .quay-ve:hover{
        opacity:0.6 ;
    }

    .quay-ve i{
    margin-right:4px ; 
    font-size: 10px; 
    }

    .mua-ngay{
    margin-top: 32px;
    width:123px !important;
    height:37px !important;
    }

</style>

<h3 class="tieu-de-gio-hang"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</h3>
    <div style="margin:16px 0;"><a class="quay-ve" href="./index.php" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Trang chủ</a></div>
            <form action="./index.php?act=thanhtoan" method="POST">
            <table class="giohang">
                <tr>
                    <th>Chọn </th>
                    <th>Sản phẩm</th>
                    <th>Tên hàng</th>
                    <th>Phân loại</th>
                    <th>Đơn giá</th> 
                    <th>Số lượng</th>
                    <th>Tổng tiền </th>
                    <th>Thao tác</th>
                </tr>
                <?php 
                if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0){
                for($j=0;$j< count($_SESSION['giohang']);$j++ ) { 
                ?>
                <tr class="cart-item">
                    <td><input class="add" type="checkbox" name="check[]" value="<?= $_SESSION['giohang'][$j][0] ?>" <?= strcmp($_SESSION['giohang'][$j][7],"true") == 0 ? "checked" : "" ?> ></td>
                    <td><img width="100px" height="auto" src="<?=$_SESSION['giohang'][$j][3] ?>" alt=""></td>
                    <td><?=$_SESSION['giohang'][$j][1] ?></td>
                    <td><?= !empty($_SESSION['giohang'][$j][4]) ? load_Kich_Co_By_Id($_SESSION['giohang'][$j][4])['gia_tri'] : "" ?>,<?= !empty($_SESSION['giohang'][$j][5]) ? load_Mau_Sac_By_Id($_SESSION['giohang'][$j][5])['gia_tri'] : "" ?></td>
                    <td class="don-gia" ><?= isset($_SESSION['giohang'][$j][8]) ? $_SESSION['giohang'][$j][2] - $_SESSION['giohang'][$j][8] : $_SESSION['giohang'][$j][2] ?>đ</td>
                    <td> 
                        <div class="product-detail-quantity" style="display: inline-flex;margin: 0;">
                                <div class="btn-quantity" style="margin:0px">
                                    <div class="nut-cong"><i class="fa-solid fa-plus"></i></div>
                                    <input class="gia-tri" type="text" name="<?= $_SESSION['giohang'][$j][0] ?>" value="<?= $_SESSION['giohang'][$j][6]?>">
                                    <div class="nut-tru"><i class="fa-solid fa-minus"></i></div>
                                </div>
                            </div>
                    </td>
                    <td class="tong-tien">
                        <p></p>
                    </td>
                    <td class="so-luong-an" style="display:none"><?=$_SESSION['giohang'][$j][9] ?></td>
                    <td><a href="./index.php?act=giohang&xoa=<?=$j ?>" class="xoagiohang">Xóa</a></td>
                </tr>
                <?php }}else{ ?>
                    <tr>
                     <td colspan="8"><h3>Trống</h3></td>
                    </tr>
                <?php }?>
            </table>   
            <input type="text" class="gia-gui" name="tong-gia">
            <div class="muahang">
                <div class="muahang1">
                <input type="checkbox" id="chontat" class="checkAll" name="checkbox">
                <label for="chontat">Chọn tất cả</label>
                    <a href="./index.php?act=giohang&dltAll=true">Xóa tất cả </a>
                </div>
                <div class="muahang2">
                    <p class="thanhtoan">Tổng thanh Toán ( 0 sản phẩm )
                    <p>
                    <p class="giacuoicung">0 đ</p>
                    <button class="mua-ngay no-click" type="submit">Mua Hàng</button>
                </div>
            </div>
        </form>

        </div>

    <script> 
</script>