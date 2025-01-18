<?php include 'header.php'; ?>
    <title> Koleksiyon Yönetimi  >   Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

   <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-switch.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/switch.css">
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/switchery.min.css">



    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Koleksiyon Yönetimi </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Koleksiyon Yönetimi </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
<?php if(isset($_GET['slider-ekle'])){ ?>
 <div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

      

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?departman=<?php echo $kat_id ?>"  enctype="multipart/form-data">

                           

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="koleksiyon-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Koleksiyon  Ekle  </h4>

 
 <div class="form-body">  
    
  <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Koleksiyon  Durum   </label>

                                <div class="col-md-9">

                                   <fieldset>
                      <div class="float-left">
                        <input type="checkbox"  checked="checked"  class="switch" id="switch1" name="durum"  value="1"
                                  
                            />
                      </div>
                    </fieldset> 

                                </div>

                            </div>

      <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1">  Koleksiyon Resim   </label>

                                <div class="col-md-9">

                     <input type="file" id="projectinput1" class="form-control"   name="resim"    >

                                </div>

                            </div>

  
   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Koleksiyon Adı  </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                   placeholder="Koleksiyon Adı..."  name="ad">

                                </div>

                            </div>

 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Başlık  </label>

                                <div class="col-md-9">
  <input type="text" id="projectinput1" class="form-control" 
                                   placeholder="Meta Başlık..."  name="meta_title">

                                </div>

                            </div>


 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Kelimeler  </label>

                                <div class="col-md-9">
  <input type="text" id="projectinput1" class="form-control" 
                                   placeholder="Meta Kelimeler..."  name="meta_keywords">

                                </div>

                            </div>
                             
 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Açıklama  </label>

                                <div class="col-md-9">

                                
                                  <textarea type="text" id="projectinput1" class="form-control"  rows="4" 
                                    placeholder="Meta Açıklama..."  name="meta_aciklama"><?php echo $yonetciduzenlecek['meta_aciklama']; ?></textarea>
                                </div>

                            </div>

                             <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">   Ürünler    </label>

                                <div class="col-md-9"  style="overflow-y: scroll; height: 400px; border: 1px solid  #cacfe7 ;" >
                                
                                     <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                   <th> </th>
                                   <th> İd           </th>
                                   <th> Ürün Adı     </th>
                                   <th> Resim </th>
                                   
                                   
<th style="display: none"></th>
                                </tr>

                            </thead>

                                <tfoot>

                                <tr>
                                   <th> </th>
                                   <th> İd           </th>
                                   <th> Ürün Adı     </th>
                                   <th> Resim </th>
                                   
<th style="display: none"></th>
 
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `urunler` where kat_id=? order by id asc ");  

       $yonetcicon->execute(array(  $kat_id ));

                           
                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                    
                                     
                                     <tr>      

     <td style="width: 50px;">  <fieldset>
                      <div class="float-left">
                        <input type="checkbox"   class="switch" id="switch1" name="koleksiyon<?php echo $yonetcicek['id']; ?>" 
                                  value="<?php echo $yonetcicek['id']; ?>"
                            />
                      </div>
                    </fieldset>  </td>

                                    <td><?php echo $yonetcicek['id']; ?></td>

                                    <td style="<?php if ($yonetcicek['stok']>0) {
                                  echo 'color:green';
                                } else {  echo 'color:red'; } ?>" ><?php echo $yonetcicek['urun_adi']; ?></td>
                     <td> <img src="../<?php echo $yonetcicek['urun_resim']; ?>" height="70px"> </td>
                                  

                             

                                 


                                
  
                                   
                                </tr> 

                                <?php } ?>

                            </tbody>

                        

                        </table>
                                 
                             
                                </div>

                            </div>
                               
   



     </div>
</form></div></div></section></div></div>
<?php } ?>


<?php if(isset($_GET['slider-duzenle'])){ ?>
<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

        <?php  

       $yonetciduzenlecon=$db->prepare("SELECT * FROM `koleksiyon` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['slider-duzenle'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  ?>

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?id=<?php echo $yonetciduzenlecek['id']; ?>&departman=<?php echo $kat_id ?>"  enctype="multipart/form-data">

                           

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="koleksiyon-duzenle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Koleksiyon Düzenle  </h4>

 
 <div class="form-body">  

  <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Koleksiyon  Durum   </label>

                                <div class="col-md-9">

                                   <fieldset>
                      <div class="float-left">
                        <input type="checkbox"  <?php if ($yonetciduzenlecek['durum']==1) {  echo 'checked="checked"';  }  ?> class="switch" id="switch1" name="durum"  value="1"
                                  
                            />
                      </div>
                    </fieldset> 

                                </div>

                            </div>

      <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1">  Koleksiyon Resim   </label>

                                <div class="col-md-9">

                     <input type="file" id="projectinput1" class="form-control"   name="resim"    >

                                </div>

                            </div>

  
   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Koleksiyon Adı  </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['ad']; ?>"  placeholder="Koleksiyon Adı..."  name="ad">

                                </div>

                            </div>

 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Başlık  </label>

                                <div class="col-md-9">
  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['meta_title']; ?>"  placeholder="Meta Başlık..."  name="meta_title">

                                </div>

                            </div>


 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Kelimeler  </label>

                                <div class="col-md-9">
  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['meta_keywords']; ?>"  placeholder="Meta Kelimeler..."  name="meta_keywords">

                                </div>

                            </div>
                             
 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Açıklama  </label>

                                <div class="col-md-9">

                                
                                  <textarea type="text" id="projectinput1" class="form-control"  rows="4" 
                                    placeholder="Meta Açıklama..."  name="meta_aciklama"><?php echo $yonetciduzenlecek['meta_aciklama']; ?></textarea>
                                </div>

                            </div>

                             <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">   Ürünler    </label>

                                <div class="col-md-9"  style="overflow-y: scroll; height: 400px; border: 1px solid  #cacfe7 ;" >
                                
                                     <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                   <th> </th>
                                   <th> İd           </th>
                                   <th> Ürün Adı     </th>
                                   <th> Resim </th>
                                   
                                   
<th style="display: none"></th>
                                </tr>

                            </thead>

                                <tfoot>

                                <tr>
                                   <th> </th>
                                   <th> İd           </th>
                                   <th> Ürün Adı     </th>
                                   <th> Resim </th>
                                   
<th style="display: none"></th>
 
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `urunler` where kat_id=? order by id asc ");  

       $yonetcicon->execute(array(  $kat_id ));

                           
                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                    
                                     
                                     <tr>      

     <td style="width: 50px;">  <fieldset>
                      <div class="float-left">
                        <input type="checkbox"   <?php     $urunsayb = 0;

                                     $haftaninfirsati=$db->prepare("SELECT * FROM koleksiyon where id=?");



                              $haftaninfirsati->execute(array( $_GET['slider-duzenle']  ));



                              while ($firsatcek=$haftaninfirsati -> fetch(PDO:: FETCH_ASSOC)){

                                $vri=explode(",",  $firsatcek['urunler']);  

 
                                for ($i=1; $i <= count($vri); $i++) {  

                                    if ($vri[$i]==$yonetcicek['id']) {

                                         echo 'checked="checked"';
                                    }

 
                                 }} ?>  class="switch" id="switch1" name="koleksiyon<?php echo $yonetcicek['id']; ?>" 
                                  value="<?php echo $yonetcicek['id']; ?>"
                            />
                      </div>
                    </fieldset>  </td>

                                    <td><?php echo $yonetcicek['id']; ?></td>

                                    <td style="<?php if ($yonetcicek['stok']>0) {
                                  echo 'color:green';
                                } else {  echo 'color:red'; } ?>" ><?php echo $yonetcicek['urun_adi']; ?></td>
                     <td> <img src="../<?php echo $yonetcicek['urun_resim']; ?>" height="70px"> </td>
                                  

                             

                                 


                                
  
                                   
                                </tr> 

                                <?php } ?>

                            </tbody>

                        

                        </table>
                                 
                             
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

                    <h4 class="card-title"> Koleksiyon Yönetimi
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="slider-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Koleksiyon Ekle  </button></h4>
                      <input type="hidden" name="departman" value="<?php echo $kat_id; ?>">
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm Koleksiyonlarını görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>

                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                     <th> Resim </th>

                                    <th> Koleksiyon Adı </th>

                                  
                                   <th>İşlemler </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>


                                     <th> Resim </th>

                                    <th>  Koleksiyon Adı  </th>
 
                                                                               <th>İşlemler </th>
 
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $slidercon=$db->prepare("SELECT * FROM `koleksiyon` where kat_id=? order by id DESC ");  

       $slidercon->execute(array(  $kat_id ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     

                                     <tr>      

                                    <td> <img src="../<?php echo $slidercek['koleksiyon_slider']; ?>" style="height:80px;" >  </td>

                                    <td><?php echo $slidercek['ad']; ?></td>

                                  

  
                                     <td>
                                      <a href="koleksiyon-yonetimi.php?slider-duzenle=<?php  echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>">
                                        <button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                                      
                                      
                                        <a href="islemler/islem.php?deletekoleksiyon=<?php echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>">
                                        <button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a> 
                                       

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
 <script src="./app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"
  type="text/javascript"></script>
  <script src="./app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
  type="text/javascript"></script>
  <script src="./app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <script src="./app-assets/js/scripts/forms/switch.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL JS--> 

    <script src="./app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>

    <!-- END PAGE LEVEL JS-->

  </body>

</html>

