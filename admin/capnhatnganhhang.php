<div class="shop-page-content">
    <a href="index.php" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM nganh_hang where ma_nganh = '$id'";
        $movie=pdo_query_one($sql);
    
    if(isset($_POST['themmoi'])){
        $tennghanh = $_POST['tennghanh'];
        $error = validation(['name' => $tennghanh])  ; 
        if(empty($error)){
            $update = "UPDATE nganh_hang SET ten_nganh = '$tennghanh' WHERE ma_nganh = '$id'";
            pdo_execute($update);
            setcookie("massage","Cập nhật thành công ",time()+1) ; 
            header("Location: index.php");
        }

    }
    ?>
    <div class="themdm">
        <p class="tieude">Cập nhật ngành hàng</p>
        <form action="" method="post">
            <div class="add">
                <label for="">Tên ngành hàng</label>
                <div>
                    <input type="text" name="tennghanh" class="tennganhhang" id="" placeholder="Nam" value="<?php echo $movie['ten_nganh']; ?>">
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit">
                <button class="huy">Hủy</button>
                <button name="themmoi" class="luu">Lưu và hiển thị</button>
            </div>
        </form>
    </div>

</div>