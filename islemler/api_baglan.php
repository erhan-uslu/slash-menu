<?php 
 $dbname1 ="artiposm_yonetim"; // veritabanı ismi
$dbuser1 ="artiposm_yazilim"; // veritabanı kullanıcı adı
$dbpassword1 ="TWD&2jJ@yQIG"; // veritabanı kullanıcı şifresi
 	 	
 	
 	
// veri taban bağlantısı
try{ 

	  $db_api= new PDO("mysql:host=localhost;dbname=".$dbname1.";charset=utf8", $dbuser1 , $dbpassword1);
 //echo "veri tabanına bağlandık"; 
} 
catch (PDOException $e) {

 echo $e->getMessage();  // bağlanmazsa hata mesajı ver
}
?>