<?php include 'header.php'; ?>
    <title> Site Yöneticiler - Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">



    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title">Tüm Yöneticiler </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Tüm Yöneticiler </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
<?php if(isset($_GET['yonetici-ekle'])){ ?>
<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

   

    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="yonetici-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-user"></i> Yönetici Ekle  </h4>

                           <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Adınız ve Soyadınız </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" placeholder="Adınız ve Soyadınız ..."  name="ad_soyad">

                                </div>

                            </div>


                             <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Mail Adresiniz </label>

                                <div class="col-md-9">

                     <input type="text" id="projectinput1" class="form-control"  required="required" 
                      placeholder="Mail Adresiniz..."  name="mail">

                                </div>

                            </div>


                             <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Telefon Numaranız </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" placeholder="Telefon Numaranız..."  name="telefon">

                                </div>

                            </div>

                              <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Şifreniz </label>

                                <div class="col-md-9">

                                  <input type="password" id="projectinput1"  required="required"
                                   class="form-control" placeholder="Şifreniz..."  name="sifre">

                                </div>

                            </div>




</div></form></div></div></section></div></div>
<?php } ?>


<?php if(isset($_GET['yonetici-duzenle'])){ ?>
<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

        <?php  

       $yonetciduzenlecon=$db->prepare("SELECT * FROM `yoneticiler` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['yonetici-duzenle'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  ?>

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?id=<?php echo $yonetciduzenlecek['id']; ?>"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="yonetici-duzenle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-user"></i> Yönetici Düzenle  </h4>

                           <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Adınız ve Soyadınız </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['ad_soyad']; ?>"  placeholder="Adınız ve Soyadınız ..."  name="ad_soyad">

                                </div>

                            </div>


                             <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Mail Adresiniz </label>

                                <div class="col-md-9">

                     <input type="text" id="projectinput1" class="form-control"  required="required" 
                      placeholder="Mail Adresiniz..."  name="mail"   value="<?php echo $yonetciduzenlecek['mail']; ?>" >

                                </div>

                            </div>


                             <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Telefon Numaranız </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" placeholder="Telefon Numaranız..." 
                                 value="<?php echo $yonetciduzenlecek['telefon']; ?>"
                                   name="telefon">

                                </div>

                            </div>

                              <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Şifreniz </label>

                                <div class="col-md-9">

                                  <input type="password" id="projectinput1"   
                                   class="form-control" placeholder="Değiştirmek istemiyorsanız boş bırakınız"  name="sifre">

                                </div>

                            </div>




</div></form></div></div></section></div></div>
<?php } ?>















        <div class="content-body"><!-- Zero configuration table -->

<section id="configuration">

    <div class="row">

        <div class="col-12">

             <div class="card">
 <form action="" method="get">
                <div class="card-header">

                    <h4 class="card-title">Tüm Yöneticiler  
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="yonetici-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Yönetici Ekle  </button></h4>

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm Yöneticileri görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>

                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                     <th> İd</th>

                                    <th> Yönetici Ad</th>

                                   <th> Mail Adresi</th> 

                                   <th> Telefon Numarası</th>

                                  <th> Durum  </th> 

                                   <th>İşlemler </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>

                                    <th> İd</th>

                                    <th> Yönetici Ad</th>

                                   <th> Mail Adresi</th>

                                   <th> Telefon Numarası</th>

                                  <th> Durum  </th> 


                                   <th>İşlemler </th>
 
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `yoneticiler`  where  durum<5 ");  

       $yonetcicon->execute(array(  ));

                           

                             



                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     

                                     <tr>      

                                    <td><?php echo $yonetcicek['id']; ?></td>

                                    <td><?php echo $yonetcicek['ad_soyad']; ?></td>

                                   <td><?php echo $yonetcicek['mail']; ?></td>

                                   <td><?php echo $yonetcicek['telefon']; ?></td>
  
                                   <td>
                                     <?php if ($yonetcicek['durum']>0): ?>
                                       <a href="islemler/islem.php?durumdegistirpasif=<?php echo $yonetcicek['id']; ?>">
                                        <button type="button" class="btn btn-icon btn-success mr-1"> Aktif </button></a>
                                     <?php endif; ?>
                                      <?php if ($yonetcicek['durum']<=0): ?>
                                       <a href="islemler/islem.php?durumdegistiraktif=<?php echo $yonetcicek['id']; ?>">
                                        <button type="button" class="btn btn-icon btn-danger mr-1"> Pasif </button></a>
                                     <?php endif; ?>
                                   </td>

                                    <td><a href="site-yoneticiler.php?yonetici-duzenle=<?php  echo $yonetcicek['id']; ?>"><button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                                      

                                      <a href="islemler/islem.php?deleteyonetici=<?php echo $yonetcicek['id']; ?>"><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a> 



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

