<?php 
    $mahh = $_GET['mahh'] ;  
    $dsLoaiHang = load_All_Loai_Hang() ; 
    $hangHoa = hien_Thi_Update_Hang_Hoa($mahh) ;
    $dsMauSac1 = load_All_Mau_Sac($_SESSION['khachhang']['ma_kh']) ; 
    $dsKichCo1 = load_All_Kich_Co($_SESSION['khachhang']['ma_kh']) ; 
    $loaiHangCu = load_Ma_Loai_Hh($mahh);
    $dsHinhAnh = select_Hinh_Anh($mahh) ;
    if(isset($_REQUEST['submit'])){ 
        $tenHang = htmlspecialchars($_REQUEST['tenhanghoa']) ; 
        $maLoai = $_REQUEST['loaihang'] ; 
        $dsTenAnh = $_FILES['hinhanh']['name'];
        $dsDgAnh = $_FILES['hinhanh']['tmp_name']; 
        $moTa = htmlspecialchars($_REQUEST['mota']) ;
        $error = validation(['hangHoa' => $tenHang,'maLoai' => $maLoai,'moTa' => $moTa,'updateimages' => $dsTenAnh ]) ;
        if(empty($error)){
        update_Hang_Hoa($tenHang,$moTa,$maLoai,$mahh) ;
        $dsMaHinh = load_Ma_Hinh_By_Id_Hh($mahh) ;
        if(isset($dsTenAnh) && $dsTenAnh[0] !== "") {
            for ($a=0; $a < count($dsTenAnh) ; $a++) { 
                $duongDan = "./assets/imgs/".$dsTenAnh[$a] ; 
                if(count($dsMaHinh) > $a )  {
                    $mahinh = $dsMaHinh[$a]['ma_hinh'] ;
                    $update = "UPDATE hinh_anh set duong_dan = '$duongDan' where ma_hinh = '$mahinh' " ;
                    pdo_execute($update) ; 
                }else{
                    insert_Hinh_Anh($duongDan,$mahh) ; 
                    move_uploaded_file($dsDgAnh[$a],".".$duongDan) ;
                    }
            }
        }
        setcookie("massage","Cập nhật thành công ",time()+1) ; 
        header("Location: ./index.php") ;
        }   
        
    }
    if(isset($_GET['maHinh'])){
        $maHinh = $_GET['maHinh'] ; 
        delete_Hinh_Anh($maHinh) ;
        header("Location: ./index.php?act=capnhatsanpham&mahh=".$mahh) ;
    }

?>
<style> 
    .add{
        font-size: 12px;
    }

    .add span{
        font-size: 11px;
        padding: 3px 8px;
        background-color: var(--orange);
        color: #fff;
        margin-right: 8px; 
        border-radius:3px;
    }

    .add span i{
        font-size: 10px;
        margin-left:4px;
        color:var(--white) ;
    }

    .add-hinh-anh .btn-delete:hover,
    .add span a:hover{
        opacity: 0.6 ;
    }

    .add .hinh-anh{
        position: relative;
        border:1px solid var(--gray) ;
        margin-right:8px;
        padding:0 2px ;
    }

    .add .hinh-anh img{
        width:50px ;
    }

    .add-hinh-anh .btn-delete{
        position: absolute;
        top:0;
        right:1px;
        font-size:10px;
    }

</style>
<div class="shop-page-content">
    <a href="./index.php" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Cập nhật sản phẩm</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="add">
                <label for="">Loại hàng</label>
                <div>
                <select class="nganhhang" id="" name="loaihang">
                    <?php foreach($dsLoaiHang as $loaiHang){
                        if($loaiHangCu['ma_loai'] === $loaiHang['ma_loai'] ) {
                    ?>
                    <option selected value="<?= $loaiHang['ma_loai'] ?>"><?= $loaiHang['ten_loai'] ?></option>
                    <?php } else{ ?>
                    <option value="<?= $loaiHang['ma_loai'] ?>"><?= $loaiHang['ten_loai'] ?></option>
                    <?php } } ?>
                </select>
            </div>
        </div>
        <div class="add">
                <label for="">Tên sản phẩm</label>
                <div>
                <input type="text" class="tendm" id="" value="<?= $hangHoa['ten_hh']?> " name="tenhanghoa">
                </div>
            </div>
            <div class="add">
                <label for="">Mô tả</label>
                <div>
                <input type="text" class="mota" id="" placeholder="Nhập mô tả" name="mota" value="<?= $hangHoa['mo_ta']?>" >
                </div>
            </div>
            <div class="add">
                <label for="">Hình ảnh</label>
                <div>
                <input type="file" class="tendm" id="" name="hinhanh[]" multiple style="padding: 5px 0;">
                </div>
            </div>
            <div class="add"> 
                <label for=""></label>
                <div class="add-hinh-anh">
                    Hình ảnh cũ : 
            <?php
            foreach($dsHinhAnh as $hinhAnh){ 
            ?>
                <div class="hinh-anh">
                <img src="<?= ".".$hinhAnh['duong_dan']?>" alt="">
                <a href="./index.php?act=capnhatsanpham&mahh=<?= $mahh ?>&maHinh=<?=$hinhAnh['ma_hinh']?>" class="btn-delete"><i class="fa-solid fa-xmark"></i></a>
                </div>
            <?php } ?>
            </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit" style="margin-right: 93px;">
                <button class="huy" type="reset">Hủy</button>
                <button class="luu" type="submit" name="submit">Lưu và hiển thị</button>
            </div>
        </form>
    </div>

</div>
