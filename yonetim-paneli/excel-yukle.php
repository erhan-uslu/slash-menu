<?php include 'header.php'; function ext($file)
{
    $ext = pathinfo($file);
    return $ext['extension'];
}  ?>
    <title>  Excel İle Ürün Ekle  >  Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">


    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Excel İle Ürün Yükle </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Excel İle Ürün Ekle </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>

      <div class="content-detached content-center">

          <?php if(!isset($_GET['type'])){ ?>
          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

    
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="excel-yukle.php?<?php echo $kat_id ?>&type=read"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="excel-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="fa fa-file-excel"></i> Excel İle Ürün Ekle  </h4>

 
 
 <div class="form-body">  
      <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1">  Slider Resim   </label>

                                <div class="col-md-9">

            <input type="file" id="projectinput1" class="form-control" required="required" placeholder=" Alt Slogan "  name="resim" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"   >

                                </div>
 
                            </div>
     </div>



</div></form></div></div>


</section></div>
<?php } ?>
<?php if(isset($_POST['excel-ekle'])){
set_time_limit(0);
  date_default_timezone_set('Europe/London');

 $kaynak = $_FILES["resim"]["tmp_name"]; // tempdeki adı
 $ad =   '.' . ext($_FILES["resim"]["name"]); // dosya adı
$tip = $_FILES["resim"]["type"]; // dosya tipi
$boyut = $_FILES["resim"]["size"]; // boyutu
$rand = rand(5000000000000,50000000000000000);
$uzanti =  ext($ad);  
$hedef = "./upload/" .  $rand . '.' . $uzanti ;  // başta açtıgımız klasör adımız..
         
 
       $kaydet = move_uploaded_file($kaynak,$hedef); // resmimizi klasöre kayıt ettiriyoruz.
          
            if($kaydet) { 
  include 'PHPExcel/IOFactory.php';
  $inputFileName = $hedef;
  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
  $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

   }

   else { echo '<center><h4>Excel Yüklemedi, Yeniden Deneyiniz </h4></center>'; }
} ?>

<?php if (isset($_POST['stok-yonetimi'])) {

  $resimyol  =  "./images/default-img.png" ;
include '../fonksiyon.php';

  
          for ($i=1; $i <=$_POST['count'] ; $i++) { 
             
        echo $urun_adi  =  seo($_POST['urun_adi'.$i]);
        echo  $i . '<br>';
  if(isset($_POST['urun_adi'.$i])){
           $query = $db->prepare("INSERT INTO `urunler` (`id`, `urun_adi`,   `urun_kategori`, `urun_alt_kategori`, `urun_fiyat`, `seo_url`, `seo_aciklama`, 
  `urun_aciklama`, `urun_resim`, `sira`, `kat_id`, 
   `magaza_id`, `urun_marka`,  `seo_anahtarkelime`, `durum`, `stok`, `kdv`, `indirim_yuzde`  ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 1, 1, 1, 1, 1, 1);");
 
$update = $query->execute(array( $_POST['urun_adi'.$i], $_POST['urun_kategori'.$i], '', $_POST['urun_fiyati'.$i], 
          $urun_adi , ''   , $_POST['urun_aciklama'.$i] , $resimyol ,  '1'  , $kat_id   ));  
        }}
    header("Location:./excel-yukle.php?durum=okey" . '&departman=' . $kat_id);

    } ?>
 <?php if(isset($_GET['type'])){  ?>
<section id="configuration">

    <div class="row">

        <div class="col-12">

             <div class="card">
 <form action="" method="get">
                <div class="card-header">

                    <h4 class="card-title"> Excel Yönetimi
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="slider-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Excel İle Ürün Ekle  </button></h4>
                      <input type="hidden" name="departman" value="<?php echo $kat_id ?>">
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



<form    action="" method="post">
  <div class="col-md-12 mb-3">
 
        <button type="submit" name="stok-yonetimi" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button>                 
                      </div>
 
                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                     <th> Kategori </th>

                                    <th> Ürün Adı </th>

                                    <th>Fiyatı </th>
                                    <th>Ürün Açıklaması </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>


                                     <th> Kategori </th>

                                    <th> Ürün Adı </th>

                                    <th>Fiyatı </th>
 
                                    <th>Ürün Açıklaması </th>
 
                                </tr>

                            </tfoot>

                            <tbody>

  
    <?php $count = 0 ; foreach ($sheetData as $key => $value) {   if($value["A"] !== 'Kategori Id'){ 
 
   if(isset($value["B"])){   $count ++;    ?>
      
      <tr>
 <td>        <?php $kategoriler = $db->query('SELECT * FROM kategoriler Where ust_id=0 and kat_id='.$kat_id.' ORDER BY kategori_ad ASC')->fetchAll(PDO::FETCH_ASSOC); ?>
               <select name="urun_kategori<?php echo $count; ?>" class="jui-select-default form-control  " id="urun_kategori" >
                           <option value="">- Kategori Seçin -</option>   
                            <?php foreach($kategoriler as $kategori): ?>
                 <option <?php if($value["A"]==$kategori['id']){ echo 'selected="selected"'; } ?> value="<?=$kategori['id']?>"><?=$kategori['kategori_ad']?></option>
                 <?php endforeach; ?>
                        </select> 
                              </td>
 <td> <input type="text" class="form-control  " placeholder="Ürünün Adını Giriniz" value="<?php    echo $value["B"]  ?>"  id="urun_adi<?php echo $count; ?>" name="urun_adi<?php echo $count; ?>">  </td>
 <td> <input type="text" class="form-control  " placeholder="Ürünün Adını Giriniz" value="<?php    echo $value["C"]  ?>"  id="urun_fiyat<?php echo $count; ?>" name="urun_fiyati<?php echo $count; ?>">  </td>
 <td>      <textarea class="form-control  "     name="urun_aciklama<?php echo $count; ?>"><?php    echo $value["D"]  ?></textarea>
  </td>
  <td></td>
 
       </tr>  
         <?php   }}}   ?>
 

 


                            </tbody>

                        

                        </table>
                        <input type="hidden" name="count" value="<?php echo $count; ?>">
</form>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php } ?>


</div>

      </div>

    </div> 

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

