<?php
    require "../model/pdo.php" ;
    if(isset($_GET['mms']) && isset($_GET['mahh'])){
    $maMs = $_GET['mms'] ; 
    $maHh = $_GET['mahh'] ; 
    $sql = "SELECT chi_tiet_hang_hoa.*, kich_co.* FROM `chi_tiet_hang_hoa` INNER JOIN kich_co on kich_co.ma_kc = chi_tiet_hang_hoa.ma_kc WHERE chi_tiet_hang_hoa.ma_ms = $maMs and chi_tiet_hang_hoa.ma_hh = $maHh" ; 
    $dsKichCo =  pdo_query($sql) ; 
    }
?>  
<?php 
if(isset($dsKichCo) && count($dsKichCo) > 0 ) {
foreach($dsKichCo as $kichCo) {?>
    <li><a href="#" data-size="<?=$kichCo['ma_ms']?>" onclick="activeSize(this,<?=$kichCo['ma_kc']?>,<?=$kichCo['don_gia']?>,<?=$kichCo['so_luong']?>,<?=$kichCo['so_luot_ban']?>,<?=$kichCo['giam_gia']?>)"><?=$kichCo['gia_tri']?></a></li>
<?php } } ?>
