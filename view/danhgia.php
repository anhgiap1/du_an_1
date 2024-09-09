<?php 
    if(isset($_SESSION['khachhang']) && $_SESSION['khachhang'] !== ""){
        if(isset($_POST['danhgia'])){
            $maDh = $_GET['maDh'] ; 
            $noiDung = $_POST['noidung'] ; 
            $maKh = $_SESSION['khachhang']['ma_kh'] ; 
            $ngayDg = date('Y-m-d');
            $new = "./assets/imgs/".basename( $_FILES['hinhanh']['name']);
            $dest = $_FILES['hinhanh']['tmp_name'] ;
            if($_FILES['hinhanh']['name'] !== "" ){
                move_uploaded_file($dest,$new) ; 
            }else{
                $new = "" ; 
            }
            insert_ALL_Danh_Gia($noiDung,$new,$ngayDg,1,$maDh,$maKh) ;
            setcookie("massage","Đánh giá sản phẩm thành công ",time()+1) ; 
            header("Location: ./index.php?act=donhang") ;
        }
 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de44c2f79a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/ctsp.css">
</head>
<style>
    .ong{
        display:flex ; 
        justify-content: center;
    }
    .cha .p-dg{
        margin: 10px 10px 10px 25px;
        font-size: 20px;
    }
    .cha{
        margin-top: 10px;
        width: 1050px;
        height: 400px;
        background-color: white;
        border: 1px solid var(--gray);
        border-radius: 3px;
        
    }
    .con{
        width: 1047px;
        height: 300px;        
        background-color: var(--greyish);
        border-radius: 3px;

    } 
    .con form {
        margin-left: 27px;
    }
    .vande button{
        border: 1px solid var(--orange);
        color: var(--orange) ; 
        cursor: pointer;
        font-size: 14px;
        margin-left: 25px;
        margin-bottom: 20px;
        padding: 8px;
        overflow: hidden;
        border-radius: 3px;

    }

    .vande button i{
        margin-right: 8px;
    }

    .cha-con{
        float: right;
        margin-right: 25px;
        margin-top: 10px;
    }

    .cha-con input{
        padding: 8px 15px;
        font-size: 14px;
    }
    .oidoi{
        width: 127px;
        height: 32px;
        float: left;
        margin-left: 25px;
        position: absolute;
        border: 1px solid black;
        overflow: hidden;
        opacity: 0;
    }
    
    .cha-vande{
        position: relative;
    }
    .vande{
        position: absolute;
    }

    .cha-con .nut-danh-gia{
        border: none; color: white;
        background-color: var(--orange);
        border-radius: 3px;
    }

    .cha-con .nut-huy-danh-gia{
        color: var(--black);
        border: none;
        background-color:white;
        background-color: var(--gray);
        margin-right: 8px;
        border-radius: 3px;
    }

    .cha-con .nut-danh-gia:hover{
        opacity: 0.6;
        cursor: pointer;
    }

    .contrai textarea{
        margin: 23px;
        width: 950px; 
    }

</style>
<body>
    <div class="ong">
        <div class="cha">
            <p class="p-dg">Đánh Giá Sản Phẩm</p>
            <div class="con">
                <form action=""v method="POST" enctype="multipart/form-data">
               <div class="contrai">
                <textarea placeholder="Nhập đánh giá ở đây" name="noidung" id="" cols="5" rows="10"></textarea>
               
               </div>
                <div class="cha-vande">
                    <div class="vande">
                        <button type="submit" ><i class="fa-solid fa-camera"></i>Thêm Hình ảnh</button>
                    </div>
                    <div class="oidoi">
                        <div class="em">
                            <input style="font-size: 25px;" type="file" name="hinhanh">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="cha-con">
                <input class="nut-huy-danh-gia" type="reset" value="Trở lại ">
                <input class="nut-danh-gia" type="submit" name="danhgia" value="Hoàn Thành">
            </div>
            </form>
        </div>
    </div>
</body>
</html>