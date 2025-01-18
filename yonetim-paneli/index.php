<?php include 'header.php'; ?>
    <title>  Admin Paneli</title>

   <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="./app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/ui/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/pages/lobilist/lobilist.css">
  <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/ui/jquery-ui.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="./app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  
      <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END: Vendor CSS-->

  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <!-- END Custom CSS--> 
    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

        </div>

        <div class="content-body">
<div class="row">

    <div class="col-xl-3 col-lg-6 col-12">

        <div class="card pull-up">

            <div class="card-content">

                <div class="card-body">

                    <div class="media d-flex">

                        <div class="media-body text-left">

                            <h3 class="info"><?php  $datacon13=$db->prepare("SELECT * FROM siparisler where durum=1 ");  



                $datacon13->execute(array());

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.');





                    ?></h3>

                           <a href=""> <h5> Yeni Siparişler </h5> </a>

                        </div>

                        <div>

            <i class="icon-basket-loaded info font-large-2 float-right"></i>
                        </div>

                    </div>

                   

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-lg-6 col-12">

        <div class="card pull-up">

            <div class="card-content">

                <div class="card-body">

                    <div class="media d-flex">

                        <div class="media-body text-left">

                            <h3 class="warning"><?php   $datacon13=$db->prepare("SELECT * FROM urunler where kat_id=?  ");  



                $datacon13->execute(array( $kat_id));

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.'); ?></h3>

                        <a href="urunler.php?departman=<?php echo $kat_id; ?>"> <h5> Tüm Ürünler   </h5></a>   

                        </div>

                        <div>

                  <i class="icon-pie-chart warning font-large-2 float-right"></i>
                           
                        </div>

                    </div>

                     

                </div>

            </div>

        </div>

    </div>

      <div class="col-xl-3 col-lg-6 col-12">

        <div class="card pull-up">

            <div class="card-content">

                <div class="card-body">
  <a href="iletisim-mailleri.php?departman=<?php echo $kat_id; ?>">
                    <div class="media d-flex">

                        <div class="media-body text-left">

                    <h3 class="success"><?php   $datacon13=$db->prepare("SELECT * FROM iletisim_mailleri where okundu=0 and kat_id=?");  



                $datacon13->execute(array($kat_id));

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.');





                    ?></h3>

                            <h6>  Okunmamış  Mesajlar  </h6>

                        </div>

                        <div>

                            <i class="fa fa-envelope success font-large-2 float-right"></i>

                        </div>

                    </div>
 </a>
                    

                </div>

            </div>

        </div>

    </div> 


    <div class="col-xl-3 col-lg-6 col-12">

        <div class="card pull-up">

            <div class="card-content">

                <div class="card-body">

                    <div class="media d-flex">

                        <div class="media-body text-left">

                            <h3 class="danger"><?php  $datacon13=$db->prepare("SELECT * FROM fuarlar");  



                $datacon13->execute(array());

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.');





                    ?></h3>

                            <h6>Yapılacaklar</h6>

                        </div>

                        <div>

                            <i class="fa fa-clipboard-check danger font-large-2 float-right"></i>

                        </div>

                    </div>

                     

                </div>

            </div>

        </div>

    </div>

</div>
 
 <div class="row">
   <div class="col-md-12 col-lg-3">
<!-- Products sell and New Orders -->
      
         <div class="card">
            <div class="card-header">
                <h4 class="card-title">Şube Yönetimi</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content">
                <div id="new-orders" class="media-list position-relative">
                    <div class="table-responsive">
                        <table id="new-orders-table" class="table table-hover table-xl mb-0">
                        
                            <tbody>
                               <?php  

       $slidercon=$db->prepare("SELECT * FROM `katlar` where durum=1 ");  

       $slidercon->execute(array(  ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                <tr>
                                    <td class="text-truncate"><a href="./?departman=<?php echo $slidercek['id']; ?>"  ><?php echo $slidercek['kat_adi']; ?> Yönetimi </a></td>
                                  
                                    <td class="text-truncate"> <a href="./?departman=<?php echo $slidercek['id']; ?>" class="btn btn-info" style="float: right;">Yönet</a> </td>                                
                                </tr>
                              <?php } ?>
                                                                                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
 </div>

 
</div>
 <div class="col-md-12 col-lg-4">
             <div class="card">
                
                <div class="card-footer">
                    <div class="row mt-1">
                        <div class="col-3 text-center">
                            <h6 class="text-muted">Toplam Ürün</h6>
                            <h2 class="block font-weight-normal"><?php   $datacon13=$db->prepare("SELECT * FROM urunler where kat_id=".$kat_id."  ");  



                $datacon13->execute(array());

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.'); ?></h2>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h6 class="text-muted">Toplam Şube</h6>
                            <h2 class="block font-weight-normal"><?php   $datacon13=$db->prepare("SELECT * FROM katlar  ");  



                $datacon13->execute(array());

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.'); ?></h2>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h6 class="text-muted">Toplam Masa</h6>
                            <h2 class="block font-weight-normal"><?php   $datacon13=$db->prepare("SELECT * FROM masalar where  kat_id=".$kat_id." ");  



                $datacon13->execute(array());

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.'); ?></h2>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h6 class="text-muted">Toplam Sipariş</h6>
                            <h2 class="block font-weight-normal"><?php   $datacon13=$db->prepare("SELECT * FROM siparisler where durum =4  and  kat_id=".$kat_id."   ");  



                $datacon13->execute(array());

                $say=$datacon13->rowCount();

               

               echo   number_format($say, 0, ',', '.'); ?></h2>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
            <div class="card-header">
                <h4 class="card-title"> İletişim Mesajlar</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                
            </div>
            <div class="card-content">
                <div class="table-responsive mt-1">
                    <table class="table table-xs">
                        <thead>
                            <tr>
                                <th>Mesaj  </th>
                                 <th>Oku</th>
                            </tr>
                        </thead>
                        <tbody>

                               <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `iletisim_mailleri` where kat_id=". $kat_id ." order by id desc Limit 5 ");  

       $yonetcicon->execute(array(  ));

                           

                             



                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                            <tr>
                                <td  ><?php echo  substr($yonetcicek['mesaj'], 0,80); ?></td>
                                 <td> <a href="iletisim-mailleri.php?yonetici-duzenle=<?php  echo $yonetcicek['id']; ?>&departman=<?php echo $kat_id; ?>">
                                      <button type="button" class="btn btn-icon btn-success mr-1"><i class="fa fa-search"></i></button></a></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 </div>
 <!--/ Products sell and New Orders -->
 <div class="col-md-12 col-lg-5">
   
<form id="configuration" action="" method="post">
 <fieldset class="form-group row">
    <?php   
 function qrCode($s, $w = 250, $h = 250){
    $url = sprintf('https://api.qrserver.com/v1/create-qr-code/?data=%s&size=%dx%d', urlencode($s), $w, $h);
    return $url;
}

       $slidercon=$db->prepare("SELECT * FROM `katlar` where id=? ");  

       $slidercon->execute(array( $kat_id  ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>
       <div class="col-md-6" for="<?php echo $slidercek['id'] ?>">
         <div class="card" for="<?php echo $slidercek['id'] ?>">
           <div class="card-body" for="<?php echo $slidercek['id'] ?>">
              <label class="btn">
                <?php
$url =   $siteyolu.  '?departman=' . $kat_id  .  '&departman=' . $kat_id;  
$qr = qrCode($url, 500, 500); // 200x200
?>
                 <img src="<?=$qr?>" alt="..." class="img-thumbnail">
              </label>
             <h5 class="mt-2 text-center" for="item5<?php echo $slidercek['id'] ?>"><?php echo $slidercek['kat_adi']; ?> Masa Siparişleri </h5>
          <center>   <a class="btn btn-success"  href="#" onclick="pdf_indir()"   >  <i class="fas fa-download" style="    font-size: 15px;"></i> Tasarımı İndir  </a> </center>
           </div>
         </div>

       </div>
        <div class="col-md-6" for="<?php echo $slidercek['id'] ?>">
         <div class="card" for="<?php echo $slidercek['id'] ?>">
           <div class="card-body" for="<?php echo $slidercek['id'] ?>">
              <label class="btn">
                <?php
$url =   $siteyolu.  '?masa_id_no=' . 'package';  
$qr = qrCode($url, 500, 500); // 200x200
?>
                 <img src="<?=$qr?>" alt="..." class="img-thumbnail">
              </label>
             <h5 class="mt-2 text-center" for="item5<?php echo $slidercek['id'] ?>"><?php echo $slidercek['kat_adi']; ?> Paket Servis </h5>
          <center>   <a class="btn btn-success"  href="#" onclick="pdf_indir()"   >  <i class="fas fa-download" style="    font-size: 15px;"></i> Tasarımı İndir  </a> </center>
           </div>
         </div>

       </div>
       <script type="text/javascript">
 function  pdf_indir() {
 console.log('deneme') 
var a = document.createElement('a');
a.href = "<?=$qr?>";
a.download = "qrkod-<?php echo $slidercek['kat_adi']; ?>.png";
document.body.appendChild(a);
a.click();
document.body.removeChild(a)
}
 </script>
<?php } ?>
</fieldset>


 

</form>

</div>
 </div> 
     
      


 
      
       

        </div>

      </div>

    </div>
    
 
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
        <script src="./app-assets/js/scripts/extensions/toastr.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/toastr.min.js"></script>


    <script src="./app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>
