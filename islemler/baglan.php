<?php 

$dbname ="artiposm_smokin"; // veritabanı ismi
$dbuser ="artiposm_yazilim"; // veritabanı kullanıcı adı
$dbpassword ="TWD&2jJ@yQIG"; // veritabanı kullanıcı şifresi
$siteyolu ="https://smokin.artiposmenu.com/"; //sitenin ana dizindeki urlsini yapıştır
 	
// veri tabanı bağlantısı
try{ 

	  $db= new PDO("mysql:host=localhost;dbname=".$dbname.";charset=utf8", $dbuser , $dbpassword);
 //echo "veri tabanına bağlandık"; 
} 
catch (PDOException $e) {

 echo $e->getMessage();  // bağlanmazsa hata mesajı ver
}

 
?>

 