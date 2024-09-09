<?php
    require "../model/pdo.php" ;
    if(isset($_GET['mkc']) && isset($_GET['mahh'])){
    $maKc = $_GET['mkc'] ; 
    $maHh = $_GET['mahh'] ; 
    $sql = "SELECT chi_tiet_hang_hoa.*, mau_sac.* FROM `chi_tiet_hang_hoa` INNER JOIN mau_sac on mau_sac.ma_ms = chi_tiet_hang_hoa.ma_ms WHERE chi_tiet_hang_hoa.ma_kc = $maKc and chi_tiet_hang_hoa.ma_hh = $maHh" ; 
    $dsMauSac =  pdo_query($sql) ; 
    }
?>  
<?php 
if(isset($dsMauSac) && count($dsMauSac) > 0 ) {
foreach($dsMauSac as $mauSac) {?>
    <li><a href="#"  data-color="<?=$mauSac['ma_ms']?>" onclick="activeColor(this,<?=$mauSac['ma_ms']?>,<?=$mauSac['don_gia']?>,<?=$mauSac['so_luong']?>,<?=$mauSac['so_luot_ban']?>,<?=$mauSac['giam_gia']?>)"><?=$mauSac['gia_tri']?></a></li>
<?php } } ?>
