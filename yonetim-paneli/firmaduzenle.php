<?php include 'header.php'; ?>
  <?php  
       $firma=$db->prepare("SELECT * FROM firma where id=?");  

                            $firma->execute(array(
                           $_GET['d']
                              ));

                                       $firmacek=$firma -> fetch(PDO:: FETCH_ASSOC); ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title"><?php echo $firmacek['firma']; ?></h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Anasayfa</a>
                  </li>
                  <li class="breadcrumb-item"><a href="tum-firmalar.php">Tüm Firmalar</a>
                  </li>
                  <li class="breadcrumb-item active"><?php echo $firmacek['firma'];?>
                  </li>
                </ol>
              </div>
            </div>
          </div>
         
        </div>
        <div class="content-detached content-left">
          <div class="content-body"><!-- Description -->
<section id="css-classes" class="card">
   
    <div class="card-content">
       <div class="card-body"> 
	                    <form class="form form-horizontal" method="POST" action="islemler/islem.php?d=<?php echo $_GET['d']; ?>">
	                    		
      <a href="index.php"> 	<button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>
       	<button type="submit" name="firmaupdate" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="ft-user"></i> Firma Bilgileri</h4>
			                    <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Firma Adı</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Firma Adını giriniz..." value="<?php echo $firmacek['firma'];?>" required="required" name="firma_ad">
		                            </div>
		                        </div>
		                         <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Yetkili Adı</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Yetkili Adını giriniz..." value="<?php echo $firmacek['adsoyad'];?>" name="yetkili_ad">
		                            </div>
		                        </div>

                                  <div class="form-group row">
		                        	<label class="col-md-3 label-control" for="projectinput6">Sektör</label>
		                        	<div class="col-md-9">
			                            <select id="projectinput6" name="sektor" class="form-control">
			                             
			                                    
			                                    <?php  
       $sektor=$db->prepare("SELECT * FROM sektor  Order by sektor ASC");  

                            $sektor->execute(array(
                          
                              ));                  

                                   while ($sektorcek=$sektor -> fetch(PDO:: FETCH_ASSOC)){ ?>
			                                   <option value="<?php echo $sektorcek['no']; ?>"  <?php if( $firmacek['sektor']==$sektorcek['no']){ echo 'selected="selected"';}  ?> ><?php echo $sektorcek['sektor']; ?></option>
			                               <?php } ?>

			                            </select>
		                            </div>
		                        </div>
		                       
								<h4 class="form-section"><i class="ft-phone"></i> İletişim Bilgileri</h4>

                               <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Telefon Numarası</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Telefon Numarasını giriniz..." value="<?php echo $firmacek['tel'];?>" name="telefon">
		                            </div>
		                        </div>
		                         <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">GSM</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Gsm Numarasını giriniz..." value="<?php echo $firmacek['gsm'];?>" name="gsm">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Mail</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Mail Adresini giriniz..." value="<?php echo $firmacek['email'];?>" name="mail">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">web sitesi</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="web sitenizi giriniz..." value="<?php echo $firmacek['web'];?>" name="web">
		                            </div>
		                        </div>
                               <div class="form-group row">
		                        	<label class="col-md-3 label-control" for="projectinput6">İlçe</label>
		                        	<div class="col-md-9">
			                            <select id="projectinput6" name="ilce" class="form-control">
			                                  <?php  
       $sektor=$db->prepare("SELECT * FROM ilce  Order by ilce ASC");  

                            $sektor->execute(array(
                          
                              ));

                                   while ($sektorcek=$sektor -> fetch(PDO:: FETCH_ASSOC)){ ?>
			                                                
			                                   <option value="<?php echo $sektorcek['id']; ?>"   <?php if( $firmacek['ilce']==$sektorcek['id']){ echo 'selected="selected"';}  ?> ><?php echo $sektorcek['ilce']; ?></option>
			                             
			                               <?php } ?>

			                            </select>
		                            </div>
		                        </div>
								<div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Adres</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="adres" placeholder="Firma adresinizi giriniz..."><?php echo $firmacek['adres'];?></textarea>
									</div>
								</div>

								<h4 class="form-section"><i class="fas fa-bezier-curve"></i> Sosyal Medya</h4>
								 <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Facebook</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Facebook Adresini giriniz..." value="<?php echo $firmacek['face'];?>" name="facebook">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">İnstagram</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="İnstagram Adresini giriniz..." value="<?php echo $firmacek['instagram'];?>" name="instagram">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Twitter</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Twitter Adresini giriniz..." value="<?php echo $firmacek['twitter'];?>" name="twitter">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Google Plus</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Google Plus Adresini giriniz..." value="<?php echo $firmacek['gplus'];?>" name="gplus">
		                            </div>
		                        </div>
		                        <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Google Haritalar Kodu</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="harita" placeholder="Haritalar Kodunu giriniz..."><?php echo $firmacek['haritadagoster'];?></textarea>
									</div>
								</div>
								<h4 class="form-section"><i class="fas fa-info-circle"></i>  Hakkımızda</h4>

								  <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Hakkımızda</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="hakkimizda" placeholder="Firma Hakkında kısa bilgi giriniz..."><?php echo $firmacek['firmahakkinda'];?></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Anahtar Kelimeler</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="3" class="form-control" name="anahtarkelime" placeholder="Firma Hakkında kısa bilgi giriniz..."><?php echo $firmacek['anahtarkelimeler'];?></textarea>
									</div>
								</div>

 

							</div>

	                     
	                    </form>
	                </div>
    </div>
</section>
 </div>
   </div>     
        <div class="sidebar-detached sidebar-right" id="sag">
          <div class="sidebar">
          	<div class="sidebar-content card d-none d-lg-block">
    <div class="card-body">
        <div class="category-title pb-1">
           <h4 class="form-section"><i class="ft-image"></i> Firma Logosu</h4>
            <hr>
        </div>
       
       <form  method="POST" action="islemler/islem.php?d=<?php echo $_GET['d']; ?>" enctype="multipart/form-data">
	                  
<div class="container">
  <img src="../<?php echo $firmacek['logo'];?>" alt="Avatar" class="image">
  <div class="middle">
    <div class="text"><a id="logo-ac" href="#"><i class="far fa-images"  style="font-size: 40px;"></i></a> </div>
  </div>
</div>
<hr>

<div id="resimupdate" style="display: none;"> 

	 <h4 class="form-section"><i class="ft-image"></i> Firma Logosunu Güncelle</h4><hr>
        <div class="form-group row" style="padding-left: 10px;">
           <input type="file" name="logofirma" > 
    </div>
       <hr>
<button type="submit" name="firmalogo" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="width: 90%;">Kaydet</button>
</form> <br>

</div>

</div>

          </div>
        </div>
      </div>
    </div>
</div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


  
 <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2"                     href="http://www.caddemedya.com.tr/" target="_blank">Cadde Medya </a>, Tüm Hakları Saklıdır. </span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="./app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="./app-assets/vendors/js/ui/prism.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/jquery.raty.js"></script>
    <script src="./app-assets/vendors/js/extensions/jquery.knob.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/wNumb.js"></script>
    <script src="./app-assets/vendors/js/extensions/nouislider.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./app-assets/js/core/app-menu.js"></script>
    <script src="./app-assets/js/core/app.js"></script>
    <script src="./app-assets/js/scripts/customizer.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="./app-assets/js/scripts/extensions/knob.js"></script>
    <script src="./app-assets/js/scripts/pages/content-sidebar.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-menu-template/layout-content-detached-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Nov 2018 11:33:57 GMT -->
</html>
<style>
.container {
    position: relative;
    width: 100%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {

  color: #0B7AD7;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
<script>

$(document).ready(function(){
    $("#logo-ac").click(function(){
        $("#resimupdate").fadeIn(500);
      

    });
  });

</script>