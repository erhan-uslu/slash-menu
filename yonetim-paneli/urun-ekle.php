<?php include 'header.php'; ?>
<title> Yeni Ürün Oluştur - Rafta Hazır</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
   <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

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

    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">

            <h3 class="content-header-title">Yeni Ürün OLuştur </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active">Yeni Ürün OLuştur</li>

               

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

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="urun-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"> <i class="fas fa-shopping-basket"></i> Temel Ürün Bilgileri  </h4>
<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                              <label for="firstName3">
                               Ürün Kapak Görseli :
                                <span class="danger">* </span> 
                              </label>
                              <div class="row">
                            <div class="col-11">
                                <input type="file" class="form-control"   id="urun_adi" name="resim"> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="İlanda Görünecek Kapak Görseli"></i>
                            </div>
                                 </div> 
                            </div>
                          </div>
                          <div class="col-md-6">
                      
                      <div class="form-group">
                       <label>   Sipariş Hazırlanma Süresi :  </label> <span class="danger">*</span>
                      <div class="form-group">
                         <div class="row">
                             <div class="col-11">
                   <fieldset>
                   <div class="input-group">
                      
                       
                        <input type="number" class="form-control  " name="kdv" placeholder=" Sipariş Hazırlanma Süresini Giriniz"  >
                        <div class="input-group-append">
                          <span class="input-group-text"> </span>
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
                         </div>
  <div class="row">
                        
                        
                        </div>

        <?php $kategoriler = $db->query('SELECT * FROM kategoriler Where ust_id=0 and kat_id='.$kat_id.' ORDER BY kategori_ad ASC')->fetchAll(PDO::FETCH_ASSOC); ?>
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
           <select name="urun_alt_kategori" id="alt_kategori" class="jui-select-default form-control"  disabled>
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
                              <label for="firstName3">
                               Ürün Adı :
                                <span class="danger">* </span> 
                              </label>
                              <div class="row">
                            <div class="col-11">
                                <input type="text" class="form-control  " placeholder="Ürünün Adını Giriniz"  id="urun_adi" name="urun_adi"> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürünün Adını Giriniz"></i>
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
    
 
                    </div>
                    <div class="row">
                      
                   <div class="col-md-6" style="display: none">
                     <div class="form-group">
                              <label> Stok Adedi :  <span class="danger">*</span> </label>
                   <div class="row">
                             <div class="col-11">
                       <fieldset>
                   <div class="input-group">
                       <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fab fa-dropbox"></i></span> </div>
                       
                        <input type="number" class="form-control  "value="<?php echo rand(100000, 90000000000) ?><?php echo rand(100000, 90000000000) ?>" name="stok" placeholder="Stoklarınızda Bulunan Adet Miktarını Giriniz" aria-label="Stoklarınızda Bulunan Adet Miktarını Giriniz">
                         
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
  
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstName3">
                                Video Script (Youtube vb. platformların yerleştirme kodunu ekleyebilirsiniz) :
                               </label>
                              <div class="row">
                            <div class="col-11">
                                <textarea type="text" class="form-control  " rows="5"   id="urun_adi" name="seo_aciklama"></textarea> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="İlanınızın Arama motorlarında
                                  görünecek Açıklaması "></i>
                            </div>
                                 </div> 
                            </div>
                          </div>
</div>

                        <div class="row">
 
                          <div class="col-md-11">
                                <div class="form-group">
                                  <label>  Ürünün Detaylı Açıklamaları :  <span class="danger">*</span> </label>

     <textarea class="ckeditor" id="editor1"    name="urun_aciklama"></textarea>
    
                              </div>
              
                           </div>
                           <div class="col-md-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürününüzle İlgili Detaylı Açıklama"></i>
                            </div>
                        </div>


   <div class="row">
                          <div class="col-md-6" style="display: none">
                            <div class="form-group">
                              <label for="firstName3">
                              Meta Anahtar Kelimeler
                               </label>
                              <div class="row">
                            <div class="col-11">
                                <input type="text" class="form-control  "  value="<?php echo rand(100000, 90000000000) ?><?php echo rand(100000, 90000000000) ?>" id="urun_adi" name="seo_anahtarkelime"> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Girdiğiniz Meta Etiketlerle birlikte ilanınızın
                                  o kelimelerle birlikte çıkması sağlanacaktır. "></i>
                            </div>
                                 </div> 
                            </div>
                          </div>


                   <div class="col-md-6" style="display: none">

                      <div class="form-group">
                       <label> İndirim Yüzde :  </label> <span class="danger">*</span>
                      <div class="form-group">
                            <div class="row">
                             <div class="col-11">
                       
  <fieldset>
                   <div class="input-group">
                      
                       
                        <input type="number" class="form-control  " value="<?php echo rand(100000, 90000000000) ?><?php echo rand(100000, 90000000000) ?>" name="indirim_yuzde" placeholder="İndirimli Yüzdesini Giriniz"  >
                        <div class="input-group-append">
                          <span class="input-group-text"> % </span>
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
  
                          <div class="col-md-6" style="display: none">
                            <div class="form-group">
                               <label for="urun_kodu">
                                  Ürün Kodu  : <span class="danger">*</span> 
                                <span id="user-availability-status" class="danger"></span> 
                                 <img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
                              </label> 
                            <div class="row">
                             <div class="col-11">

                             
                              <input type="text" class="form-control   " value="<?php echo rand(100000, 90000000000) ?><?php echo rand(100000, 90000000000) ?>" id="urun_kodu" name="urun_kodu">
                            </div>
                          

                               <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Her ürünün kendine ait tanımlayıcı kodu olmalıdır"></i>
                            </div>
                            </div>
                           
                               </div>




                          </div>

                   </div> 
                        </div>
</div></form></div></div></section></div></div>

      </div>

    </div>

 <footer class="footer footer-static footer-light navbar-border navbar-shadow">
 

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

