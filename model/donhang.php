<?php
    function insert_All_Ctdh($soLuong,$thanh_tien,$trangThai,$ctHh,$maDh){
        $sql = "insert into chi_tiet_don_hang (so_luong,thanh_tien,trang_thai,ma_cthh,ma_dh) value ('$soLuong','$thanh_tien',$trangThai,'$ctHh','$maDh')" ; 
        pdo_execute($sql) ; 
    }

    function insert_All_Don_Hang($tong_tien,$ngay_dat,$maKh){
        $sql = "insert into don_hang (tong_tien,ngay_dat,ma_kh) value ('$tong_tien','$ngay_dat','$maKh')" ; 
        pdo_execute($sql) ; 
    }

    function get_Id_Don_Hang(){
        $sql = "SELECT ma_dh FROM don_hang ORDER BY ma_dh DESC LIMIT 1;" ;
        return pdo_query_one($sql)['ma_dh'] ; 
    }

    function load_All_Don_Hang_By_Makh($maKh){
        $sql = "SELECT *,chi_tiet_don_hang.trang_thai as trang_thai_giao,chi_tiet_don_hang.so_luong as so_luong_giao  FROM `chi_tiet_don_hang`
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
        INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
        INNER JOIN don_hang on don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
        WHERE don_hang.ma_kh = $maKh ORDER BY chi_tiet_don_hang.ma_ctdh DESC " ; 
        return pdo_query($sql) ; 
    }

    function update_Trang_Thai_Dh($maCtdh){
        $sql = "update chi_tiet_don_hang set trang_thai = '2' where ma_ctdh = '$maCtdh'" ; 
        pdo_execute($sql) ; 
    }

    function load_Ct_Don_Hang_By_0($maShop){
        $sql = "SELECT *,chi_tiet_don_hang.trang_thai as trang_thai_giao,chi_tiet_don_hang.so_luong as so_luong_giao  FROM `chi_tiet_don_hang`
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
        INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
        INNER JOIN don_hang on don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
        where chi_tiet_don_hang.trang_thai = 0 and hang_hoa.ma_shop='$maShop'" ;
        return pdo_query($sql) ; 
    }

    function load_Ct_Don_Hang_By_1($maShop){
        $sql = "SELECT *,chi_tiet_don_hang.trang_thai as trang_thai_giao,chi_tiet_don_hang.so_luong as so_luong_giao  FROM `chi_tiet_don_hang`
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
        INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
        INNER JOIN don_hang on don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
        where chi_tiet_don_hang.trang_thai = 1 and hang_hoa.ma_shop='$maShop'" ;
        return pdo_query($sql) ; 
    }

    function load_Ct_Don_Hang_By_2($maShop){
        $sql = "SELECT *,chi_tiet_don_hang.trang_thai as trang_thai_giao,chi_tiet_don_hang.so_luong as so_luong_giao  FROM `chi_tiet_don_hang`
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
        INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
        INNER JOIN don_hang on don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
        where chi_tiet_don_hang.trang_thai = 2 and hang_hoa.ma_shop='$maShop'" ;
        return pdo_query($sql) ; 
    }

    function load_All_Don_Hang_Shop($maShop){
        $sql = "SELECT *,chi_tiet_don_hang.trang_thai as trang_thai_giao,chi_tiet_don_hang.so_luong as so_luong_giao FROM `chi_tiet_don_hang`
         INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
         INNER JOIN hang_hoa ON hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
         INNER JOIN don_hang on don_hang.ma_dh = chi_tiet_don_hang.ma_dh
         where hang_hoa.ma_shop='$maShop';" ;
        return pdo_query($sql) ; 

    }

    function update_Trang_Thai_Don_Hang_1($maCtdh){
        $sql = "update chi_tiet_don_hang set trang_thai = '1' where ma_ctdh = '$maCtdh'" ; 
        pdo_execute($sql) ; 
    }

    function load_Ct_Don_Hang_By_maCtdh($maCtdh){
        $sql = "SELECT chi_tiet_don_hang.*,khach_hang.*,hang_hoa.*,chi_tiet_hang_hoa.*,chi_tiet_don_hang.so_luong as so_luong_giao,don_hang.ngay_dat FROM `chi_tiet_don_hang` 
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
        INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
        INNER JOIN don_hang on don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
        INNER JOIN khach_hang on khach_hang.ma_kh = don_hang.ma_kh 
        where chi_tiet_don_hang.ma_ctdh = $maCtdh;" ; 
        return pdo_query_one($sql); 

    }
?>