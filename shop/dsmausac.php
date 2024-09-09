<?php
     $maShop = $_SESSION['khachhang']['ma_kh'] ;
     $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5; 
     $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
     $offset = ($current_page - 1 ) * $item_per_page ;  
     $sqlTongTrang = "select COUNT(*) from mau_sac where ma_shop = '$maShop'" ; 
     $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
     $totalPages = ceil($toTalRecords / $item_per_page) ;
    $sql="select * from mau_sac where ma_shop = '$maShop' order by ma_ms desc LIMIT $item_per_page OFFSET $offset ";
    $mausac=pdo_query($sql);
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="delete from mau_sac where ma_ms='$id'";
        pdo_execute($sql);
        setcookie("massage","Xóa thành công ",time()+1) ; 
        header("location: ./index.php?act=dsmausac");
    }
    if (isset($_POST['xoanhieu'])) {
        if (isset($_POST['xoaNhieuKh']) && count($_POST['xoaNhieuKh']) > 0) {
            $xoaAll = $_POST['xoaNhieuKh']; 
            foreach ($xoaAll as $xoaLh) {
                $sql="delete from mau_sac where ma_ms='$xoaLh'";
                pdo_execute($sql);
            }
            header("Location: ./index.php?act=dsmausac") ; 
    
        }
    }
?>
<div class="shop-page-content">
    <h3 class="tieu-de-trang">Danh sách màu sắc</h3>
    <div class="operation-product">
        <div class="search-folder">
        </div>
        <a href="./index.php?act=themmoimausac" class="add-product" style="margin-bottom: 32px;">
            <i class="fa-solid fa-plus"></i>Thêm mới màu sắc
        </a>
    </div>
    <form action="" method="POST">
    <table class="bang-shop">
        <tr class="tieude">
            <th></th>
            <th>Mã màu sắc</th>
            <th>Giá trị</th>
            <th>Thao tác</th>
        </tr>
        <?php
            foreach ($mausac as $row) {
                ?>
                    <tr class="danh-gia">
                        <td><input type="checkbox" <?php if(isset($_GET['chontat'])){ echo "checked" ;}?>  name="xoaNhieuKh[]" value="<?=$row['ma_ms']?>" ></td>
                        <td><?php echo $row['ma_ms'] ?></td>
                        <td><?php echo $row['gia_tri'] ?></td>
                        <td><a href="./index.php?act=capnhatmausac&id=<?php echo $row['ma_ms'] ?>" class="cap-nhat"><i class="fa-solid fa-pen-to-square"></i></a> <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')" href="./index.php?act=dsmausac&id=<?php echo $row['ma_ms'] ?>"  class="xoa"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <div class="btn-delete-all">
        <div class="btn-select-all">
        <a href="./index.php?act=dsmausac&chontat=true">Chọn tất cả </a>
        <a href="./index.php?act=dsmausac" >Hủy</a>
        </div>
        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" type="submit" name="xoanhieu" >Xóa tất cả</button>
    </div>
    </form>
    <section class="btn-direction"> 
                <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
                <div class="btn-next"><a href="./index.php?act=dsmausac&per_page=5&page=<?=$prev_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-left"></i></a></div>
                <?php } ?>
                <div class="number-page"> 
                    <?php for($num = 1 ; $num <= $totalPages; $num++ ) {
                        if($num != $current_page ){ ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a href="./index.php?act=dsmausac&per_page=5&page=<?=$num?>"><?=$num?></a>
                        <?php } ?>
                    <?php }else{ ?>
                    <span  style="padding: 2px 8px;font-size: 16px;" href="" class="btn-check"><?=$num?></span>
                    <?php } } ?>
                </div>
                <?php if($current_page < $totalPages - 1){ 
                    $next_page = $current_page + 1 ; ?>
                <div class="btn-pre"><a href="./index.php?act=dsmausac&per_page=5&page=<?=$next_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-right"></i></a></div>
                <?php } ?>
            </section>     
</div>