<?php
ob_start();
error_reporting(0);
session_start(); 

 include  './islemler/baglan.php';
include 'fonksiyon.php';
date_default_timezone_set('Europe/Istanbul');
// include  'formlar/time-ago.php';
     include  './islemler/api_baglan.php';

$vericon=$db_api->prepare("SELECT * FROM uyeler  where id=?");  

$vericon->execute(array( '3' ));

$api_veri_cek=$vericon -> fetch(PDO:: FETCH_ASSOC);
 
 $garson_modulu = $api_veri_cek['garson_cagir_modul'];   
 $sepet_modulu = $api_veri_cek['sepet_modul'];   
 $search_modulu = $api_veri_cek['search_modul'];   
 $durum = $api_veri_cek['durum']; 
 

$datacon2=$db->prepare("SELECT * FROM firma_bilgileri  where firma_id=?");  

$datacon2->execute(array( '1' ));

$firmacek=$datacon2 -> fetch(PDO:: FETCH_ASSOC); 




$temacon2=$db->prepare("SELECT * FROM temalar  where id=?");  

$temacon2->execute(array( $firmacek['tema'] ));

$temacek=$temacon2 -> fetch(PDO:: FETCH_ASSOC); 





 ?>

        <?php 




$datacon122=$db->prepare("SELECT * FROM bayiler WHERE mail=:ad");  



$datacon122->execute(array(



  'ad' => $_SESSION["kullanici_ad"]  







));



$say=$datacon122->rowCount();



$kullanicicek=$datacon122 -> fetch(PDO:: FETCH_ASSOC); 
 ?>

 <?php $kullanici_user_id  = $_COOKIE['data'];

if(isset($kullanici_user_id)){

  echo  $kullanici_user_id ;

} else {
       $userid =  rand(1000000000000000000000,99999999999999999999999999999999999) ;
            
               setcookie("data", $userid, time() +36000);
            
 
                  $kullanici_user_id  = $_COOKIE['data'];
  echo $kullanici_user_id ;

}

 

if(isset($_GET['departman'])){

$katlarcon2=$db->prepare("SELECT * FROM katlar  where id=?");  

$katlarcon2->execute(array( $_GET['departman'] ));

} else { 

$katlarcon2=$db->prepare("SELECT * FROM katlar  order by id ASC Limit 1");  

$katlarcon2->execute(array(  ));
}

$katlarcek=$katlarcon2 -> fetch(PDO:: FETCH_ASSOC);  

$kat_id = $katlarcek['id'];

             
   setcookie("datas", $kat_id, time() +36000);






header("location:" .$siteyolu. "theme/". $temacek['tema_adi'] .'/?masa_id_no='.$_GET['masa_id_no'] . '&departman=' .  $_GET['departman'] ); ?>