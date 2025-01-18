<?php include 'header.php'; ?>
<title> Ürünü Düzenle  - Rafta Hazır</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
   <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/switchery.min.css">

   <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-switch.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/switch.css">
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css">

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

  <?php  

       $yonetciduzenlecon=$db->prepare("SELECT * FROM `urunler` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['urun_id'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  ?>

<?php  if (!isset($_GET['tur'])) {
    $tur = 'genelozellikler';
}  else { $tur = $_GET['tur']; } ?>

    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">

            <h3 class="content-header-title">Ürün Düzenle   </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active">Ürün Düzenle</li>

               

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

                      <div class="form form-horizontal " >
 <div class="row">
                          <div class="col-xl-12 col-lg-12">
           <div class="card-content">
          <div class="card-body">
            <ul class="nav nav-tabs nav-linetriangle">
              <li class="nav-item">
              <a class="nav-link <?php if($tur=='genelozellikler'){ echo 'active'; } ?>"  
                href="urun-duzenle.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=genelozellikler&departman=<?php echo $kat_id ?>"  >

               <div><i class="fas fa-file-alt fa-3x"></i></div>
               Ürünün Genel Bilgileri  </a>
              </li>
              <li class="nav-item">
              <a class="nav-link <?php if($tur=='varyantlar'){ echo 'active'; } ?>"  
               href="urun-duzenle.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=varyantlar&departman=<?php echo $kat_id ?>"  >
                  <div><i class="fas fa-list-ul fa-3x"></i></div>  Varyantlar  </a>
              </li>
                <li class="nav-item">
              <a class="nav-link <?php if($tur=='gorseller'){ echo 'active'; } ?>"  
                href="urun-duzenle.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=gorseller&departman=<?php echo $kat_id ?>"  >
                  <div><i class="far fa-images fa-3x"></i></div> Görseller   </a>
              </li>
                <li class="nav-item" style="display: none;">
              <a class="nav-link <?php if($tur=='teknikozellikler'){ echo 'active'; } ?>"  
               href="urun-duzenle.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=teknikozellikler&departman=<?php echo $kat_id ?>"  >
                  <div><i class="fas fa-info-circle  fa-3x"></i></div> Teknik Özellikler </a>
              </li>
             
            </ul>
           
         </div>
      </div>
    </div>
</div>
 <?php if($tur=='genelozellikler'){ ?> 
  <form method="POST" action="islemler/islem.php?id=<?php echo $_GET['urun_id'] ?>&departman=<?php echo $kat_id ?>"  enctype="multipart/form-data">
     <div class="col-xl-12 col-lg-12">
  
     <button type="submit" name="urun-duzenle" value="urunler" class="btn btn-info btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet ve Çık</button> 
      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="urun-duzenle" value="urun-duzenle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet ve Devam Et</button> <br><br><br>

</div>
  
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
                              <label for="firstName3">
                               Ürün Adı :
                                <span class="danger">* </span> 
                              </label>
                              <div class="row">
                            <div class="col-11">  
                                <input type="text" class="form-control  "  value="<?php echo $yonetciduzenlecek['urun_adi']; ?>"  id="urun_adi" name="urun_adi"> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="İlanda Görünecek Ana Başlık"></i>
                            </div>
                                 </div> 
                            </div>
                          </div>
                            <div class="col-md-6" style="display: none">
                            <div class="form-group">
                              <label for="firstName3">
                               Seo Url :
                                <span class="danger">* </span> 
                              </label>
                              <div class="row">
                            <div class="col-11">  
                                <input type="text" class="form-control  "  value="<?php echo $yonetciduzenlecek['seo_url']; ?>"  id="urun_adi" name="seo_url"> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="linklerde görünecek url"></i>
                            </div>
                                 </div> 
                            </div>
                          </div>
                         </div>
  <div class="row">
                          
                          <div class="col-md-6" style="display: none">
                            <div class="form-group">
                               <label for="urun_kodu">
                                  Ürün Kodu  : <span class="danger">*</span> 
                                <span id="user-availability-status" class="danger"></span> 
                                 <img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
                              </label> 
                            <div class="row">
                             <div class="col-11">

                             
                              <input type="text" class="form-control " disabled="disabled" value="<?php echo $yonetciduzenlecek['urun_kodu']; ?>"  onBlur="checkAvailability()" id="urun_kodu" name="urun_kodu">
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
                 <option 
                  <?php if($kategori['id']==$yonetciduzenlecek['urun_kategori']) {
                    echo 'selected="selected"';} ?> value="<?=$kategori['id']?>"><?=$kategori['kategori_ad']?></option>
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
           <select name="urun_alt_kategori" id="alt_kategori" class="jui-select-default form-control" >
                           <option>- Alt Kategori Seçin -</option>
                             <?php 
       $sektor2=$db->prepare("SELECT * FROM kategoriler where ust_id=? ");  
       $sektor2->execute(array(  $yonetciduzenlecek['urun_kategori']  ));     
      while ($sektorcek2=$sektor2 -> fetch(PDO:: FETCH_ASSOC)){ ?>

      <option <?php if($yonetciduzenlecek['urun_alt_kategori']==$sektorcek2['id'])
                   { echo 'selected="selected"';} ?> 
        value="<?php echo $sektorcek2['id']; ?>">  <?php echo $sektorcek2['kategori_ad']; ?></option>

                                     <?php  } ?>
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
                       
                        <input type="text" class="form-control  " value="<?php echo $yonetciduzenlecek['urun_fiyat']; ?>" name="urun_fiyat" placeholder="İndirimli Ürün Fiyatını Giriniz" aria-label="İndirimli Ürün Fiyatını Giriniz">
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
                       <label> Sipariş Hazırlanma Süresi :  </label> <span class="danger">*</span>
                      <div class="form-group">
                         <div class="row">
                             <div class="col-11">
                   <fieldset>
                   <div class="input-group">
                      
                       
                        <input type="number" class="form-control  "  value="<?php echo $yonetciduzenlecek['kdv']; ?>" name="kdv" placeholder="Sipariş Hazırlanma Süresi Giriniz"  >
                        <div class="input-group-append">
                          <span class="input-group-text"> % </span>
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
                   <div class="col-md-6"  >

                      <div class="form-group">
                       <label> Ürün Durumu :  </label> <span class="danger">*</span>
                      <div class="form-group">
                            <div class="row">
                             <div class="col-11">
                       
  <fieldset>
                   <div class="input-group">
                       <input type="checkbox" class="switch" id="switch1" name="durum"  value="1"
                          <?php   if ($yonetciduzenlecek['durum']>=1) {
                            echo 'checked="checked"';
                          } ?>
                        />
                       
                        <input type="number" class="form-control  " style="display: none" value="<?php echo $yonetciduzenlecek['indirim_yuzde']; ?>"  name="indirim_yuzde" placeholder="İndirimli Yüzdesini Giriniz"  >
 
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
                    <div class="row" style="display: none">
                       
                   <div class="col-md-6">
                     <div class="form-group">
                              <label> Stok Adedi :  <span class="danger">*</span> </label>
                   <div class="row">
                             <div class="col-11">
                       <fieldset>
                   <div class="input-group">
                       <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fab fa-dropbox"></i></span> </div>
                       
                        <input type="number" class="form-control  "  value="<?php echo $yonetciduzenlecek['stok']; ?>"   name="stok" placeholder="Stoklarınızda Bulunan Adet Miktarını Giriniz" aria-label="Stoklarınızda Bulunan Adet Miktarını Giriniz">
                         
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
                          <div class="col-md-6" style="display: none">
                            <div class="form-group">
                              <label for="firstName3">
                              Meta Anahtar Kelimeler
                               </label>
                              <div class="row">
                            <div class="col-11">
                                <input type="text" class="form-control  "  value="<?php echo $yonetciduzenlecek['seo_anahtarkelime']; ?>"  id="urun_adi" name="seo_anahtarkelime"> 
                            </div>
                            <div class="col-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
                                 class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Girdiğiniz Meta Etiketlerle birlikte ilanınızın
                                  o kelimelerle birlikte çıkması sağlanacaktır. "></i>
                            </div>
                                 </div> 
                            </div>
                          </div>

                        </div>
<div class="row">
  
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstName3">
                                Video Script (Youtube vb. platformların yerleştirme kodunu ekleyebilirsiniz) :
                               </label>
                              <div class="row">
                            <div class="col-11">
                                <textarea type="text" class="form-control  " rows="5"   id="urun_adi"
                                 name="seo_aciklama"><?php echo $yonetciduzenlecek['seo_aciklama']; ?></textarea> 
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

     <textarea class="ckeditor" id="editor1"    name="urun_aciklama"><?php echo $yonetciduzenlecek['urun_aciklama']; ?></textarea>
    
                              </div>
              
                           </div>
                           <div class="col-md-1">
                              <i class="fas fa-question-circle"   style="font-size:25px;" 
        class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Ürününüzle İlgili Detaylı Açıklama"></i>
                            </div>
                        </div>

</form>
</div>  
<?php } ?>

 <?php if($tur=='teknikozellikler'){ ?> 
       
<script>
$(document).ready(function() {
        $("#teknikozellikler").load("Ajax-form/teknik-ozellikler.php?urun_id=<?php echo $_GET['urun_id'] ?>");
});

setInterval(function() {$("#teknikozellikler").load('Ajax-form/teknik-ozellikler.php?urun_id=<?php echo $_GET['urun_id'] ?>');}, 100000);
</script>
 
  <div class="form-body">
  <h4 class="form-section"> <i class="fas fa-info-circle"></i> Temel Teknik Özellikler </h4>
  <hr>
   
      <div class="row">
      	<div class="col-md-4">
      		<?php if(isset($_GET['tip'])) { ?>

    <form id="example" action="islemler/islem.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=teknikozellikler&id=<?php echo $_GET['id'] ?>&departman=<?php echo $kat_id ?>" Method="post" >

<?php $firma=$db->prepare("SELECT * FROM urun_teknik_ozellikleri  where id=?  ");  

       $firma->execute(array( $_GET['id'] ));
        $firmacek=$firma -> fetch(PDO:: FETCH_ASSOC);  ?>
        <div class="col-lg-12">
        <div class="row">
          
                          <div class="col-md-12">
                               <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label>  Teknik Özellik Adı :  <span class="danger">*</span> </label>

  <input type="text" class="form-control "  name="teknik_ozellik_adi" value="<?php echo $firmacek['teknik_ozellik_adi'] ?>" placeholder="Teknik Özellik Adı "  >
    
                              </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label>  Değeri :  <span class="danger">*</span> </label>

  <input type="text" class="form-control " value="<?php echo $firmacek['teknik_ozellik_detay'] ?>" name="teknik_ozellik_detay" placeholder="Değeri"  >
    
                              </div>
                                 </div>
                               </div>
              
                           </div>
                           <div class="col-md-12">
 <button type="submit" name="teknikozellikler-duzenle" class="btn btn-success btn-min-width col-md-12 box-shadow-2 mr-1 mb-1 mt-2">Kaydet</button>
                           </div>
        </div>
      </div>
    </form> 


      			<?php } else { ?>

    <form id="example" action="islemler/islem.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=teknikozellikler&id=<?php echo $_GET['id'] ?>&departman=<?php echo $kat_id ?>" Method="post" >
      <div class="col-lg-12">
        <div class="row">
          
                          <div class="col-md-12">
                               <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label>  Teknik Özellik Adı :  <span class="danger">*</span> </label>

  <input type="text" class="form-control "  name="teknik_ozellik_adi" placeholder="Teknik Özellik Adı "  >
    
                              </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label>  Değeri :  <span class="danger">*</span> </label>

  <input type="text" class="form-control " name="teknik_ozellik_detay" placeholder="Değeri"  >
    
                              </div>
                                 </div>
                               </div>
              
                           </div>
                           <div class="col-md-12">
 <button type="submit" name="teknikozellikler-ekle" class="btn btn-success btn-min-width col-md-12 box-shadow-2 mr-1 mb-1 mt-2">Kaydet</button>
                           </div>
        </div>
      </div>
    </form> 
    
      			<?php } ?>
      	</div>
      	<div class="col-8">
      		<div id="teknikozellikler"></div>
      	</div>
      </div>
      
  
   
     
   </div>
  <?php } ?>


 <?php if($tur=='gorseller'){ ?> 
   
 
  <div class="form-body">
  <h4 class="form-section"> <i class="fas fa-info-circle"></i> Görseller  </h4>
  <hr>
   
      <div class="row">
       <div class="col-md-3">
 <form id="example" action="islemler/islem.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=gorseller&departman=<?php echo $kat_id ?>" Method="post" enctype="multipart/form-data" >
      <div class="col-lg-12">
        <div class="row">
          
                          <div class="col-md-12">
                               <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label> Resim Adı :    </label>

  <input type="text" class="form-control "  name="resim_ad" placeholder="Teknik Özellik Adı "  >
    
                              </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label>  Resim :  <span class="danger">*</span> </label>

  <input type="file" class="form-control " name="resim" placeholder="Değeri"  >
    
                              </div>
                                 </div>
                               </div>
              
                           </div>
                           <div class="col-md-12">
 <button type="submit" name="urunresim-ekle" class="btn btn-success btn-min-width col-md-12 box-shadow-2 mr-1 mb-1 mt-2">Kaydet</button>
                           </div>
        </div>
      </div>
    </form> 
       </div>
               <div class="col-md-9">
                <div class="row">
                 
<?php  

    

       $firma=$db->prepare("SELECT * FROM urun_resim  where urun_id=? order by sira asc");  

       $firma->execute(array( $_GET['urun_id'] ));
    
        while ( $firmacek=$firma -> fetch(PDO:: FETCH_ASSOC)){   ?>

                  <div class="col-md-3">
                    <div class="container2">
  <img src="../<?php echo $firmacek['resim_yol']; ?>" alt="<?php echo $firmacek['resim_ad']; ?>" class="image2" style="width:100%">
  <div class="middle2">
    <div class="text2"> <?php echo $firmacek['resim_ad']; ?> </div>
      <div class="text3"> 
       <a  href="islemler/islem.php?deleteurunresim=<?php echo $firmacek['resim_id']; ?>&urun_id=<?php echo $_GET['urun_id'] ?>&departman=<?php echo $kat_id ?>" class="btn btn-danger     btn-min-width col-md-12 box-shadow-2 "> 
        <i class="fas fa-trash"></i> Sil</a>
</div>
  </div>
</div>
                  </div>

                <?php } ?>

                </div>
           
             </div>
      </div>
      
  
   
     
   </div>
  <?php } ?>








 <?php if($tur=='varyantlar'){ ?> 
   

  <center><?php if (isset($_POST['urun-varyan-yonetimi'])) {
  $yonetcicon1=$db->prepare("SELECT * FROM `urun_varyantlar` where ust_id=? and urun_id=? order by id asc ");  

       $yonetcicon1->execute(array(  0 , $_GET['urun_id'] ));


                           
   while ( $yonetcicek1=$yonetcicon1 -> fetch(PDO:: FETCH_ASSOC)){ 



       $yonetcicon=$db->prepare("SELECT * FROM `urun_varyantlar` where ust_id=? order by id asc ");  

       $yonetcicon->execute(array(  $yonetcicek1['id']   ));

                           
                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){


 if (!isset($_POST['durum'.$yonetcicek['id']])) {
    $durum  ='0';
 } else {  $durum  ='1';  }
 



 $query = $db->prepare("UPDATE `urun_varyantlar` SET   `varyant_ad` =  ?, `stok` =  ?, `fiyat` = ?, `durum` = ? WHERE `urun_varyantlar`.`id` = ?");
 
  $update = $query->execute(array( $_POST['varyant_ad-'.$yonetcicek['id']] ,  $_POST['stok'.$yonetcicek['id']] ,  $_POST['fiyat'.$yonetcicek['id']] ,  $durum  , 
         $yonetcicek['id']  ));
   
  
 

 }} } ?></center>


  <div class="form-body">
  <h4 class="form-section"> <i class="fas fa-info-circle"></i> Varyantlar  </h4>
   <center> <?php   if ($update) {
  ?>
  <div class="alert alert-success alert-dismissible mb-2 col-md-6" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong> Tebrikler! </strong> Güncelleme İşlemi Başarılı... 
                    </div>
                    
                  <?php }  ?> </center>  

  <hr>
   
      <div class="row">
       <div class="col-md-3">

 <form id="example5" action="islemler/islem.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=varyanlar&departman=<?php echo $kat_id ?>" Method="post" enctype="multipart/form-data" >
      <div class="col-lg-12">
        <div class="row">
          
                          <div class="col-md-12">
                               <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label> Ürün Seçiniz :    </label>

      <select name="urun_id" class="jui-select-default form-control  " >
                           <option value="">- Ürün Seçiniz -</option>   
                            <?php  $yonetcicon1=$db->prepare("SELECT * FROM `urunler`  order by urun_adi asc ");  

       $yonetcicon1->execute(array(   ));

                           
                                       while ( $yonetcicek1=$yonetcicon1 -> fetch(PDO:: FETCH_ASSOC)){  ?>
                 <option  
                   value="<?=$yonetcicek1['id']?>"><?=$yonetcicek1['urun_adi']?></option>
                  <?php } ?>
                        </select> 
                              </div>
                                 </div>
                                
                               </div>
              
                           </div>
                           <div class="col-md-12">
 <button type="submit" name="urunvaryant-kopyala" class="btn btn-success btn-min-width col-md-12 box-shadow-2 mr-1 mb-1 mt-2">Varyant Kopyala</button>
                           </div>
        </div>
      </div>
    </form> 
 <form id="example5" action="islemler/islem.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=varyanlar&departman=<?php echo $kat_id ?>" Method="post" enctype="multipart/form-data" >
      <div class="col-lg-12">
        <div class="row">
          
                          <div class="col-md-12">
                               <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                  <label> Varyant Adı :    </label>

  <input type="text" class="form-control "  name="varyant_ad" placeholder="Teknik Özellik Adı "  >
    
                              </div>
                                 </div>
                                
                               </div>
              
                           </div>
                           <div class="col-md-12">
 <button type="submit" name="urunvaryant-ekle" class="btn btn-success btn-min-width col-md-12 box-shadow-2 mr-1 mb-1 mt-2">Kaydet</button>
                           </div>
        </div>
      </div>
    </form> 
<br>
  <h4 class="form-section"> <i class="fas fa-info-circle"></i> Varyant Detay  </h4>
<hr>

 <form id="example2" action="islemler/islem.php?urun_id=<?php echo $_GET['urun_id'] ?>&tur=varyantlar&departman=<?php echo $kat_id ?>" Method="post"  >
   <div class="col-md-12">

                               <div class="row">
   <div class="col-md-12">
                                    <div class="form-group">
                                  <label> Varyant Grup :    </label>
 
  <select name="ust_id" class="jui-select-default form-control  " >
                           <option value="">- Varyant Grubunu Seçiniz -</option>   
                            <?php  $yonetcicon1=$db->prepare("SELECT * FROM `urun_varyantlar` where ust_id=? and urun_id=? order by id asc ");  

       $yonetcicon1->execute(array(  0 , $_GET['urun_id'] ));

                           
                                       while ( $yonetcicek1=$yonetcicon1 -> fetch(PDO:: FETCH_ASSOC)){  ?>
                 <option  
                   value="<?=$yonetcicek1['id']?>"><?=$yonetcicek1['varyant_ad']?></option>
                  <?php } ?>
                        </select> 

                              </div>
                                 </div>

   <div class="col-md-12">
                                    <div class="form-group">
                                  <label> Varyant Adı :    </label>

  <input type="text" class="form-control "  name="varyant_ad" placeholder="Teknik Özellik Adı "  >
    
                              </div>
                                 </div>

   <div class="col-md-12" style="display: none">
                                    <div class="form-group">
                                  <label> Stok :    </label>

  <input type="text" class="form-control "  value="1000" name="stok" placeholder="Teknik Özellik Adı "  >
    
                              </div>
                                 </div>

   <div class="col-md-12">
                                    <div class="form-group">
                                  <label> Fiyat :    </label>

  <input type="text" class="form-control "  name="fiyat" placeholder="Teknik Özellik Adı "  >
    
                              </div>
                                 </div>

   <div class="col-md-12">
                                    <div class="form-group">
 
 <button type="submit" name="urunvaryantgrup-ekle" class="btn btn-success btn-min-width col-md-12 box-shadow-2 mr-1 mb-1 mt-2">Kaydet</button>
    
                              </div>
                                 </div>
                                
                               </div>
              
  </div>

 </form>
       </div>
               <div class="col-md-9">
                   <div class="card-content collapse show">

                    <div class="card-body card-dashboard">

     


  <form    action="" method="post">

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-3" style="float: right; " >Vazgeç</button></a>

        <button type="submit" name="urun-varyan-yonetimi" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-3" style="float: right;">Kaydet</button>         

           <?php  

          $yonetcicon1=$db->prepare("SELECT * FROM `urun_varyantlar` where ust_id=? and urun_id=? order by id ASC ");  

       $yonetcicon1->execute(array(  0 , $_GET['urun_id'] ));

                           
                                       while ( $yonetcicek1=$yonetcicon1 -> fetch(PDO:: FETCH_ASSOC)){  ?>
                                        <a href="islemler/islem.php?deleteurunvaryant=<?php echo $yonetcicek1['id']; ?>&urun_id=<?php echo $_GET['urun_id'] ?>&tur=varyantlar&departman=<?php echo $kat_id ?>" 
 ><button type="button" class="btn btn-icon btn-danger mr-1" style="float: right; " ><i class="fa fa-trash"></i></button></a> 
       <h4 class="form-section mt-2"> <i class="fas fa-info-circle"></i> <?php echo $yonetcicek1['varyant_ad'] ?>        </h4>

  <hr>              



                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>
                                   
                                   <th> İd               </th>
                                    <th>  Varyant Adı     </th>
                                     <th>  Fiyat(₺)            </th>

                                   <th> Varyant Durumu   </th> 
                                   <th style="display: none;"></th> 
                                   <th>İşlemler</th>
                                  </tr>

                            </thead>

                                <tfoot>

                                <tr>
                                     <th> İd               </th>
                                    <th>  Varyant Adı     </th>
                                 <th>  Fiyat(₺)            </th>

                                   <th> Varyant Durumu   </th>  
                                    <th>İşlemler</th>

                                </tr>

                            </tfoot>

                            <tbody>
 


                                 <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `urun_varyantlar` where ust_id=? order by id asc ");  

       $yonetcicon->execute(array(  $yonetcicek1['id']   ));

                           
                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                    
                                     
                                     <tr>      

                                    <td><?php echo $yonetcicek['id']; ?></td>

 

                                    <td  ><input type="" style="<?php if ($yonetcicek['stok']>0) {
                                  echo 'border:1px solid green';
                                } else {  echo 'border:1px solid red ;'; } ?>" class="form-control"  name="varyant_ad-<?php echo $yonetcicek['id']; ?>"  value="<?php echo $yonetcicek['varyant_ad']; ?>"></td>

                                    <td style="display: none;"><input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetcicek['stok']; ?>"  placeholder="Ürün Stoğu  ..."  name="stok<?php echo $yonetcicek['id']; ?>">
 </td>

                                  <td><input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $yonetcicek['fiyat']; ?>"  placeholder="Ürün Fiyatı  ..."  name="fiyat<?php echo $yonetcicek['id']; ?>">
 </td>

                                   <td>  <fieldset>
                      <div class="float-left">
                        <input type="checkbox" class="switch"   <?php   if ($yonetcicek['durum']>=1) {
                            echo 'checked="checked"';
                          } ?>  id="switch1" name="durum<?php echo $yonetcicek['id']; ?>"  value="1" />
                          
                       
                      </div>
                    </fieldset>   </td>


                                  
        <td> <a href="islemler/islem.php?deleteurunvaryant=<?php echo $yonetcicek['id']; ?>&urun_id=<?php echo $_GET['urun_id'] ?>&tur=varyantlar&departman=<?php echo $kat_id ?>"  ><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a>  </td>
                                   
                                </tr> 

                                <?php } ?>

                            </tbody>

                        

                        </table>

                        <?php } ?>
                     </form>
               
                    </div>

                </div>
           
             </div>
      </div>
      
  
   
     
   </div>
  <?php } ?>










                      </div></div></div></section></div></div>

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
   <!-- END MODERN JS-->
 <script src="./app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"
  type="text/javascript"></script>
  <script src="./app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
  type="text/javascript"></script>
  <script src="./app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <script src="./app-assets/js/scripts/forms/switch.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL JS-->

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
<style>
.container2 {
  position: relative;
  width: 100%;
}

.image2 {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle2 {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container2:hover .image2 {
  opacity: 0.3;
}

.container2:hover .middle2 {
  opacity: 1;
}

.text2 {
  background-color:   #1e9ff2;
   color:white;
  font-size: 16px;
  padding: 16px 32px;
}
.text3 {
   color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
</html>

