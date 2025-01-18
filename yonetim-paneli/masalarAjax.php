<?php include '../islemler/baglan.php'; ?>
 <link href="./lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="./assets/css/dashforge.css">
    <link rel="stylesheet" href="./assets/css/dashforge.dashboard.css">
    <script type="text/javascript">
    	 var audio = new Audio("Run.mp3");
    </script>
<div class="row row-xs">
  <div class="col-md-12">
       <div class="row">
           <?php     $uruncon=$db->prepare("SELECT * FROM `masalar` where durum=1 and kat_id=?  order by id asc ");

                                     $uruncon->execute(array(  $_GET['departman']  ));
                                        while ($uruncek=$uruncon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                          <?php   $datacon12=$db->prepare("SELECT * FROM sepet where masa_id=? and durum<=3 ");  
             $datacon12->execute(array(  $uruncek['id'] ));  $masaid = $datacon12->RowCount();
              $datacon123=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=2 ");  
             $datacon123->execute(array(  $uruncek['id'] ));  $newOrder = $datacon123->RowCount(); 
             $datacon125=$db->prepare("SELECT * FROM sepet where masa_id=? and bildirim=1 ");  
             $datacon125->execute(array(  $uruncek['id'] ));  $bildirim = $datacon125->RowCount(); ?>
        <div class="col-sm-6 col-md-6  col-xl-2  mt-2"> <a href="siparis-detay.php?masaid=<?php  echo  $uruncek['id']; ?>">
         <div class="card" style="min-height: : 180px; height: 181px; padding: 20px 0; background-color: <?php if($masaid>0){echo '#f75e5e';} else if($uruncek['garson_cagir']==1){ echo '#f75e5e'; } else {echo '#3da433';} ?>;">
          <?php if($newOrder>=1){ ?>
    <center>     <p  class="text-white">YENİ SİPARİŞ VAR <p> </center>
    	
         <?php } ?>
        <center>  <h2 class="text-white"><?php echo $uruncek['masa_adi']; ?></h2>
        <p  class="text-white">Masayı Görüntüle</p>
<?php 	if($bildirim>=1){ ?>
         <script type="text/javascript">
         
           audio.play();    </script>
        
<?php   
			$bayiupdate1=$db->prepare("UPDATE `sepet` set bildirim = 0 where masa_id=? ");
       $update=$bayiupdate1->execute(array(  $uruncek['id']  )); ?>
         <?php  } ?>
 <?php if($uruncek['garson_cagir']==1){ ?>
        <a href="./siparis-yonetimi.php?garson_cagir=<?php  echo  $uruncek['id']; ?>&departman=<?php echo $_GET['departman'] ; ?>"> <label class="btn btn-primary" onclick=""  >GARSON ÇAĞIRILDI</label></a> 
         <?php 	if($uruncek['bildirim']==1){ ?>
         <script type="text/javascript">
			audio.play();    </script>
<?php   
			$bayiupdate1=$db->prepare("UPDATE `masalar` set bildirim = 0 where id=? ");
       $update=$bayiupdate1->execute(array(  $uruncek['id']  )); ?>
         <?php  } ?>
         <?php } ?>
 
         </center> 
       
         </div> </a>
      </div>  
     
    <?php } ?>
      </div>
            
         
        </div><!-- row -->
      </div><!-- container -->

       <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/feather-icons/feather.min.js"></script>
    <script src="./lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="./lib/jquery.flot/jquery.flot.js"></script>
    <script src="./lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="./lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="./lib/chart.js/Chart.bundle.min.js"></script>
    <script src="./lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="./lib/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="./assets/js/dashforge.js"></script>
    <script src="./assets/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="./lib/js-cookie/js.cookie.js"></script>
    <script src="./assets/js/dashforge.settings.js"></script>
