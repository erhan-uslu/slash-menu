<?php include 'header.php'; ?>
    <title> Ürünler >  Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
 
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

   <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-switch.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/switch.css">
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/toggle/switchery.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Ürünler</h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Ürünler </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div> 
 



 <center><?php if (isset($_POST['stok-yonetimi'])) {
  
       $stokdurum=$db->prepare("SELECT * FROM `urunler` order by id asc  ");  

       $stokdurum->execute(array(  ));
 
  while ( $stokupdate=$stokdurum -> fetch(PDO:: FETCH_ASSOC)){

if (isset($_POST['urun_adi'.$stokupdate['id']])) {


 if (!isset($_POST['durum'.$stokupdate['id']])) {
    $onerilen  ='0';
 } else {  $onerilen  ='1';  }
 
 
 $query = $db->prepare("UPDATE `urunler` SET urun_adi=?, urun_fiyat=?, durum=? WHERE id=?");
 
  $update = $query->execute(array( $_POST['urun_adi'.$stokupdate['id']] ,  $_POST['urun_fiyat'.$stokupdate['id']] ,  $onerilen  ,   $stokupdate['id']  ));
   
  
 }

 } } ?></center>










        <div class="content-body"><!-- Zero configuration table -->

<section id="configuration">

    <div class="row">

        <div class="col-12">

             <div class="card">
                 <div class="card-header">

                    <h4 class="card-title"> Ürünler
                    <a href="urun-ekle.php?departman=<?php echo $kat_id; ?>"> <button type="submit" class="btn btn-icon btn-success mr-1" name="slider-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Ürün  Ekle  </button></a></h4>

                         <center> <?php   if ($update) {
  ?>
  <div class="alert alert-success alert-dismissible mb-2 col-md-6" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong> Tebrikler! </strong> Güncelleme İşlemi Başarılı... 
                    </div>
                    
                  <?php }  ?> </center>  
<form action="" method="get" class="mt-3">
  
        <?php $kategoriler = $db->query('SELECT * FROM kategoriler Where ust_id=0 and kat_id='.$kat_id.' ORDER BY kategori_ad ASC')->fetchAll(PDO::FETCH_ASSOC); ?>
                          <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <input type="hidden" name="departman" value="<?php echo $kat_id ?>">
                       <label> Kategoriler :  </label> <span class="danger">*</span>

    <div class="row">
                             <div class="col-12">
                        <select name="kat_id" class="jui-select-default form-control  " required="required" id="urun_kategori" >
                           <option value="">- Kategori Seçin -</option>   
                            <?php foreach($kategoriler as $kategori): ?>
                 <option 
                  <?php if($kategori['id']==$_GET['kat_id']) {
                    echo 'selected="selected"';} ?> value="<?=$kategori['id']?>"><?=$kategori['kategori_ad']?></option>
                 <?php endforeach; ?>
                        </select> 
                      </div>
 
                    </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                                     <label> Alt Kategori : </label>
          <div class="row">
                             <div class="col-12">
           <select name="sub_kat_id" id="alt_kategori" class="jui-select-default form-control" >
                           <option value="null">- Alt Kategori Seçin -</option>
                             <?php 
       $sektor2=$db->prepare("SELECT * FROM kategoriler where ust_id=? ");  
       $sektor2->execute(array(  $_GET['kat_id']  ));     
      while ($sektorcek2=$sektor2 -> fetch(PDO:: FETCH_ASSOC)){ ?>

      <option <?php if($_GET['sub_kat_id']==$sektorcek2['id'])
                   { echo 'selected="selected"';} ?> 
        value="<?php echo $sektorcek2['id']; ?>">  <?php echo $sektorcek2['kategori_ad']; ?></option>

                                     <?php  } ?>
                           </select>
                         </div>
 


                       </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                               <div class="form-group pt-2">
                              <div class="col-md-12">  <button type="submit" class="btn btn-icon btn-success mr-1  " style="margin-top: 5px;"  > Flitrele  </button></div>
                        </div></div></div>
</form>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
                 <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm Ürünlerı görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>
<form    action="" method="post">
  <div class="col-md-12 mb-3">
 
        <button type="submit" name="stok-yonetimi" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button>                 
                      </div>
                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                               <tr>
                                    <th>Sıralama</th>
                                    <th ></th>
                                    <th style="display: none"></th>
                                    <th> Resim </th>

                                     <th> Ürün Adı    </th>

                                     <th>  Fiyat     </th> 
                                     <th>  Durum     </th> 
                                    <th>  İşlemler  </th>
                                </tr>

                            </thead>

                                <tfoot>

                                <tr>
                                    <th>Sıralama</th>
                                    <th  ></th>

                                    <th> Resim </th>

                                     <th> Ürün Adı    </th>

                                     <th>  Fiyat     </th> 
                                     <th>  Durum     </th> 
                                    <th>  İşlemler  </th>
                                </tr>

                            </tfoot>

                            <tbody class="row_position">

                                 <?php  
                       
 if (!isset($_GET['kat_id'])  || $_GET['kat_id']=='null') {
                         $slidercon=$db->prepare("SELECT * FROM `urunler` where kat_id=?  order by sira ASC ");  

       $slidercon->execute(array( $kat_id  ));
                        } 
                       else  if ($_GET['sub_kat_id']=='null') {
                         $slidercon=$db->prepare("SELECT * FROM `urunler` where urun_kategori=? and  kat_id=? order by sira ASC ");  

       $slidercon->execute(array(  $_GET['kat_id'] , $kat_id  ));
                        } 
                          else  {
                         $slidercon=$db->prepare("SELECT * FROM `urunler` where urun_kategori=? and urun_alt_kategori=? and  kat_id=?  order by sira ASC ");  

       $slidercon->execute(array(  $_GET['kat_id'] , $_GET['sub_kat_id']  , $kat_id ));
                        }
      

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     
 
                                       <tr id="<?php echo $slidercek['id']; ?>">      
                                      <td><label class="btn btn-icon btn-primary mr-1"><i class="fa fa-bars"></i></label></td> 
                                    <td><?php echo $slidercek['sira']; ?></td>

                                    <td> <img src="../<?php echo $slidercek['urun_resim']; ?>" style="height: 70px;" >  </td>

                                          <td><input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $slidercek['urun_adi']; ?>"  placeholder="Ürün Adı  ..."  name="urun_adi<?php echo $slidercek['id']; ?>"></td>

                                    <td><input type="text" id="projectinput1" class="form-control" 
                                  value="<?php echo $slidercek['urun_fiyat']; ?>"  placeholder="Ürün Fiyatı  ..."  name="urun_fiyat<?php echo $slidercek['id']; ?>"></td>
                                    
                         
                            <td>  <fieldset>
                      <div class="float-left">
                        <input type="checkbox"   <?php   if ($slidercek['durum']>=1) {
                            echo 'checked="checked"';
                          } ?>  class="switch" id="switch1" name="durum<?php echo $slidercek['id']; ?>"  value="1"
                            />
                      </div>
                    </fieldset>  </td>
                                     <td>
                                      <a href="urun-duzenle.php?urun_id=<?php echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>"><button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                                      

                                      <a href="islemler/islem.php?deleteurunler=<?php echo $slidercek['id']; ?>&departman=<?php echo $kat_id ?>"><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a> 



                                    </td>

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

  
<script type="text/javascript">
    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
        $.ajax({
            url:"UrunAjax.php",
            type:'post',
            data:{position:data},
            success:function(){
               toastr.success('İşlem Başarılı');

            }
        })
    }
</script>

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

    <!-- BEGIN VENDOR JS-->

    <script src="./app-assets/vendors/js/vendors.min.js"></script>

    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN PAGE VENDOR JS-->

    <script src="./app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN MODERN JS-->
   <!-- BEGIN PAGE LEVEL JS-->
        <script src="./app-assets/js/scripts/extensions/toastr.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/toastr.min.js"></script>

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

  </body>

</html>

