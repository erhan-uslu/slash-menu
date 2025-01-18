<?php ob_start();
error_reporting(0);
session_start(); ?><!DOCTYPE html>
<html lang="tr">
 <?php include  '../../islemler/baglan.php';
  $tema_id = 5 ; 
include 'fonksiyon.php';
date_default_timezone_set('Europe/Istanbul');
// include  'formlar/time-ago.php';

  include  '../../islemler/api_baglan.php';

   

$datacon2=$db->prepare("SELECT * FROM firma_bilgileri  where firma_id=?");  

$datacon2->execute(array( '1' ));

$firmacek=$datacon2 -> fetch(PDO:: FETCH_ASSOC);

$vericon=$db_api->prepare("SELECT * FROM uyeler  where id=?");  

$vericon->execute(array( $firmacek['firm_id'] ));

$api_veri_cek=$vericon -> fetch(PDO:: FETCH_ASSOC);
 
 $garson_modulu = $api_veri_cek['garson_cagir_modul'];   
 $sepet_modulu = $api_veri_cek['sepet_modul'];   
 $search_modulu = $api_veri_cek['search_modul'];   
 $durum = $api_veri_cek['durum']; 

  

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

if(isset($_GET['departman'])){ 

$kat_id = $_GET['departman'];            
   setcookie("datas", $kat_id, time() +36000);
}



 ?>
<head>
  <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>

  <base href="<?php echo $siteyolu ?>theme/artipos-v-pdf/">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo $katlarcek['kat_adi'] ?> | Qr Menü - Restoran Cafe Sipariş Yazılımları </title>
  <meta name="description" content=" Qr Menü - Restoran Cafe Sipariş Yazılımları ">    
  <link rel="icon" href="assets\images\favicon.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="assets\images\favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="assets\css\vendors\bootstrap.css">

    <!-- Iconly Icon css -->
    <link rel="stylesheet" type="text/css" href="assets\css\iconly.css">

    <!-- Slick css -->
    <link rel="stylesheet" type="text/css" href="assets\css\vendors\slick.css">
    <link rel="stylesheet" type="text/css" href="assets\css\vendors\slick-theme.css">

    <!-- Style css -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" id="change-link" type="text/css" href="assets\css\style.css">
  </head>
  <!-- Head End -->

  <!-- Body Start -->
  <body>
      <?php  $sure = $api_veri_cek['gecerlilik_tarihi'];  if($durum==0 || $sure < date('Y-m-d')){ ?>

  <div class="container">
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

    <div class="skeleton-loader">
      <!-- Header Start -->
      <!--Main Start -->
      <div class="main-wrap index-page mb-xxl">
        <!-- Search Box Start -->
        <div class="search-box">
          <input class="form-control" disabled type="search" />
        </div>
        <!-- Search Box End -->

        <!-- Banner Section Start -->
        <div class="banner-section section-p-t ratio2_1">
          <div class="h-banner-slider">
            <div>
              <div class="banner-box">
                <div class="bg-img"></div>
              </div>
            </div>
            <div>
              <div class="banner-box">
                <div class="bg-img"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner Section End -->

        <!-- Buy from Recently Bought Start -->
        <div class="recently section-p-t">
          <div class="recently-wrap">
            <h3 class="font-md sk-hed"></h3>
            <img class="corner" src="assets/svg/corner-sk.svg" alt="corner" />
            <ul class="recently-list">
              <li class="item">
                <div class="img"></div>
              </li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
            </ul>
          </div>
        </div>
        <!-- Buy from Recently Bought End -->

        <!-- Shop By Category Start -->
        <div class="category section-p-t">
          <h3 class="font-sm"><span></span><span class="line"></span></h3>
          <div class="row gy-sm-4 gy-2">
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"> </span>
              </div>
            </div>
          </div>
        </div>
        <!-- Shop By Category End -->
      </div>
      <!--Main End -->
    </div>
    <!-- Skeleton loader End -->

    <!-- Header Start -->
    <header class="header" style="     height: 70px;
    border-bottom: 1px solid #e4e6e5;
    padding-bottom: 0;">
      <div class="logo-wrap">
  <i class="iconly-Category icli nav-bar"></i>
        <a href="./"> <img class="logo" src="<?php echo $siteyolu . $katlarcek['logo']; ?>" style="right: 45%;
    display: block;
    float: right;
    position: absolute;" alt="logo"></a>
    
      </div>
      <div class="avatar-wrap">
        <a href="https://instagram.com/<?php echo $katlarcek['instagram']; ?>"> <span class="font-sm"><i class="fa fa-instagram"></i> <?php echo $katlarcek['instagram']; ?></span></a> 
         </div>
    </header>
    <!-- Header End -->
 <style type="text/css">
   .header-sidebar .contact-us a {
    padding:  0px;
   }
 </style>
    <!-- Sidebar Start -->
    <a href="javascript:void(0)" class="overlay-sidebar"></a>
    <aside class="header-sidebar">
      <div class="wrap">
    <div class="user-panel">
             <a href="./"> <img  src="<?php echo $siteyolu . $katlarcek['logo']; ?>" style="    width: 50%;" alt="avatar"></a>
                     </div>

        <!-- Navigation Start -->
        <nav class="navigation">
          <ul>
            <li>
              <a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="nav-link title-color font-sm">
                <i class="iconly-Home icli"></i>
                <span style="font-family: monospace;">Anasayfa</span>
              </a>
              <a class="arrow" href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><i data-feather="chevron-right"></i></a>
            </li>

          
            
            <li>
              <a href="iletisim?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="nav-link title-color font-sm">
                <i class="iconly-Call  icli"></i>
                <span style="font-family: monospace;">İletişim</span>
              </a>
              <a class="arrow" href="iletisim?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><i data-feather="chevron-right"></i></a>
            </li>
<?php if($garson_modulu==1){ ?>
            <li>
              <a href="garson-cagir?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="nav-link title-color font-sm">
                <i class="iconly-Notification icli"></i>
                <span style="font-family: monospace;">Garson Çağır</span>
              </a>
              <a class="arrow" href="garson-cagir?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><i data-feather="chevron-right"></i></a>
            </li>
 <?php } ?>
          </ul>
        </nav>
        <!-- Navigation End -->
      </div>
<div class="contact-us">
                    <a href="https://artiposmenu.com/" style="padding: 0;"> <img  src="<?php echo $siteyolu . 'artiposlogo.png'; ?>" style="    width: 50%;" alt="avatar"></a>

        <p class="content-color font-xs">  Tarafından Yapılmıştır.</p>
        <a href="tel: 0 850 441 11 91" style="color: #0000009e">  <i class="iconly-Call icli"></i> 0 850 441 11 91</a> <br>
        <a href="https://artiposmenu.com/" style="color: #0000009e">  <i class="iconly-Info-Circle icli"></i>  www.artipos.com</a>
      </div>
    
    </aside>