<?php include 'header.php';  $uruncon=$db->prepare("SELECT * FROM `masalar` where id=?  order by id asc ");

                                     $uruncon->execute(array( $_GET['masaid']  ));
                                       $urunce111k=$uruncon -> fetch(PDO:: FETCH_ASSOC);

if(isset($_POST['siparis-onayla'])){
 $datacon15=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=2");  
             $datacon15->execute(array(  $_GET['masaid'] ));
                 



                      while ( $datacek12=$datacon15 -> fetch(PDO:: FETCH_ASSOC)){
 $bayiupdate1=$db->prepare("UPDATE `sepet` set durum = 3, tahmini_hazirlama=? where id=? ");
       $update=$bayiupdate1->execute(array( $_POST['hazirlama_suresi'.$datacek12['id']  ] , $datacek12['id']  ));
                      }

        header("Location:./siparis-detay.php?masaid=". $_GET['masaid']);

}

                                        ?>
                                     <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js"> </script>
  <script type="text/javascript">

   function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=600, width=480');
            a.document.write('<html>');
            a.document.write('<body ><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

  </script>
      <title>  Sipariş Yönetimi   >  Admin Paneli</title>
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

 


    <div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-6 col-12 mb-2">



            <h3 class="content-header-title"> Sipariş Yönetimi </h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a>

                  </li>

                  <li class="breadcrumb-item active"> Sipariş Yönetimi </li>

               

                </ol>

              </div>

            </div>

          </div>

          

        </div>
    
 


<div class="content-detached content-center">

          <div class="content-body"><!-- Description -->
 
        <div class="content-body"><!-- Zero configuration table -->
          <div class="row">
    <div class="col-md-12 col-xl-9 mb-2" style="height: 100%;">
      <form action="" method="post" class="card mb-3">
       <div class="card-body">
           <a href="siparis-yonetimi.php?departman=<?php echo $kat_id ?>"  class="btn btn-info mr-1" style="float: left;"> Geri </a> 

         <h5><?php echo $urunce111k['masa_adi'] ?> Yeni Siparişleri</h5>
         <?php   $toplamtutar = 0 ;  
                  $datacon15=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=2");  
             $datacon15->execute(array(  $_GET['masaid'] ));
                 



                      while ( $datacek12=$datacon15 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
                      <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                            


                            while ( $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC)){
 ?>
               <div class="card mt-1">
                <div class="card-body pt-3">
                  <div class="col-sm-12  list-item pl-0 pr-0  ">
                      <figure class="mr-3" style="    float: left;"><a href="javascript:void()"><img src="../<?php echo $datacek11["urun_resim"]; ?>" style="height: 100px" alt="image"></a></figure>

                     <div class="content-div mr-3"  style="    float: left;">

                      <h6 class="text-black mb-1"><?php echo substr($datacek11["urun_adi"], 0,30) ;?> </h6>

                     
                      <h6><?php 

                                           

                                            $karakter_sayisi = strlen($datacek12["varyantlar"]);
 $geneltoplam = 0;

                                                     if ($karakter_sayisi>2) { 

                                          $vri=explode(",",  $datacek12['varyantlar']);  



                  for ($i=1; $i <= count($vri); $i++) {  
 
  $alt_varyantcon=$db->prepare("SELECT * FROM urun_varyantlar where id=?   ");

                 $alt_varyantcon->execute(array(  $vri[$i]  ));
                                       
                                       
                                           while ($alt_varyantcek=$alt_varyantcon -> fetch(PDO:: FETCH_ASSOC)){ 
                                                 $geneltoplam = 0;
                                                $geneltoplam  =   $datacek12["urun_adet"] *  $alt_varyantcek["fiyat"] ;
                        
                        echo   '    '. $alt_varyantcek["varyant_ad"]  ;
                           $urun_fiyat = $alt_varyantcek["fiyat"];
                          } 

                                       
                                            

                                      
                   
                   }
                                                      } else {   $urun_fiyat = $datacek11["urun_fiyat"] ;

                                       $geneltoplam   =   $datacek12["urun_adet"] *  $datacek11["urun_fiyat"] ;
                                      
                                                      }  ?>

      <h6 class="text-black mb-1"> Birim Fiyat :  <?php  echo   $datacek11["urun_fiyat"];  ?>₺ </h6>                
<?php
echo    $datacek12["urun_adet"]  . ' x '  . number_format($geneltoplam, 2) .  ' ₺  '   ;  $toplamtutar += $geneltoplam ;                                             

 ?> </h6>
 
                    </div>
                 <div class="col-md-4"  style="    float: right;"> <label>Tahmini Hazırlama Süresi</label>
                  <select class="form-control" name="hazirlama_suresi<?php echo $datacek12["id"]; ?>">
   <option value="10 - 15 Dakika">10 - 15 Dakika</option>
   <option selected="selected" value="20 - 25 Dakika">20 - 25 Dakika</option>
   <option value="30 - 35 Dakika">30 - 35 Dakika</option>
   <option value="40 - 45 Dakika">40 - 45 Dakika</option>
 </select></div>
                   </div>
                   
                   
                </div>
              </div>
 

             <?php  }} ?>
       </div>

       <div class="col-md-3 mb-2 ml-1" style="float: right;"> <button name="siparis-onayla" class="btn btn-success">Siparişi Onayla</button></div>
     </form>
      <div class="card">
       <div class="card-body">
        <h5><?php echo $urunce111k['masa_adi'] ?> Hazırlanan Siparişleri</h5>
         <?php   $toplamtutar = 0 ;  
                  $datacon15=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=3");  
             $datacon15->execute(array(  $_GET['masaid'] ));
                 



                      while ( $datacek12=$datacon15 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
                      <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                            


                            while ( $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC)){
 ?>
               <div class="card mt-1">
                <div class="card-body pt-3">
                  <div class="col-sm-12  list-item pl-0 pr-0  ">
                      <figure class="mr-3"  style="    float: left;"><a href="javascript:void()"><img src="../<?php echo $datacek11["urun_resim"]; ?>" style="height: 100px" alt="image"></a></figure>

                     <div class="content-div mr-3"  style="    float: left;">

                      <h6 class="text-black mb-1"><?php echo substr($datacek11["urun_adi"], 0,30) ;?> </h6>

                     
                      <h6><?php 

                                           

                                            $karakter_sayisi = strlen($datacek12["varyantlar"]);
 $geneltoplam = 0;

                                                     if ($karakter_sayisi>2) { 

                                          $vri=explode(",",  $datacek12['varyantlar']);  



                  for ($i=1; $i <= count($vri); $i++) {  
 
  $alt_varyantcon=$db->prepare("SELECT * FROM urun_varyantlar where id=?   ");

                 $alt_varyantcon->execute(array(  $vri[$i]  ));
                                       
                                       
                                           while ($alt_varyantcek=$alt_varyantcon -> fetch(PDO:: FETCH_ASSOC)){ 
                                                 $geneltoplam = 0;
                                                $geneltoplam  =   $datacek12["urun_adet"] *  $alt_varyantcek["fiyat"] ;
                        
                        echo   '    '. $alt_varyantcek["varyant_ad"]  ;
                           $urun_fiyat = $alt_varyantcek["fiyat"];
                          } 

                                       
                                            

                                      
                   
                   }
                                                      } else {   $urun_fiyat = $datacek11["urun_fiyat"] ;

                                       $geneltoplam   =   $datacek12["urun_adet"] *  $datacek11["urun_fiyat"] ;
                                      
                                                      }  ?>

      <h6 class="text-black mb-1"> Birim Fiyat :  <?php  echo   $datacek11["urun_fiyat"];  ?>₺ </h6>                
<?php
echo    $datacek12["urun_adet"]  . ' x '  . number_format($geneltoplam, 2) .  ' ₺  '   ;  $toplamtutar += $geneltoplam ;                                             

 ?> </h6>
 
                    </div>
                 
                   </div>
                   
                   
                </div>
              </div>
 

             <?php  }} ?>
       </div>

      </div>
   </div>
     <div class="col-md-12 col-xl-3">
      <div class="card fisYazdir" >
       <div  class="card-body"  id="GFG" >
         <h5>Sipariş Toplamı</h5>
         <hr>
           <?php   $toplamtutar = 0 ;  
                  $datacon15=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=3");  
             $datacon15->execute(array(  $_GET['masaid'] ));
                 



                      while ( $datacek12=$datacon15 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
                      <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                            


                            while ( $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC)){
 ?>
               <div class="card mt-1">
                <div class="card-body pt-3">
                  <div class="col-sm-12  list-item pl-0 pr-0  ">
                     <div class="content-div mr-3">
                      <h6 class="text-black mb-1"><?php echo substr($datacek11["urun_adi"], 0,30) ;?> </h6>

                     
                      <h6><?php 

                                           

                                            $karakter_sayisi = strlen($datacek12["varyantlar"]);
 $geneltoplam = 0;

                                                     if ($karakter_sayisi>2) { 

                                          $vri=explode(",",  $datacek12['varyantlar']);  



                  for ($i=1; $i <= count($vri); $i++) {  
 
  $alt_varyantcon=$db->prepare("SELECT * FROM urun_varyantlar where id=?   ");

                 $alt_varyantcon->execute(array(  $vri[$i]  ));
                                       
                                       
                                           while ($alt_varyantcek=$alt_varyantcon -> fetch(PDO:: FETCH_ASSOC)){ 
                                                 $geneltoplam = 0;
                                                $geneltoplam  =   $datacek12["urun_adet"] *  $alt_varyantcek["fiyat"] ;
                        
                        echo   '    '. $alt_varyantcek["varyant_ad"]  ;
                           $urun_fiyat = $alt_varyantcek["fiyat"];
                          } 

                                       
                                            

                                      
                   
                   }
                                                      } else {   $urun_fiyat = $datacek11["urun_fiyat"] ;

                                       $geneltoplam   =   $datacek12["urun_adet"] *  $datacek11["urun_fiyat"] ;
                                      
                                                      }  ?>

      <h6 class="text-black mb-1"> Birim Fiyat :  <?php  echo   $datacek11["urun_fiyat"];  ?>₺ </h6>                
<?php
echo    $datacek12["urun_adet"]  . ' x '  . number_format($geneltoplam, 2) .  ' ₺  '   ;  $toplamtutar += $geneltoplam ;                                             

 ?> </h6>
                    </div>
                   </div>
                   
                   
                </div>
              </div>
 

             <?php  }} ?>
             <div class="card mt-3">
              <div class="card-body">
                  <h6 >  Toplam Tutar:  </b> <span class="float-right"> <?php echo   number_format($toplamtutar, 2)    ; ?>  ₺</span>
</h6>
             </div>
              </div>
            </div>
<div class="card mt-1">
  <div class="card-body">
    <div class="row">
  <div class="col-md-12 col-xl-6 mt-1 "><a href="?masaid=<?php echo $_GET['masaid'] ?>&status=masabosalt"><button class="btn btn-danger"  style="width: 100%;">MASAYI TEMİZLE</button></a></div>
  <div class="col-md-12 col-xl-6 mt-1 "><a href="?masaid=<?php echo $_GET['masaid'] ?>&status=hesapal"><button class="btn btn-success" style="width: 100%;">HESAP AL</button></a></div>
  <div class="col-md-12 mt-2"><button style="width: 100%" class="btn btn-primary" onclick="printDiv()">FİŞİ YAZDIR</button></div>

</div>

  </div>
</div>          
     
 </div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<?php if(isset($_GET['status'])){
  if($_GET['status']=='masabosalt'){
      $bayiupdate1=$db->prepare("DELETE  from sepet where masa_id=? and durum <=3 ");
       $update=$bayiupdate1->execute(array(  $_GET['masaid']  ));
         $bayiupdate1=$db->prepare("UPDATE `masalar` set garson_cagir = 0 where id=? ");
       $update=$bayiupdate1->execute(array(  $_GET['masaid']  ));
 header("Location:./siparis-detay.php?masaid=". $_GET['masaid']);

  } else if($_GET['status']=='hesapal') {
     $bayiupdate1=$db->prepare("UPDATE `sepet` set durum = 4 where masa_id=? ");
       $update=$bayiupdate1->execute(array(  $_GET['masaid']  ));
        $bayiupdate1=$db->prepare("UPDATE `masalar` set garson_cagir = 0 where id=? ");
       $update=$bayiupdate1->execute(array(  $_GET['masaid']  ));
        header("Location:./siparis-detay.php?masaid=". $_GET['masaid']);

  }

} ?>



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

