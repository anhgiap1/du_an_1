<?php 
$sql = "SELECT hang_hoa.*,khach_hang.*, COUNT(hang_hoa.ma_shop),SUM(chi_tiet_hang_hoa.so_luot_ban) FROM `khach_hang` 
INNER JOIN hang_hoa on hang_hoa.ma_shop = khach_hang.ma_kh 
INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
GROUP BY hang_hoa.ma_shop 
order by SUM(chi_tiet_hang_hoa.so_luot_ban) DESC;" ;
$dsThongKe = pdo_query($sql) ; 
?>
<div class="shop-page-content">
    <h3 class="tieu-de-trang">Thống kê shop</h3>
    <table class="bang-shop">
        <tr class="tieude">
            <th><input type="checkbox"></th>
            <th>Mã shop</th>
            <th>Tên shop</th>
            <th>Sản phẩm bán chạy</th>
            <th>Tổng số đã bán</th>
            <th>Số lượng sản phẩm</th>
        </tr>
        <?php foreach($dsThongKe as $thongKe) { ?>
        <tr class="danh-gia">
            <td><input type="checkbox" name="" id=""></td>
            <td><?=$thongKe['ma_shop'] ?></td>
            <td><?=$thongKe['ten_shop'] ?></td>
            <td><?= load_Top1_Hh_Ban_Chay($thongKe['ma_shop'])['ten_hh'] ?></td>
            <td><?=$thongKe['SUM(chi_tiet_hang_hoa.so_luot_ban)'] ?></td>
            <td><?=$thongKe['COUNT(hang_hoa.ma_shop)'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>