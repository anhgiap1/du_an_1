<?php     
        $maCtHh = $_GET['macthh'];
        $maHh = $_GET['mahh'];
        $ctHangHoa = load_Ct_Hang_Hoa_By_Id($maCtHh) ; 
        $maKh = $_SESSION['khachhang']['ma_kh'] ; 
        $dsKichCo = load_All_Kich_Co($maKh) ;
        $dsMauSac = load_All_Mau_Sac($maKh) ;
        if(isset($_POST['submit'])){
        $giamGia = $_REQUEST['giamgia'] ; 
        $donGia = $_REQUEST['dongia'] ; 
        $maKc =  $_REQUEST['kichco'] ;
        $maMs =  $_REQUEST['mausac'] ;
        $soLuong =  $_REQUEST['soluong'] ;
        $error = validation(['donGia' => $donGia,'donGia' => $soLuong]) ;
        if(empty($error)){
        update_Ct_Hang_Hoa($donGia,$giamGia,$soLuong, $maKc,$maMs,$maCtHh) ; 
        setcookie("massage","Cập nhật thành công ",time()+1) ; 
        header("Location: ./index.php?act=chitiethanghoa&mahh=$maHh") ; 
        }
        }
?>  
<div class="shop-page-content">
    <a href="./index.php?act=chitiethanghoa&mahh=<?=$maHh?>" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Cập nhật thể hàng hóa</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="add">
                <label for="">Đơn giá</label>
                <div>
                    <input type="number" class="tendm" id="" placeholder="Nhập đơn giá" name="dongia" value="<?=$ctHangHoa['don_gia']?>">
                </div>
            </div>
            <div class="add">
                <label for="">Giảm giá </label>
                <div>
                    <input type="number" class="mota" id="" placeholder="Nhập giảm giá" name="giamgia"  value="<?=$ctHangHoa['giam_gia']?>">
                </div>
            </div>
            <div class="add">
                <label for="">Số lượng </label>
                <div>
                    <input type="number" class="mota" id="" placeholder="Nhập số lượng " name="soluong"  value="<?=$ctHangHoa['so_luong']?>">
                </div>
            </div>
            <div class="add">
                <label for="">Kích cỡ</label>
                <div>
                    <select class="nganhhang" id="" name="kichco">
                    <option value="">--Chọn kích cỡ --</option>
                        <?php foreach($dsKichCo as $kichCo )  { 
                        if($ctHangHoa['ma_kc'] === $kichCo['ma_kc']){ ?>
                        <option selected value="<?php echo $kichCo['ma_kc'] ?>"><?php echo $kichCo['gia_tri'] ?></option>
                        <?php } else { ?>
                            <option  value="<?php echo $kichCo['ma_kc'] ?>"><?php echo $kichCo['gia_tri'] ?></option>                       
                        <?php } }  ?>
                    </select>
                </div>
            </div>
            <div class="add">
                <label for="">Màu sắc</label>
                <div>
                    <select class="nganhhang" id="" name="mausac">
                        <option value="">--Chọn màu sắc --</option>
                        <?php foreach($dsMauSac as $mauSac )  { 
                        if($ctHangHoa['ma_ms'] === $mauSac['ma_ms']){ ?>
                        <option selected value="<?php echo $mauSac['ma_ms'] ?>"><?php echo $mauSac['gia_tri'] ?></option>
                        <?php } else { ?>
                            <option  value="<?php echo $mauSac['ma_ms'] ?>"><?php echo $mauSac['gia_tri'] ?></option>                       
                        <?php } }  ?>
                    </select>
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