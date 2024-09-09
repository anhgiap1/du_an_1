<?php
    function load_All_Loai_Hang(){
        $sql = "select * from loai_hang" ; 
        return pdo_query($sql) ; 
    }

    function load_Loai_Hang_by_Id($maLoai){
        $sql = "select * from loai_hang where ma_loai='$maLoai'" ; 
        return pdo_query_one($sql) ; 
    }
?>