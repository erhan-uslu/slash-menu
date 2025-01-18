<?php include 'header.php'; ?>
    <title>  Sipariş Yönetimi   >  Admin Paneli</title>
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

 


    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Sipariş Yönetimi </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Sipariş Yönetimi </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
    
 


<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->
 
        <div class="content-body"><!-- Zero configuration table -->
 <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
        $("#result").load("masalarAjax.php?departman=<?php echo $kat_id; ?>");
});

setInterval(function() {$("#result").load('masalarAjax.php?departman=<?php echo $kat_id; ?>');}, 1000);
</script>

<div id="result"></div>
 

<?php if(isset($_GET['garson_cagir'])){
  $bayiupdate1=$db->prepare("UPDATE `masalar` set garson_cagir = 0 where id=? ");



                    $update=$bayiupdate1->execute(array(  $_GET['garson_cagir']  ));

 header("Location:./siparis-yonetimi.php?departman=" . $kat_id);
}
                  
  ?>




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

