<div class="shop-page-content">
    <!-- <?php
    $errtennghanh = "";
    if(isset($_POST['button'])){
        $tennghanh = $_POST['tennghanh'];
        $error = validation(['name' => $tennghanh])  ; 
        if(empty($error)){
            $themmoi = "INSERT INTO nganh_hang(ten_nganh) VALUES ('$tennghanh')";
            pdo_execute($themmoi);
            header("Location: index.php");
            setcookie("massage","Thêm thành công ",time()+1) ; 
        }
        

    }
    ?> -->
    <a href="index.php" class="btn-quaylai"><i class="fa-solid fa-chevron-left"></i>Quay lại</a>
    <div class="themdm">
        <p class="tieude">Thêm ngành hàng</p>
        <form action="" method="post">
            <div class="add">
                <label for="">Tên ngành hàng</label>
                <div>
                    <input type="text" class="tennganhhang" name="tennghanh" id="" placeholder="Nhập tên ngành hàng">
                    <br>
                    <span style="color:red;font-size:20px;"><?php echo $errtennghanh; ?></span>
                </div>
            </div>
            <p id="error"><?= isset($error) ? $error : "" ?></p>
            <div class="submit">
                <button class="huy">Hủy</button>
                <a href="index.php?act=home"><button name="button" class="luu">Lưu và hiển thị</button></a>
                <!-- <a href="index.php?act=home"><button name="button" class="luu">Lưu và hiển thị</button></a> -->
            </div>
        </form>
    </div>

</div>