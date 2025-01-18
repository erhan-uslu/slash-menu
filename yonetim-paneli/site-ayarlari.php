<?php include 'header.php'; 

 $subecon=$db->prepare("SELECT * FROM katlar  where id=? ");  



 $subecon->execute(array(  $kat_id  ));

 $subecek=$subecon -> fetch(PDO:: FETCH_ASSOC); ?>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <title> Şube Ayarları  > Admin Paneli</title>


    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">

            <h3 class="content-header-title"> Şube Ayarları  </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

 
                  </li>

                  <li class="breadcrumb-item active"> Şube Ayarları  </li>

                

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

	                    <form class="form form-horizontal" method="POST" action="islemler/islem.php?departman=<?php echo $kat_id; ?>"  enctype="multipart/form-data">

	                    		

      <a href="index.php"> 	<button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

       	<button type="submit" name="genel_site_ayarlari" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

	                    	<div class="form-body">

 
			              
 
 	
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">  
  	<br><br>
	<div class="form-body"> 
			<h4 class="form-section"><i class="ft-info"></i> Şube Ayarları </h4>
			                 
			                  
			                    <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1">Şube Adını giriniz</label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="Şube Adını giriniz..."  
		        value="<?php echo $subecek['kat_adi']; ?>"     name="kat_adi">

		                            </div>

		                        </div>

    
         <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1">Logonuzu Seçiniz</label>

		                            <div class="col-md-9">

		        <input type="file" id="projectinput1" class="form-control" placeholder="Firma Adını giriniz..."  
		        value="<?php echo $subecek['firma_ad']; ?>"     name="resim">

		                            </div>

		                        </div>

    
       	                                    


			<h4 class="form-section"><i class="ft-info"></i> İletişim Bilgileri  </h4>

			                    <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Firma Adresiniz </label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="Firma Adresinizi giriniz..."  
		        value="<?php echo $subecek['adres']; ?>"     name="adres">

		                            </div>

		                        </div>
  <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Firma Telefonunu </label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="Firma Telefonunu giriniz..."  
		        value="<?php echo $subecek['telefon']; ?>"     name="telefon">

		                            </div>

		                        </div>

		                          <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Whatsapp Numarası </label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="(90*****) Whatsapp Numarası giriniz..."  
		        value="<?php echo $subecek['whatsapp']; ?>"     name="whatsapp">

		                            </div>

		                        </div>

  <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Firma Mail Adresi </label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="Firma Mail Adresini giriniz..."  
		        value="<?php echo $subecek['email']; ?>"     name="email">

		                            </div>

		                        </div>



   <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Facebook Adresiniz </label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="Facebook Adresinizi giriniz..."  
		        value="<?php echo $subecek['facebook']; ?>"     name="facebook">

		                            </div>

		                        </div>

 <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Twitter Adresiniz </label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="Twitter Adresinizi giriniz..."  
		        value="<?php echo $subecek['twitter']; ?>"     name="twitter">

		                            </div>

		                        </div>
		                        
		                         <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> İnstagram Adresiniz </label>

		                            <div class="col-md-9">

		        <input type="text" id="projectinput1" class="form-control" placeholder="İnstagram Adresinizi giriniz..."  
		        value="<?php echo $subecek['instagram']; ?>"     name="instagram">

		                            </div>

		                        </div>                      


                  
  <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Google Haritalar Kodu   </label>

		                            <div class="col-md-9">

		        <textarea type="text" id="projectinput1" class="form-control" rows="4" placeholder=" Google Haritalar Kodunu giriniz..."  
		           name="konum"><?php echo $subecek['konum']; ?></textarea>

		                            </div>

		                        </div>    




  <div class="form-group row">
                  
	                            	<label class="col-md-3 label-control" for="projectinput1"> Bilgi İçeriği  </label>

		                            <div class="col-md-9">

		        
                     <textarea class="ckeditor" id="editor1"   name="aciklama"><?php echo $subecek['aciklama']; ?></textarea>
		                            </div>

		                        </div>                    
                 

		                        

                 <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              } 

              );

            </script>                           




		                    </div>
 

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

