<?php 
    $sql = "select * from loai_hang" ; 
    $dsLoaiHang = pdo_query($sql) ; 
    $dsMauSac = load_All_Mau_Sac($_SESSION['khachhang']['ma_kh']) ; 
    $dsKichCo = load_All_Kich_Co($_SESSION['khachhang']['ma_kh']) ; 
    if(isset($_REQUEST['submit'])){ 
        $tenHang = htmlspecialchars($_REQUEST['tenhanghoa']) ; 
        $maLoai = $_REQUEST['loaihang'] ; 
        $moTa = htmlspecialchars($_REQUEST['mota']) ;
        $dsTenAnh = $_FILES['hinhanh']['name'];
        $error = validation(['hangHoa' => $tenHang,'maLoai' => $maLoai,'moTa' => $moTa,'images' => $dsTenAnh]) ;
        if(empty($error)){
        insert_Hang_Hoa($tenHang,$moTa,1,$maLoai,$_SESSION['khachhang']['ma_kh']) ;
        $maHh = get_Id_Hang_Hoa() ;
        $dsDgAnh = $_FILES['hinhanh']['tmp_name']; 
        foreach( $dsTenAnh as $hinhAnh){
        $new = "./assets/imgs/".basename($hinhAnh);
        insert_Hinh_Anh($new,$maHh) ; 
        $duongDanCu[] =  $hinhAnh ;

        }   
        for ($i=0; $i < count($dsDgAnh); $i++) { 
            move_uploaded_file($dsDgAnh[$i],"../assets/imgs/".$duongDanCu[$i]) ;
        }
        setcookie("massage","Thêm sản phẩm thành công ",time()+1) ; 
        header("Location: ./index.php") ;
        }
    }

?>

<div class="shop-page-content">
    <a href="./index.php" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm sản phẩm</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="add">
                <label for="">Loại hàng</label>
                <div>
                <select class="nganhhang" id="" name="loaihang">
                    <?php foreach($dsLoaiHang as $loaiHang){ ?>
                    <option value="<?= $loaiHang['ma_loai'] ?>"><?= $loaiHang['ten_loai'] ?></option>
                    <?php } ?>
                </select>
            </div>
            </div>
            <div class="add">
                <label for="">Tên sản phẩm</label>
                <div>
                <input type="text" class="tendm" id="" placeholder="Nhập tên sản phẩm" name="tenhanghoa">
                </div>
            </div>
            <div class="add">
                <label for="">Mô tả</label>
                <div>
                <input type="text" class="mota" id="" placeholder="Nhập mô tả" name="mota">
                </div>
            </div>
            <div class="add">
                <label for="">Hình ảnh</label>
                <div>
                <input type="file" class="tendm" id="" name="hinhanh[]" multiple style="padding: 6px 0;">
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