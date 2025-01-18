<?php error_reporting(0);
  ob_start();
 session_start(); ?>
<!DOCTYPE html>

<?php include '../islemler/baglan.php';  
        include 'toastr.php';

$data1=$db->prepare("SELECT * FROM yoneticiler WHERE mail=?");  
$data1->execute(array($_SESSION["kullanici_ad"] ));
 $say=$data1->rowCount();

 if ($say==0){ 
       Header("Location:login.php?durum=error"); }
 


$datacon2=$db->prepare("SELECT * FROM firma_bilgileri  where firma_id=?");  

$datacon2->execute(array( '1' ));

$firmacek=$datacon2 -> fetch(PDO:: FETCH_ASSOC); 




$temacon2=$db->prepare("SELECT * FROM temalar  where id=?");  

$temacon2->execute(array( $firmacek['tema'] ));

$temacek=$temacon2 -> fetch(PDO:: FETCH_ASSOC); 




$kullanicicek=$data1 -> fetch(PDO:: FETCH_ASSOC);  
     
   if ($kullanicicek['durum']==0){ 
       Header("Location:login.php?durum=error"); }           

            ?>
  <meta charset="UTF-8">

<html class="loading" lang="tr" data-textdirection="ltr">

<head>
    <title>Garson Paneli - Yönetim Ekranı - Qr Menü Kod Menü Takip Yazılım Sistemleri</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

   


    <link rel="apple-touch-icon" href="./app-assets/images/ico/apple-icon-120.png">

    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/ico/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->

    <link rel="stylesheet" type="text/css" href="./app-assets/css/vendors.css">

    <!-- END VENDOR CSS-->

    <!-- BEGIN MODERN CSS-->

    <link rel="stylesheet" type="text/css" href="./app-assets/css/app.css">

 <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/extensions/toastr.css">
    <!-- END MODERN CSS-->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <link href="app-assets/fonts/feather/style.min.css" rel="stylesheet">

    <link href="app-assets/fonts/line-awesome/css/line-awesome.min.css" rel="stylesheet">

    <link href="app-assets/fonts/meteocons/style.min.css" rel="stylesheet">

    <link href="app-assets/fonts/icons-simple-line-icons/style.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./app-assets/fonts/simple-line-icons/style.min.css">

    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/cryptocoins/cryptocoins.css">

    <link rel="stylesheet" type="text/css" href="./app-assets/fonts/feather/style.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/extensions/toastr.css">

    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  

    <!-- END Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/wizard.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/pickers/daterange/daterange.min.css">
    <!-- BEGIN Custom CSS-->

    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">

    <!-- END Custom CSS-->

  </head>

  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">



    <!-- fixed-top-->

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow" style="    background-color:#ed222b   !important;">

      <div class="navbar-wrapper">

        <div class="navbar-header">

          <ul class="nav navbar-nav flex-row">

            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>

            <li class="nav-item"><a class="navbar-brand" href="index.php">

                <h3 class="brand-text">               <img class="brand-logo" src="../logo.png" style="    width: 120px;
    margin-left: 25%;">
  </h3></a></li>

            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>

          </ul>

        </div>

        <div class="navbar-container content">

          <div class="collapse navbar-collapse" id="navbar-mobile">

            <ul class="nav navbar-nav mr-auto float-left">

              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
<?php 

if(isset($_GET['departman'])){

$katlarcon2=$db->prepare("SELECT * FROM katlar   where id=?");  

$katlarcon2->execute(array( $_GET['departman'] ));

} else { 

$katlarcon2=$db->prepare("SELECT * FROM katlar where durum=1 order by id ASC Limit 1");  

$katlarcon2->execute(array(  ));
}

$katlarcek=$katlarcon2 -> fetch(PDO:: FETCH_ASSOC);  

$kat_id = $katlarcek['id'];

  ?>
    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"> <?php echo $katlarcek['kat_adi']; ?> Yönetimi </a></li>
 
 
            
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"  href="#" 
                onClick="MyWindow=window.open('<?php echo $siteyolu.  '/?departman=' . $kat_id  ?>&departman=<?php echo $kat_id; ?> ','Onizleme','width=450,height=700'); return false;"
               style="    background-color: #fff;
    color: black;
    border-radius: 3%;  
    padding: 10px 10px;
    margin-top: 8%;">  <i class="fas fa-mobile" style="    font-size: 15px;"></i> Masa Sipariş Önizleme  </a></li>



              <li class="nav-item d-none d-md-block ml-1"><a class="nav-link nav-menu-main menu-toggle hidden-xs"  href="#" 
                onClick="MyWindow=window.open('<?php echo $siteyolu.  '/?departman=' . $kat_id  ?>&masa_id_no=package&departman=<?php echo $kat_id; ?> ','Onizleme','width=450,height=700'); return false;"
               style="    background-color: #fff;
    color: black;
    border-radius: 4%;
    padding: 10px 10px;
    margin-top: 8%;"> <i class="fas fa-mobile" style="    font-size: 15px;"></i>  Paket Sipariş Önizleme  </a></li>


            </ul>

            <ul class="nav navbar-nav float-right">

              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1">Hoşgeldin,<span class="user-name text-bold-700"><?php  echo $kullanicicek['ad_soyad'];?></span></span><span class="avatar avatar-online">
                <img src="https://www.americanaircraftsales.com/wp-content/uploads/2016/09/no-profile-img.jpg" alt="avatar"><i></i></span></a>


                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="../"> <i class="fas fa-reply"></i> Siteyi Görüntüle  </a>

                  <a class="dropdown-item" href="site-yoneticiler.php?yonetici-duzenle=<?php  echo $kullanicicek['id'];?>"><i class="ft-user"></i> Profili Düzenle </a>

 

                  <div class="dropdown-divider"></div><a class="dropdown-item" href="islemler/logout.php"><i class="ft-power"></i>  Çıkış Yap  </a>

                </div>

              </li>

             

            </ul>

          </div>

        </div>

      </div>

    </nav>



    <!-- ////////////////////////////////////////////////////////////////////////////-->





  <?php include 'sidebar.php' ?>

