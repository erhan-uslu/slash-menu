<?php include 'header.php'; ?>
    <title>  Stok Yönetimi    >  Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

   <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-switch.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/switch.css">
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/switchery.min.css">

    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Stok Yönetimi     </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Stok Yönetimi   </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
 <center><?php if (isset($_POST['stok-yonetimi'])) {
  
       $stokdurum=$db->prepare("SELECT * FROM `urunler` order by id asc  ");  

       $stokdurum->execute(array(  ));
 
  while ( $stokupdate=$stokdurum -> fetch(PDO:: FETCH_ASSOC)){




 if (!isset($_POST['durum'.$stokupdate['id']])) {
    $durum  ='0';
 } else {  $durum  ='1';  }
 



 $query = $db->prepare("UPDATE `urunler` SET stok=?, urun_fiyat=?, durum=?  WHERE id=?");
 
  $update = $query->execute(array( $_POST['stok'.$stokupdate['id']] , $_POST['urun_fiyat'.$stokupdate['id']] ,  $durum  , 
         $stokupdate['id']  ));
   
  
 

 } } ?></center>
 


        <div class="content-body"><!-- Zero configuration table -->

<section id="configuration">

    <div class="row">

        <div class="col-12">

             <div class="card">
 <form action="" method="get">
                <div class="card-header">

                    <h4 class="card-title"> Stok Yönetimi 
                     </h4>   <center> <?php   if ($update) {
  ?>
  <div class="alert alert-success alert-dismissible mb-2 col-md-6" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong> Tebrikler! </strong> Güncelleme İşlemi Başarılı... 
                    </div>
                    
                  <?php }  ?> </center>  

  

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm Stokları görüntüleyebilir ve Düzenleyebilirsiniz.</p>
 <form    action="" method="post">
  
      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="stok-yonetimi" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button>                       
                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>
                                   
                                   <th> İd           </th>
                                   <th> Ürün Adı     </th>
                                   <th>  Stok Durumu </th>
                                   <th>Ürün Fiyatı ₺</th>
                                   <th> Ürün Durumu </th>  
                                 </tr>

                            </thead>

                                <tfoot>

                                <tr>
                                   <th> İd           </th>
                                   <th> Ürün Adı     </th>
                                   <th>  Stok Durumu </th>
                                   <th>   Ürün Fiyatı ₺ </th>
                                   <th> Ürün Durumu </th>  
  
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `urunler` order by id asc ");  

       $yonetcicon->execute(array(  ));

                           
                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                    
                                     
                                     <tr>      

                                    <td><?php echo $yonetcicek['id']; ?></td>

                                    <td style="<?php if ($yonetcicek['stok']>0) {
                                  echo 'color:green';
                                } else {  echo 'color:red'; } ?>" ><?php echo $yonetcicek['urun_adi']; ?></td>

                                    <td><input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetcicek['stok']; ?>"  placeholder="Ürün Stoğu  ..."  name="stok<?php echo $yonetcicek['id']; ?>">
 </td>

                                  <td><input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetcicek['urun_fiyat']; ?>"  placeholder="Ürün Fiyatı  ..."  name="urun_fiyat<?php echo $yonetcicek['id']; ?>">
 </td>

                                   <td>  <fieldset>
                      <div class="float-left">
                        <input type="checkbox" class="switch"   <?php   if ($yonetcicek['durum']>=1) {
                            echo 'checked="checked"';
                          } ?>  id="switch1" name="durum<?php echo $yonetcicek['id']; ?>"  value="1" />
                          
                       
                      </div>
                    </fieldset>   </td>


                                  
  
                                   
                                </tr> 

                                <?php } ?>

                            </tbody>

                        

                        </table>
                    
                     </form>
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

