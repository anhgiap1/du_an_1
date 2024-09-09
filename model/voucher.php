<?php 
    function load_All_Vouchr(){
        $sql = "SELECT * FROM voucher WHERE ngay_ket_thuc >= CURDATE()" ;
        return pdo_query($sql) ; 
    }

    function load_Voucher_By_Id($ma_voucher){
        $sql = "SELECT * FROM voucher where ma_voucher = '$ma_voucher'" ;
        return pdo_query_one($sql) ; 
    }
?>