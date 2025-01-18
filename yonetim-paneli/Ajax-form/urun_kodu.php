<?php
 include "../../islemler/baglan.php";
 
if(!empty($_POST["urun_kodu"])) { 
   $_POST["urun_kodu"];
$data1=$db->prepare("SELECT * FROM urunler WHERE urun_kodu=?");  
$data1->execute(array( $_POST["urun_kodu"]));
 $say=$data1->rowCount();

  
  if($say>0) {
      echo   "<span class='status-not-available'>Bu Ürün Kodunu Kullanamazsınız!</span>";  
  } 
  else{
      echo   "<span class='status-available'>Ürün Kodu Kullanılabilir!</span>";
      }
}
?> 
 