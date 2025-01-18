<?php include 'header.php'; ?>
    <title> Paket Sipariş Yönetimi   >  Admin Paneli</title>
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

   <script type="text/javascript">
       var audio = new Audio("Run.mp3");
    </script>


    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title">Paket Sipariş Yönetimi </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active">Paket Sipariş Yönetimi </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
    
 


<div class="content-detached content-center">
 <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>

          <div class="content-body"><!-- Description -->
             <div class="card-body"> 
              <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
                  aria-expanded="true">Yeni Siparişler</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                  aria-expanded="false">Hazırlanan Siparişler</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3"
                  aria-expanded="false">Yola Çıkan Siparişler</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4"
                  aria-expanded="false">İptal Edilen Siparişler</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5"
                  aria-expanded="false">Teslim Edilen Siparişler</a>
              </li>
              
            </ul>
            <div class="tab-content px-1 pt-1">
             
              <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                 <script>
$(document).ready(function() {
        $("#result1").load("paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=1");
});

setInterval(function() {$("#result1").load('paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=1');}, 1000);
</script>

<div id="result1"></div>
              </div>
              <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                <script>
$(document).ready(function() {
        $("#result2").load("paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=2");
});

setInterval(function() {$("#result2").load('paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=2');}, 1000);
</script>

<div id="result2"></div>
              </div>
              <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                  <script>
$(document).ready(function() {
        $("#result3").load("paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=3");
});

setInterval(function() {$("#result3").load('paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=3');}, 1000);
</script>

<div id="result3"></div>
              </div>
               <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                  <script>
$(document).ready(function() {
        $("#result4").load("paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=0");
});

setInterval(function() {$("#result4").load('paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=0');}, 1000);
</script>

<div id="result4"></div>
              </div>
                 <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
                  <script>
$(document).ready(function() {
        $("#result5").load("paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=4");
});

setInterval(function() {$("#result5").load('paketSiparislerAjax.php?departman=<?php echo $kat_id; ?>&durum=4');}, 1000);
</script>

<div id="result5"></div>
              </div>
            
 </div>
 </div>
        <div class="content-body"><!-- Zero configuration table -->

 

<?php if(isset($_GET['garson_cagir'])){
  $bayiupdate1=$db->prepare("UPDATE `masalar` set garson_cagir = 0 where id=? ");



                    $update=$bayiupdate1->execute(array(  $_GET['garson_cagir']  ));

 header("Location:./paket-siparis-yonetimi.php?departman=" . $kat_id);
}
                  
  ?>

<?php if(isset($_GET['status'])){
   
         $bayiupdate1=$db->prepare("UPDATE `siparis_islemler` set durum =? where id=? ");
       $update=$bayiupdate1->execute(array(  $_GET['status'],  $_GET['masaid']  ));
        header("Location:./paket-siparis-yonetimi.php?masaid=". $_GET['masaid']);

 

} ?>


        </div>

      </div>

    </div>
 

    <!-- BEGIN VENDOR JS-->

    <script src="./app-assets/vendors/js/vendors.min.js"></script>

    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN PAGE VENDOR JS-->

    <script src="./app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN MODERN JS-->

    <script src="./app-assets/js/core/app-menu.js"></script>

    <script src="./app-assets/js/core/app.js"></script>

    <script src="./app-assets/js/scripts/customizer.js"></script>

    <!-- END MODERN JS-->
 
    <!-- BEGIN PAGE LEVEL JS-->

    <script src="./app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>

    <!-- END PAGE LEVEL JS-->

  </body>

</html>

