<?php 
$maKh = $_GET['makh'] ; 
$khachHang = load_Khach_Hang_by_Id($maKh) ; 
?>

<div class="shop-page-content">
<a href="./index.php?act=dskhachhang" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <h3 class="tieu-de-trang">Chi tiết khách hàng </h3>
    <form>
    <table class="bang-shop">
        <tr class="tieude">
            <th><input type="checkbox"></th>
            <th>Hình ảnh</th>
            <th>Số điện thoại </th>
            <th>Email</th>
            <th>Địa chỉ</th>
        </tr>
        <tr class="sanpham">
            <td><input type="checkbox" name="" id=""></td>
            <td><img src="<?= ".".$khachHang['hinh_anh'] ?>" alt="" style="width:50px;height:60px;object-fit:cover;"></td>
            <td><?= $khachHang['so_dien_thoai'] ?></td>
            <td><?= $khachHang['email'] ?></td>
            <td><?= $khachHang['dia_chi'] ?></td>
    
        </tr>
    </table>
    </form>
</div>