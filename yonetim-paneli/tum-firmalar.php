<?php include 'header.php'; ?>
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Tüm Firmalar </h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>
                  </li>
                  <li class="breadcrumb-item active">Tüm Firmalar</li>
               
                </ol>
              </div>
            </div>
          </div>
          
        </div>
        <div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tüm Firmalar</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        <p class="card-text">Tüm firmaları görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                     <th>Firma ID</th>
                                    <th>Firma Ad</th>
                                   <th>Sektör</th>
                                   <th>Üyelik Tip</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                                <tfoot>
                                <tr>
                                     <th>Firma ID</th>
                                    <th>Firma Ad</th>
                                    <th>Sektör</th>
                                     <th>Üyelik Tip</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                 <?php  
                                  if(isset($_GET['sayfa']))
                        {
                        	$sayfa = $_GET['sayfa'];
                        } 

                        else { $sayfa = 'a';}


       $firma=$db->prepare("SELECT * FROM firma WHERE firma  LIKE '$sayfa%'");  

                            $firma->execute(array(
                        

                              ));

                                       while ( $firmacek=$firma -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                     
                                     <tr>      
                                    <td><?php echo $firmacek['id']; ?></td>
                                    <td><?php echo $firmacek['firma']; ?></td>
                                   <td><?php echo $firmacek['sektor_ad']; ?></td>
                                      <?php if ($firmacek['uyetur']==1) {?> <td><a href="islemler/islem.php?normal=<?php echo $firmacek['id']; ?>"><button type="button" class="btn btn-warning btn-min-width box-shadow-2 mr-1 mb-1">GOLD</button></a></td> <?php } 
                                    else { ?>
                                  <td><a href="islemler/islem.php?gold=<?php echo $firmacek['id']; ?>"><button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1">NORMAL</button></a></td>
                              <?php     } ?>
                                    
                                   <?php if ($firmacek['durum']==1) {?> <td><a href="islemler/islem.php?pasif=<?php echo $firmacek['id']; ?>"><button type="button" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1">Aktif</button></a></td> <?php } 
                                    else { ?>
                                  <td><a href="islemler/islem.php?aktif=<?php echo $firmacek['id']; ?>"><button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1">Pasif</button></a></td>
                              <?php     } ?>

                                    <td><a href="firmaduzenle.php?d=<?php  echo $firmacek['id']; ?>"><button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>
                                    	
                                      <a href="islemler/islem.php?deletefirma=<?php echo $firmacek['id']; ?>"><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a>	

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        
                        </table>

                        <?php 
                        $ascii_val = ord('A');
for($i = $ascii_val; $i < $ascii_val + 26; $i++) {  ?>
                      <a href="tum-firmalar.php?sayfa=<?php  echo chr($i); ?>">  <?php    echo chr($i) . ' '; ?> </a>
       <?php } ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





        </div>
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
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="./app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
