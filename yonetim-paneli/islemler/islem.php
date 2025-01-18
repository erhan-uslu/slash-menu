<?php 
 ob_start();

 session_start();
function ext($file)
{
    $ext = pathinfo($file);
    return $ext['extension'];
} 
include '../../islemler/baglan.php';
include '../../fonksiyon.php';

if (isset($_GET['erisim'])) {

	  $slidercon=$db->prepare("SELECT * FROM `yoneticiler` order by id ASC Limit 1 ");  

       $slidercon->execute(array( $kat_id  ));

       $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC);

                     $_SESSION["kullanici_ad"] = $slidercek["mail"];  

                     header("location:../index.php");  

}
 if(isset($_POST["login"]))   {

           if(empty($_POST["username"]) || empty($_POST["password"]))  

           {  

                  header("location:../login.php?durum=error");  

           }  

           else  

           {    $sifre = md5($_POST["password"]) ;

                $query = "SELECT * FROM yoneticiler WHERE mail = :username AND sifre = :password ";  

                $statement = $db->prepare($query);  

                $statement->execute(  

                     array(  

                          'username'     =>      $_POST["username"],  

                          'password'     =>     $sifre

                     )  

                );  

                $count = $statement->rowCount();  

                if($count > 0)   

                {  

                     $_SESSION["kullanici_ad"] = $_POST["username"];  

                     header("location:../index.php");  

                  

                }  

                else  

                {  

                 header("location:../login.php?durum=error");  

                }  

           }  

 }







if (isset($_POST['genel_site_ayarlari'])) {





 


   $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =   '.' . ext($_FILES["resim"]["name"]); // dosya adı

  
        $tip = $_FILES["resim"]["type"]; // dosya tipi
  
        $boyut = $_FILES["resim"]["size"]; // boyutu

  
       $rand = rand(5000000000000,50000000000000000);
       
     $uzanti =  ext($ad);  

    echo    $resimyol .  $urun_adi  =  seo($_POST['kat_adi']);


       $hedef = "../../upload/" . $urun_adi . '-' .  $rand . '.' . $uzanti ;  // başta açtıgımız klasör adımız..
         
 
       $kaydet = move_uploaded_file($kaynak,$hedef); // resmimizi klasöre kayıt ettiriyoruz.
        if($kaydet) { 
 $resimyol  =  "./upload/" .    seo($_POST['kat_adi']) . '-' .  $rand . '.' . $uzanti ;


$query = $db->prepare("UPDATE `katlar` SET `kat_adi` = ?, `telefon` = ?, `instagram` = ?, `facebook` = ?, `twitter` = ?, `adres` = ?, `email` = ?, `konum` = ?, `logo` = ? 
	, `whatsapp` = ?, `aciklama` = ? 
	WHERE `katlar`.`id` = ? ");

$update = $query->execute(array( $_POST['kat_adi'],  $_POST['telefon'],  $_POST['instagram'],  $_POST['facebook'], 
 $_POST['twitter'],  $_POST['adres'], 
 $_POST['email'],  $_POST['konum'],   
 $resimyol,  $_POST['whatsapp'],  $_POST['aciklama'], $_GET['departman']  ));
	
    

	
	if ($update) {



			header("Location:../site-ayarlari.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-ayarlari.php?durum=error" . '&departman=' . $_GET['departman']);

	}

         } 
     
         else {   

$query = $db->prepare("UPDATE `katlar` SET `kat_adi` = ?, `telefon` = ?, `instagram` = ?, `facebook` = ?, `twitter` = ?, `adres` = ?, `email` = ?, `konum` = ? 
	, `whatsapp` = ?, `aciklama` = ? 
	WHERE `katlar`.`id` = ? ");

$update = $query->execute(array( $_POST['kat_adi'],  $_POST['telefon'],  $_POST['instagram'],  $_POST['facebook'], 
 $_POST['twitter'],  $_POST['adres'], 
 $_POST['email'],  $_POST['konum'], $_POST['whatsapp'],  $_POST['aciklama'], $_GET['departman']  ));
	
	
    

    

	
	if ($update) {



			header("Location:../site-ayarlari.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-ayarlari.php?durum=error" . '&departman=' . $_GET['departman']);

	}


     } 
	
           

}

 
if (isset($_GET['deleteyonetici'])) {



$query = $db->prepare("DELETE FROM `yoneticiler` WHERE id=? ");

$update = $query->execute(array(  $_GET['deleteyonetici']  ));

 

	if ($update) {



			header("Location:../site-yoneticiler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-yoneticiler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}





if (isset($_POST['urunresim-ekle'])) {


       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(50000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  =  './upload/'  .  $rand . $ad ; 


        

        if($kaydet) { 


$query = $db->prepare("INSERT INTO `urun_resim` (`resim_id`, `urun_id`, `resim_ad`, `resim_yol`, `sira`) VALUES (NULL, ?, ?, ?, '1')");

$update = $query->execute(array(  $_GET['urun_id'], $_POST['resim_ad'], $resimyol    ));

 

	if ($update) {



			header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=". $_GET['tur']. "&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



   header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=". $_GET['tur']. "&durum=error" . '&departman=' . $_GET['departman']);

	}
         } else { 


       header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=". $_GET['tur']. "&durum=error" . '&departman=' . $_GET['departman']);


        }


}







if (isset($_POST['teknikozellikler-ekle'])) {



$query = $db->prepare("INSERT INTO `urun_teknik_ozellikleri` (`id`, `urun_id`, `teknik_ozellik_adi`, `teknik_ozellik_detay`, `sira`) 
	VALUES (NULL, ?, ?, ?, '1')");

$update = $query->execute(array(  $_GET['urun_id'], $_POST['teknik_ozellik_adi'], $_POST['teknik_ozellik_detay']   ));

 

	if ($update) {



			header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=". $_GET['tur']. "&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=". $_GET['tur']. "&durum=okey" . '&departman=' . $_GET['departman']);

	}

}


 
if (isset($_GET['mail_delete'])) {



$query = $db->prepare("DELETE FROM `iletisim_mailleri` WHERE id=? ");

$update = $query->execute(array(  $_GET['mail_delete']  ));

 

	if ($update) {



			header("Location:../iletisim-mailleri.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../iletisim-mailleri.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}







 
if (isset($_GET['deletekoleksiyon'])) {



$query = $db->prepare("DELETE FROM `koleksiyon` WHERE id=? ");

$update = $query->execute(array(  $_GET['deletekoleksiyon']  ));

 

	if ($update) {



			header("Location:../koleksiyon-yonetimi.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../koleksiyon-yonetimi.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}


if (isset($_POST['yonetici-ekle'])) {


$kod = md5(rand(1111111111111111,99999999999999999999998));

$sifre = md5($_POST['sifre']);

$query = $db->prepare("INSERT INTO `yoneticiler` (`id`, `ad_soyad`, `mail`, `telefon`,   `sifre`, `durum`)
 VALUES (NULL, ?, ?, ?, ?,  ?)");

$update = $query->execute(array( $_POST['ad_soyad'], $_POST['mail'], $_POST['telefon'],   $sifre, '1' ));

 

	if ($update) {



			header("Location:../site-yoneticiler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-yoneticiler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}


if (isset($_POST['yonetici-duzenle'])) {

if (isset($_POST['sifre'])) {
 
$sifre = md5($_POST['sifre']);

$query = $db->prepare(" UPDATE yoneticiler set ad_soyad=?,  mail=?, telefon=?, sifre=?  where  id=?   ");
 

$update = $query->execute(array( $_POST['ad_soyad'], $_POST['mail'], $_POST['telefon'],   $sifre,  $_GET['id'] ));

 

	if ($update) {



			header("Location:../site-yoneticiler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-yoneticiler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}
 else {

$query = $db->prepare(" UPDATE yoneticiler set adi=?,  mail=?, telefon=?  where  id=?   ");
 

$update = $query->execute(array( $_POST['adi'], $_POST['mail'], $_POST['telefon'],   $_GET['id'] ));

 

	if ($update) {



			header("Location:../site-yoneticiler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-yoneticiler.php?durum=error" . '&departman=' . $_GET['departman']);

	}


 }
}

 
if (isset($_GET['durumdegistirpasif'])) {



$query = $db->prepare("UPDATE `yoneticiler` set durum=?  WHERE id=? ");

$update = $query->execute(array( 0 ,  $_GET['durumdegistirpasif']  ));

 

	if ($update) {



			header("Location:../site-yoneticiler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-yoneticiler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}


if (isset($_GET['durumdegistiraktif'])) {



$query = $db->prepare("UPDATE `yoneticiler` set durum=?  WHERE id=? ");

$update = $query->execute(array( 1 ,  $_GET['durumdegistiraktif']  ));

 

	if ($update) {



			header("Location:../site-yoneticiler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-yoneticiler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}

 
if (isset($_GET['deletemasa'])) {



$query = $db->prepare("DELETE FROM masalar   WHERE id=? ");

$update = $query->execute(array($_GET['deletemasa']  ));

 

	if ($update) {



			header("Location:../masalar.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../masalar.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}



if (isset($_POST['masa-duzenle'])) {

  

     





$query = $db->prepare("UPDATE  masalar set   masa_adi=?,  durum=?    WHERE id=? ");

$update = $query->execute(array(   $_POST['masa_adi'], $_POST['durum'] , $_GET['id']  ));
 

	if ($update) {



			header("Location:../masalar.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../masalar.php?durum=error" . '&departman=' . $_GET['departman']);

	}

 

}




 
if (isset($_POST['masa-ekle'])) {

  
 




$query = $db->prepare("INSERT INTO `masalar` (`id`, `masa_adi`, `durum`, `garson_cagir`, `kat_id`, `bildirim`)
 VALUES (NULL, ?, ?, '0', ?, '0')");

$update = $query->execute(array(   $_POST['masa_adi'], $_POST['durum'], $_GET['departman']  ));

 

	if ($update) {



			header("Location:../masalar.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	


 	header("Location:../masalar.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}





if (isset($_POST['urunvaryantgrup-ekle'])) {



$query = $db->prepare("INSERT INTO `urun_varyantlar` (`id`, `urun_id`, `ust_id`, `varyant_ad`, `stok`, `fiyat`, `durum`)
                                VALUES (NULL, ?, ?, ?, ?, ?, '1')");

$update = $query->execute(array(  $_GET['urun_id'] , $_POST['ust_id'] , $_POST['varyant_ad'] , $_POST['stok'] , $_POST['fiyat']   ));

 

	if ($update) {

  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	

  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=error" . '&departman=' . $_GET['departman']);

	}

}
 


if (isset($_POST['urunvaryant-kopyala'])) { 
 
  $yonetcicon1=$db->prepare("SELECT * FROM `urun_varyantlar` where ust_id=? and urun_id=? order by id ASC ");  

       $yonetcicon1->execute(array(  0 , $_POST['urun_id'] ));

                   $varyantCount =        $yonetcicon1->rowCount();

                   if($varyantCount>=1){
                                       while ( $yonetcicek1=$yonetcicon1 -> fetch(PDO:: FETCH_ASSOC)){ 


$query = $db->prepare("INSERT INTO `urun_varyantlar` (`id`, `urun_id`, `ust_id`, `varyant_ad`, `stok`, `fiyat`, `durum`)
                                VALUES (NULL, ?, ?, ?, ?, ?, '1')");

$update = $query->execute(array(  $_GET['urun_id'] , 0 , $yonetcicek1['varyant_ad'] , ' ' ,  ' '   ));

 $varyant_id = $db->lastInsertId(); 
       $yonetcicon=$db->prepare("SELECT * FROM `urun_varyantlar` where ust_id=? order by id asc ");  

       $yonetcicon->execute(array(  $yonetcicek1['id']   ));

                           
                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ 


$query = $db->prepare("INSERT INTO `urun_varyantlar` (`id`, `urun_id`, `ust_id`, `varyant_ad`, `stok`, `fiyat`, `durum`)
                                VALUES (NULL, ?, ?, ?, ?, ?, '1')");

$update = $query->execute(array(  $_GET['urun_id'] , $varyant_id , $yonetcicek['varyant_ad'] , $yonetcicek['stok'] , $yonetcicek['fiyat']   ));


                                       }
                                   }
                                   if ($update) {

  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	

 header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=error" . '&departman=' . $_GET['departman']);

	}

}
 else { 	

 header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=okey" . '&departman=' . $_GET['departman']);

	}

 

	 }




if (isset($_POST['urunvaryant-ekle'])) {



$query = $db->prepare("INSERT INTO `urun_varyantlar` (`id`, `urun_id`, `ust_id`, `varyant_ad`, `stok`, `fiyat`, `durum`)
                                VALUES (NULL, ?, ?, ?, ?, ?, '1')");

$update = $query->execute(array(  $_GET['urun_id'] , 0 , $_POST['varyant_ad'] , ' ' ,  ' '   ));
 

	if ($update) {

  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	

  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=error" . '&departman=' . $_GET['departman']);

	}

}
 



if (isset($_GET['deleteurunvaryant'])) {



$query = $db->prepare("DELETE FROM `urun_varyantlar` where id=?  ");

$update = $query->execute(array(  $_GET['deleteurunvaryant']    ));
 

	if ($update) {

  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	

  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=varyantlar".  "&durum=error" . '&departman=' . $_GET['departman']);

	}

}
 





if (isset($_POST['ceviri-duzenle'])) {



$query = $db->prepare("UPDATE keywords  set kelime_tr=?, kelime_en=?, kelime_arb=?    WHERE id=? ");

$update = $query->execute(array(  $_POST['kelime_tr'] , $_POST['kelime_en'] , $_POST['kelime_arb'] , $_GET['id']  ));

 

	if ($update) {



			header("Location:../site-ceviriler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-ceviriler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}


if (isset($_GET['deletduyuru'])) {



$query = $db->prepare("DELETE FROM haberler    WHERE id=? ");

$update = $query->execute(array($_GET['deletduyuru']  ));

 

	if ($update) {



			header("Location:../duyurular.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../duyurular.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}




 
if (isset($_POST['haber-duzenle'])) {

  

       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  =  "./upload/"  .  $rand . $ad ; 


        

        if($kaydet) {






$query = $db->prepare("UPDATE  haberler  set   baslik=?,    icerik=?,  meta_keywords=?, meta_aciklama=?, 
                                     resim=?   WHERE id=? ");

$update = $query->execute(array(   $_POST['baslik'],   $_POST['icerik'], $_POST['meta_keywords'], 

	$_POST['meta_aciklama'],     $resimyol    ,$_GET['id']  ));
   
	 

 

	if ($update) {



			header("Location:../duyurular.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../duyurular.php?durum=error" . '&departman=' . $_GET['departman']);

	}

} 


else {  
 
 
$query = $db->prepare("UPDATE  haberler  set   baslik=?,    icerik=?,  meta_keywords=?, meta_aciklama=? 
                                     WHERE id=? ");

$update = $query->execute(array(   $_POST['baslik'],   $_POST['icerik'], $_POST['meta_keywords'], $_POST['meta_aciklama'] ,
	$_GET['id']  ));
   

	
	 
 

	if ($update) {



			header("Location:../duyurular.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../duyurular.php?durum=error" . '&departman=' . $_GET['departman']);

	}


 }

}
 


 
if (isset($_POST['haber-ekle'])) {

  

       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  =  "./upload/"  . $rand . $ad ; 


        

        if($kaydet) {






$query = $db->prepare("INSERT INTO `haberler` (`id`, `baslik`, `ozet`, `icerik`, `meta_keywords`, `meta_aciklama`, `resim`)
    VALUES (NULL, ?, NULL, ?, ?, ?, ?)");

$update = $query->execute(array(   $_POST['baslik'], $_POST['icerik'], $_POST['meta_keywords'], $_POST['meta_aciklama'], 

	  $resimyol   ));
	  

   
 

	if ($update) {



			header("Location:../duyurular.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../duyurular.php?durum=error" . '&departman=' . $_GET['departman']);

	}

} 


else {  	



		header("Location:../duyurular.php?durum=error" . '&departman=' . $_GET['departman']);

	 


 }

}





if (isset($_GET['deletekategori'])) {



$query = $db->prepare("DELETE FROM kategoriler   WHERE id=? ");

$update = $query->execute(array($_GET['deletekategori']  ));

 

	if ($update) {



			header("Location:../kategoriler.php?durum=okey&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman'] );



	} else { 	



		header("Location:../kategoriler.php?durum=error&ust_id=".$_GET['ust_id']  . '&departman=' . $_GET['departman'] );

	}

}





if (isset($_POST['kategori-duzenle'])) {


       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  =  "./upload/" . $rand . $ad ; 


        

        if($kaydet) {






$query = $db->prepare("UPDATE `kategoriler` SET `kategori_ad` = ?, `ust_kategori_resim` = ?,   
	`seo_anahtar_kelime` =?, `seo_aciklama` = ? WHERE `kategoriler`.`id` = ? ");

$update = $query->execute(array(   $_POST['kategori_ad'], $resimyol , $_POST['seo_anahtar_kelime'], $_POST['seo_aciklama'],  
 $_GET['id']  ));
  
	
   

 

if ($update) {



			header("Location:../kategoriler.php?durum=okey&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman'] );



	} else { 	



		header("Location:../kategoriler.php?durum=error&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman'] );

	}

} 


else {  
 
 
$query = $db->prepare("UPDATE `kategoriler` SET `kategori_ad` = ?,     
	`seo_anahtar_kelime` =?, `seo_aciklama` = ? WHERE `kategoriler`.`id` = ? ");

$update = $query->execute(array(   $_POST['kategori_ad'], $_POST['seo_anahtar_kelime'], $_POST['seo_aciklama'],  
 $_GET['id']  ));
	
   
 

		if ($update) {



			header("Location:../kategoriler.php?durum=okey&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman'] );



	} else { 	



		header("Location:../kategoriler.php?durum=error&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman'] );

	}


 }


}





if (isset($_POST['kategori-ekle'])) {

 
       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  =  "./upload/" . $rand . $ad ; 


        $baslik = seo($_POST['kategori_ad']) . '/';

        if($kaydet) {






$query = $db->prepare("INSERT INTO `kategoriler` (`id`, `kategori_ad`, `ust_kategori_resim`, `ust_id`, `onerilenler`, `cok_satanlar`, `sira`, `seo_url`, `seo_title`, `seo_anahtar_kelime`, `seo_aciklama` , `kat_id` , `durum`) 
	VALUES (NULL, ?, ?, ?, '1', '1', '1', ?, '1', ?, ?, ?, '1')");

$update = $query->execute(array( $_POST['kategori_ad'], $resimyol , $_GET['ust_ids']  , $baslik  ,   $_POST['seo_anahtar_kelime'],
      $_POST['seo_aciklama'] , $_GET['departman'] ));
    
	
   

 

if ($update) {



			header("Location:../kategoriler.php?durum=okey&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman']);



	} else { 	



 header("Location:../kategoriler.php?durum=error&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman']);

	}

} 

 
else {  
 
 

$query = $db->prepare("INSERT INTO `kategoriler` (`id`, `kategori_ad`, `ust_kategori_resim`, `ust_id`, `onerilenler`, `cok_satanlar`, `sira`, `seo_url`, `seo_title`, `seo_anahtar_kelime`, `seo_aciklama` , `kat_id` , `durum`) 
	VALUES (NULL, ?, ?, ?, '1', '1', '1', ?, '1', ?, ?, ?, '1')");

$update = $query->execute(array( $_POST['kategori_ad'], './images/default-img.png' , $_GET['ust_ids']  , $baslik  ,   $_POST['seo_anahtar_kelime'],
      $_POST['seo_aciklama'] , $_GET['departman']  ));
    
	
   
 

		if ($update) {



			header("Location:../kategoriler.php?durum=okey&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../kategoriler.php?durum=error&ust_id=".$_GET['ust_id'] . '&departman=' . $_GET['departman']);

	}


 }

  

}


if (isset($_GET['deleteurunler'])) {



$query = $db->prepare("DELETE FROM urunler   WHERE id=? ");

$update = $query->execute(array($_GET['deleteurunler']  ));

 

	if ($update) {



			header("Location:../urunler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../urunler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}




 
if (isset($_POST['urun-duzenle'])) {

   
   $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =   '.' . ext($_FILES["resim"]["name"]); // dosya adı

  
        $tip = $_FILES["resim"]["type"]; // dosya tipi
  
        $boyut = $_FILES["resim"]["size"]; // boyutu

  
       $rand = rand(5000000000000,50000000000000000);
       
     $uzanti =  ext($ad);  

    echo    $resimyol .  $urun_adi  =  seo($_POST['urun_adi']);


       $hedef = "../../upload/" . $urun_adi . '-' .  $rand . '.' . $uzanti ;  // başta açtıgımız klasör adımız..
         
 
       $kaydet = move_uploaded_file($kaynak,$hedef); // resmimizi klasöre kayıt ettiriyoruz.
        if($kaydet) { 
 $resimyol  =  "./upload/" .    seo($_POST['urun_adi']) . '-' .  $rand . '.' . $uzanti ;


$query = $db->prepare("UPDATE `urunler` SET `urun_adi` = ?, `urun_kategori` = ?, `urun_alt_kategori` = ?, `urun_fiyat` = ?, `seo_url` = ?, 
	`seo_aciklama` = ?, `seo_anahtarkelime` = ?, `urun_aciklama` = ?, `urun_resim` = ?, `stok` = ?, `kdv` = ?, `indirim_yuzde` = ?,  `durum` = ?
 WHERE `urunler`.`id` = ?");

$update = $query->execute(array( $_POST['urun_adi'], $_POST['urun_kategori'], $_POST['urun_alt_kategori'], $_POST['urun_fiyat'], 
          $urun_adi , $_POST['seo_aciklama']  , $_POST['seo_anahtarkelime'] , $_POST['urun_aciklama'] , $resimyol ,
          $_POST['stok'], $_POST['kdv'], $_POST['indirim_yuzde'], $_POST['durum'], $_GET['id']  ));
	
    

	if ($update) {

                $urun_id = $_GET['id']   ; 

			header("Location:../".$_POST['urun-duzenle'].".php?urun_id=". $urun_id ."&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



 	header("Location:../".$_POST['urun-duzenle'].".php?durum=error" . '&departman=' . $_GET['departman']);

	}
         } 
     
         else {   



$query = $db->prepare("UPDATE `urunler` SET `urun_adi` = ?, `urun_kategori` = ?, `urun_alt_kategori` = ?, `urun_fiyat` = ?, `seo_url` = ?, 
	`seo_aciklama` = ?, `seo_anahtarkelime` = ?, `urun_aciklama` = ?,   `stok` = ?, `kdv` = ?, `indirim_yuzde` = ?,  `durum` = ?
 WHERE `urunler`.`id` = ?");

$update = $query->execute(array( $_POST['urun_adi'], $_POST['urun_kategori'], $_POST['urun_alt_kategori'], $_POST['urun_fiyat'], 
          $urun_adi , $_POST['seo_aciklama']  , $_POST['seo_anahtarkelime'] , $_POST['urun_aciklama'] , $_POST['stok'], 
          $_POST['kdv'], $_POST['indirim_yuzde'],  $_POST['durum'], $_GET['id']  ));
	
    

	if ($update) {

            $urun_id = $_GET['id']   ; 


			header("Location:../".$_POST['urun-duzenle'].".php?urun_id=". $urun_id ."&durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



  	header("Location:../".$_POST['urun-duzenle'].".php?durum=error" . '&departman=' . $_GET['departman']);

	}

     } 
	
           


 
}
 


 
if (isset($_POST['urun-ekle'])) {

   echo 'ddd';
       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

echo 'deneme' ;
 
        $ad =   '.' . ext($_FILES["resim"]["name"]); // dosya adı
echo 'deneme' ;

  
        $tip = $_FILES["resim"]["type"]; // dosya tipi
echo 'deneme' ;
  
        $boyut = $_FILES["resim"]["size"]; // boyutu

  
       $rand = rand(5000000000000,50000000000000000);
       
     $uzanti =  ext($ad);  
echo 'deneme' ;
   $urun_adi  =  seo($_POST['urun_adi']);


       $hedef = "../../upload/" . $urun_adi . '-' .  $rand . '.' . $uzanti ;  // başta açtıgımız klasör adımız..
         
 
       $kaydet = move_uploaded_file($kaynak,$hedef); // resmimizi klasöre kayıt ettiriyoruz.
        if($kaydet) { 
 $resimyol  =  "./upload/" .    seo($_POST['urun_adi']) . '-' .  $rand . '.' . $uzanti ;
 

$query = $db->prepare("INSERT INTO `urunler` (`id`, `urun_adi`,   `urun_kategori`, `urun_alt_kategori`, `urun_fiyat`, `seo_url`, `seo_aciklama`, 
  `urun_aciklama`, `urun_resim`, `sira`, `kat_id`, 
   `magaza_id`, `urun_marka`,  `seo_anahtarkelime`, `durum`, `stok`, `kdv`, `indirim_yuzde`  ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 1, 1, 1, 1, 1, 1);");
 
$update = $query->execute(array( $_POST['urun_adi'], $_POST['urun_kategori'], $_POST['urun_alt_kategori'], $_POST['urun_fiyat'], 
          $urun_adi , $_POST['seo_aciklama']    , $_POST['urun_aciklama'] , $resimyol ,  '1'  , $_GET['departman']   ));
	
    echo 'deneme 2';

	if ($update) {

            $urun_id = $db->lastInsertId(); 


   	header("Location:../urunler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



 //	header("Location:../urunler.php?durum=error" . '&departman=' . $_GET['departman']);

	}
         } 
     
         else { $resimyol2  =  "./images/default-img.jpg" ;   




$query = $db->prepare("INSERT INTO `urunler` (`id`, `urun_adi`,   `urun_kategori`, `urun_alt_kategori`, `urun_fiyat`, `seo_url`, `seo_aciklama`, 
  `urun_aciklama`, `urun_resim`, `sira`, `kat_id`, 
   `magaza_id`, `urun_marka`,  `seo_anahtarkelime`, `durum`, `stok`, `kdv`, `indirim_yuzde`  ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 1, 1, 1, 1, 1, 1);");
 
$update = $query->execute(array( $_POST['urun_adi'], $_POST['urun_kategori'], $_POST['urun_alt_kategori'], $_POST['urun_fiyat'], 
          $urun_adi , $_POST['seo_aciklama']    , $_POST['urun_aciklama'] , $resimyol2 ,  '1'  , $_GET['departman']   ));
	
    

	if ($update) {

            $urun_id = $db->lastInsertId(); 


   	header("Location:../urunler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



  	header("Location:../urunler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

     } 
	
           



}




if (isset($_GET['deletereferanslar'])) {



$query = $db->prepare("DELETE FROM referanslar WHERE id=? ");

$update = $query->execute(array($_GET['deletereferanslar']  ));

 

	if ($update) {



			header("Location:../referanslar.php?durum=okey");



	} else { 	



		header("Location:../referanslar.php?durum=error");

	}

}
 
 
if (isset($_POST['referans-duzenle'])) {

  

       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  = $hedef . $ad ; 


        

        if($kaydet) {






$query = $db->prepare("UPDATE  referanslar  set   adi_tr=?,  meta_kelimeler_tr=?,    aciklama_tr=?,  adi_en=?,  adi_arb=?,  meta_kelimeler_en=?, 
                

                  meta_kelimeler_arb=?,  aciklama_en=?, aciklama_arb=?,meta_aciklama_tr=?,meta_aciklama_en=?,meta_aciklama_arb=? , 
                   resim=?   WHERE id=? ");

$update = $query->execute(array(   $_POST['adi_tr'], $_POST['meta_kelimeler_tr'], $_POST['aciklama_tr'], $_POST['adi_en'], 

	  $_POST['adi_arb'], $_POST['meta_kelimeler_en'],  $_POST['meta_kelimeler_arb'], $_POST['aciklama_en'], 


	$_POST['aciklama_arb'],  
	$_POST['meta_aciklama_tr'], $_POST['meta_aciklama_en'], $_POST['meta_aciklama_arb'], 
	  $resimyol ,  $_GET['id']  ));
   

 

	if ($update) {



			header("Location:../referanslar.php?durum=okey");



	} else { 	



		header("Location:../referanslar.php?durum=error");

	}
} 


else {  
 
 
$query = $db->prepare("UPDATE  referanslar  set   adi_tr=?,  meta_kelimeler_tr=?,    aciklama_tr=?,  adi_en=?,  adi_arb=?,  meta_kelimeler_en=?, 
                

                  meta_kelimeler_arb=?,  aciklama_en=?, aciklama_arb=?,meta_aciklama_tr=?,meta_aciklama_en=?,meta_aciklama_arb=?    WHERE id=? ");

$update = $query->execute(array(   $_POST['adi_tr'], $_POST['meta_kelimeler_tr'], $_POST['aciklama_tr'], $_POST['adi_en'], 

	  $_POST['adi_arb'], $_POST['meta_kelimeler_en'],  $_POST['meta_kelimeler_arb'], $_POST['aciklama_en'], 


	$_POST['aciklama_arb'],  
	$_POST['meta_aciklama_tr'], $_POST['meta_aciklama_en'], $_POST['meta_aciklama_arb'], 
	    $_GET['id']  ));
   
   
 

	if ($update) {



			header("Location:../referanslar.php?durum=okey");



	} else { 	



		header("Location:../referanslar.php?durum=error");

	}


 }

}
 

 
if (isset($_POST['referans-ekle'])) {

  

       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  = $hedef . $ad ; 


        

        if($kaydet) {






$query = $db->prepare("INSERT INTO `referanslar` (`id`, `adi_tr`, `meta_kelimeler_tr`, `aciklama_tr`, `adi_en`, `adi_arb`, `meta_kelimeler_en`, `meta_kelimeler_arb`, `aciklama_en`, `aciklama_arb`, `meta_aciklama_tr`, `meta_aciklama_en`, `meta_aciklama_arb`, `resim`)

 VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$update = $query->execute(array(   $_POST['adi_tr'], $_POST['meta_kelimeler_tr'], $_POST['aciklama_tr'], $_POST['adi_en'], 

	  $_POST['adi_arb'], $_POST['meta_kelimeler_en'],  $_POST['meta_kelimeler_arb'], $_POST['aciklama_en'], 


	$_POST['aciklama_arb'],  $_POST['meta_aciklama_tr'], $_POST['meta_aciklama_en'], $_POST['meta_aciklama_arb'], 
	  $resimyol  ));
   

 

	if ($update) {



			header("Location:../referanslar.php?durum=okey");



	} else { 	



		header("Location:../referanslar.php?durum=error");

	}
} 


 else { 	



		header("Location:../referanslar.php?durum=error");

	}

}
 
 
if (isset($_POST['koleksiyon-duzenle'])) {

	  $urun ="";

         $yonetcicon=$db->prepare("SELECT * FROM `urunler` order by id asc ");  

       $yonetcicon->execute(array(  ));

        while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ 
                
              $strln  =   strlen($_POST['koleksiyon'. $yonetcicek['id']]);
              
                 if ($strln>0) {
                
               $urun = $urun . ',' .  $_POST['koleksiyon'. $yonetcicek['id']];
                 } }                            

           
 
       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         
        $resimyol  = "./upload/" .  $rand .  $ad ; 
 
        $kaydet = move_uploaded_file($kaynak, $hedef.  $ad); // resmimizi klasöre kayıt ettiriyoruz.

        $seo_url = seo($_POST['ad']) . '/';
 
        if($kaydet) {


 
$query = $db->prepare("UPDATE  koleksiyon  set   ad=?,  urunler=?,   meta_keywords=?,  meta_aciklama=?, durum=?, 
	meta_title=?,   koleksiyon_slider=?, seo_url=?   WHERE id=? ");

$update = $query->execute(array(   $_POST['ad'],  $urun,    $_POST['meta_keywords'],  $_POST['meta_aciklama'], 

     $_POST['durum'],   $_POST['meta_title'] , $resimyol , $seo_url ,  $_GET['id']  ));
   

 

	if ($update) {



			header("Location:../koleksiyon-yonetimi.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../koleksiyon-yonetimi.php?durum=error" . '&departman=' . $_GET['departman']);

	}
} 


else {  
 
 

$query = $db->prepare("UPDATE  koleksiyon  set   ad=?,  urunler=?,   meta_keywords=?,  meta_aciklama=?, durum=?, 
	meta_title=? , seo_url=?  WHERE id=? ");

$update = $query->execute(array(   $_POST['ad'],  $urun,    $_POST['meta_keywords'],  $_POST['meta_aciklama'], 

     $_POST['durum'],   $_POST['meta_title'] , $seo_url ,   $_GET['id']  ));
   
   
 

	if ($update) {



			header("Location:../koleksiyon-yonetimi.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../koleksiyon-yonetimi.php?durum=error" . '&departman=' . $_GET['departman']);

	}


 }   

}
 
 if (isset($_POST['koleksiyon-ekle'])) {

	  $urun ="";

         $yonetcicon=$db->prepare("SELECT * FROM `urunler` order by id asc ");  

       $yonetcicon->execute(array(  ));

        while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ 
                
              $strln  =   strlen($_POST['koleksiyon'. $yonetcicek['id']]);
                
                 if ($strln>0) {
                
               $urun = $urun . ',' .  $_POST['koleksiyon'. $yonetcicek['id']];
                 } }                            

           
 
       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(5000000000000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         
        $resimyol  = "./upload/" .  $rand .  $ad ; 
 
        $kaydet = move_uploaded_file($kaynak, $hedef.  $ad); // resmimizi klasöre kayıt ettiriyoruz.

        $seo_url = seo($_POST['ad']) . '/';

          

        if($kaydet) {


 
$query = $db->prepare("INSERT INTO `koleksiyon` (`id`, `ad`, `urunler`, `durum`, `koleksiyon_slider`, `seo_url`, `meta_keywords`, `meta_aciklama`, `meta_title`, `kat_id`)
       VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");

$update = $query->execute(array(   $_POST['ad'],  $urun,  $_POST['durum'], $resimyol , $seo_url ,  $_POST['meta_keywords'], 
 $_POST['meta_aciklama'],   $_POST['meta_title']  , $_GET['departman']   ));

     
   


 

	if ($update) {



			header("Location:../koleksiyon-yonetimi.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../koleksiyon-yonetimi.php?durum=error" . '&departman=' . $_GET['departman']);

	}
} 


else {  
 
 
$query = $db->prepare("INSERT INTO `koleksiyon` (`id`, `ad`, `urunler`, `durum`, `koleksiyon_slider`, `seo_url`, `meta_keywords`, `meta_aciklama`, `meta_title`, `kat_id`))
       VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");

$update = $query->execute(array(   $_POST['ad'],  $urun,  $_POST['durum'],  './upload/source/default-placeholder.png' , $seo_url , 
 $_POST['meta_keywords'], 
   $_POST['meta_aciklama'],   $_POST['meta_title']   , $_GET['departman']   ));

     
   


 

	if ($update) {



			header("Location:../koleksiyon-yonetimi.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../koleksiyon-yonetimi.php?durum=error" . '&departman=' . $_GET['departman']);

	}

 }   

}

 
if (isset($_GET['deleteslider'])) {



$query = $db->prepare("DELETE FROM slider   WHERE slider_id=? ");

$update = $query->execute(array($_GET['deleteslider']  ));

 

	if ($update) {



			header("Location:../site-slider.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-slider.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}



if (isset($_POST['slider-duzenle'])) {

  

       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(50000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
$resimyol  =  './upload/'  .  $rand . $ad ; 


        

        if($kaydet) {






$query = $db->prepare("UPDATE  slider set   buyuk_slogan=?,     slider_url=?, slider_resim=? , slide_turu=? WHERE slider_id=? ");

$update = $query->execute(array(   $_POST['buyuk_slogan'],   $_POST['slider_url'],  $resimyol ,  $_POST['slide_turu'] , $_GET['id']  ));

 

	if ($update) {



			header("Location:../site-slider.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-slider.php?durum=error" . '&departman=' . $_GET['departman']);

	}

} 


else {  
 
 

$query = $db->prepare("UPDATE  slider set   buyuk_slogan=?,     slider_url=? , slide_turu=?  WHERE slider_id=? ");

$update = $query->execute(array(   $_POST['buyuk_slogan'],  $_POST['slider_url'],   $_POST['slide_turu'],  $_GET['id']  ));

 



	if ($update) {



			header("Location:../site-slider.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-slider.php?durum=error" . '&departman=' . $_GET['departman']);

	}


 }

}




 
if (isset($_POST['slider-ekle'])) {

  

       $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı

 
        $ad =  $_FILES["resim"]["name"]; // dosya adı

 

        $tip = $_FILES["resim"]["type"]; // dosya tipi

 

        $boyut = $_FILES["resim"]["size"]; // boyutu

  
         $rand = rand(50000,50000000000000000);

        $hedef = "../../upload/" . $rand; // başta açtıgımız klasör adımız..
         

 
        $kaydet = move_uploaded_file($kaynak,$hedef. $ad); // resmimizi klasöre kayıt ettiriyoruz.



     
echo $resimyol  = './upload/' . $rand . $ad ; 


        

        if($kaydet) {






$query = $db->prepare("INSERT INTO `slider` (`slider_id`, `buyuk_slogan`, `durum`, `slider_resim`, `slider_url`, `slide_turu`, `kat_id`) VALUES (NULL, ?, '1',  ?, ? ,  ?, ?)");

$update = $query->execute(array(   $_POST['buyuk_slogan'],  $resimyol  , $_POST['slider_url'] ,   $_POST['slide_turu'] ,  $_GET['departman'] ));

 

	if ($update) {



			header("Location:../site-slider.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../site-slider.php?durum=error" . '&departman=' . $_GET['departman']);

	}

} 


else {  
 
   	header("Location:../site-slider.php?durum=error" . '&departman=' . $_GET['departman']);

	 

 }

}


  if (isset($_POST['teknik-ozellik-sira'])) {

    $firma=$db->prepare("SELECT * FROM urun_teknik_ozellikleri  where urun_id=?");  

       $firma->execute(array( $_GET['urun_id'] ));
    
        while ( $firmacek=$firma -> fetch(PDO:: FETCH_ASSOC)){

 
 $query = $db->prepare("UPDATE `urun_teknik_ozellikleri` SET sira=?  WHERE id=?");
 
  $update = $query->execute(array( $_POST['sira_'.$firmacek['id']] ,    $firmacek['id']  ));
     
          }       

if ($update) { header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=teknikozellikler".  "&durum=okey" . '&departman=' . $_GET['departman']);
  }

	else {  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=teknikozellikler".  "&durum=error" . '&departman=' . $_GET['departman']);
 }
         

          }  



 

if (isset($_GET['deleteurunresim'])) {



$query = $db->prepare("DELETE FROM `urun_resim` WHERE resim_id=? ");

$update = $query->execute(array(  $_GET['deleteurunresim']  ));

 

if ($update) { header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=gorseller".  "&durum=okey" . '&departman=' . $_GET['departman']);
  }

	else {  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=gorseller".  "&durum=error" . '&departman=' . $_GET['departman']);
 }

}



if (isset($_GET['deletetenikozlk'])) {



$query = $db->prepare("DELETE FROM `urun_teknik_ozellikleri` WHERE id=? ");

$update = $query->execute(array(  $_GET['deletetenikozlk']  ));

 

if ($update) { header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=teknikozellikler".  "&durum=okey" . '&departman=' . $_GET['departman']);
  }

	else {  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=teknikozellikler".  "&durum=error" . '&departman=' . $_GET['departman']);
 }

}




 
if (isset($_POST['teknikozellikler-duzenle'])) {




$query = $db->prepare("UPDATE `urun_teknik_ozellikleri` set teknik_ozellik_adi=?, teknik_ozellik_detay=? WHERE id=?");

$update = $query->execute(array(  $_POST['teknik_ozellik_adi'], $_POST['teknik_ozellik_detay'] ,$_GET['id']  ));

 

if ($update) { header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=teknikozellikler".  "&durum=okey" . '&departman=' . $_GET['departman']);
  }

	else {  header("Location:../urun-duzenle.php?urun_id=".$_GET['urun_id']. "&tur=teknikozellikler".  "&durum=error" . '&departman=' . $_GET['departman']);
 }


}

if (isset($_GET['durumdegistirpasifkategori'])) {



$query = $db->prepare("UPDATE `kategoriler` set durum=?  WHERE id=? ");

$update = $query->execute(array( 0 ,  $_GET['durumdegistirpasifkategori']  ));

 

	if ($update) {



			header("Location:../kategoriler.php?durum=okey"   . '&ust_id=0&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../kategoriler.php?durum=error" . '&ust_id=0&departman=' . $_GET['departman']);

	}

}


if (isset($_GET['durumdegistiraktifkategori'])) {



$query = $db->prepare("UPDATE `kategoriler` set durum=?  WHERE id=? ");

$update = $query->execute(array( 1 ,  $_GET['durumdegistiraktifkategori']  ));

 

	if ($update) {



			header("Location:../kategoriler.php?durum=okey"   . '&ust_id=0&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../kategoriler.php?durum=error"   . '&ust_id=0&departman=' . $_GET['departman']);

	}

}



 
if (isset($_GET['deletekurye'])) {



$query = $db->prepare("DELETE FROM kurye_yonetimi   WHERE id=? ");

$update = $query->execute(array($_GET['deletekurye']  ));

 

	if ($update) {



			header("Location:../kuryeler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../kuryeler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}



if (isset($_POST['kurye-duzenle'])) {

  

     





$query = $db->prepare("UPDATE  kurye_yonetimi set   kurye_adi=?    WHERE id=? ");

$update = $query->execute(array(   $_POST['kurye_adi'] , $_GET['id']  ));
 

	if ($update) {



			header("Location:../kuryeler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	



		header("Location:../kuryeler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

 

}




 
if (isset($_POST['kurye-ekle'])) {

  
 




$query = $db->prepare("INSERT INTO `kurye_yonetimi` (`id`, `kat_id`, `kurye_adi`) VALUES (NULL, ?, ?)");

$update = $query->execute(array(  $_GET['departman'] , $_POST['kurye_adi']  ));

 

	if ($update) {



			header("Location:../kuryeler.php?durum=okey" . '&departman=' . $_GET['departman']);



	} else { 	


 	header("Location:../kuryeler.php?durum=error" . '&departman=' . $_GET['departman']);

	}

}



          ?>
  
 


 