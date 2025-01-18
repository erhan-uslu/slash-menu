<?php $dosya = fopen ("baglan.php" , 'w'); //dosya oluşturma işlemi
$yaz='<?php 

$dbname ="'.$_POST['db_name'].'"; // veritabanı ismi
$dbuser ="'.$_POST['db_user'].'"; // veritabanı kullanıcı adı
$dbpassword ="'.$_POST['db_pass'].'"; // veritabanı kullanıcı şifresi
$siteyolu ="'.$_POST['url'].'"; //sitenin ana dizindeki urlsini yapıştır
 	
// veri tabanı bağlantısı
try{ 

	  $db= new PDO("mysql:host=localhost;dbname=".$dbname.";charset=utf8", $dbuser , $dbpassword);
 //echo "veri tabanına bağlandık"; 
} 
catch (PDOException $e) {

 echo $e->getMessage();  // bağlanmazsa hata mesajı ver
}

 
?>

 '; //dosya içine ne yazmak istiyorsanız buraya yazın. $değer
fwrite ( $dosya , $yaz ) ;
fclose ($dosya); ?>