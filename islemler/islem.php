<?php ob_start();

session_start(); 

include 'baglan.php';

 
$datacon2=$db->prepare("SELECT * FROM firma_bilgileri  where firma_id=?");  

$datacon2->execute(array( '1' ));

$firmacek=$datacon2 -> fetch(PDO:: FETCH_ASSOC); 




$temacon2=$db->prepare("SELECT * FROM temalar  where id=?");  

$temacon2->execute(array( $firmacek['tema'] ));

$temacek=$temacon2 -> fetch(PDO:: FETCH_ASSOC); 





if(isset($_POST["login"]))   { 

      

           if(empty($_POST["username"]) || empty($_POST["password"]))  

           {  

                  header("location:../login.php?durum=error");  

           }  

           else  

           {  

                $query = "SELECT * FROM bayiler WHERE mail = :username AND sifre = :password AND durum='1'";  

                $statement = $db->prepare($query);  

                $statement->execute(  

                     array(  

                          'username'     =>     $_POST["username"],  

                          'password'     =>     $_POST["password"]  

                     )  

                );  

                $count = $statement->rowCount();  

                if($count > 0)  

                {  

                     $_SESSION["kullanici_ad"] = $_POST["username"];  
                      header("location:../");  

                  

                }  

                else  

                {  

                 header("location:../giris-yap.php?durum=no-password");  

                }  

           }  

      }  

if(isset($_POST["bayi-update"])){



    $bayiupdate=$db->prepare("UPDATE bayiler SET yetkili_ad=?,  adres=?, mail=?, telefon=?, sehir_id=?,

       bolge_id=? WHERE id=?");



                    $update2=$bayiupdate->execute(array(

                         $_POST["yetkili_ad"],

                          $_POST["adres"], 

                           $_POST["mail"],

                           $_POST["telefon"], 

                          $_POST["sehir_id"],

                          $_POST["bolge_id"], $_GET["id"] ));





        

  if ($update2) {



    header("Location:../hesabim/?durum=okey");



  } else {  



    header("Location:../hesabim.php?durum=error");

  }





 }





if(isset($_POST["bayi-sifre"])){



    $bayiupdate1=$db->prepare("UPDATE bayiler SET sifre=? WHERE id=?");



                    $update=$bayiupdate1->execute(array(

                          $_POST["parola"], $_GET["id"] ));

  if ($update) {



    header("Location:../hesabim/?durum=okey");



  } else {  



    header("Location:../sifremi-yenile/?durum=error");

  }





 }



  if(isset($_POST["sepet-ekle-quick-wiew"])){



 echo '<br>' .   $id     = $_GET["urun_id"];

 echo '<br>' .   $name   = $_GET["name"];

 echo '<br>' .   $bayi   = $_GET['bayi_id'];

 echo '<br>' .   $adet   = $_POST['adet'];

 echo '<br>' .   $stok   = $_GET['stok'];







    $datacon11=$db->prepare("SELECT * FROM sepet  where urun_id=? and bayi_id=?");  



     $datacon11->execute(array(  $id, $bayi ));

  

  $count = $datacon11->rowCount(); 



   $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC);





if ($count >0) {

 

echo  $toplamadet = $adet + $datacek11['urun_adet']; 



if ( $toplamadet > $stok) {

 

      header("Location:../quick-view.php?id=$id&-$name&durum=no-stok");



} 



else {



$bayiupdate2=$db->prepare("UPDATE `sepet` SET `urun_adet`=? WHERE  id=?");



                    $update2=$bayiupdate2->execute(array(

                      

                            $toplamadet, $datacek11['id']));



                   

  if ($update2) {



    header("Location:../quick-view.php?id=$id&-$name&durum=okey");



  } else {  



  header("Location:../quick-view.php?id=$id&-$name&durum=error");

  }





}



}





else{   

 $bayiupdate1=$db->prepare("INSERT INTO `sepet` (`id`, `urun_id`, `bayi_id`, `urun_adet`, `tarih`, `numara`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP, '0')");



                    $update=$bayiupdate1->execute(array(

                     

                       $id,

                       $_GET['bayi_id'],

                       $_POST["adet"]



                     ));

  if ($update) {



  if ($update) {



    header("Location:../quick-view.php?id=$id&-$name&durum=okey");



  } 

  else {  



  header("Location:../quick-view.php?id=$id&-$name&durum=error");

  }







                  }





}

 }          

  if(isset($_POST["sepet-ekle"])){



 echo '<br> urun_id ' .   $id= $_GET["urun_id"];

 echo '<br> name ' .   $name= $_GET["name"];

 
 echo '<br> adet ' .   $adet = $_POST['adet'];

  

 

$varyantlar = ',' ;


 
  $varyantcon=$db->prepare("SELECT * FROM urun_varyantlar where urun_id=? and ust_id=0  ");

                                  $varyantcon->execute(array( $id   ));
                                         

                                 echo '<br> varyant sayısı ' . $varyantcount = $varyantcon->rowCount();       

          if($varyantcount>0){

 while ($varyantcek=$varyantcon -> fetch(PDO:: FETCH_ASSOC)){  

 echo '<br> alt varyant id' . $varyantid =   $_POST['varyant'.$varyantcek['id']]; 
 
  $alt_varyantcon=$db->prepare("SELECT * FROM urun_varyantlar where id=?   ");

                 $alt_varyantcon->execute(array(  $varyantid  ));

                      while ($alt_varyantcek=$alt_varyantcon -> fetch(PDO:: FETCH_ASSOC)){ 

                       echo  '<br> varyant stoğu' . $alt_varyantcek['stok'] ;

                  

                    $varyantlar .= $varyantid    . ',' ;
                  

                      
                   }   }  // varyantların yeterli stoğunun olup olmadığını kontrol ettik 



       echo '<br>' .  $varyantlar ;

          }   
 
 

 
if( $_GET['masa_id_no'] == 'package'){
  $masa_id_no =   $_POST['kullanici_user_id'];

} 

else {
  $masa_id_no =   $_GET['masa_id_no'];

}
 


 $bayiupdate1=$db->prepare("INSERT INTO `sepet` (`id`, `urun_id`, `masa_id`, `urun_adet`, `tarih`, `varyantlar`, `durum`, `tahmini_hazirlama`, `bildirim`)
  VALUES (NULL, ?, ?, ?, current_timestamp(), ?, '1', ?, '0' )");



                    $update=$bayiupdate1->execute(array(

                     

                       $id,

                     $masa_id_no ,

                        $adet ,

$varyantlar , 
'20 - 25'

                     ));

  if ($update) {



 header("Location:../theme/".$temacek['tema_adi']."/$name-$id/?durum=sepet_eklendi&masa_id_no=" . $_GET['masa_id_no'] );
  exit();


  } else {  

 echo 'son hata' ;
  header("Location:../theme/".$temacek['tema_adi']."/$name-$id/?durum=error&masa_id_no=" . $_GET['masa_id_no'] );
  exit();
  }



/* 









   $datacon11=$db->prepare("SELECT * FROM sepet  where urun_id=? and bayi_id=?");  
 


     $datacon11->execute(array(  $id, $bayi ));

  

  $count = $datacon11->rowCount(); 



   $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC);





if ($count >0) {

 

echo  $toplamadet = $adet + $datacek11['urun_adet']; 



if ( $toplamadet > $stok) {

 

        header("Location:../$name-$id/?durum=no-stok");



} 



else {



$bayiupdate2=$db->prepare("UPDATE `sepet` SET `urun_adet`=? WHERE  id=?");



                    $update2=$bayiupdate2->execute(array(     $toplamadet, $datacek11['id']));



                   

  if ($update2) {



 header("Location:../$name-$id/?durum=okey");



  } else {  



 header("Location:../$name-$id/?durum=error");

  }





}



}





else{ 









                  }






*/







 }          





 



if (isset($_GET['deletesepet'])) {

  

  //Tablo güncelleme işlemi kodları...

  $query = $db->prepare("DELETE FROM sepet WHERE id=?");

$delete = $query->execute(array(

   $_GET['deletesepet']

));





  if ($delete) {



    header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=okey&masa_id_no=".$_GET['masa_id_no']);



  } else {  



    header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=error&masa_id_no=".$_GET['masa_id_no']);

  }

  

}





if (isset($_GET['adetazalt'])) {



$id= $_GET["urun_id"];

$bayi = $_GET['adetazalt'];

$stok =  $_GET['stok'];



    $datacon11=$db->prepare("SELECT * FROM sepet  where urun_id=? and bayi_id=?");  



     $datacon11->execute(array(  $id, $bayi ));



   $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC);



 

echo  $toplamadet =  $datacek11['urun_adet'] - 1 ; 



if ( $toplamadet > $stok) {

 

     header("Location:../theme/".$temacek['tema_adi']."/sepet.php?durum=no-stok");



} 



else {



$bayiupdate2=$db->prepare("UPDATE `sepet` SET `urun_adet`=? WHERE  id=?");



                    $update2=$bayiupdate2->execute(array(

                      

                            $toplamadet, $datacek11['id']));





                   

  if ($update2) {



    header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=okey");



  } else {  



   header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=error");

  }





}

 }





 if (isset($_GET['adetcogalt'])) {



$id= $_GET["urun_id"];

$bayi = $_GET['adetcogalt'];

$stok =  $_GET['stok'];



    $datacon11=$db->prepare("SELECT * FROM sepet  where urun_id=? and bayi_id=?");  



     $datacon11->execute(array(  $id, $bayi ));



   $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC);



 

echo  $toplamadet =  $datacek11['urun_adet'] + 1 ; 



if ( $toplamadet > $stok) {

 

     header("Location:../theme/".$temacek['tema_adi']."/sepet.php?durum=no-stok");



} 



else {



$bayiupdate2=$db->prepare("UPDATE `sepet` SET `urun_adet`=? WHERE  id=?");



                    $update2=$bayiupdate2->execute(array(

                      

                            $toplamadet, $datacek11['id']));



                   

  if ($update2) {



    header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=okey");



  } else {  



   header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=error");

  }





}

 } 



  if (isset($_POST['alısveris'])) {









$bayi = $_GET["bayi_id"];





$sepetcek=$db->prepare("SELECT * FROM sepet where bayi_id=? ");  



    $sepetcek->execute(array( $bayi ));





             while ( $sepetc=$sepetcek -> fetch(PDO:: FETCH_ASSOC)){ 

                

               $urunsor=$db->prepare("SELECT * FROM urunler where id=?");  



                        $urunsor->execute(array(  $sepetc["urun_id"] ));



                        while ( $uruncek=$urunsor -> fetch(PDO:: FETCH_ASSOC)){



           $geneltoplam +=     $uruncek["urun_fiyat"] * $sepetc["urun_adet"];}





            



     

         

       }

      echo   $geneltoplam;

       echo '<br>' .    $kdv = $geneltoplam /'100' * '8';



    echo '<br>' .     $kdvlifiyat  = $geneltoplam  + $kdv ;



                    if(  $kdvlifiyat > 150  ) { 

                            $kargo = 0;

                        }

                         else { $kargo = '8.00'; }

                       echo '<br>' .   $kargo;    

          

         echo '<br>' .    $indirimli = $kdvlifiyat /'100' * '5';



                  

              $indirim =  number_format( $indirimli, 2, '.', '' );

        

         echo '<br>' .     $kargolufiyat = ($kdvlifiyat - $indirim) + $kargo ; 





      



  $kaydet=$db->prepare("INSERT INTO `siparis_islemler` (`id`, `bayi_id`, `tarih`, `siparis_toplam`, `durum`, `takip_no`) 

  	     VALUES (NULL, ?, CURRENT_TIMESTAMP, ?, '8', '')");

  $insert=$kaydet->execute(array(

  

  $bayi,    $kargolufiyat ));



  if ($insert) {

  

echo $siparis_id = $db->lastInsertId(); 



$sepetsor=$db->prepare("SELECT * FROM sepet where bayi_id=:id");

		$sepetsor->execute(array(

			'id' => $bayi));

			



while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {



			$urun_id=$sepetcek['urun_id']; 

			$urun_adet=$sepetcek['urun_adet'];



			$urunsor=$db->prepare("SELECT * FROM urunler where id=:id");

			$urunsor->execute(array(

				'id' => $urun_id

				));



			$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

			

			echo $urun_fiyat=$uruncek['urun_fiyat'] * $sepetcek['urun_adet'] ;



$kaydet=$db->prepare("INSERT INTO `siparisler` (`id`, `bayi_id`, `siparis_id`, `siparis_tarihi`, `urun_id`, `urun_adet`, `tutar`, `durum`, `takip_no`, `birim_fiyat`, `siparis_notu`) 

	                  VALUES (NULL, ?, ?, CURRENT_TIMESTAMP, ?, ?, ?, '8', '', ?, ?)");

			$insert=$kaydet->execute(array(

				

				$bayi, $siparis_id, $urun_id, $urun_adet,  $urun_fiyat, $uruncek['urun_fiyat'], $sepetcek['numara']



				));





		}



		if ($insert) { 







	$sil=$db->prepare("DELETE  from sepet where bayi_id=?");

			$kontrol=$sil->execute(array(

				$_GET['bayi_id']

				));



			Header("Location:../theme/".$temacek['tema_adi']."/siparisler.php?durum=okey");

			exit;



}

   }



else { 

 header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=error");



 } 

}



if(isset($_POST["register"])){



$kod = rand(20000000,50000000000);



    $bayiupdate=$db->prepare("INSERT INTO `bayiler` (`id`, `bayi_ad`, `fatura_ad`, `firma_turu`, `yetkili_ad`, `durum`, `adres`, `mail`, `telefon`, `sehir_id`, `sifre`, `kod`, `bolge_id`) VALUES (NULL, '', ?, '', ?, ?, '1', ?, ?, ?, ?, ?, ?)");



                    $update2=$bayiupdate->execute(array(

                       $_POST["tc"],    $_POST["yetkili"],  $_POST["adres"], $_POST["mail"],

                          $_POST["telefon"], $_POST["sehir"], $_POST["password"], $kod,  $_POST["ilce"]  ));





        

  if ($update2) {

 

            $_SESSION["kullanici_ad"] = $_POST["mail"];  

                     header("location:../theme/".$temacek['tema_adi']."/");  

 

} 



else {

    header("Location:../theme/".$temacek['tema_adi']."/uye-ol/?durum=uye-olundu");

}



  }  

  

 if(isset($_POST["sifremiunuttum"])){



    $bayiupdate=$db->prepare("SELECT * FROM bayiler where mail=?");



                    $update2=$bayiupdate->execute(array(

                    $_POST["mail"]

                        ));

    



          $count = $bayiupdate->rowCount();  

                if($count > 0) {

              include '../fonksiyon.php';

              $kod = rand(20000000000000000,5000000000000000000000000);

               $kod2 = rand(20000000000000000,5000000000000000000000000);

             $datacek1=$bayiupdate -> fetch(PDO:: FETCH_ASSOC);

$mail_adresiniz = "yazilim@yahyaliyoresel.com";

$mail_sifreniz  = "147258Ab";

$gidecek_adres  =  $_POST["mail"];

$domain_adresi  = "yahyaliyoresel.com";

          require("class.php");

$mail = new PHPMail();

$mail->Host       = "smtp.".$domain_adresi;

$mail->SMTPAuth   = true;

$mail->Username   = $mail_adresiniz;

$mail->Password   = $mail_sifreniz;

$mail->IsSMTP();

$mail->AddAddress($gidecek_adres);

$mail->From       = $mail_adresiniz;

$mail->FromName   = $mail_adresiniz;

$mail->Subject    = 'Yahyalı Yöresel Şifemi Unuttum?';

$mail->Body       = "Aşşağıdaki linke tıklayarak şifreni sıfırlayabilirsin \n" . 

                    'http://yahyaliyoresel.com./sifreyenile.php?i=' .  $datacek1['id'] .'&k='. $datacek1['kod']. '&name=' . seo($datacek1['bayi_ad'] . '-'. $kod . $kod2 .  '-tr');





$mail->AltBody    = "";

if(!$mail->Send()){

  header("Location:../sifremi-unuttum.php?durum=error");

} else {

  header("Location:../giris-yap.php?durum=resetokey");

}

 } else {  



    header("Location:../sifremi-unuttum.php?durum=error");

  }





 }



if(isset($_POST["newsifre"])){





   $bayiupdate=$db->prepare("SELECT * FROM bayiler where kod=? and id=?");



                    $update2=$bayiupdate->execute(array(

                    $_GET["k"], $_GET["i"]

                        ));

    



          $count = $bayiupdate->rowCount();  

                if($count > 0) {

 

    $kod = rand(1000000000000000000000000000000000000,5000000000000000000000000000000000000);

    $bayiupdate1=$db->prepare("UPDATE bayiler SET sifre=?,  kod=? WHERE id=?");



                    $update=$bayiupdate1->execute(array(

                          $_POST["pass1"], $kod, $_GET["i"] ));

  if ($update) {



    header("Location:../giris-yap.php?durum=new-sifre-okey");



  } else {  



    header("Location:../sifremi-unuttum.php?durum=error");

  }

}



 }



 if (isset($_GET['kartlaodeme'])) {









$bayi = $_GET["kartlaodeme"];





$sepetcek=$db->prepare("SELECT * FROM sepet where bayi_id=? ");  



    $sepetcek->execute(array( $bayi ));





             while ( $sepetc=$sepetcek -> fetch(PDO:: FETCH_ASSOC)){ 

                

               $urunsor=$db->prepare("SELECT * FROM urunler where id=?");  



                        $urunsor->execute(array(  $sepetc["urun_id"] ));



                        while ( $uruncek=$urunsor -> fetch(PDO:: FETCH_ASSOC)){



           $geneltoplam +=     $uruncek["urun_fiyat"] * $sepetc["urun_adet"];}





            



     

         

       }

      echo   $geneltoplam;

       echo '<br>' .    $kdv = $geneltoplam /'100' * '8';



    echo '<br>' .     $kdvlifiyat  = $geneltoplam  + $kdv ;



                    if(  $kdvlifiyat > 150  ) { 

                            $kargo = 0;

                        }

                         else { $kargo = '8.00'; }

                       echo '<br>' .   $kargo;    

          

         echo '<br>' .    $indirimli = $kdvlifiyat /'100' * '5';



                  

              $indirim =  number_format( $indirimli, 2, '.', '' );

        

         echo '<br>' .     $kargolufiyat = ($kdvlifiyat - $indirim) + $kargo ; 





      



  $kaydet=$db->prepare("INSERT INTO `siparis_islemler` (`id`, `bayi_id`, `tarih`, `siparis_toplam`, `durum`, `takip_no`) 

         VALUES (NULL, ?, CURRENT_TIMESTAMP, ?, '9', '')");

  $insert=$kaydet->execute(array(

  

  $bayi,    $kargolufiyat ));



  if ($insert) {

  

echo $siparis_id = $db->lastInsertId(); 



$sepetsor=$db->prepare("SELECT * FROM sepet where bayi_id=:id");

    $sepetsor->execute(array(

      'id' => $bayi));

      



while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {



      $urun_id=$sepetcek['urun_id']; 

      $urun_adet=$sepetcek['urun_adet'];



      $urunsor=$db->prepare("SELECT * FROM urunler where id=:id");

      $urunsor->execute(array(

        'id' => $urun_id

        ));



      $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

      

      echo $urun_fiyat=$uruncek['urun_fiyat'] * $sepetcek['urun_adet'] ;



$kaydet=$db->prepare("INSERT INTO `siparisler` (`id`, `bayi_id`, `siparis_id`, `siparis_tarihi`, `urun_id`, `urun_adet`, `tutar`, `durum`, `takip_no`, `birim_fiyat`, `siparis_notu`) 

                    VALUES (NULL, ?, ?, CURRENT_TIMESTAMP, ?, ?, ?, '9', '', ?, ?)");

      $insert=$kaydet->execute(array(

        

        $bayi, $siparis_id, $urun_id, $urun_adet,  $urun_fiyat, $uruncek['urun_fiyat'], $sepetcek['numara']



        ));





    }



    if ($insert) { 







  $sil=$db->prepare("DELETE  from sepet where bayi_id=?");

      $kontrol=$sil->execute(array(

        $_GET['kartlaodeme']

        ));



      Header("Location:../siparisler.php?durum=okey");

      exit;



}

   }



else { 

 header("Location:../sepetim.php?durum=error");



 } 

}
 if (isset($_GET['siparisi_olustur'])) { 


$masa_id_no = $_GET['masa_id_no'];

 
 $datacon12=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1");  
             $datacon12->execute(array(  $_GET['masa_id_no'] ));
                 



                      while ( $datacek12=$datacon12 -> fetch(PDO:: FETCH_ASSOC)){    


  $sil=$db->prepare("UPDATE sepet set durum=2, bildirim=1 where id=?");

      $kontrol=$sil->execute(array(  $datacek12['id'] ));  }

       

        

 header("Location:../theme/".$temacek['tema_adi']."/sepetim.php?durum=okey&masa_id_no=".  $_GET['masa_id_no']);

exit();
                      



  }

 

?>



 