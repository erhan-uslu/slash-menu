<?php include 'header.php'; ?>
<title>Tüm Ürünler - Rafta Hazır</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">



    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">

            <h3 class="content-header-title">Tüm Ürünler </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active">Tüm Ürünler</li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
  
        <div class="content-body"><!-- Zero configuration table -->

<section id="configuration">
  <div  class="card">
      <div class="card-header">

                    <h4 class="card-title"> Tüm Ürünler
                    <a href="urun-ekle.php"> <button type="submit" class="btn btn-icon btn-success mr-1" name="slider-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Ürün  Ekle  </button></a> </h4>

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <br><br>
                        <p class="card-text">Tüm Ürünleri görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>

                    

                </div>
  <div class="card-content collapse show">
     <div class="card-body card-dashboard">
          <div id="configuration-urunler">
 <?php include 'Ajax-form/tum-urunler.php'; ?>
           </div>
                    

   </div> </div></div>

 </section>

 

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

