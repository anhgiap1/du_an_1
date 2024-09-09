<?php
    function load_Hh_Shop_New($maShop,$item_per_page,$offset){
        $sql = " SELECT * FROM hang_hoa 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  
        WHERE ma_shop = '$maShop' and  hang_hoa.trang_thai = 1
        GROUP BY chi_tiet_hang_hoa.ma_hh 
        order by hang_hoa.ma_hh DESC LIMIT $item_per_page 
        OFFSET $offset" ; 
        return pdo_query($sql) ;   
    }

    function load_Hh_Shop_Old($maShop,$item_per_page,$offset){
        $sql = "SELECT * FROM hang_hoa 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  
        WHERE ma_shop = '$maShop' and  hang_hoa.trang_thai = 1
        GROUP BY chi_tiet_hang_hoa.ma_hh 
        order by hang_hoa.ma_hh ASC LIMIT $item_per_page 
        OFFSET $offset";
        return pdo_query($sql) ;   
    }
    
    function load_Hh_ban_chay($maShop,$item_per_page,$offset){
        $sql = "SELECT * FROM hang_hoa 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  
        WHERE ma_shop = '$maShop' and  hang_hoa.trang_thai = 1
        GROUP BY chi_tiet_hang_hoa.ma_hh 
         order by chi_tiet_hang_hoa.so_luot_ban DESC LIMIT $item_per_page 
        OFFSET $offset";
        return pdo_query($sql) ;   
    }

    function load_Thong_Tin_Shop_by_Id($maKh){
        $sql = "SELECT * FROM khach_hang WHERE ma_kh = '$maKh'"  ;
        return pdo_query_one($sql) ;   
    }

    function count_Hang_Hoa_Shop($maShop){
        $sql = "SELECT COUNT(ten_hh) FROM `hang_hoa` WHERE ma_shop= '$maShop' and  hang_hoa.trang_thai = 1" ; 
        return pdo_query_one($sql) ;   
    }

    function count_Danh_Gia_Shop($maShop){
        $sql = "SELECT COUNT(*) FROM `hang_hoa` 
        INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
        INNER JOIN chi_tiet_don_hang on chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh 
        INNER JOIN danh_gia on danh_gia.ma_ctdh = chi_tiet_don_hang.ma_ctdh 
        where hang_hoa.ma_shop = $maShop GROUP BY danh_gia.ma_ctdh;" ; 
        return pdo_query_one($sql) ;   

    }
?>