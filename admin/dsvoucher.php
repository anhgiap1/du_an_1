<div class="shop-page-content">
    <h3 class="tieu-de-trang">Danh sách voucher</h3>
    <div class="operation-product">
        <div class="search-folder">
        </div>
        <a href="./index.php?act=themmoivoucher" class="add-product" style="margin-bottom: 32px;">
            <i class="fa-solid fa-plus"></i>Thêm mới voucher
        </a>
    </div>
    <form action="" method="POST">
    <table class="bang-shop">
        <tr class="tieude">
            <th></th>
            <th>Mã voucher</th>
            <th>Tên voucher </th>
            <th>Giá trị </th>
            <th>Ngày kết thúc</th>
            <th>Thao tác</th>
        </tr>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = "delete from voucher where ma_voucher='$id'";
            pdo_execute($delete);
            setcookie("massage","Xóa thành công ",time()+1) ; 
        }

        if (isset($_POST['xoanhieu'])) {
            if (isset($_POST['xoaNhieuKh']) && count($_POST['xoaNhieuKh']) > 0) {
                $xoaAll = $_POST['xoaNhieuKh']; 
                foreach ($xoaAll as $xoaLh) {
                    $delete = "delete from voucher where ma_voucher='$xoaLh'";
                    pdo_execute($delete);

 
                }
                header("Location: ./index.php?act=dsvoucher") ; 
        
            }
        }
        ?>
        <?php
            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 2; 
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
            $offset = ($current_page - 1 ) * $item_per_page ;  
            $sqlTongTrang = "SELECT COUNT(*) FROM voucher" ; 
            $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
            $totalPages = ceil($toTalRecords / $item_per_page) ;
        $sql = "SELECT * FROM voucher order by ma_voucher desc LIMIT $item_per_page OFFSET $offset";
        $result = pdo_query($sql);
        foreach ($result as $row){
            ?>
            <tr class="danh-gia">
            <td><input type="checkbox" <?php if(isset($_GET['chontat'])){ echo "checked" ;}?>  name="xoaNhieuKh[]" value="<?=$row['ma_voucher']?>"></td>
            <td><?php echo $row['ma_voucher']?></td>
            <td><?php echo $row['ten_voucher']?></td>
            <td><?php echo fomat_number($row['gia_tri'])?>đ</td>
            <td><?php echo $row['ngay_ket_thuc']?></td>
            <td><a href="index.php?act=capnhatvoucher&id=<?php echo $row['ma_voucher']?>" class="cap-nhat"><i class="fa-solid fa-pen-to-square"></i></a><a onclick="return confirm('ban co muon xoa nó không?')" href="index.php?act=dsvoucher&id=<?php echo $row['ma_voucher'] ?>" class="xoa"><i class="fa-solid fa-trash-can"></i></a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="btn-delete-all">
        <div class="btn-select-all">
        <a href="./index.php?act=dsvoucher&chontat=true">Chọn tất cả </a>
        <a href="./index.php?act=dsvoucher" >Hủy</a>
        </div>
        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" type="submit" name="xoanhieu" >Xóa tất cả</button>
    </div>
    </form>
    <section class="btn-direction"> 
                <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
                <div class="btn-next"><a href="./index.php?act=dsvoucher&per_page=2&page=<?=$prev_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-left"></i></a></div>
                <?php } ?>
                <div class="number-page"> 
                    <?php for($num = 1 ; $num <= $totalPages; $num++ ) {
                        if($num != $current_page ){ ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a href="./index.php?act=dsvoucher&per_page=2&page=<?=$num?>"><?=$num?></a>
                        <?php } ?>
                    <?php }else{ ?>
                    <span  style="padding: 2px 8px;font-size: 16px;" href="" class="btn-check"><?=$num?></span>
                    <?php } } ?>
                </div>
                <?php if($current_page < $totalPages - 1){ 
                    $next_page = $current_page + 1 ; ?>
                <div class="btn-pre"><a href="./index.php?act=dsvoucher&per_page=2&page=<?=$next_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-right"></i></a></div>
                <?php } ?>
            </section>
</div>