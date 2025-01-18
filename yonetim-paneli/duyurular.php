<?php include 'header.php'; ?>
    <title> Duyurular >  Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>



    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Duyurular</h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Duyurular </li>

               

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

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="haber-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-user"></i> Duyuru Ekle  </h4>

  <div class="form-body">  
 
 <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1">  Makale Resim   </label>

                                <div class="col-md-9">

                     <input type="file" id="projectinput1" class="form-control"  
                      placeholder=" Alt Slogan "  name="resim"    >

                                </div>

                            </div>





   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Makale Başlık    </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                  placeholder="Makale Başlık ..."  name="baslik">

                                </div>

                            </div>

 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">    Anahtar Kelimeler     </label>

                                <div class="col-md-9">

                       <input type="text" id="projectinput1" class="form-control" 
                               placeholder="Anahtar Kelimeler..."  name="meta_keywords">

                                </div>

                            </div>

 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Açıklama   </label>

                                <div class="col-md-9">

                       <input type="text" id="projectinput1" class="form-control" 
                                   placeholder="Meta Açıklama ..."   name="meta_aciklama">

                                </div>

                            </div>


    <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Makale  İçerik </label>

                                <div class="col-md-9">

                      <textarea class="ckeditor"  name="icerik"></textarea>
                      

                                </div>

                            </div>


                                        
        

     </div>               

 



</div></form></div></div></section></div></div>
<?php } ?>


<?php if(isset($_GET['slider-duzenle'])){ ?>
<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

        <?php  

       $yonetciduzenlecon=$db->prepare("SELECT * FROM `haberler` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['slider-duzenle'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  ?>

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?id=<?php echo $yonetciduzenlecek['id']; ?>"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="haber-duzenle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-user"></i> Duyuru Düzenle  </h4>

  <div class="form-body">  
 
 <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1">  Makale Resim   </label>

                                <div class="col-md-9">

                     <input type="file" id="projectinput1" class="form-control"  
                      placeholder=" Alt Slogan "  name="resim"    >

                                </div>

                            </div>





   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1"> Makale Başlık    </label>

                                <div class="col-md-9">

                                  <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['baslik']; ?>"  placeholder="Makale Başlık ..."  name="baslik">

                                </div>

                            </div>

 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">    Anahtar Kelimeler     </label>

                                <div class="col-md-9">

                       <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['meta_keywords']; ?>" placeholder="Anahtar Kelimeler..."  name="meta_keywords">

                                </div>

                            </div>

 <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Meta Açıklama   </label>

                                <div class="col-md-9">

                       <input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetciduzenlecek['meta_aciklama']; ?>"  placeholder="Meta Açıklama ..."   name="meta_aciklama">

                                </div>

                            </div>


    <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Makale  İçerik </label>

                                <div class="col-md-9">

                      <textarea class="ckeditor"  name="icerik"><?php echo $yonetciduzenlecek['icerik']; ?></textarea>
                      

                                </div>

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

                    <h4 class="card-title"> Duyurular
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="slider-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Duyuru Ekle  </button></h4>

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm Duyuruları görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>

                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                     <th> Resim </th>

                                     <th> Başlık    </th>

                                     <th>  Özet     </th> 
                                    <th>  İşlemler  </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>

                                    <th> Resim </th>

                                     <th> Başlık    </th>

                                     <th>  Özet     </th> 
                                    <th>  İşlemler  </th>
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $slidercon=$db->prepare("SELECT * FROM `haberler` ");  

       $slidercon->execute(array(  ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     

                                     <tr>      

                                    <td> <img src="../<?php echo $slidercek['resim']; ?>" style="height: 70px;" >  </td>

                                    <td><?php echo $slidercek['baslik']; ?></td>

                                   <td><?php echo strip_tags(substr($slidercek['icerik'] , 0, 110)); ?>...</td>

  
                                     <td>
                                      <a href="duyurular.php?slider-duzenle=<?php  echo $slidercek['id']; ?>"><button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                                      

                                      <a href="islemler/islem.php?deletduyuru=<?php echo $slidercek['id']; ?>"><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a> 



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

