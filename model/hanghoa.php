<?php 
    function insert_Hang_Hoa($tenHang,$moTa,$trangThai,$maLoai,$maShop){
        $sql = "insert into hang_hoa (ten_hh,mo_ta,so_luot_xem,trang_thai,ma_loai,ma_shop) value ('$tenHang','$moTa',0,$trangThai,'$maLoai','$maShop')" ; 
        pdo_execute($sql) ; 
    }

    function insert_Ct_Hang_Hoa($donGia,$giamGia,$soLuong,$maKc,$maMs,$maHh){
        $sql = "insert into chi_tiet_hang_hoa (don_gia,giam_gia,so_luot_ban,so_luong,ma_kc,ma_ms,ma_hh) values ('$donGia','$giamGia','0','$soLuong','$maKc','$maMs','$maHh')" ;
        pdo_execute($sql) ; 

    }

    function get_Id_Hang_Hoa(){
        $sql = "SELECT ma_hh FROM hang_hoa ORDER BY ma_hh DESC LIMIT 1;" ;
        return pdo_query_one($sql)['ma_hh'] ; 
    }

    function insert_Kich_Co_Cthh($maKc,$maHh){
        $sql = "insert into chi_tiet_hang_hoa (ma_kc,ma_hh) value ('$maKc','$maHh')" ; 
        return pdo_query($sql) ; 
    }

    function insert_Mau_Sac_Cthh($maMs,$maHh){
        $sql = "insert into chi_tiet_hang_hoa (ma_ms,ma_hh) value ('$maMs','$maHh')" ; 
        return pdo_query($sql) ; 
    }

    function insert_Hinh_Anh($duongDan,$maHh){
        $sql = "insert into hinh_anh (duong_dan,ma_hh) value ('$duongDan','$maHh')" ; 
        pdo_execute($sql) ; 
    }

    function load_All_Hang_Hoa(){
        // $sql =  "SELECT hang_hoa.*,loai_hang.ten_loai,hinh_anh.duong_dan,chi_tiet_hang_hoa.* FROM hang_hoa INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh INNER JOIN hinh_anh on hinh_anh.ma_hh = hang_hoa.ma_hh INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai" ; 
        $sql = "SELECT * from hang_hoa INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai order by ma_hh DESC" ;
        return pdo_query($sql) ; 
    }

    function load_All_Hang_Hoa_By_Shop($maShop){
        // $sql =  "SELECT hang_hoa.*,loai_hang.ten_loai,hinh_anh.duong_dan,chi_tiet_hang_hoa.* FROM hang_hoa INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh INNER JOIN hinh_anh on hinh_anh.ma_hh = hang_hoa.ma_hh INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai" ; 
        $sql = "SELECT * from hang_hoa INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai where hang_hoa.ma_shop = '$maShop' order by ma_hh DESC" ;
        return pdo_query($sql) ; 
    }

    function select_Hinh_Anh($id){
        $sql =  "SELECT * FROM hinh_anh where ma_hh = '$id'" ; 
        return pdo_query($sql) ; 
    }

    function load_Don_Gia($id){
        $sql =  "SELECT don_gia,giam_gia FROM chi_tiet_hang_hoa where ma_hh = '$id' limit 1" ; 
        return pdo_query_one($sql) ;   
    }

    function load_Mau_Sac($id){
        $sql =  "SELECT mau_sac.* FROM chi_tiet_hang_hoa INNER JOIN mau_sac on mau_sac.ma_ms = chi_tiet_hang_hoa.ma_ms where chi_tiet_hang_hoa.ma_hh = '$id';" ; 
        return pdo_query($sql) ;   
    }

    function load_Kich_Co($id){
        $sql =  "SELECT kich_co.*,chi_tiet_hang_hoa.* FROM chi_tiet_hang_hoa INNER JOIN kich_co on kich_co.ma_kc = chi_tiet_hang_hoa.ma_kc where chi_tiet_hang_hoa.ma_hh = '$id';" ; 
        return pdo_query($sql) ;   
    }

    function delete_Hang_Hoa($id){
    $sql = "delete from hang_hoa where ma_hh='$id'" ;
    pdo_execute($sql) ; 
    }

    function delete_Hang_Hoa_By_Ma_Shop($id){
    $sql = "delete from hang_hoa where ma_shop='$id'" ;
    pdo_execute($sql) ; 
    }

    function delete_Ct_Hang_Hoa($id){
        $sql = "delete from chi_tiet_hang_hoa where ma_cthh ='$id'" ;
        pdo_execute($sql) ; 
    }

    function delete_Ct_Hang_Hoa_By_Mahh($id){
        $sql = "delete from chi_tiet_hang_hoa where ma_hh ='$id'" ;
        pdo_execute($sql) ; 
    }


    function delete_Hinh_Anh_Hh($id){
        $sql = "delete from hinh_anh where ma_hh='$id'" ;
        pdo_execute($sql) ; 
    }

    function load_Hang_Hoa_by_Id($id){
        // $sql =  "SELECT hang_hoa.*,loai_hang.ten_loai,hinh_anh.duong_dan,chi_tiet_hang_hoa.* FROM hang_hoa INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh INNER JOIN hinh_anh on hinh_anh.ma_hh = hang_hoa.ma_hh INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai" ; 
        $sql = "SELECT * from hang_hoa INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh where hang_hoa.ma_hh='$id' GROUP BY hang_hoa.ma_hh;" ;
        return pdo_query_one($sql) ; 
    }

    
    function load_Hang_Hoa_by_ma_Cthh($id,$maCthh){
        // $sql =  "SELECT hang_hoa.*,loai_hang.ten_loai,hinh_anh.duong_dan,chi_tiet_hang_hoa.* FROM hang_hoa INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh INNER JOIN hinh_anh on hinh_anh.ma_hh = hang_hoa.ma_hh INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai" ; 
        $sql = "SELECT * from hang_hoa INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh where hang_hoa.ma_hh='$id' and chi_tiet_hang_hoa.ma_cthh = $maCthh GROUP BY hang_hoa.ma_hh;" ;
        return pdo_query_one($sql) ; 
    }


    function load_Ma_Loai_Hh($maHh){
        $sql = "select ma_loai from hang_hoa where ma_hh='$maHh'" ; 
        return pdo_query_one($sql) ; 
    }

    // function update_Kich_Co($maHh){
    //     // $sql = "delete from chi_tiet_hang_hoa where ma_hh='$maHh'" ; 
    //     pdo_execute($sql) ; 
    // }

    // function update_Mau_Sac($maHh){
    //     $sql = "delete from chi_tiet_hang_hoa where ma_hh='$maHh'" ; 
    //     pdo_execute($sql) ; 
    // }

    function load_All_Ma_Cthh_Kc($id){
        $sql =  "SELECT chi_tiet_hang_hoa.ma_cthh FROM chi_tiet_hang_hoa INNER JOIN kich_co on kich_co.ma_kc = chi_tiet_hang_hoa.ma_kc where chi_tiet_hang_hoa.ma_hh = '$id'" ; 
        return pdo_query($sql) ;   

    }

    function load_All_Ma_Cthh_Ms($id){
        $sql =  "SELECT chi_tiet_hang_hoa.ma_cthh FROM chi_tiet_hang_hoa INNER JOIN mau_sac on mau_sac.ma_ms = chi_tiet_hang_hoa.ma_ms where chi_tiet_hang_hoa.ma_hh = '$id'" ; 
        return pdo_query($sql) ;   

    }

    function load_Ma_Hinh_By_Id_Hh($id){
        $sql = "SELECT * FROM hinh_anh WHERE ma_hh = '$id'" ; 
        return pdo_query($sql) ;   
    }
    
    function load_All_Hang_Hoa_Id_Lh($id,$maShop,$item_per_page,$offset){
        $sql = "SELECT * from hang_hoa INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai where hang_hoa.ma_loai = '$id' and hang_hoa.ma_shop = '$maShop' order by ma_hh DESC  LIMIT $item_per_page OFFSET $offset" ;
        return pdo_query($sql) ;   

    } 
    
    function delete_Kich_Co($maHh,$maKc){
        $sql = "DELETE from chi_tiet_hang_hoa where ma_hh = '$maHh' and ma_kc = '$maKc'" ;
        pdo_execute($sql) ; 
    }

    function delete_Mau_Sac($maHh,$maMs){
        $sql = "DELETE from chi_tiet_hang_hoa where ma_hh = '$maHh' and ma_ms = '$maMs'" ;
        pdo_execute($sql) ; 
    }

    function delete_Hinh_Anh($maHinh){
        $sql = "DELETE from hinh_anh where ma_hinh = '$maHinh'" ;
        pdo_execute($sql) ; 
    }

    function update_Hang_Hoa($tenHh,$moTa,$maLoai,$maHh){
        $sql = "UPDATE hang_hoa SET ten_hh = '$tenHh', mo_ta = '$moTa', ma_loai='$maLoai' where ma_hh = '$maHh'";
        pdo_execute($sql) ; 
    }

    function load_All_Hang_Hoa_Ban_Chay($now,$To){
        $sql = "SELECT * FROM hang_hoa INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh where hang_hoa.trang_thai = 1 GROUP BY hang_hoa.ma_hh  ORDER BY chi_tiet_hang_hoa.so_luot_ban DESC LIMIT $now,$To" ; 
        return pdo_query($sql) ;   
    }

    function load_Top1_Hinh_Anh($maHh){
        $sql = "SELECT * FROM hinh_anh WHERE ma_hh = '$maHh' LIMIT 1 " ; 
        return pdo_query_one($sql) ;   
    }
    function load_Top1_Gia($maHh){
        $sql = "SELECT don_gia,giam_gia FROM chi_tiet_hang_hoa WHERE ma_hh = '$maHh' LIMIT 1 " ; 
        return pdo_query_one($sql) ;   
    }
    
    function load_All_Kc_Hang_Hoa_by_ID($maHh){
        $sql = "SELECT kich_co.*,chi_tiet_hang_hoa.* FROM `chi_tiet_hang_hoa` INNER JOIN kich_co on kich_co.ma_kc = chi_tiet_hang_hoa.ma_kc WHERE chi_tiet_hang_hoa.ma_hh = '$maHh'" ;
        return pdo_query($sql) ;   
        
    }

    function load_All_Ms_Hang_Hoa_by_ID($maHh){
        $sql = "SELECT mau_sac.*,chi_tiet_hang_hoa.* FROM `chi_tiet_hang_hoa` INNER JOIN mau_sac on mau_sac.ma_ms = chi_tiet_hang_hoa.ma_ms WHERE chi_tiet_hang_hoa.ma_hh = '$maHh'" ;
        return pdo_query($sql) ;   
        
    }

    function load_All_Hang_Hoa_by_maLh($maLoai,$item_per_page,$offset){
        $sql = "SELECT * from hang_hoa  INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh where hang_hoa.ma_loai = '$maLoai' and  hang_hoa.trang_thai = 1   GROUP BY chi_tiet_hang_hoa.ma_hh  LIMIT $item_per_page OFFSET $offset" ; 
        return pdo_query($sql) ;   

    }

    
    function load_All_Hang_Hoa_by_maLh_New($maLoai,$item_per_page,$offset){
        $sql = "SELECT hang_hoa.*, chi_tiet_hang_hoa.*
        FROM hang_hoa
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
        WHERE hang_hoa.ma_loai = '$maLoai' and hang_hoa.trang_thai
        GROUP BY hang_hoa.ma_hh
        ORDER BY hang_hoa.ma_hh DESC
        LIMIT $item_per_page
        OFFSET $offset" ; 
        return pdo_query($sql) ;   
    }

    function load_All_Hang_Hoa_by_maLh_Sale($maLoai,$item_per_page,$offset){
        $sql = "SELECT * 
        FROM hang_hoa 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
        WHERE hang_hoa.ma_loai = '$maLoai' and  hang_hoa.trang_thai = 1
        GROUP BY chi_tiet_hang_hoa.ma_hh 
        ORDER BY chi_tiet_hang_hoa.so_luot_ban DESC 
        LIMIT $item_per_page 
        OFFSET $offset" ; 
        return pdo_query($sql) ;   
    }
    
    function load_All_Hang_Hoa_By_Search($tuKhoa,$item_per_page,$offset){
        $sql = "SELECT * 
        FROM hang_hoa 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
        WHERE ten_hh LIKE '%$tuKhoa%' and  hang_hoa.trang_thai = 1 
        GROUP BY chi_tiet_hang_hoa.ma_hh 
        LIMIT $item_per_page 
        OFFSET $offset" ; 
        return pdo_query($sql) ;   
    }
    
    function load_Hang_Hoa_Shop($maShop,$item_per_page,$offset){
        $sql = " SELECT * FROM hang_hoa 
        INNER JOIN khach_hang on khach_hang.ma_kh = hang_hoa.ma_shop 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  
        where hang_hoa.ma_shop = '$maShop' and  hang_hoa.trang_thai = 1 
        GROUP BY chi_tiet_hang_hoa.ma_hh LIMIT $item_per_page 
        OFFSET $offset " ; 
        return pdo_query($sql) ;   
    }


    
    function fomat_number($value){
        return number_format($value, 0, ',', '.');
    }

    function update_So_Luot_Ban_Tang($ctHh){
        $sql = "UPDATE chi_tiet_hang_hoa SET so_luot_ban = so_luot_ban+1 where ma_cthh = '$ctHh'";
        pdo_execute($sql) ; 

    }

    function update_So_Luot_Ban_Giam($ctHh){
        $sql = "UPDATE chi_tiet_hang_hoa SET so_luot_ban = so_luot_ban-1 where ma_cthh = '$ctHh' and so_luot_ban>0";
        pdo_execute($sql) ; 

    }

    function update_So_Luong_Giam($ctHh,$soLuong){
        $sql = "UPDATE chi_tiet_hang_hoa SET so_luong = so_luong-$soLuong where ma_cthh = '$ctHh' and so_luong > 0";
        pdo_execute($sql) ; 

    }

    function update_So_Luong_Tang($ctHh,$soLuong){
        $sql = "UPDATE chi_tiet_hang_hoa SET so_luong = so_luong+$soLuong where ma_cthh = '$ctHh' and so_luong > 0";
        pdo_execute($sql) ; 

    }



    function update_Hang_Hoa_So_Luot_Xem($maHh){
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem+1 where ma_hh = '$maHh'";
        pdo_execute($sql) ; 
    }

    function load_Top1_Hh_Ban_Chay($maShop){
    $sql = "SELECT * FROM `hang_hoa` INNER JOIN chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  WHERE hang_hoa.ma_shop = $maShop ORDER BY chi_tiet_hang_hoa.so_luot_ban DESC LIMIT 1;" ; 
    return pdo_query_one($sql) ;   
    }


    function load_All_Ct_Hang_Hoa($maHh){
        $sql = "SELECT *
        FROM chi_tiet_hang_hoa 
        WHERE chi_tiet_hang_hoa.ma_hh = '$maHh' ORDER BY ma_cthh DESC ";
        return pdo_query($sql) ;   

    }

    function update_Ct_Hang_Hoa($don_gia,$giam_gia,$so_luong, $ma_kc,$ma_ms,$maCthh){
        $sql = "UPDATE chi_tiet_hang_hoa set don_gia = '$don_gia',giam_gia = '$giam_gia',so_luong = '$so_luong', ma_kc = '$ma_kc',ma_ms = '$ma_ms' where ma_cthh = '$maCthh'" ;
        pdo_execute($sql) ; 

    }

    function load_Ct_Hang_Hoa_By_Id($maCtHh){
        $sql = "select * from chi_tiet_hang_hoa where ma_cthh = '$maCtHh' " ; 
        return pdo_query_one($sql) ;   

    }

    function sum_So_Luot_Ban($maHH){
        $sql = "SELECT *,SUM(so_luong) FROM `chi_tiet_hang_hoa` WHERE ma_hh = $maHH GROUP BY ma_hh;" ;
        return pdo_query_one($sql) ;   

    }

    function load_maCt_Hang_Hoa_By_Kc($maHh,$maKc){
        $sql = "SELECT ma_cthh FROM `chi_tiet_hang_hoa` WHERE ma_hh = $maHh and ma_kc = $maKc;" ;
        return pdo_query_one($sql) ;   

    }
    
    function load_maCt_Hang_Hoa_By_Ms($maHh,$maMs){
        $sql = "SELECT ma_cthh FROM `chi_tiet_hang_hoa` WHERE ma_hh = $maHh and ma_ms = $maMs;" ;
        return pdo_query_one($sql) ;   
    }

    function load_maCt_Hang_Hoa_By_Kc_Ms($maHh,$maMs,$maKc){
        $sql = "SELECT ma_cthh FROM `chi_tiet_hang_hoa` WHERE ma_hh = $maHh and ma_ms = $maMs and ma_kc = $maKc;" ;
        return pdo_query_one($sql) ;   
    }

    function load_maCt_Hang_Hoa($maHh){
        $sql = "SELECT ma_cthh FROM `chi_tiet_hang_hoa` WHERE ma_hh = $maHh" ;
        return pdo_query_one($sql) ;   
    }

    function hien_Thi_Update_Hang_Hoa($maHh){
        $sql = "SELECT * FROM hang_hoa where ma_hh = $maHh" ; 
        return pdo_query_one($sql) ;   

    }

    function update_Trang_Thai_Hang_Hoa($maHh){
        $sql = "UPDATE hang_hoa set trang_thai = 0 where ma_hh = $maHh" ; 
        pdo_execute($sql) ; 
    }

    function update_Trang_Thai_Hang_Hoa_1($maHh){
        $sql = "UPDATE hang_hoa set trang_thai = 1 where ma_hh = $maHh" ; 
        pdo_execute($sql) ; 
    }



?>

