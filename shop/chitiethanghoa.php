<?php 
if(isset($_GET['mahh'])){
    $mahh = $_GET['mahh'] ;
    $dsCtHangHoa = load_All_Ct_Hang_Hoa($mahh) ; 
}

if(isset($_GET['delete'])){
    $macthh = $_GET['delete'] ;
    delete_Ct_Hang_Hoa($macthh) ;
    header("Location: ./index.php?act=chitiethanghoa&mahh=$mahh") ; 
}


?>
<div class="shop-page-content">
<a href="./index.php" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
                        <h3 class="tieu-de-trang">Danh Sách Biến Thể </h3>
                        <div style="display: flex;justify-content: end;margin-bottom:16px;">
                            <a href="./index.php?act=thembienthesp&mahh=<?=$mahh?>" class="add-product" >
                                <i class="fa-solid fa-plus"></i>Thêm biến thể
                            </a>
                        </div>
                        <table class="bang-shop">
                            <tr class="tieude">
                                <th>Đơn giá</th>
                                <th>Giảm giá</th>
                                <th>Số lượng</th>
                                <th>Số lượt bán</th>
                                <th>Kích cỡ </th>
                                <th>Màu sắc</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php if( isset($dsCtHangHoa) && count($dsCtHangHoa) > 0) {
                                foreach($dsCtHangHoa as $ctHangHoa) { ?>
                            <tr class="danh-gia">
                                <td><?=$ctHangHoa['don_gia'] ?></td>
                                <td><?=$ctHangHoa['giam_gia'] ?></td>
                                <td><?=$ctHangHoa['so_luong'] ?></td>
                                <td><?=$ctHangHoa['so_luot_ban'] ?></td>
                                <td><?= $ctHangHoa['ma_kc'] != 0 ? load_Kich_Co_By_Id($ctHangHoa['ma_kc'])['gia_tri'] : "'Trống'" ?> </td>
                                <td><?=$ctHangHoa['ma_ms'] != 0 ? load_Mau_Sac_By_Id($ctHangHoa['ma_ms'])['gia_tri'] : "'Trống'" ?></td>
                                <td><a href="./index.php?act=capnhatbienthesp&mahh=<?=$mahh?>&macthh=<?=$ctHangHoa['ma_cthh']?>" class="cap-nhat"><i class="fa-solid fa-pen-to-square"></i></a><a href="./index.php?act=chitiethanghoa&mahh=<?=$mahh?>&delete=<?=$ctHangHoa['ma_cthh']?>" class="cap-nhat"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                            <?php } } ?>
                        </table>
            </div>