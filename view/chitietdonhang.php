<?php 
    if(isset($_GET['maCtdh'])){
        $maCtdh = $_GET['maCtdh'];
        $ctDonHang = load_Ct_Don_Hang_By_maCtdh($maCtdh) ; 
    }

?>
                <main id="order-detail" style="margin-top: 32px;"> 
                    <div class="infor-detail-product"> 
                        <div class="infor-detail-product-item"> 
                            <div class="img-infor-detail"> 
                                <img src="<?=load_Ma_Hinh_By_Id_Hh($ctDonHang['ma_hh'])[0]['duong_dan']?>" alt="">
                            </div>
                            <div class="name-product"> 
                                <h3><?=$ctDonHang['ten_hh']?></h3>
                                <span> Phân loại hàng : <?= !empty($ctDonHang['ma_kc']) ? load_Kich_Co_By_Id($ctDonHang['ma_kc'])['gia_tri'] : "" ?>,<?= !empty($ctDonHang['ma_ms']) ? load_Mau_Sac_By_Id($ctDonHang['ma_ms'])['gia_tri'] : "" ?></span>
                                <span> Số lượng : <?=$ctDonHang['so_luong_giao']?> </span>
                            </div>
                        </div>
                        <div class="prie-product"> 
                            <h3><?=fomat_number($ctDonHang['don_gia']-$ctDonHang['giam_gia'])?>đ</h3>
                        </div>
                    </div>
                    <h3>Địa chỉ nhận hàng</h3>
                    <div class="order-detail-content">
                        <div class="infor-move"> 
                            <p class="name-user"><?=$ctDonHang['ho_ten']?></p>
                            <p class="move">Ngày Đặt : <?=$ctDonHang['ngay_dat']?></p>
                            <p class="move"  style="margin:8px 0;">Số Điện Thoại : <?=$ctDonHang['so_dien_thoai']?></p>
                            <p class="move">Địa Chỉ :<?=$ctDonHang['dia_chi']?></p>

                        </div>
                        <div class="info-product"> 
                            <div class="info-product-item"> 
                                <span>Tổng tiền hàng</span>
                                <p><?=fomat_number(($ctDonHang['don_gia']-$ctDonHang['giam_gia']) * $ctDonHang['so_luong_giao'] )?>đ</p>
                            </div>
                            <div class="info-product-item"> 
                                <span>Phí Vận chuyển</span>
                                <p>30.000đ</p>
                            </div>
                            <div class="info-product-item"> 
                                <span>Voucher</span>
                                <p>-<?=fomat_number((($ctDonHang['don_gia']-$ctDonHang['giam_gia']) * $ctDonHang['so_luong_giao']) - $ctDonHang['thanh_tien']) ?>đ</p>
                            </div>
                            <div class="info-product-item"> 
                                <span>Phương thức thanh toán </span>
                                <p>Thanh toán khi nhận hàng</p>
                            </div>
                            <div class="info-product-item"> 
                                <span>Thành tiền</span>
                                <p class="sum_price"><?=fomat_number($ctDonHang['thanh_tien'])?>đ</p>
                            </div>
                        </div>
                    </div>
                </main>