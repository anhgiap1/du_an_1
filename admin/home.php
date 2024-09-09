<div class="shop-page-content">
                        <h3 class="tieu-de-trang">Danh sách ngành hàng</h3>
                        <div class="operation-product">
                            <div class="search-folder">
                            </div>
                            <a href="./index.php?act=themmoinganhhang" class="add-product" style="margin-bottom: 32px;">
                                <i class="fa-solid fa-plus"></i>Thêm mới nghành hàng
                            </a>
                        </div>
                        <table class="bang-shop">
                            <tr class="tieude">
                                <th><input type="checkbox"></th>
                                <th>Mã nghành</th>
                                <th>Tên nghành hàng</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                                if(isset($_GET['id'])){
                                    $ma= $_GET['id'];
                                    $delete = "DELETE FROM nganh_hang where ma_nganh ='$ma'";
                                    pdo_execute($delete);
                                    setcookie("massage","Xóa thành công ",time()+1) ; 
                                    header('location: ./index.php');
                                }
                            ?> 
                            <?php
                            $sql = "SELECT * FROM nganh_hang order by ma_nganh desc";
                            $result = pdo_query($sql);
                            foreach ($result as $row){
                                ?>
                                <tr class="danh-gia">
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?php echo $row['ma_nganh'] ?></td>
                                <td><?php echo $row['ten_nganh'] ?></td>
                                <td><a href="./index.php?act=capnhatnganhhang&id=<?php echo $row['ma_nganh'] ?>" class="cap-nhat"><i class="fa-solid fa-pen-to-square"></i></a><a onclick="return confirm('Bạn có muốn xóa không')" href="index.php?id=<?php echo $row['ma_nganh'] ?>" class="xoa"><i class="fa-solid fa-trash-can"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>