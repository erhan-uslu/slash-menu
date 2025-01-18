<?php include 'header.php';  $uruncon=$db->prepare("SELECT * FROM `siparis_islemler` where id=?  order by id asc ");

                                     $uruncon->execute(array( $_GET['masaid']  ));
                                       $urunce111k=$uruncon -> fetch(PDO:: FETCH_ASSOC);

                              if(isset($_POST['kurye_secimi'])){

                                  $kaydet=$db->prepare("UPDATE siparis_islemler set kurye_id=? where id=?");

  $insert=$kaydet->execute(array(  $_POST['kurye_id'], $_GET['masaid']  ));


                              }


     ?>
                                     <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js"> </script>
  <script type="text/javascript">

 function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
          var divElementContents =divContents;
          var windows = window.open('', '', 'height=700, width=400');
          windows.document.write('<html>');
          windows.document.write(divElementContents);
          windows.document.write('</body></html>');
          windows.document.close();
          windows.print();
        }

  </script>
      <title>  Sipariş Yönetimi   >  Admin Paneli</title>
 <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">

  <style type="text/css">
                    .main-wrapper .main-content .menu-item li {
    box-shadow: 0px 0 0 rgb(0 0 0 / 15%);
    color: #fff;
    margin: 0 0 10px 0;
    padding: 10px;
    border-radius: 10px;
    font-size: 14px;
    text-align: left;
    justify-content: space-between;
}
.spans {
  color : white;
}
    </style>
    


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
       <div class="row">
         <div class="col-md-3">
            <a href="paket-siparis-yonetimi.php?departman=<?php echo $kat_id ?>"  class="btn btn-info mr-1" style="float: left;"> Geri </a> 

          <h5 style="float: left; align-items: center;"><?php echo $urunce111k['masa_adi'] ?> Sipariş Detayları</h5></div>
         <div class="col-md-9">
             <div class="row" style="float: right; margin-bottom: 10px">
  <a href="?masaid=<?php echo $_GET['masaid'] ?>&status=0"  class="btn btn-danger mr-1"  >Siparişi İptal Et </a> 
  <?php if($urunce111k['durum']==1){ ?>  <a href="?masaid=<?php echo $_GET['masaid'] ?>&status=2"   class="btn btn-success mr-1" >Siparişi Onayla </a> <?php } else { ?>
    <a href="?masaid=<?php echo $_GET['masaid'] ?>&status=3"   class="btn btn-warning mr-1"  >Sipariş Yola Çıktı </a> 
     <a href="?masaid=<?php echo $_GET['masaid'] ?>&status=4"   class="btn btn-success mr-1" >Siparişi Teslim Et </a> 

  <?php } ?>

  <button class="btn btn-primary mr-1" onclick="printDiv()">FİŞİ YAZDIR</button> 

</div>
         </div>  
       </div> 


<table class="table table-striped"> <tbody> 
                <tr> <th scope="row"> Sipariş Durumu    </th>   <td>  <?php  if($urunce111k['durum']==1){ echo 'Sipariş Alındı, Onay Beklemektedir'; } 
            else if($urunce111k['durum']==2){ echo 'Sipariş Hazırlanıyor'; }
             else if($urunce111k['durum']==3){echo 'Sipariş Yola Çıktı';}
             else if($urunce111k['durum']==4){echo 'Sipariş Teslim Edildi';}
             else if($urunce111k['durum']==0){echo 'Sipariş İptal Edildi';}
                ?>   </td>  </tr> 
                <tr> <th scope="row">  Ad Soyad :    </th>   <td><?php echo $urunce111k['ad_soyad'] ?>    </td>  </tr> 
                <tr> <th scope="row"> Telefon :     </th>   <td><?php echo $urunce111k['telefon'];  ?>   </td>  </tr> 
                <tr> <th scope="row"> Adres :          </th>   <td><?php echo $urunce111k['adres'];  ?>   </td>  </tr> 
                <tr> <th scope="row">  Ödeme Şekli :           </th>   <td><?php echo $urunce111k['odeme_turu'] ?>   </td>  </tr> 
                <tr> <th scope="row"> Şipariş Türü :           </th>   <td><?php echo $urunce111k['siparis_turu'] ?>   </td>  </tr> 
                <tr> <th scope="row">  Sipariş Notu:           </th>   <td><?php echo $urunce111k['mesaj'] ?>   </td>  </tr> 
                <tr> <th scope="row">  Kurye Seçimi:           </th>   <td class="row">
                <form action="" method="post">
                  <select class="form-control col-md-9 mr-1" name="kurye_id">
                 <?php    $datacon15=$db->prepare("SELECT * FROM kurye_yonetimi where kat_id=?  ");  
             $datacon15->execute(array(  $_GET['departman'] )); 
              while ( $kuryecek=$datacon15 -> fetch(PDO:: FETCH_ASSOC)){ ?> <option value="<?php echo $kuryecek['id']; ?>" <?php if($kuryecek['id']==$urunce111k['kurye_id']){ echo 'selected';} ?>>  <?php echo $kuryecek['kurye_adi']; ?></option>  
            <?php } ?>
                </select> <button class="col-md-2 btn btn-success" type="submit" name="kurye_secimi">Kaydet</button> </form>  </td>  </tr> 
                 
                 
                     </tbody> </table>
       
         <?php   $toplamtutar = 0 ;  
                  $datacon15=$db->prepare("SELECT * FROM siparisler where siparis_id=?  ");  
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
                
                   </div>
                   
                   
                </div>
              </div>
 

             <?php  }} ?>
       </div>

      </form>
      
   </div>
     <div class="col-md-12 col-xl-3">
      <div class="card fisYazdir" >
       <div  class="card-body"  id="GFG" >
        <center> <h5>Adisyon</h5></center>
         <hr>

<style type="text/css">
  #adisyon th, #adisyon td {
       border-bottom: 1px solid #00000000;
       padding: 0.75rem 0rem;
}
</style>
<table class="table  " id="adisyon"> <tbody> 
               
                <tr> <th scope="row">  Ad Soyad :    </th>   <td><?php echo $urunce111k['ad_soyad'] ?>    </td>  </tr> 
                <tr> <th scope="row"> Telefon :     </th>   <td><?php echo $urunce111k['telefon'];  ?>   </td>  </tr> 
                <tr> <th scope="row"> Adres :          </th>   <td><?php echo $urunce111k['adres'];  ?>   </td>  </tr> 
                <tr> <th scope="row">  Ödeme Şekli :           </th>   <td><?php echo $urunce111k['odeme_turu'] ?>   </td>  </tr> 
                <tr> <th scope="row"> Şipariş Türü :           </th>   <td><?php echo $urunce111k['siparis_turu'] ?>   </td>  </tr> 
                <tr> <th scope="row">  Sipariş Notu:           </th>   <td><?php echo $urunce111k['mesaj'] ?>   </td>  </tr> 
                  <tr><th scope="row">Kurye : </th> <td><?php   $datacon15=$db->prepare("SELECT * FROM kurye_yonetimi where id=?  ");  
             $datacon15->execute(array(  $urunce111k['kurye_id'] )); 
              $kuryecek=$datacon15 -> fetch(PDO:: FETCH_ASSOC); echo $kuryecek['kurye_adi'];   ?></td></tr>
                 
                     </tbody> </table>
       <hr>
        <table class="table  " id="adisyon"> 
         <thead>
          <tr>
          <th>Ürün</th>
          <th>Miktar</th>
          <th>Fiyat</th>
          <th>Tutar</th>
          </tr>
        </thead>
        <tbody  style="border-top: 1.5px solid #bcb6b6;">
  <?php   $toplamtutar = 0 ;  
                  $datacon15=$db->prepare("SELECT * FROM siparisler where siparis_id=? ");  
             $datacon15->execute(array(  $_GET['masaid'] ));
                 



                      while ( $datacek12=$datacon15 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
                      <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                            


                            while ( $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC)){
 ?>
          <tr>
          <td style="font-size: 12px;"><?php echo substr($datacek11["urun_adi"], 0,30) ;?> </td>
          <td style="    text-align: center;"><?php 

                                           

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
                        
                       // echo   '    '. $alt_varyantcek["varyant_ad"]  ;
                           $urun_fiyat = $alt_varyantcek["fiyat"];
                          } 

                                       
                                            

                                      
                   
                   }
                                                      } else {   $urun_fiyat = $datacek11["urun_fiyat"] ;

                                       $geneltoplam   =   $datacek12["urun_adet"] *  $datacek11["urun_fiyat"] ;
                                      
                                             echo   $datacek12["urun_adet"]  ;      }  ?>

 </td>
          <td><?php  echo  str_replace('.00', '',  $datacek11["urun_fiyat"])   ;  ?>₺ </td>
          <td><?php
echo   str_replace('.00', '', number_format($geneltoplam, 2))    .  ' ₺  '   ;  $toplamtutar += $geneltoplam ;                                             

 ?> </td>
          </tr>
        <?php }} ?>

        </tbody>
       </table>
         
             
 
 
             <div class="card  ">
              <div class="card-body">
                  <h6 >  Toplam Tutar:  </b> <span class="float-right"> <?php echo   str_replace('.00', '', number_format($toplamtutar, 2))    ; ?>  ₺</span>
</h6>
             </div>
              </div>
            </div>
          
     
 </div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<?php if(isset($_GET['status'])){
   
         $bayiupdate1=$db->prepare("UPDATE `siparis_islemler` set durum = ? where id=? ");
       $update=$bayiupdate1->execute(array( $_GET['status'],   $_GET['masaid']  ));
        header("Location:./paket-siparis-detay.php?masaid=". $_GET['masaid']);

 

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

