<div class="dangnhap">
    <form action="" method="post">
        <?php
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $user=$_POST['taikhoan'];
            $sql = "SELECT khach_hang.mat_khau, khach_hang.tai_khoan FROM khach_hang WHERE khach_hang.email='$email' AND khach_hang.tai_khoan='$user';";
            $checkemail=pdo_query_one($sql);

            require("PHPMailer-master/PHPMailer-master/src/PHPMailer.php");
            require("PHPMailer-master/PHPMailer-master/src/SMTP.php");
            require("PHPMailer-master/PHPMailer-master/src/Exception.php");
      
          $mail = new PHPMailer\PHPMailer\PHPMailer();
          $mail->IsSMTP(); // enable SMTP
      
          $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
          $mail->SMTPAuth = true; // authentication enabled
          $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 465; // or 587
          $mail->IsHTML(true);
          $mail->Username = "lgmshopping04@gmail.com";
          $mail->Password = "wwiv xiki fsef stso";
          $mail->SetFrom("lgmshopping04@gmail.com");
          $mail->Subject = "Password retrieval";
          if(isset($checkemail['mat_khau']) && !empty($checkemail['mat_khau'])) {
            $mail->Body = 'Mật khẩu của bạn là: '.$checkemail['mat_khau'];
            }
            if(!empty($checkemail) && isset($checkemail)){
            $mail->AddAddress($email);
            if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
             }
            setcookie("massage","Gửi email  thành công ",time()+1) ; 
            header("Location: ./index.php?act=dangnhap") ;
            }else{
                $error = "Tài khoản hoặc Email không chính xác " ; 
            }
        }
        ?>
        <h3>Quên mật khẩu </h3>
        <input type="text" name="taikhoan" placeholder="Tài khoản...">
        <br>
        <input type="email" name = "email" placeholder="Email ...">
        <br>
        <p id="error"><?= isset($error) ? $error : "" ?></p>
        <input class="nut-dangnhap " name="submit" type="submit" value="Lấy lại mật khẩu">
        <br>
    </form>
</div>
<?php

    
        ?>