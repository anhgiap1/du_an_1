<div class="shop-page-content">
    <a href="./index.php?act=dsloaihang" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm danh mục</p>
        <?php
        if(isset($_POST['luu'])){
            
            $tendm = $_POST['tendm'];
            $select = $_POST['select'];
            $hinh_anhh = $_FILES['hinhanh'];
            $duongdananh ="./assets/imgs/".basename($_FILES['hinhanh']['name']);
            $dest ="../assets/imgs/".basename($_FILES['hinhanh']['name']);
            $anh_tam= $_FILES['hinhanh']['tmp_name'];
            // $duongdananh="./assets/imgs/".basename($hinh_anh['name']);
            // $anh_tam=$hinh_anh['tmp_name'];
            $error = validation(['name' => $tendm,'nganhhang' => $select, 'image'=>$duongdananh])  ; 
            if(empty($error)){
                $sql = "insert into loai_hang(ten_loai,ma_nganh,hinh_anh) values('$tendm', '$select','$duongdananh')";
                move_uploaded_file($anh_tam,$dest);
                pdo_execute($sql);
                setcookie("massage","Thêm thành công ",time()+1) ; 
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
                    $result=pdo_query($sql);
                    foreach ($result as $row){
                        ?>
                            <option value="<?php echo $row['ma_nganh'] ?>"><?php echo $row['ten_nganh'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            </div>
            <div class="add">
                <label for="">Tên danh mục</label>
                <div>
                <input type="text" name="tendm" class="tendm" id="" placeholder="Nhập tên danh mục">
                </div>
                
            </div>
            <div class="add">
                <label for="">Hình ảnh</label>
                <div>
                <input type="file" class="anh" id="" placeholder="Nhập hình ảnh" name="hinhanh">
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