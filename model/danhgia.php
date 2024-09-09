<!-- SELECT * FROM `chi_tiet_hang_hoa` INNER JOIN chi_tiet_don_hang on chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh INNER JOIN danh_gia on danh_gia.ma_ctdh = chi_tiet_don_hang.ma_ctdh where chi_tiet_hang_hoa.ma_hh=175; -->
<?php
    function insert_ALL_Danh_Gia($noiDung,$hinhAnh,$ngayDg,$trang_thai,$ma_ctdh,$ma_kh){
        $sql = "INSERT INTO danh_gia (noi_dung,hinh_anh_dg,ngay_dg,trang_thai,ma_ctdh,ma_kh) VALUE ('$noiDung','$hinhAnh','$ngayDg','$trang_thai','$ma_ctdh','$ma_kh')"; 
        pdo_execute($sql) ; 
    }

    function load_All_Danh_Gia_By_Mahh($maHh){
        $sql = "SELECT hang_hoa.*,chi_tiet_hang_hoa.*,danh_gia.*,khach_hang.* FROM `hang_hoa` 
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
        INNER JOIN chi_tiet_don_hang on chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh 
        INNER JOIN danh_gia on danh_gia.ma_ctdh = chi_tiet_don_hang.ma_ctdh 
        INNER JOIN khach_hang on khach_hang.ma_kh = danh_gia.ma_kh 
        WHERE hang_hoa.ma_hh = $maHh and danh_gia.trang_thai = 1  ORDER BY danh_gia.ma_dg DESC ;
         "; 
        return pdo_query($sql) ;   
    }

    function count_Danh_Gia($maHh){
        $sql = "SELECT COUNT(danh_gia.ma_dg) FROM `hang_hoa` 
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
        INNER JOIN chi_tiet_don_hang on chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh 
        INNER JOIN danh_gia on danh_gia.ma_ctdh = chi_tiet_don_hang.ma_ctdh 
        WHERE hang_hoa.ma_hh = $maHh and danh_gia.trang_thai = 1  ORDER BY danh_gia.ma_dg DESC;
        ";
        return pdo_query_one($sql) ;   

    }

    function huy_Don_Hang($maCtdh){
        $sql = "DELETE FROM chi_tiet_don_hang WHERE ma_ctdh = '$maCtdh'" ;  
        pdo_execute($sql) ; 
    }

    function load_Danh_Gia_By_Shop($maShop){
        $sql = "SELECT hang_hoa.*,danh_gia.ma_dg, MIN(danh_gia.ngay_dg),MAX(danh_gia.ngay_dg),COUNT(danh_gia.ma_dg) FROM `hang_hoa` 
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
        INNER JOIN chi_tiet_don_hang on chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh 
        INNER JOIN danh_gia on danh_gia.ma_ctdh = chi_tiet_don_hang.ma_ctdh 
        where hang_hoa.ma_shop = $maShop GROUP BY hang_hoa.ma_hh;
        " ;  
        return pdo_query($sql) ;   

    }

    function load_All_Ct_Danh_Gia($maHh){
        $sql = "SELECT danh_gia.*,hang_hoa.ten_hh, khach_hang.ho_ten FROM `danh_gia` 
        INNER JOIN chi_tiet_don_hang on chi_tiet_don_hang.ma_ctdh = danh_gia.ma_ctdh 
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
        INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
        INNER JOIN khach_hang on khach_hang.ma_kh = danh_gia.ma_kh 
        WHERE hang_hoa.ma_hh = '$maHh' and danh_gia.trang_thai = 1 
        ORDER BY danh_gia.ngay_dg DESC;
        " ; 
        return pdo_query($sql) ;   
          
    }

    function load_All_Ct_Danh_Gia_An($maShop){
        $sql = "SELECT danh_gia.*,hang_hoa.ten_hh, khach_hang.ho_ten FROM `danh_gia` 
        INNER JOIN chi_tiet_don_hang on chi_tiet_don_hang.ma_ctdh = danh_gia.ma_ctdh 
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_cthh = chi_tiet_don_hang.ma_cthh 
        INNER JOIN hang_hoa on hang_hoa.ma_hh = chi_tiet_hang_hoa.ma_hh 
        INNER JOIN khach_hang on khach_hang.ma_kh = danh_gia.ma_kh 
        WHERE hang_hoa.ma_shop = '$maShop' and danh_gia.trang_thai = 0 
        ORDER BY danh_gia.ngay_dg DESC;
        " ; 
        return pdo_query($sql) ;   
          
    }

    function an_Danh_Gia($maDg){
        $sql = "UPDATE danh_gia set trang_thai = 0 where ma_dg = $maDg" ;
        pdo_execute($sql) ; 

    }

    function hien_Thi_Danh_Gia($maDg){
        $sql = "UPDATE danh_gia set trang_thai = 1 where ma_dg = $maDg" ;
        pdo_execute($sql) ; 
    }
?>
