<?php 
    $maAdmin = $_SESSION['khachhang']['ma_kh'] ; 
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5; 
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ;     
    $offset = ($current_page - 1 ) * $item_per_page ;  
    $sqlTongTrang = "select COUNT(*) from khach_hang" ; 
    $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
    $totalPages = ceil($toTalRecords / $item_per_page) ;
    $sql = "select * from khach_hang where ma_kh <> $maAdmin  order by ma_kh DESC LIMIT $item_per_page OFFSET $offset" ;
    $dsKhachHang = pdo_query($sql) ;
 if(isset($_GET['makh'])){
    $makh = $_GET['makh'] ; 
    delete_Khach_Hang($makh) ; 
    delete_Hang_Hoa_By_Ma_Shop($makh) ;
    setcookie("massage","Xóa thành công ",time()+1) ; 
    header("Location: ./index.php?act=dskhachhang") ; 
 }
 if (isset($_POST['xoanhieu'])) {
    if (isset($_POST['xoaNhieuKh']) && count($_POST['xoaNhieuKh']) > 0) {
        $xoaAll = $_POST['xoaNhieuKh']; 
        foreach ($xoaAll as $xoaLh) {
        delete_Khach_Hang($xoaLh) ; 
        delete_Hang_Hoa_By_Ma_Shop($xoaLh) ;
        }
        header("Location: ./index.php?act=dskhachhang") ; 

    }
}
?>

<div class="shop-page-content">
    <h3 class="tieu-de-trang">Danh sách khách hàng </h3>
    <div class="operation-product">
        <div class="search-folder">
        </div>
        <a href="./index.php?act=themmoikh" class="add-product" style="margin-bottom: 20px;">
            <i class="fa-solid fa-plus"></i>Thêm mới khách hàng
        </a>
    </div>
    <form action="" method="POST">
    <table class="bang-shop">
        <tr class="tieude">
            <th></th>
            <th>Họ và tên</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($dsKhachHang as $khachHang) { ?> 
        <tr class="danh-gia">
            <td><input type="checkbox" <?php if(isset($_GET['chontat'])){ echo "checked" ;}?>  name="xoaNhieuKh[]" value="<?=$khachHang['ma_kh']?>" ></td>
            <td><?= $khachHang['ho_ten'] ?></td>
            <td><?= $khachHang['tai_khoan'] ?></td>
            <td><?= $khachHang['mat_khau'] ?></td>
            <td><a href="./index.php?act=chitietkhachhang&makh=<?=$khachHang['ma_kh']?>" class="cap-nhat"><i class="fa-solid fa-folder-open"></i></a><a href="./index.php?act=capnhatkh&makh=<?=$khachHang['ma_kh']?>" class="cap-nhat"><i class="fa-solid fa-pen-to-square"></i></a><a href="./index.php?act=dskhachhang&makh=<?=$khachHang['ma_kh']?>" class="xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"><i class="fa-solid fa-trash-can"></i></a></td>
        </tr>
        <?php } ?>
    </table>
    <div class="btn-delete-all">
        <div class="btn-select-all">
        <a href="./index.php?act=dskhachhang&chontat=true">Chọn tất cả </a>
        <a href="./index.php?act=dskhachhang" >Hủy</a>
        </div>
        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" type="submit" name="xoanhieu" >Xóa tất cả</button>
    </div>
    </form>
    <section class="btn-direction"> 
                <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
                <div class="btn-next"><a href="./index.php?act=dskhachhang&per_page=5&page=<?=$prev_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-left"></i></a></div>
                <?php } ?>
                <div class="number-page"> 
                    <?php for($num = 1 ; $num <= $totalPages; $num++ ) {
                        if($num != $current_page ){ ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a href="./index.php?act=dskhachhang&per_page=5&page=<?=$num?>"><?=$num?></a>
                        <?php } ?>
                    <?php }else{ ?>
                    <span  style="padding: 2px 8px;font-size: 16px;" href="" class="btn-check"><?=$num?></span>
                    <?php } } ?>
                </div>
                <?php if($current_page < $totalPages - 1){ 
                    $next_page = $current_page + 1 ; ?>
                <div class="btn-pre"><a href="./index.php?act=dskhachhang&per_page=5&page=<?=$next_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-right"></i></a></div>
                <?php } ?>
            </section>
</div>