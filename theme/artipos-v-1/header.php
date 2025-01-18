<?php ob_start();
error_reporting(0);
session_start(); ini_set('session.cookie_lifetime', 432000); // 5 days
 ?><!DOCTYPE html>
<html lang="tr">
  <?php 
  include  '../../islemler/baglan.php';
  $tema_id = 1 ; 
include 'fonksiyon.php';
date_default_timezone_set('Europe/Istanbul');
// include  'formlar/time-ago.php';

  include  '../../islemler/api_baglan.php';




$datacon2=$db->prepare("SELECT * FROM firma_bilgileri  where firma_id=?");  

$datacon2->execute(array( '1' ));

$firmacek=$datacon2 -> fetch(PDO:: FETCH_ASSOC);

$temacon2=$db->prepare("SELECT * FROM temalar  where id=?");  

$temacon2->execute(array( $firmacek['tema'] ));

$temacek=$temacon2 -> fetch(PDO:: FETCH_ASSOC); 

if($tema_id!=$firmacek['tema']) {

header("location:" .$siteyolu. "theme/". $temacek['tema_adi'] .'/?masa_id_no='.$_GET['masa_id_no']);

}


$datacon122=$db->prepare("SELECT * FROM bayiler WHERE mail=:ad");  



$datacon122->execute(array(



  'ad' => $_SESSION["kullanici_ad"]  







));



$say=$datacon122->rowCount();



$kullanicicek=$datacon122 -> fetch(PDO:: FETCH_ASSOC); 
 ?>

 <?php
    $kullanici_user_id  = $_COOKIE['UserData'];

if(isset($kullanici_user_id)){

     $kullanici_user_id ;
     $kullanici_user_idSS= 99;

} else {
	  $userid =  rand(10000,9999999999) ;

        setcookie("UserData", $userid, time() +3600);
            
 
   $kullanici_user_id  = $_COOKIE['UserData'];


}
 
 // echo $kullanici_user_id ; 

$kat_id  = $_COOKIE['datas'];

if(isset($kat_id)){
 

     $katlarcon2=$db->prepare("SELECT * FROM katlar where id=?  ");  

$katlarcon2->execute(array( $kat_id  ));
 

$katlarcek=$katlarcon2 -> fetch(PDO:: FETCH_ASSOC);  

} else {
$katlarcon2=$db->prepare("SELECT * FROM katlar  order by id ASC Limit 1");  

$katlarcon2->execute(array(  ));
 

$katlarcek=$katlarcon2 -> fetch(PDO:: FETCH_ASSOC);  

$kat_id = $katlarcek['id'];            
   setcookie("datas", $kat_id, time() +36000);
            
  
     $kat_id ;

}





 ?>
<head>
	    <base href="<?php echo $siteyolu ?>theme/artipos-v-1/">
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> <?php echo $katlarcek['kat_adi'] ?> | Qr Menü - Restoran Cafe Sipariş Yazılımları </title>
	<meta name="description" content=" Qr Menü - Restoran Cafe Sipariş Yazılımları ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" type="image/png" href="<?php echo $siteyolu ?>theme/artipos-v-1/images/favicon.png" sizes="32x32">

	<!-- STYLESHEETS -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $siteyolu ?>theme/artipos-v-1/css/owl.carousel.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo $siteyolu ?>theme/artipos-v-1/css/owl.theme.default.min.css" type="text/css" media="all">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $siteyolu ?>theme/artipos-v-1/css/themify-icons.css">

	<link rel="stylesheet" href="<?php echo $siteyolu ?>theme/artipos-v-1/main.css" type="text/css" media="all">

	

</head>  
 <?php  $vericon=$db_api->prepare("SELECT * FROM uyeler  where id=?");  

$vericon->execute(array( $firmacek['firm_id'] ));

 $api_veri_cek=$vericon -> fetch(PDO:: FETCH_ASSOC);
 $garson_modulu = $api_veri_cek['garson_cagir_modul'];   
 $sepet_modulu = $api_veri_cek['sepet_modul'];   
 $search_modulu = $api_veri_cek['search_modul'];   
 $durum = $api_veri_cek['durum']; 
 $sure = $api_veri_cek['gecerlilik_tarihi']; 
 $eve_siparis = $api_veri_cek['eve_siparis_modulu']; ?>

<body class="loader">
	 
      <?php    if($durum==0 || $sure < date('Y-m-d')){ ?>

 	<div class="main-content">
 		<div class="col-md-12" style="justify-content: 'center'; align-items: 'center'; ">
 			<div class="text-center pos-top">
						<a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="logo d-block mt-1"><img src="<?php echo $siteyolu  . 'artiposlogo.png' ?>" style="    width: 200px; margin-top: 40%;" alt=""></a>
							<hr>
				<p class="text-center mt-4">Paketinizin Süresi Dolduğu İçin Kullanıma Kapatılmıştır. Lütfen Bizimle İletişime Geçiniz</p>	
				
	        <ul class="nav-item" style="text-decoration: none;
    list-style: none;
    color: #000;
    text-align: center;
    padding: 0px;"> 
					<li ><a href="tel:0 850 441 11 91" style="     padding-top: 0px;
    color: #ed212a;
    font-weight: 700;"><i class="fa fa-phone mr-1"></i> 0 850 441 11 91</a></li>

    <li style=" margin-top: 8px;"  ><a href="tel: 0 542 329 83 73" style="     padding-top: 0px;
    color: #ed212a;
    font-weight: 700;"><i class="fa fa-phone mr-1"></i> 0 542 329 83 73</a></li>
	        	<li style=" margin-top: 8px;" ><a href="http://artipos.com/" style="      
    color: #ed212a;
    font-weight: 700;"><i class="fa fa-globe mr-1"></i> www.artipos.com</a></li>
				</ul>

		 </div>
 		</div>
 	</div>

<?php exit();   }  ?>

	<!-- main wrapper -->
	<div id="perspective" class="perspective effect-airbnb modalview ">
		<div class="main-wrapper">
			<div class="main-content">
				<header class="bg-white style2 pt-3 pb-0">
					<div class="row">
						<div class="col-sm-4 text-left pos-top">
							<a href="#" class="menu-btn mt-0" id="sidebar-right"><span></span></a>
						</div>
						<div class="col-sm-4 text-center pos-top">
							<a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="logo d-block mt-1"><img src="<?php echo $siteyolu . $katlarcek['logo']; ?>" style="    width: 100%;" alt=""></a>
						</div>
						<div class="col-sm-4 text-right pos-top">
						<?php if($sepet_modulu==1){ ?>	<a href="sepetim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" 
								class="cart-btn mt-1"><i class="ti-shopping-cart"></i><span><?php 	  $sepet = 0 ; 
if($_GET['masa_id_no'] == 'package'){
  $masa_id_no =   $kullanici_user_id;

} 

else {
  $masa_id_no =   $_GET['masa_id_no'];

}



             $sepetcoun=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1");  
             $sepetcoun->execute(array(  $masa_id_no ));
          echo   $sepet = $sepetcoun->rowCount(); ?></span></a>
      <?php }  ?>
		                </div>
						
		                <div class="col-sm-12 text-left mt-3 mb-0 pos-top" style="display: none;">
			                <div class="form-content style1">
								<form action="#">
				                    <input type="text" class="form-control" placeholder="Aramak için dokun...">
				                </form>
			                </div>
		            	</div>
		                
	                </div>
				</header>
				<div class="preloader-wrap p-3">
					<div class="box shimmer">
						<div class="lines">
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
						</div>
					</div>
					<div class="box shimmer mb-3">
						<div class="lines">
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
						</div>
					</div>
					<div class="box shimmer mb-3">
						<div class="lines">
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
							<div class="line s_shimmer"></div>
						</div>
					</div>
				</div>
