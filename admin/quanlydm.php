<div class="shop-page-content">
    <h3 class="tieu-de-trang">Danh sách danh mục</h3>
    <div class="operation-product">
        <div class="search-folder">
        </div>
        <a href="./index.php?act=themmoiloaihang" class="add-product" style="margin-bottom: 32px;">
            <i class="fa-solid fa-plus"></i>Thêm mới danh mục
        </a>
    </div>
    <form action="" method="POST">
    <table class="bang-shop">
        <tr class="tieude">
            <th></th>
            <th>Mã loại</th>
            <th>Hình ảnh</th>
            <th>Tên danh mục</th>
            <th>Ngành hàng</th>
            <th>Thao tác</th>
        </tr>
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $delete = "delete from loai_hang where ma_loai = '$id'";
                pdo_execute($delete);
                setcookie("massage","Xóa thành công ",time()+1) ; 
            }

            if (isset($_POST['xoanhieu'])) {
                if (isset($_POST['xoaNhieuKh']) && count($_POST['xoaNhieuKh']) > 0) {
                    $xoaAll = $_POST['xoaNhieuKh']; 
                    foreach ($xoaAll as $xoaLh) {
                        $delete = "delete from loai_hang where ma_loai = '$xoaLh'";
                        pdo_execute($delete);
                    }
                    header("Location: ./index.php?act=dsloaihang") ; 
            
                }
            }
        ?>
        <?php
                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5; 
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1 ; 
                $offset = ($current_page - 1 ) * $item_per_page ;  
                $sqlTongTrang = "SELECT COUNT(*) FROM loai_hang" ; 
                $toTalRecords = pdo_query_one($sqlTongTrang)['COUNT(*)'] ; 
                $totalPages = ceil($toTalRecords / $item_per_page) ;
            $sql = "SELECT * FROM loai_hang 
            INNER JOIN nganh_hang ON loai_hang.ma_nganh = nganh_hang.ma_nganh order by loai_hang.ma_loai DESC LIMIT $item_per_page OFFSET $offset ";
            $result = pdo_query($sql);
            foreach ($result as $row){
                ?>
                        <tr class="danh-gia">
                            <td><input type="checkbox" <?php if(isset($_GET['chontat'])){ echo "checked" ;}?>  name="xoaNhieuKh[]" value="<?=$row['ma_loai']?>"></td>
                            <td><?php echo $row['ma_loai'] ?></td>
                            <td><img style="wight:80px;" src="<?php echo ".".$row['hinh_anh'] ?>" alt=""></td>
                            <td><?php echo $row['ten_loai'] ?></td>
                            <td><?php echo $row['ten_nganh'] ?></td>
                            <td><a href="./index.php?act=capnhatloaihang&idd=<?php echo $row['ma_loai']?>" class="cap-nhat"><i class="fa-solid fa-pen-to-square"></i></a><a onclick="return confirm('Bạn có muốn xóa nó không ?')" href="index.php?act=dsloaihang&id=<?php echo $row['ma_loai'] ?>" class="xoa"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>
                <?php
            }
        ?>
    </table>
    <div class="btn-delete-all">
        <div class="btn-select-all">
        <a href="./index.php?act=dsloaihang&chontat=true">Chọn tất cả </a>
        <a href="./index.php?act=dsloaihang" >Hủy</a>
        </div>
        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" type="submit" name="xoanhieu" >Xóa tất cả</button>
    </div>
    </form>
    <section class="btn-direction"> 
                <?php if($current_page > 1) { 
                    $prev_page = $current_page - 1 ;?>
                <div class="btn-next"><a href="./index.php?act=dsloaihang&per_page=5&page=<?=$prev_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-left"></i></a></div>
                <?php } ?>
                <div class="number-page"> 
                    <?php for($num = 1 ; $num <= $totalPages; $num++ ) {
                        if($num != $current_page ){ ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a href="./index.php?act=dsloaihang&per_page=5&page=<?=$num?>"><?=$num?></a>
                        <?php } ?>
                    <?php }else{ ?>
                    <span  style="padding: 2px 8px;font-size: 16px;" href="" class="btn-check"><?=$num?></span>
                    <?php } } ?>
                </div>
                <?php if($current_page < $totalPages - 1){ 
                    $next_page = $current_page + 1 ; ?>
                <div class="btn-pre"><a href="./index.php?act=dsloaihang&per_page=5&page=<?=$next_page?>"><i style="font-size: 18px;" class="fa-solid fa-angle-right"></i></a></div>
                <?php } ?>
            </section>
</div>