<?php include 'header.php'; ?>
    <title>Yeni Ürün Oluştur | RaftaHazır - Admin Paneli</title>

<link rel="apple-touch-icon" href="./app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="./app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="./app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/pickers/daterange/daterangepicker.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

  <link rel="stylesheet" type="text/css" href="./app-assets/css/app.css">
  <!-- END MODERN CSS-->
    <script src="./app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
  <script src="./app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="./app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="./app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
   <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 
<script>
function checkAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "Ajax-form/urun_kodu.php",
  data:'urun_kodu='+$("#urun_kodu").val(),
  type: "POST",
  success:function(data){
    $("#user-availability-status").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>
  <style>
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
 
    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">

            <h3 class="content-header-title">Yeni Ürün OLuştur</h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item"><a href="tum-urunler.php"> Ürün Yönetimi  </a>

                  </li>

                  <li class="breadcrumb-item active">Yeni Ürün Oluştur

                  </li>

                </ol>

              </div>

            </div>

          </div>

         

        </div>

        <div class="content-detached content-center">
           <div class="content-body"><!-- Description -->
  <section id="validation">
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form action="islem.php"  >
                     
                        <h4 class="form-section col-md-4"><i class="fas fa-shopping-basket"></i> Temel Ürün Bilgileri  </h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstName3">
                               Ürün Adı :
                                <span class="danger">* </span> 
                              </label>
                              <div class="row">
                            <div class="col-11">
                                <input type="text" class="form-control  "   id="urun_adi" name="urun_adi"> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="İlanda Görünecek Ana Başlık"></i>
                            </div>
                                 </div> 
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                               <label for="urun_kodu">
                                  Ürün Kodu  : <span class="danger">*</span> 
                                <span id="user-availability-status" class="danger"></span> 
                                 <img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
                              </label> 
                            <div class="row">
                             <div class="col-11">

                             
                              <input type="text" class="form-control   " onBlur="checkAvailability()" id="urun_kodu" name="urun_kodu">
                            </div>
                          

                               <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Her ürünün kendine ait tanımlayıcı kodu olmalıdır"></i>
                            </div>
                            </div>
                           
                               </div>




                          </div>
                        </div>

        <?php $kategoriler = $db->query('SELECT * FROM kategoriler Where ust_id=0 ORDER BY kategori_ad ASC')->fetchAll(PDO::FETCH_ASSOC); ?>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                       <label> Kategoriler :  </label> <span class="danger">*</span>

    <div class="row">
                             <div class="col-11">
                        <select name="urun_kategori" class="jui-select-default form-control  " id="urun_kategori" >
                           <option value="">- Kategori Seçin -</option>   
                            <?php foreach($kategoriler as $kategori): ?>
                 <option value="<?=$kategori['id']?>"><?=$kategori['kategori_ad']?></option>
                 <?php endforeach; ?>
                        </select> 
                      </div>
 <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürününüzün Bulunduğu Ana Kategoriyi Seçiniz"></i>
                            </div>
                    </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                                     <label> Alt Kategori : </label>
          <div class="row">
                             <div class="col-11">
           <select name="alt_kategori" id="alt_kategori" class="jui-select-default form-control"  disabled>
                           <option>- Alt Kategori Seçin -</option>
                           </select>
                         </div>
<div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürününüzün Bulunduğu Alt Kategoriyi Seçiniz"></i>
                            </div>
  


                       </div>
                            </div>
                          </div>
                        </div>
                    <div class="row">
                    <div class="col-md-6">
                          <div class="form-group">
                              <label> Ürün Fiyatı :  <span class="danger">*</span> </label>
                               <div class="row">
                             <div class="col-11">
                        <fieldset>
                   <div class="input-group">
                       <div class="input-group-prepend">
                          <span class="input-group-text">₺</span> </div>
                       
                        <input type="number" class="form-control  " name="urun_fiyat" placeholder="İndirimli Ürün Fiyatını Giriniz" aria-label="İndirimli Ürün Fiyatını Giriniz">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                    </fieldset>
                  </div>
    <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürününüzün Satılacağı Fiyatı Giriniz"></i>
                            </div>
                </div> 


                     </div> </div>



                   <div class="col-md-6">

                      <div class="form-group">
                       <label> İndirim Yüzde :  </label> <span class="danger">*</span>
                      <div class="form-group">
                            <div class="row">
                             <div class="col-11">
                       
  <fieldset>
                   <div class="input-group">
                      
                       
                        <input type="number" class="form-control  " name="indirim_yuzde" placeholder="İndirimli Yüzdesini Giriniz"  >
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-percent"></i></span>
                        </div>
                      </div>
                    </fieldset>

                      </div>
<div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="İndirimli Fiyata Uyguladığınız İndirim Yüzdesini Belirtiniz"></i>
                            </div>
                    </div>
                      </div>
                             </div>


                   </div>  
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                      
                      <div class="form-group">
                       <label> Sipariş Hazırlanma Süresi :  </label> <span class="danger">*</span>
                      <div class="form-group">
                         <div class="row">
                             <div class="col-11">
                   <fieldset>
                   <div class="input-group">
                      
                       
                        <input type="number" class="form-control  " name="kdv" placeholder="Sipariş Hazırlanma Süresi Giriniz"  >
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-percent"></i></span>
                        </div>
                      </div>
                    </fieldset>
                        </div>
                        <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürün Grubunuzdan Alınan Kdv Oranını Seçiniz"></i>
                            </div>
                </div>
                      </div>
                             </div>


                   </div> 
                   <div class="col-md-6">
                     <div class="form-group">
                              <label> Stok Adedi :  <span class="danger">*</span> </label>
                   <div class="row">
                             <div class="col-11">
                       <fieldset>
                   <div class="input-group">
                       <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fab fa-dropbox"></i></span> </div>
                       
                        <input type="number" class="form-control  " name="urun_fiyat" placeholder="Stoklarınızda Bulunan Adet Miktarını Giriniz" aria-label="Stoklarınızda Bulunan Adet Miktarını Giriniz">
                         
                      </div>
                    </fieldset>  </div>
                     <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürün Grubunuzdan Alınan Kdv Oranını Seçiniz"></i>
                            </div>
                  </div>

                        </div>
                   </div>
                    </div>
             

             <h4 class="form-section"><i class="fas fa-info-circle"></i> Detaylı Ürün Açıklamaları  </h4>

                        <div class="row">

                          <div class="col-md-12 ">
                                <div class="form-group">
    
     <textarea class="ckeditor" id="editor1" name="urun_aciklama"></textarea>
    
                              </div>
              
                           </div>
                        </div>
                   

                     
                      

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
 
 </div>

   </div>     

        

      

    <!-- ////////////////////////////////////////////////////////////////////////////-->



 <script src="./app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="./app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
  <script src="./app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"
  type="text/javascript"></script>
  <script src="./app-assets/vendors/js/pickers/daterange/daterangepicker.js"
  type="text/javascript"></script>
  <script src="./app-assets/vendors/js/forms/validation/jquery.validate.min.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="./app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="./app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="./app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS--> 
  <script src="./app-assets/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>
    <script src="./app-assets/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>

  <!-- END PAGE LEVEL JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

   <script src="./app-assets/js/scripts/extensions/toastr.js" type="text/javascript"></script>
 
  
 <script type="text/javascript">
   $(function(){

    $(document.body).on('change', '#urun_kategori', function(){
        var plakaKodu = $(this).val();
        if (plakaKodu){
            $.post('Ajax-form/urun_kategoriler.php', {'plakaKodu': plakaKodu}, function(response){
                $('#alt_kategori').html(response).removeAttr('disabled');
            });
        } else {
            $('#alt_kategori').html('<option>- Alt Kategori Seçin -</option>').attr('disabled', 'disabled');
        }
    });

});
 </script>

  </body>

 
</html>

