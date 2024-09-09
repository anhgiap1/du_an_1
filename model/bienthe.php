<?php
    function load_All_Mau_Sac($maKh){
        $sql = "select * from mau_sac where ma_shop = '$maKh'" ; 
        return pdo_query($sql) ; 
    }

    function load_All_Kich_Co($maKh){
        $sql = "select * from kich_co where ma_shop = '$maKh'" ; 
        return pdo_query($sql) ; 
    }

    function load_Kich_Co_By_Id($maKc){
        $sql = "select * from kich_co where ma_kc = '$maKc'" ; 
        return pdo_query_one($sql) ; 
    }

    
    function load_Mau_Sac_By_Id($maMs){
        $sql = "select * from mau_sac where ma_ms = '$maMs'" ; 
        return pdo_query_one($sql) ; 
    }

    function load_DISTINCT_Kc($maHh){
        $sql = "SELECT DISTINCT ma_kc FROM `chi_tiet_hang_hoa` WHERE ma_hh = $maHh" ; 
        return pdo_query($sql) ; 

    }

    function load_DISTINCT_Ms($maHh){
        $sql = "SELECT DISTINCT ma_ms FROM `chi_tiet_hang_hoa` WHERE ma_hh = $maHh" ; 
        return pdo_query($sql) ; 

    }

    function load_All_Kich_Co_By_Ids($string){
        $sql = "select * from kich_co where ma_kc IN ($string)" ; 
        return pdo_query($sql) ; 
    }

    function load_All_Mau_Sac_By_Ids($string){
        $sql = "select * from mau_sac where ma_ms IN ($string)" ; 
        return pdo_query($sql) ; 
    }
?>