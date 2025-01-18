<?php include 'header.php'; ?>
    <title>  Kategoriler  >  Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Kategoriler </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Kategoriler </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
<?php if(isset($_GET['yonetici-ekle'])){ ?>
  <div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

     
 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?ust_id=<?php echo $_GET['ust_id'] ?>&ust_ids=<?php echo $_GET['ust_ids'] ?>&departman=<?php echo $kat_id; ?>"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="kategori-ekle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Kategori Ekle  </h4>

     <div class="form-body">  
  <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Resim  </label>

                                <div class="col-md-9">

       <input type="file" id="projectinput1" class="form-control" name="resim">

                                </div>

                            </div>
   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Kategori Adı  </label>

                                <div class="col-md-9">

       <input type="text" id="projectinput1" class="form-control" 
                placeholder=" Kategori Adı  ..."  name="kategori_ad">

                                </div>

                            </div>


                             <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Anahtar Kelimeler  </label>

                                <div class="col-md-9">

                     <input type="text" id="projectinput1" class="form-control"  
                      placeholder="Anahtar Kelimeler "  name="seo_anahtar_kelime"    >

                                </div>

                            </div>



                             <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Meta Açıklama  </label>

                                <div class="col-md-9">

                     <textarea type="text" id="projectinput1" class="form-control"  rows="8" 
                      placeholder="Meta Açıklama "  name="seo_aciklama" > 
                      </textarea>

                                </div>

                            </div>

     </div>
 



</div></form></div></div></section></div></div>
<?php } ?>


<?php if(isset($_GET['yonetici-duzenle'])){ ?>
 <div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

        <?php  
 
       $yonetciduzenlecon=$db->prepare("SELECT * FROM `kategoriler` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['yonetici-duzenle'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  ?>

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal"
 method="POST" action="islemler/islem.php?id=<?php echo $yonetciduzenlecek['id'] ."&ust_id=".$_GET['ust_id']  ?>&departman=<?php echo $kat_id; ?>"  enctype="multipart/form-data">

                          

      <a href="index.php">  <button type="button" class="btn btn-danger btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;" >Vazgeç</button></a>

        <button type="submit" name="kategori-duzenle" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="float: right;">Kaydet</button> <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Kategori Düzenle  </h4>

  <div class="form-body">  
  <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Resim  </label>

                                <div class="col-md-9">

       <input type="file" id="projectinput1" class="form-control" name="resim">

                                </div>

                            </div>
   <div class="form-group row">

                                <label class="col-md-3 label-control" for="projectinput1">  Kategori Adı  </label>

                                <div class="col-md-9">

       <input type="text" id="projectinput1" class="form-control" 
               value="<?php echo $yonetciduzenlecek['kategori_ad']; ?>"  placeholder=" Kategori Adı  ..."  name="kategori_ad">

                                </div>

                            </div>


                             <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Anahtar Kelimeler  </label>

                                <div class="col-md-9">

                     <input type="text" id="projectinput1" class="form-control"  
                      placeholder="Anahtar Kelimeler "  name="seo_anahtar_kelime"   value="<?php echo $yonetciduzenlecek['seo_anahtar_kelime']; ?>" >

                                </div>

                            </div>



                             <div class="form-group row">

                                <label class="col-md-3 label-control"for="projectinput1"> Meta Açıklama  </label>

                                <div class="col-md-9">

                     <textarea type="text" id="projectinput1" class="form-control"  rows="8" 
                      placeholder="Meta Açıklama "  name="seo_aciklama" ><?php echo $yonetciduzenlecek['seo_aciklama']; ?>
                      </textarea>

                                </div>

                            </div>

     </div>



                        

 



</div></form></div></div></section></div></div>
<?php } ?>















        <div class="content-body"><!-- Zero configuration table -->

<section id="configuration">

    <div class="row">

        <div class="col-12">

             <div class="card">
 <form action="" method="get">
                <div class="card-header">

                    <h4 class="card-title"> Kategoriler
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="yonetici-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Kategori Ekle  </button></h4>
           <input type="hidden" name="ust_id" value="<?php echo $_GET['ust_id'] ?>">
           <input type="hidden" name="ust_ids" value="0">
           <input type="hidden" name="departman" value="<?php echo $kat_id; ?>">

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard" style="    overflow: auto;">



                        <p class="card-text">Tüm Kategorileri görüntüleyebilir, düzenleyebilir ve silebilirsin.</p>

                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>
                                      <th>Sıralama</th>
                                      <th>Kategori Id</th>
 
                                    <th> Kategori Adı    </th>
                                   <th>Durum </th>
 

                                   <th>İşlemler </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>

                                      <th>Sıralama</th>
                                      <th>Kategori Id</th>
                                
 
                                    <th> Kategori Adı    </th>
 
                                   <th>Durum </th>

                                   <th>İşlemler </th>
 
 
                                </tr>

                            </tfoot>

                            <tbody class="row_position">

                                 <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `kategoriler` where ust_id=? and kat_id=?  order by sira ASC ");  

       $yonetcicon->execute(array( $_GET['ust_id'], $kat_id ));

                           

                             



                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     

                                     <tr id="<?php echo $yonetcicek['id']; ?>">      
                                      <td><label class="btn btn-icon btn-primary mr-1"><i class="fa fa-bars"></i></label></td>
                                    <td  style="display: none;"><?php echo $yonetcicek['sira']; ?></td>
                                    <td   ><?php echo $yonetcicek['id']; ?></td>

                                    <td><img id="img<?php echo $yonetcicek['id'] ?>" src="../timthumb.php?src=<?php echo $siteyolu; ?><?php echo $yonetcicek['ust_kategori_resim']; ?>&w=200&h=150&zc=4&a=tc" style="width: 80px " 
                   onerror="this.onerror=null;this.src='../timthumb.php?src=<?php echo $siteyolu ?>images/default-img.png&w=150&h=150&zc=4&a=tc';">
                                      <?php echo $yonetcicek['kategori_ad']; ?></td>
 
    <td>
                                     <?php if ($yonetcicek['durum']>0): ?>
                                       <a href="islemler/islem.php?durumdegistirpasifkategori=<?php echo $yonetcicek['id']; ?>&departman=<?php echo $kat_id; ?>">
                                        <button type="button" class="btn btn-icon btn-success mr-1"> Aktif </button></a>
                                     <?php endif; ?>
                                      <?php if ($yonetcicek['durum']<=0): ?>
                                       <a href="islemler/islem.php?durumdegistiraktifkategori=<?php echo $yonetcicek['id']; ?>&departman=<?php echo $kat_id; ?>">
                                        <button type="button" class="btn btn-icon btn-danger mr-1"> Pasif </button></a>
                                     <?php endif; ?>  
                                   </td>
                                  
                                    <td>
<?php if($_GET['ust_id']==0){ ?>
 <button type="button" data-toggle="collapse" data-target="#s<?php  echo $yonetcicek['id']; ?>"
                                       class="btn btn-icon btn-info mr-1">Alt Kategoriler  </button> 
                                     <?php } ?>

                                       <a href="urunler.php?kat_id=<?php echo $yonetcicek['id']; ?>&sub_kat_id=null&departman=<?php echo $kat_id; ?>"><button type="button" class="btn btn-icon btn-success mr-1">Ürünleri Görüntüle</button></a> 
                                      <a href="kategoriler.php?yonetici-duzenle=<?php  echo $yonetcicek['id']; ?>&ust_id=<?php echo $_GET['ust_id'] ?>&departman=<?php echo $kat_id; ?>"><button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                                      

                                      <a href="islemler/islem.php?deletekategori=<?php echo $yonetcicek['id']; ?>&ust_id=<?php echo $_GET['ust_id'] ?>&departman=<?php echo $kat_id; ?>"><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a> 

                                      

                                    </td>

                                </tr>

                                 <tr id="s<?php  echo $yonetcicek['id']; ?>" class="collapse" >
                                  <td colspan="6">
                                      <div class="row">
                                         <div class="col-md-12 ml-2"> 
                                           <form action="" method="get">
                <div class="card-header">

                    <h4 class="card-title"> Kategoriler
                      <button type="submit" class="btn btn-icon btn-success mr-1" name="yonetici-ekle" value="1" > <i class="fa fa-plus-circle"></i> 
                      Kategori Ekle  </button></h4>
           <input type="hidden" name="ust_id" value="<?php echo $_GET['ust_id'] ?>">
           <input type="hidden" name="ust_ids" value="<?php echo $yonetcicek['id']; ?>">
           <input type="hidden" name="departman" value="<?php echo $kat_id; ?>">

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                                                 <table class="table table-striped table-bordered zero-configuration">

                                      <thead >

                                <tr style="background-color: white;">

                                    
                                      <th>Sıralama</th>
                                       <th>Kategori Id</th>
                                    <th> Kategori Adı    </th>
                                     <th> Durum   </th>


                                   <th>İşlemler </th>
 

                                

                                </tr>

                            </thead>   

                                <tfoot>
                                    <tr style="background-color: white;">

                                     
                                      <th>Sıralama</th>
                                      <th>Kategori Id</th>
 
                                    <th> Kategori Adı    </th>
                                    <th> Durum   </th>
 

                                   <th>İşlemler </th>

                                </tr>
                                </tfoot>
                            <tbody class="row_position">
                                        <?php  

       $yonetcicon1=$db->prepare("SELECT * FROM `kategoriler` where ust_id=?  order by sira ASC ");  

       $yonetcicon1->execute(array( $yonetcicek['id'] ));

                           

                             



                                       while ( $yonetcicek1=$yonetcicon1 -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                     

                                     <tr id="<?php echo $yonetcicek1['id']; ?>">      
                                      <td><label class="btn btn-icon btn-primary mr-1"><i class="fa fa-bars"></i></label></td>
                                    <td style="display: none"><?php echo $yonetcicek1['sira']; ?></td>
                                    <td><?php echo $yonetcicek1['id']; ?></td>

                                    <td>                                       <?php echo $yonetcicek1['kategori_ad']; ?></td>
 
                                     <td>
                                     <?php if ($yonetcicek1['durum']>0): ?>
                                       <a href="islemler/islem.php?durumdegistirpasifkategori=<?php echo $yonetcicek1['id']; ?>&departman=<?php echo $kat_id; ?>">
                                        <button type="button" class="btn btn-icon btn-success mr-1"> Aktif </button></a>
                                     <?php endif; ?>
                                      <?php if ($yonetcicek1['durum']<=0): ?>
                                       <a href="islemler/islem.php?durumdegistiraktifkategori=<?php echo $yonetcicek1['id']; ?>&departman=<?php echo $kat_id; ?>">
                                        <button type="button" class="btn btn-icon btn-danger mr-1"> Pasif </button></a>
                                     <?php endif; ?>  
                                   </td>
                                  
                                    <td>
                                        <a href="urunler.php?kat_id=<?php echo $yonetcicek['id']; ?>&sub_kat_id=<?php  echo $yonetcicek1['id']; ?>&departman=<?php echo $kat_id; ?>"><button type="button" class="btn btn-icon btn-success mr-1">Ürünleri Görüntüle</button></a> 

                                      <a href="kategoriler.php?yonetici-duzenle=<?php  echo $yonetcicek1['id']; ?>&ust_id=<?php echo $_GET['ust_id'] ?>&departman=<?php echo $kat_id; ?>"><button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                                      

                                      <a href="islemler/islem.php?deletekategori=<?php echo $yonetcicek1['id']; ?>&ust_id=<?php echo $_GET['ust_id'] ?>&departman=<?php echo $kat_id; ?>"><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a> 

                                      

                                    </td>

                                </tr>
                              <?php } ?>
                                     </tbody>

                                   </table>
                                 </div>
                               </div>
                             </td>
                           </tr>

                                <?php } ?>

                            </tbody>

                        

                        </table>

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
            url:"Ajax.php",
            type:'post',
            data:{position:data},
            success:function(){
               toastr.success('İşlem Başarılı');

            }
        })
    }
</script>

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
        <script src="./app-assets/js/scripts/extensions/toastr.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/toastr.min.js"></script>


    <script src="./app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>

    <!-- END PAGE LEVEL JS-->

  </body>

</html>

