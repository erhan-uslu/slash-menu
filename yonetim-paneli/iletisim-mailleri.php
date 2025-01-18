<?php include 'header.php'; ?>
    <title>  İletişim Mailleri  >  Admin Paneli</title>

 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">



    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> İletişim Mailleri </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> İletişim Mailleri </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
 
<?php if(isset($_GET['yonetici-duzenle'])){ ?>
<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->

<section id="css-classes" class="card">

        <?php  

       $yonetciduzenlecon=$db->prepare("SELECT * FROM `iletisim_mailleri` where id=? ");  

       $yonetciduzenlecon->execute(array( $_GET['yonetici-duzenle'] ));
     
        $yonetciduzenlecek=$yonetciduzenlecon -> fetch(PDO:: FETCH_ASSOC);  


$query = $db->prepare("UPDATE iletisim_mailleri  set okundu=?    WHERE id=? ");

$update = $query->execute(array(  '1' , $_GET['yonetici-duzenle']  ));
                                          
                                           ?>

 
    <div class="card-content">

       <div class="card-body"> 

                      <form class="form form-horizontal" method="POST" action="islemler/islem.php?id=<?php echo $yonetciduzenlecek['id']; ?>"  enctype="multipart/form-data">

                   <br><br><br>

                        <div class="form-body">

                          <h4 class="form-section"><i class="ft-info"></i> Mail Detayı </h4>

                    <table class="table table-striped"> <tbody> 
                <tr> <th scope="row"> Ad Soyad  </th>  <td><?php echo $yonetciduzenlecek['adi'] ?></td>   </tr> 
               
                <tr> <th scope="row">  Mail Adresi  </th>  <td><?php echo $yonetciduzenlecek['mail'] ?></td>   </tr> 
                <tr> <th scope="row"> Telefon       </th>  <td><?php echo $yonetciduzenlecek['telefon'] ?></td>   </tr> 
                <tr> <th scope="row">  Tarih  </th>  <td><?php echo $yonetciduzenlecek['zaman'] ?></td>   </tr> 
                <tr> <th scope="row">  Mesaj  </th>  <td><?php echo $yonetciduzenlecek['mesaj'] ?></td>   </tr> 
               
                     </tbody> </table>      

 


</div></form></div></div></section></div></div>
<?php } ?>















        <div class="content-body"><!-- Zero configuration table -->

<section id="configuration">

    <div class="row">

        <div class="col-12">

             <div class="card">
 <form action="" method="get">
                <div class="card-header">

                    <h4 class="card-title"> İletişim Mailleri 
                     </h4>

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                    

                </div>
</form>
                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">



                        <p class="card-text">Tüm İletişim Maillerini görüntüleyebilirsin.</p>

                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>

                                   <th> İd         </th>

                                   <th> Tarih    </th>

                                   <th> Ad Soyad   </th>

                                   <th>  Mail      </th> 

                                   <th>  Telefon      </th> 

                                   <th>  Mesaj    </th>

                                   <th>  Detaylar </th>
 

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>

                                     <th> İd         </th>

                                   <th> Tarih    </th>

                                   <th> Ad Soyad   </th>

                                   <th>  Mail      </th> 

                                   <th>  Telefon      </th> 

                                   <th>  Mesaj    </th>

                                   <th>  Detaylar </th>
 
 
                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

       $yonetcicon=$db->prepare("SELECT * FROM `iletisim_mailleri` where kat_id=". $kat_id ." order by id desc ");  

       $yonetcicon->execute(array(  ));

                           

                             



                                       while ( $yonetcicek=$yonetcicon -> fetch(PDO:: FETCH_ASSOC)){ ?>

                                    
                                     
                                     <tr <?php if($yonetcicek['okundu']==0){echo 'style="font-weight: bold;"';  } ?>>      

                                    <td><?php echo $yonetcicek['id']; ?></td>

                                    <td><?php echo $yonetcicek['zaman']; ?></td>

                                    <td><?php echo $yonetcicek['adi']; ?></td>

                                   <td><?php echo $yonetcicek['mail']; ?></td>

                                   <td><?php echo $yonetcicek['telefon']; ?></td>


                                   <td><?php echo  substr($yonetcicek['mesaj'], 0,150); ?>...</td>
  
                                  
                                    <td>

                                      <a href="iletisim-mailleri.php?yonetici-duzenle=<?php  echo $yonetcicek['id']; ?>&departman=<?php echo $kat_id; ?>">
                                      <button type="button" class="btn btn-icon btn-success mr-1"><i class="fa fa-search"></i></button></a>
                              <a href="islemler/islem.php?mail_delete=<?php  echo $yonetcicek['id']; ?>&departman=<?php echo $kat_id; ?>">
                               <button type="button" class="btn btn-icon btn-danger mr-1"><i class="fas fa-trash-alt"></i></button></a>

                                       
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

