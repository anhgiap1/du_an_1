<?php
    $maShop = $_SESSION['khachhang']['ma_kh'] ;
   $sql = "SELECT SUM(chi_tiet_don_hang.thanh_tien),COUNT(chi_tiet_don_hang.ma_ctdh) FROM `chi_tiet_don_hang` 
   INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
   INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
   where hang_hoa.ma_shop = $maShop and chi_tiet_don_hang.trang_thai = '2' " ; 
   $doanhThu = pdo_query_one($sql) ; 
   $current_time = date("Y-m-d");
?>

<div class="shop-page-content">
    <h3 class="tieu-de-trang">Doanh thu của shop</h3>
    <table class="bang-shop">
        <tr class="tieude">
            <th>Thời điểm </th>
            <th>Tổng số đã bán </th>
            <th>Tổng doanh thu </th>
        </tr>
        <tr class="danh-gia">
            <td><?= $current_time ?></td>
            <td><?=$doanhThu['COUNT(chi_tiet_don_hang.ma_ctdh)'] ?></td>
            <td><h3 style="color: var(--orange);"><?= fomat_number($doanhThu['SUM(chi_tiet_don_hang.thanh_tien)']) ?> đ</h3></td>
    </table>
</div>
