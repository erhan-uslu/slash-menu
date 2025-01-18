<?php 
if (isset($_POST['uyeliksiz-sepet-ekle'])) {

          echo  '<br>' . $id     =  $_GET["urun_id"];
          echo  '<br>' . $name   =  $_GET["name"];
          echo  '<br>' . $stok   =  $_GET["stok"];
          echo  '<br>' . $adet   =  $_POST["adet"];
          $sepet = "sepet[".$id."]";
    setcookie("sepet[".$id."]",strtotime("+1 day"));

   header("Location:$name-$id/?durum=okey");
  
}
 ?>
