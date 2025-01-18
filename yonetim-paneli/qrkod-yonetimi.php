<?php include 'header.php'; 

 function qrCode($s, $w = 250, $h = 250){
  $u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
  $url = sprintf($u, $w, $h, $s);
    return $url;
} 
 ?>
    <title>   Qrkod Yönetimi - Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/checkboxes-radios.min.css">

<style type="text/css">
	input[type=radio]:checked+img.img-thumbnail {
    background-color: #666EE8;
    color: #996;
    border-color: #666EE8;
}
 
.table th, .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 0px solid #626E82; 
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



            <h3 class="content-header-title">   Qrkod Yönetimi </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active">   Qrkod Yönetimi</li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div> 

        <div class="content-body"><!-- Zero configuration table -->
  <div class="row">
    <div class="col-md-12 col-lg-5">
      <form id="configuration" action="" method="post">
 <fieldset class="form-group row">
    <?php  

       $slidercon=$db->prepare("SELECT * FROM `katlar` where id=? ");  

       $slidercon->execute(array( $kat_id ));

                                      $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC); ?>
       <div class="col-md-12" for="<?php echo $slidercek['id'] ?>">
         <div class="card" for="<?php echo $slidercek['id'] ?>">
           <div class="card-body" for="<?php echo $slidercek['id'] ?>">
              <label class="btn" style="    margin-left: 15%;">
                <?php
$url =  $siteyolu. "theme/". $temacek['tema_adi'] .'/?masa_id_no=1&departman=' . $slidercek['id']   ; 
$qr = qrCode($url, 400, 400); // 200x200
?>
                 <img src="<?=$qr?>" alt="..." class="img-thumbnail">
              </label>
             <h5 class="mt-2 text-center" for="item5<?php echo $slidercek['id'] ?>"><?php echo $slidercek['kat_adi']; ?> </h5>
          <center>   <a class="btn btn-warning"  href="#" onclick="<?php echo $slidercek['id'] ?>pdf_indir()" target="_blank" download="filename" >  <i class="fas fa-download" style="    font-size: 15px;"></i> İndirmek İçin Tıklayın   </a> </center>
           </div>
         </div>

       </div>
       <script type="text/javascript">
 function  <?php echo $slidercek['id'] ?>pdf_indir() {
var a = document.createElement('a');
a.href = "<?=$qr?>";
a.download = "qrkod-<?php echo $slidercek['kat_adi']; ?>.png";
document.body.appendChild(a);
a.click();
document.body.removeChild(a)
}
 </script>
  </fieldset>
    </div>
        <div class="col-md-12 col-lg-7">
        <div class="card">
          <div class="card-header">
            <h3>Hazır Baskı Formatları</h3>
            <hr>
          </div>
          <div class="card-body">
                     <div class="table-responsive">
                        <table id="new-orders-table" class="table table-hover table-xl mb-0">
                        
                            <tbody>
                              
                                <tr>
                                    <td class="text-truncate"><img src="https://rlv.zcache.com/svc/view?realview=113381141044902439&design=8cd290e6-e852-4f87-9f2a-092e9f9c8428&rlvnet=1&style=4x6&max_dim=1024" style="width: 60px; margin-right: 20px;">   Yatay Tasarım  </td>
                                  
                                    <td class="text-truncate"> <a href="./?departman=<?php echo $slidercek['id']; ?>" class="btn btn-warning" style="float: right;"> <i class="fas fa-download" style="    font-size: 15px;"></i> İndirmek İçin Tıklayın </a> </td>                                
                                </tr>
                                 <tr>
                                    <td class="text-truncate"><img src="https://rlv.zcache.com/svc/view?realview=113381141044902439&design=8cd290e6-e852-4f87-9f2a-092e9f9c8428&rlvnet=1&style=4x6&max_dim=1024" style="width: 60px; margin-right: 20px;">   Dikey Tasarım  </td>
                                  
                                    <td class="text-truncate"> <a href="./?departman=<?php echo $slidercek['id']; ?>" class="btn btn-warning" style="float: right;"> <i class="fas fa-download" style="    font-size: 15px;"></i> İndirmek İçin Tıklayın </a> </td>                                
                                </tr>
                                 <tr>
                                    <td class="text-truncate"><img src="https://rlv.zcache.com/svc/view?realview=113381141044902439&design=8cd290e6-e852-4f87-9f2a-092e9f9c8428&rlvnet=1&style=4x6&max_dim=1024" style="width: 60px; margin-right: 20px;">   Kare Tasarım  </td>
                                  
                                    <td class="text-truncate"> <a href="./?departman=<?php echo $slidercek['id']; ?>" class="btn btn-warning" style="float: right;"> <i class="fas fa-download" style="    font-size: 15px;"></i> İndirmek İçin Tıklayın </a> </td>                                
                                </tr>
                              
                                                                                   
                            </tbody>
                        </table>
             </div>
            
          </div>
        </div>
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

