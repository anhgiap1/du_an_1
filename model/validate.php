<?php 
function validation($result,$id=0){
    foreach($result as $key=>$value){
        if(!isset($value) || $value === ""){
            return "Vui lòng điền đầy đủ thông tin ! " ; 
        }else if($key === "email"){
            $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
            if(!preg_match($regex, $value)) {
                return "Email không đúng định dạng ! ";
            }else{
                $is_email = false  ; 
                $dsKhachHang =loadAll_khach_hang_by_id($id) ; 
                foreach($dsKhachHang as $khachHang){
                    if($value === $khachHang['email']){
                        $is_email = true ; 
                    }
                }
                if($is_email){
                    return "Email vừa nhập đã được đăng ký !" ;
                }
            }
        }else if($key === "sdt"){
            $regex = "/^(84|0[3|5|7|8|9])[0-9]{8}$/";
            if (!preg_match($regex, $value)) {
                return "Số điện thoại không đúng định dạng!";
            }            
        }else if($key === "pass"){
            if(strlen($value) <= 6){
                return "Mật khẩu phải lớn hơn 6 ký tự" ;
            }
        }else if($key === "image"){ 
            if($value === ""){
                return "Vui lòng chọn ảnh " ; 
            }else if($value){
                $is_img = false ;
                $typeImg = ['.jpg','.jpeg','.png','.svg','.gif'] ; 
                $length = count($typeImg) ;
                $newImg = substr(($value),strrpos($value,".")) ; 
                
                for ($i=0; $i < $length ; $i++) { 
                    if($newImg === $typeImg[$i]){
                        $is_img = true ;
                        break ; 
                    }
                }
                if(!$is_img){
                    return "Ảnh không đúng định dạng !" ;
                }
            }
        }else if($key === "images"){
            if($value[0] == "" ){
                return "Vui lòng chọn ảnh " ; 
            }else if(count($value) > 0 ){
                $typeImg = ['.jpg','.jpeg','.png','.svg','.gif'] ; 
                $is_img = false ;
                $length = count($typeImg) ;
                foreach( $value as $image){
                    $newImg = substr(($image),strrpos($image,".")) ; 
                    for ($i=0; $i < $length ; $i++) { 
                        if($newImg === $typeImg[$i]){
                            $is_img = true ;
                            break ; 
                        }
                    }
                    if(!$is_img){
                        return "Ảnh không đúng định dạng !" ;
                    }
        
                } 
            }
        }
        else if($key === "updateimages"){
             if(count($value) > 1 ){
                $typeImg = ['.jpg','.jpeg','.png','.svg','.gif'] ; 
                $is_img = false ;
                $length = count($typeImg) ;
                foreach( $value as $image){
                    $newImg = substr(($image),strrpos($image,".")) ; 
                    for ($i=0; $i < $length ; $i++) { 
                        if($newImg === $typeImg[$i]){
                            $is_img = true ;
                            break ; 
                        }
                    }
                    if(!$is_img){
                        return "Ảnh không đúng định dạng !" ;
                    }
        
                } 
            }
        }
        else if($key === "user"){
            $pattern = "/[^\p{L}\p{N}]/u";
            if(strlen($value) <= 4){
                return "Tên tài khoản phải lớn hơn 5 ký tự" ;
            } else if (preg_match($pattern, $value)) {
                return "Tài Khoản không được phép nhập dấu !" ;
            }else { 
                $is_user = false  ; 
                $dsKhachHang = loadAll_khach_hang_by_id($id) ; 
                foreach($dsKhachHang as $khachHang){
                    if($value === $khachHang['tai_khoan']){
                        $is_user = true ; 
                        break ; 
                    }
                }
                if($is_user){
                    return "Tài khoản vừa nhập đã tồn tại !" ;
                }
            }
        }
        else if($key === "vaiTro"){
            if($value !== "0" && $value !== "1" && $value !== "2"){
                return " Vai trò chỉ được phép nhập giá trị 0,1 hoặc 2" ;
            }
        }
        else if($key === "donGia"){
            if($value <= 0 ){
                return "Đơn giá phải lớn hơn 0 " ;
            }
        }
    }
}
?>

<?php
    function get_ma_Cthh($maHh,$maKc,$maMs){
        if(!empty($maKc) && empty($maMs)){
            return   load_maCt_Hang_Hoa_By_Kc($maHh,$maKc) ; 
        }else if(!empty($maMs) && empty($maKc)){
            return  load_maCt_Hang_Hoa_By_Ms($maHh,$maMs) ; 
        }else if(!empty($maKc) && !empty($maMs)){
            return  load_maCt_Hang_Hoa_By_Kc_Ms($maHh,$maMs,$maKc) ; 
        }else if(empty($maMs) && empty($maKc)){
            return  load_maCt_Hang_Hoa($maHh) ; 
        }
    }

?>