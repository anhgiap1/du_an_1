<style> 
        .header-shop{
            width:100% ; 
            background-color: var(--orange);
            position: fixed;
            top:0;
            left:0;
            right:0;
            z-index:20;
        }
        .phan_dau{
            width: 1200px;
            height:60px;
            display:flex;
            justify-content: space-between;
        }
        .phan_giua{
            padding-top: 9px;
            display: flex;
        }

        .phan_giua1{
            padding-top: 10px;
            padding-left: 5px;
        }

        .phan_giua1 > span{
            font-size: 21px;
            color: white;
            margin-left: 17px;
        }
        .phan_tiep img{
            width: 30px;
            height: 30px;
            background-color: #fff;
            border-radius:50% ;
            object-fit: cover;
        }
        .phan_sau{
            display:flex;
            padding-top: 15px;
        }
        .phan_cuoi{
            padding-top: 5px;
            padding-left: 5px;
            font-size: 15px;
            color:#fff
        }
    </style>
    <div class="header-shop">
        <div class="container">
    <div class="phan_dau">
        <div class="phan_giua">
            <div class="phan_giua2">
                <a href="../index.php">
                <img style="width:80px;" src="../assets/imgs/logo.png" alt="">
                </a>
            </div>
            <div class="phan_giua1">
                <span>Kênh người bán</span>
            </div>
        </div>
        <div class="phan_sau">  
            <div class="phan_tiep">
                <?php if(!empty($_SESSION['khachhang']['hinh_anh'])) { ?>
               <img src="<?= ".".$_SESSION['khachhang']['hinh_anh']?>" alt="">
               <?php } else { ?>
               <img src="../assets/imgs/user-default.png" alt="">
                <?php } ?>
            </div>
            <div class="phan_cuoi">
            <?=$_SESSION['khachhang']['tai_khoan']?>
            </div>
        </div>
    </div>
    </div>
    <?php if(isset($_COOKIE['massage']) && $_COOKIE['massage'] !== "") { ?>
    <?php require "../global/message.php" ; ?>
    <?php } ?>
    </div>
    
    