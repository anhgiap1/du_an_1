<?php
    function load_All_Khach_Hang(){
        $sql = "select * from khach_hang order by ma_kh DESC" ; 
        return  pdo_query($sql) ; 
    }

    function insert_All_Khach_Hang($tenKH,$taiKhoan,$matKhau,$image,$email,$soDienThoai,$diaChi,$vaiTro,$tenShop){
        $sql = "INSERT INTO khach_hang (ho_ten, tai_khoan, mat_khau, hinh_anh, email,so_dien_thoai, dia_chi, vai_tro, ten_shop) VALUES ('$tenKH', '$taiKhoan', '$matKhau', '$image', '$email','$soDienThoai', '$diaChi', '$vaiTro', '$tenShop')";
        pdo_execute($sql) ; 
    }

    function load_Khach_Hang_by_Id($id){
        $sql = "select * from khach_hang where ma_kh ='$id'" ; 
        return  pdo_query_one($sql) ; 
    }

    function update_Khach_Hang($tenKH,$taiKhoan,$matKhau,$new,$email,$sdt,$dia_chi,$vaiTro,$tenShop,$maKh){
    $sql = "update khach_hang set ho_ten='$tenKH',tai_khoan='$taiKhoan',mat_khau='$matKhau',hinh_anh='$new',email='$email',so_dien_thoai='$sdt',dia_chi='$dia_chi',vai_tro='$vaiTro',ten_shop='$tenShop' where ma_kh=$maKh" ; 
    pdo_execute($sql) ; 
    }

    function delete_Khach_Hang($id){
    $sql = "delete from khach_hang where ma_kh='$id'" ;
    pdo_execute($sql) ; 
    }
    
    function load_Dia_Chi_Kh($id){
        $sql = "select dia_chi,so_dien_thoai from khach_hang where ma_kh ='$id'" ; 
        return  pdo_query_one($sql) ; 
    }

    function dang_Ky_Shop($tenShop,$diaChi,$hinhAnh,$maKh){
        $sql = "UPDATE khach_hang set ten_shop = '$tenShop', dia_chi = '$diaChi',hinh_anh = '$hinhAnh', vai_tro = '1' where ma_kh = '$maKh'" ;
        pdo_execute($sql) ; 

    }

    function update_Location($maKh,$viTriMoi,$sdt){
        $sql = "UPDATE khach_hang set dia_chi = '$viTriMoi', so_dien_thoai = '$sdt' where ma_kh = '$maKh'" ;
        pdo_execute($sql) ; 
    }

    function loadAll_khach_hang_by_id($makh){
        $sql = "select * from khach_hang where ma_kh <> '$makh'" ; 
        return  pdo_query($sql) ; 
    }

?>