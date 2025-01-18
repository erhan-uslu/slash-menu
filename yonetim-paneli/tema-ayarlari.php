<?php include 'header.php'; ?>
    <title>   Tema Ayarları  - Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/checkboxes-radios.min.css">

<style type="text/css">
	input[type=radio]:checked+img.img-thumbnail {
    background-color: #666EE8;
    color: #996;
    border-color: #666EE8;
}
</style>
<?php if(isset($_POST['tema_kaydet']))
{ 

$query = $db->prepare("UPDATE `firma_bilgileri` SET  `tema`= ? ");

$update = $query->execute(array(   $_POST['tema']  ));

header('location:./tema-ayarlari.php?durum=true');
  } ?>
    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title">  Tema Ayarları </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active">  Tema Ayarları</li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div> 

        <div class="content-body"><!-- Zero configuration table -->
   <center> <?php   if ($_GET['durum']) {
  ?>
  <div class="alert alert-success alert-dismissible mb-2 col-md-6" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong> Tebrikler! </strong> Güncelleme İşlemi Başarılı... 
                    </div>
                    
                  <?php }  ?> </center>  
<form id="configuration" action="" method="post">
  <div class="row">

 
 <fieldset class="form-group row">
    <?php  

       $slidercon=$db->prepare("SELECT * FROM `temalar` where durum = 1 ");  

       $slidercon->execute(array(  ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>
       <div class="col-md-3" for="<?php echo $slidercek['id'] ?>">
         <div class="card" for="<?php echo $slidercek['id'] ?>">
           <div class="card-body" for="<?php echo $slidercek['id'] ?>">
              <label class="btn">
                <input type="radio" name="tema" id="item5<?php echo $slidercek['id'] ?>" value="<?php echo $slidercek['id'] ?>" class="hidden" <?php if($slidercek['id']==$firmacek['tema']){ echo 'checked'; } ?>>
                <img src="../<?php echo $slidercek['img']; ?>" alt="..." class="img-thumbnail">
              </label>
             <h4 class="mt-2 text-center " style="font-weight: 600" for="item5<?php echo $slidercek['id'] ?>"><?php echo $slidercek['tema_adi'] ?></h4>
             <p class="text-center"><?php echo $slidercek['aciklama'] ?></p>
          <center>   <a class="btn btn-success"  href="#" 
                onClick="MyWindow=window.open('<?php echo $siteyolu. "theme/". $slidercek['tema_adi'] .'/?masa_id_no=1&onizleme=true'  ?>','Onizleme','width=450,height=700'); return false;"
               >  <i class="fas fa-mobile" style="    font-size: 15px;"></i> Önizleme  </a> </center>
           </div>
         </div>

       </div>

<?php } ?>
</div></fieldset>
  <div class="col-md-12 mb-2">
   <button name="tema_kaydet" class="btn btn-success" style="float: left;">Kaydet</button>
 
 </div>
</div>

</form>











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
        <script src="./app-assets/js/scripts/forms/checkbox-radio.min.js"></script>


  </body>

</html>

