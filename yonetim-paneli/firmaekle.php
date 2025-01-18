<?php include 'header.php'; ?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Yeni Firma OLuştur</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Anasayfa</a>
                  </li>
                  <li class="breadcrumb-item"><a href="tum-firmalar.php">Tüm Firmalar</a>
                  </li>
                  <li class="breadcrumb-item active">Yeni Firma Oluştur
                  </li>
                </ol>
              </div>
            </div>
          </div>
         
        </div>
        <div class="content-detached content-center">
          <div class="content-body"><!-- Description -->
<section id="css-classes" class="card">
   
    <div class="card-content">
       <div class="card-body"> 
	                    <form class="form form-horizontal" method="POST" action="islemler/islem.php"  enctype="multipart/form-data">
	                    		
      <a href="index.php"> 	<button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>
       	<button type="submit" name="firmaekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="ft-user"></i> Firma Bilgileri</h4>
			                     <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Firma Logo</label>
		                            <div class="col-md-9">
		                            	<input type="file" id="projectinput1" required="required" name="firma_logo">
		                            </div>
		                        </div>

			                    <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Firma Adı</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Firma Adını giriniz..." required="required" name="firma_ad">
		                            </div>
		                        </div>
		                         <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Yetkili Adı</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Yetkili Adını giriniz..."  name="yetkili_ad">
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
			                                   <option value="<?php echo $sektorcek['no']; ?>"><?php echo $sektorcek['sektor']; ?></option>
			                               <?php } ?>

			                            </select>
		                            </div>
		                        </div>
		                       
								<h4 class="form-section"><i class="ft-phone"></i> İletişim Bilgileri</h4>

                               <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Telefon Numarası</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Telefon Numarasını giriniz..."  name="telefon">
		                            </div>
		                        </div>
		                         <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">GSM</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Gsm Numarasını giriniz..."  name="gsm">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Fax</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Fax numarasını giriniz..."  name="fax">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Mail</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Mail Adresini giriniz..."  name="mail">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">web sitesi</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="web sitenizi giriniz..."  name="web">
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
			                                                
			                                   <option value="<?php echo $sektorcek['id']; ?>"><?php echo $sektorcek['ilce']; ?></option>
			                             
			                               <?php } ?>

			                            </select>
		                            </div>
		                        </div>
								<div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Adres</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="adres" placeholder="Firma adresinizi giriniz..."></textarea>
									</div>
								</div>

								<h4 class="form-section"><i class="fas fa-bezier-curve"></i> Sosyal Medya</h4>
								 <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Facebook</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Facebook Adresini giriniz..."  name="facebook">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">İnstagram</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="İnstagram Adresini giriniz..."  name="instagram">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Twitter</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Twitter Adresini giriniz..."  name="twitter">
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Google Plus</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" placeholder="Google Plus Adresini giriniz..."  name="gplus">
		                            </div>
		                        </div>
		                        <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Google Haritalar Kodu</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="harita" placeholder="Haritalar Kodunu giriniz..."></textarea>
									</div>
								</div>
								<h4 class="form-section"><i class="fas fa-info-circle"></i>  Hakkımızda</h4>

								  <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Hakkımızda</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="hakkimizda" placeholder="Firma Hakkında kısa bilgi giriniz..."></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Anahtar Kelimeler</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="3" class="form-control" name="anahtarkelime" placeholder="Firma Hakkında kısa bilgi giriniz..."></textarea>
									</div>
								</div>

 

							</div>

	                     
	                    </form>
	                </div>
    </div>
</section>
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
