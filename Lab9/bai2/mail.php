<?php
          require "../PHPMailer-master/src/PHPMailer.php";  
          require "../PHPMailer-master/src/SMTP.php"; 
          require '../PHPMailer-master/src/Exception.php'; 
if (isset($_POST)) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
    try {
      //  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $nguoigui = 'lequanganhtuan.2003@gmail.com';
        $matkhau = ''; // đã tạo ở bước 3
        $tennguoigui = 'AnhTuan';
        $mail->Username = $nguoigui; // SMTP username
        $mail->Password = $matkhau;   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom($nguoigui, $tennguoigui);
        $to = $_POST['email'];
        $to_name = "alo 123";
		$tieude = $_POST['tieude'];

        $mail->addAddress($to, $to_name); //mail và tên người nhận  
		$mail->addAddress("tuanlqa.21it@vku.udn.vn","LE QUANG ANH TUAN");
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $tieude;
		$noidungthu = ' <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><b>Hello ' . $to_name . '</b></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">' . $_POST['content'] . '</p>
                </div>
                </div> ';
        $mail->Body =  $noidungthu;	
			if(isset($_FILES['file']['name'])) {
                $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
                $mail->addAttachment($uploadfile, $_FILES['file']['name']);
        } 
    $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
    if($mail->send())
       {
        header("Location:index.php");
       }
} catch (Exception $e) {
    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}	
}
?>