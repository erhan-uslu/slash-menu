<?php include 'header.php';   ?>
<title> Kurye Yönetimi > Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">



    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Kurye Yönetimi </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Kurye Yönetimi </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
<?php if(isset($_GET['masa-ekle'])){ ?>
<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

    
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?departman=<?php echo $kat_id ?>"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="kurye-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Kurye Ekle  </h4>

 
 
 <div class="form-body">  
     <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Kurye Adı </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                 placeholder="Kurye Adı .."  name="kurye_adi">

                                </div>

                            </div>


                        


     </div>



</div></form></div></div></section></div></div>
<?php } ?>


<?php if(isset($_GET['masa-duzenle'])){ ?>
<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

        <?php  

       $yonetciduzenlecon=$db->prepare("SELECT * FROM `kurye_yonetimi` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['masa-duzenle'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  ?>

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?id=<?php echo $yonetciduzenlecek['id']; ?>&departman=<?php echo $kat_id ?>"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="kurye-duzenle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Kurye Düzenle  </h4>

 
 <div class="form-body">  
   
   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Kurye Adı </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['kurye_adi']; ?>"  placeholder="Kurye Adı.."  name="kurye_adi">

                                </div>

                            </div>
 

     </div>
</form></div></div></section></div></div>
<?php } ?>















        <div class="content-body"><!-- Zero configuration table -->

<section id="configuration">

    <div class="row">

        <div class="col-12">

             <div class="card">
 <form action="" method="get">
                <div class="card-header">

                    <h4 class="card-title"> Kurye Yönetimi
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="masa-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Kurye Ekle  </button></h4>
                    <input type="hidden" name="departman" value="<?php echo $kat_id ?>">
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm Kuryeleri görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>

                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                     <th> Kurye Adı </th>
                                     
                                     <th>İşlemler </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>

                                     <th> Kurye Adı </th>
                                     
                                     <th>İşlemler </th>
  
 
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $slidercon=$db->prepare("SELECT * FROM `kurye_yonetimi` where kat_id=? order by id ASC ");  

       $slidercon->execute(array( $kat_id ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     

                                     <tr>      
                                      <td style="display: none;"><?php echo $slidercek['id']; ?></td>
  <td><?php echo $slidercek['kurye_adi']; ?></td>

                                  
                                 
                                     <td>
                                      <a href="kuryeler.php?masa-duzenle=<?php  echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>">
                                        <button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                      
                           <a href="islemler/islem.php?deletekurye=<?php echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>">
                     <button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i>
                     </button></a> 
                         

     

                                    </td>

                                </tr>

                                <?php } ?>

                            </tbody>

                        

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>











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

