<?php

function check_login($taiKhoan,$matKhau){
    $sql = "select * from khach_hang where tai_khoan = '$taiKhoan' and mat_khau = '$matKhau'" ; 
    return pdo_query_one($sql) ; 
} 

?>