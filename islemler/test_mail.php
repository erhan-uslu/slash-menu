<?php
require("class.phpmailer.php");
$mail_adresiniz = "destek@letao.com.tr";
$mail_sifreniz  = "147258Ab";
$gidecek_adres  = 'wesley.contra@gmail.com';
$domain_adresi  = "letao.com.tr";
          require("class.php");
     $mail = new PHPMail();
     $mail->IsHTML(true);
$mail->Host       = "smtp.".$domain_adresi;
$mail->SMTPAuth   = true;
$mail->Username   = $mail_adresiniz;
$mail->Password   = $mail_sifreniz;
$mail->IsSMTP();
$mail->AddAddress($gidecek_adres);
$mail->From       = $mail_adresiniz;
$mail->FromName   = $mail_adresiniz;
$mail->Subject    = 'Test';
 

$mail->Body       =   "?> <iframe   width='450px' height='600px' src='https://letao.com.tr/islemler/test.php' scrolling='no' frameborder='0'></iframe> <?php" . "test11"; 
if(!$mail->Send()){
	echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
} else {
	echo "Email Gonderildi";
}
?>
 
