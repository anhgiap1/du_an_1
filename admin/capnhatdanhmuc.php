<div class="shop-page-content">
    <a href="./index.php?act=dsloaihang" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Cập nhật danh mục</p>
        <?php
        if(isset($_GET['idd'])){
            $id = $_GET['idd'];
            $sql = "select * from loai_hang where ma_loai = '$id'";
            $movie= pdo_query_one($sql);

        }
        if(isset($_POST['luu'])){
            $tendm = $_POST['tendm'];
            $select = $_POST['select'];
            if($_FILES['hinhanh']['name'] === ''){
                $duongdananh = $movie['hinh_anh'];
            }
            else{
                $duongdananh ="./assets/imgs/".basename($_FILES['hinhanh']['name']);
                $dest ="../assets/imgs/".basename($_FILES['hinhanh']['name']);
                $anh_tam = $_FILES['hinhanh']['tmp_name'];
            }
            $error = validation(['name' => $tendm,'nganhhang' => $select, 'image'=>$duongdananh])  ; 
            if(empty($error)){
            move_uploaded_file($anh_tam,$dest);
            $sql = "UPDATE loai_hang SET ten_loai ='$tendm',ma_nganh = '$select',hinh_anh='$duongdananh' where ma_loai = '$id'";
            pdo_execute($sql);  
            setcookie("massage","Cập nhật thành công ",time()+1) ; 
            header("Location: ./index.php?act=dsloaihang");
            }

        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="add">
                <label for="">Ngành hàng</label>
                <div>
                <select class="nganhhang" id="" name="select">
                <?php
                    $sql = "select * from nganh_hang";
                    $result = pdo_query($sql);
                    foreach ($result as $row){
                        if($row['ma_nganh'] === $movie['ma_nganh']){ ?>
                        <option selected value="<?php echo $row['ma_nganh'] ?>"><?php echo $row['ten_nganh'] ?></option>
                        <?php } else { ?>
                            <option  value="<?php echo $row['ma_nganh'] ?>"><?php echo $row['ten_nganh'] ?></option>
                            <?php
                           
                            }
                        }
                    
                    ?>
                </select>
            </div>
            </div>
            <div class="add">
                <label for="">Tên danh mục</label>
                <div>
                <input type="text" name="tendm" class="tendm" id="" placeholder="Nhập tên danh mục" value="<?php echo $movie['ten_loai']; ?>">
                </div>
                
            </div>
            <div class="add">
                <label for="">Hình ảnh</label>
                <div>
                <input type="file" class="anh" id="" placeholder="Nhập hình ảnh" name="hinhanh">
                
                <br>
                
            </div> 
            </div>
            <div class="add">
            <label for="">Hình ảnh cũ</label>
                <div>
                 <img width="50px" height="50px" src="<?php echo ".".$movie['hinh_anh'] ?>" alt="">
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit">
                <button class="huy">Hủy</button>
                <button name="luu" class="luu">Lưu và hiển thị</button>
            </div>
        </form>
    </div>

</div>
