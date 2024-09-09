<?php     
        $maHh = $_GET['mahh'];
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
            if(!empty($maKc) && empty($maMs)){
                $error = empty(load_maCt_Hang_Hoa_By_Kc($maHh,$maKc)) ? "" : "Kích cỡ đã tồn tại " ; 
            }else if(!empty($maMs) && empty($maKc)){
                // $error = empty(load_maCt_Hang_Hoa_By_Ms($maHh,$maMs)) ? "" : "Màu sắc đã tồn tại " ;  
                echo "123123" ; 
            }else if(!empty($maKc) && !empty($maMs)){
                $error = empty(load_maCt_Hang_Hoa_By_Kc_Ms($maHh,$maMs,$maKc)) ? "" : "Kích cỡ và Màu sắc đã tồn tại " ;  
            }
            
        if(empty($error)){
        setcookie("massage","Thêm thành công ",time()+1) ; 
        insert_Ct_Hang_Hoa($donGia,$giamGia,$soLuong,$maKc,$maMs,$maHh) ; 
        header("Location: ./index.php?act=chitiethanghoa&mahh=$maHh") ; 
        }
        }
?>  
<div class="shop-page-content">
    <a href="./index.php?act=chitiethanghoa&mahh=<?=$maHh?>" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm biến thể hàng hóa</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="add">
                <label for="">Đơn giá</label>
                <div>
                    <input type="number" class="tendm" id="" placeholder="Nhập đơn giá" name="dongia">
                </div>
            </div>
            <div class="add">
                <label for="">Giảm giá </label>
                <div>
                    <input type="number" class="mota" id="" placeholder="Nhập giảm giá" name="giamgia">
                </div>
            </div>
            <div class="add">
                <label for="">Số lượng </label>
                <div>
                    <input type="number" class="mota" id="" placeholder="Nhập số lượng " name="soluong">
                </div>
            </div>
            <div class="add">
                <label for="">Kích cỡ</label>
                <div>
                    <select class="nganhhang" id="" name="kichco">
                    <option value="''">-- Chọn kích cỡ --</option>
                        <?php foreach($dsKichCo as $kichCo )  { ?>
                        <option value="<?= $kichCo['ma_kc'] ?>"><?= $kichCo['gia_tri'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="add">
                <label for="">Màu sắc</label>
                <div>
                    <select class="nganhhang" id="" name="mausac">
                    <option value="">--Chọn màu sắc --</option>
                        <?php foreach($dsMauSac as $mauSac )  { ?>
                        <option value="<?= $mauSac['ma_ms'] ?>"><?= $mauSac['gia_tri'] ?> </option>
                        <?php } ?>
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