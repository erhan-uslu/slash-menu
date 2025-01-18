<?php ob_start();
error_reporting(0);
session_start(); ?><!DOCTYPE html>
<html lang="tr">
  <?php include  '../../islemler/baglan.php';
  $tema_id = 1 ; 
include 'fonksiyon.php';
date_default_timezone_set('Europe/Istanbul');
// include  'formlar/time-ago.php';
    

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

 <?php $kullanici_user_id  = $_COOKIE['data'];

if(isset($kullanici_user_id)){

  // $kullanici_user_id ;

} else {
       $userid =  rand(1000000000000000000000,99999999999999999999999999999999999) ;
            
               setcookie("data", $userid, time() +36000);
            
 
                  $kullanici_user_id  = $_COOKIE['data'];
// echo $kullanici_user_id ;

}

 


$kat_id  = $_COOKIE['datas'];

if(isset($kullanici_user_id)){

     $kat_id ;

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
	<title> Qr Menü - Restoran Cafe Sipariş Yazılımları </title>
	<meta name="description" content=" Qr Menü - Restoran Cafe Sipariş Yazılımları ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32">

	<!-- STYLESHEETS -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css" media="all">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/themify-icons.css">

	<link rel="stylesheet" href="main.css" type="text/css" media="all">

	

	<!--[if lt IE 9]>
      <script src="<?php echo $siteyolu; ?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="<?php echo $siteyolu; ?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>  
 

<body class="loader">
	 
      

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
							<a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="logo d-block mt-1"><img src="<?php echo $siteyolu; ?>theme/artipos-v-1/images/logo.png" alt=""></a>
						</div>
						<div class="col-sm-4 text-right pos-top">
							<a href="sepetim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" 
								class="cart-btn mt-1"><i class="ti-shopping-cart"></i><span><?php 	  $sepet = 0 ; 

             $sepetcoun=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1");  
             $sepetcoun->execute(array(  $_GET['masa_id_no'] ));
          echo   $sepet = $sepetcoun->rowCount(); ?></span></a>
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

				 	<div class="app-body p-4 form-wrap pt-2">
<h4 class="text-center">Masa Seçimi Yapınız</h4>
 
			<div class="row">
				   <?php      $uruncons=$db->prepare("SELECT * FROM `masalar` where kat_id=? order by id asc ");

                                     $uruncons->execute(array( $kat_id ));
                                        while ($urunceks=$uruncons -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                        	<?php   $datacon12s=$db->prepare("SELECT * FROM sepet where masa_id=? ");  
             $datacon12s->execute(array(  $urunceks['id'] ));  $masaid = $datacon12s->RowCount(); ?>
				<div class="col-md-3 mt-2" style="width: 33%"> <a href="./?masa_id_no=<?php echo $urunceks['id']; ?>">
				 <div class="card" style="height: 100px; padding: 25px 0; background-color: <?php if($masaid>0){echo '#f75e5e';} else {echo '#3da433';} ?>;">
				<center>	<h2 class="text-white" style="font-size: 16px;"><?php echo $urunceks['masa_adi']; ?></h2>
				<p  class="text-white">Masayı Seç</p> </center> 
				 </div> </a>
			</div>	
		<?php } ?>
			</div>

				</div>			
			</div>
 
		</div>
		
		<nav class="outer-nav left vertical ">
			<header class="bg-tranparent style2 mt-3 pb-0 bg-home">
				<div class="row">
					<div class="col-sm-4 text-left pos-top">
						<a href="#" class="menu-btn mt-0" id="close-sidebar"></a>
					</div>
					<div class="col-sm-4 text-center pos-top">
						<a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="logo d-block mt-1"><img src="images/logo-white.png" alt=""></a>
					</div>
					<div class="col-sm-4 text-right pos-top">
						<a href="sepetim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="cart-btn mt-1"><i class="ti-shopping-cart"></i><span><?php 	  $sepet = 0 ; 

             $sepetcoun=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1");  
             $sepetcoun->execute(array(  $_GET['masa_id_no'] ));
          echo   $sepet = $sepetcoun->rowCount(); ?></span></a>
	                </div>
	            </div>
	        </header>
	        
		</nav>
	</div>
	<!-- main wrapper -->

	

	
	<!-- SCRIPTS -->
	<script src="js/plugin.js"></script>
	<script src="js/main.js"></script>
	
	

</body>

</html>
 
