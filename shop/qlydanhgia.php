<?php
$dsDanhGia = load_Danh_Gia_By_Shop($_SESSION['khachhang']['ma_kh']) ; 
?>

<div class="shop-page-content">
    <h3 class="tieu-de-trang">Đánh giá</h3>
    <table class="bang-shop">
        <tr class="tieude">
            <th><input type="checkbox"></th>
            <th>Mã đánh giá</th>
            <th>Tên sản phẩm</th>
            <th>Số đánh giá</th>
            <th>Mới nhất</th>
            <th>Cũ nhất</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($dsDanhGia as $danhGia) { ?>
        <tr class="danh-gia">
            <td><input type="checkbox" name="" id=""></td>
            <td><?=$danhGia['ma_dg'] ?></td>
            <td><?=$danhGia['ten_hh'] ?></td>
            <td><?=$danhGia['COUNT(danh_gia.ma_dg)'] ?></td>
            <td><?=$danhGia['MAX(danh_gia.ngay_dg)'] ?></td>
            <td><?=$danhGia['MIN(danh_gia.ngay_dg)'] ?></td>
            <td><a href="./index.php?act=chitietdanhgia&maHh=<?=$danhGia['ma_hh']?>"><i class="fa-solid fa-folder-open"></i></a></td>
        </tr>
        <?php } ?>
    </table>
</div>