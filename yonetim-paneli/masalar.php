<?php include 'header.php'; function qrCode($s, $w = 250, $h = 250){
  $u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
  $url = sprintf($u, $w, $h, $s);
    return $url;
} ?>
<title> Masa Yönetimi > Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">



    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Masa Yönetimi </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Masa Yönetimi </li>

               

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

        <button type="submit" name="masa-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Masa Ekle  </h4>

 
 
 <div class="form-body">  
     <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Masa Adı </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['masa_adi']; ?>"  placeholder="Masa Adı.."  name="masa_adi">

                                </div>

                            </div>


                             <div class="form-group row"    >

                                <label class="col-md-3 label-control"for="projectinput1"> Masa Durumu  </label>

                                <div class="col-md-9">

                                 <select  class="form-control"  name="durum" >
                                   <option <?php if ($yonetciduzenlecek['durum']=='1') {echo 'selected="selected"'; } ?>
                                   value="1"> Aktif </option>

                                   <option <?php if ($yonetciduzenlecek['durum']=='2') {echo 'selected="selected"'; } ?>
                                   value="0"> Pasif </option>
 

 

                                 </select>

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

       $yonetciduzenlecon=$db->prepare("SELECT * FROM `masalar` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['masa-duzenle'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  ?>

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?id=<?php echo $yonetciduzenlecek['id']; ?>&departman=<?php echo $kat_id ?>"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="masa-duzenle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Masa Düzenle  </h4>

 
 <div class="form-body">  
   
   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Masa Adı </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['masa_adi']; ?>"  placeholder="Masa Adı.."  name="masa_adi">

                                </div>

                            </div>


                             <div class="form-group row"    >

                                <label class="col-md-3 label-control"for="projectinput1"> Masa Durumu  </label>

                                <div class="col-md-9">

                                 <select  class="form-control"  name="durum" >
                                   <option <?php if ($yonetciduzenlecek['durum']=='1') {echo 'selected="selected"'; } ?>
                                   value="1"> Aktif </option>

                                   <option <?php if ($yonetciduzenlecek['durum']=='2') {echo 'selected="selected"'; } ?>
                                   value="0"> Pasif </option>
 

 

                                 </select>

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

                    <h4 class="card-title"> Masa Yönetimi
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="masa-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Masa Ekle  </button></h4>
                    <input type="hidden" name="departman" value="<?php echo $kat_id ?>">
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm Masaları görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>

                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                     <th> Masa Adı </th>
                                     <th> Aktifliği </th>
                                     <th>  Qr Kodu </th> 
                                     <th>İşlemler </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>

                                     <th> Masa Adı </th>
                                     <th> Aktifliği </th>
                                     <th>  Qr Kodu </th> 
                                     <th>İşlemler </th>
  
 
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $slidercon=$db->prepare("SELECT * FROM `masalar` where kat_id=? order by id ASC ");  

       $slidercon->execute(array( $kat_id ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     

                                     <tr>      
                                      <td style="display: none;"><?php echo $slidercek['id']; ?></td>
  <td><?php echo $slidercek['masa_adi']; ?></td>

                                   <td><?php if($slidercek['durum']==1){ echo 'Aktif'; } else { echo 'Pasif';}  ?></td>
                                    <td>
<?php
$url = $siteyolu . '?masa_id_no=' . $slidercek['id'] ; 
$qr = qrCode($url, 400, 400); // 200x200
?>
                                     <a href="<?=$qr?>" target="_blank" download="filename"> <img src="<?=$qr?>" style="height: 70px;" > </a>  </td>

                                  

  
                                     <td>
                                      <a href="masalar.php?masa-duzenle=<?php  echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>">
                                        <button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                      
                           <a href="islemler/islem.php?deletemasa=<?php echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>">
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

 <footer class="footer footer-static footer-light navbar-border navbar-shadow">

      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2"                     href="http://www.caddemedya.com.tr/" target="_blank">Cadde Medya </a>, Tüm Hakları Saklıdır. </span></p>

    </footer>



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

