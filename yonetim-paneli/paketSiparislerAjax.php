<?php include '../islemler/baglan.php'; ?>
 
   <script type="text/javascript">
       var audio = new Audio("Run.mp3");
    </script>
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
    
<div class="row row-xs">
  <div class="col-md-12">
  <div class="row">
           <?php     $uruncon=$db->prepare("SELECT * FROM `siparis_islemler` where durum=?   order by id DESC ");

                                     $uruncon->execute(array(  $_GET['durum']  ));
                                        while ($uruncek=$uruncon -> fetch(PDO:: FETCH_ASSOC)){ 
             $datacon125=$db->prepare("SELECT * FROM siparis_islemler where  bildirim=0 ");  
             $datacon125->execute(array(   ));   $bildirim = $datacon125->RowCount(); ?>
        <div class="col-sm-12 col-xs-12 col-md-6 col-12  col-xl-3  col-lg-3   mt-2 mb-2"> <a href="paket-siparis-detay.php?masaid=<?php  echo  $uruncek['id']; ?>&departman=<?php echo $_GET['departman'] ?>">
         <div class="card" style="min-height: : 230px; height: 230px; padding: 20px 0; background-color: <?php if($uruncek['durum']==1){echo '#f75e5e';}  else {echo '#3da433';} ?>;">
          <?php if($uruncek['durum']==1){ ?>
    <center>     <p  class="text-white">YENİ SİPARİŞ VAR <p> </center>
    	
         <?php } ?>
        <center>      
<ul class="menu-item list-inline">
           <li style="    display: block;"> <span class="spans" >Sipariş Durumu : </span>  
            <span  class="spans" style="    text-align: right;"> 
              <?php  if($uruncek['durum']==1){ echo 'Sipariş Alındı, Onay Beklemektedir'; } 
            else if($uruncek['durum']==2){ echo 'Sipariş Hazırlanıyor'; }
             else if($uruncek['durum']==3){echo 'Sipariş Yola Çıktı';}
             else if($uruncek['durum']==4){echo 'Sipariş Teslim Edildi';}
             else if($uruncek['durum']==0){echo 'Sipariş İptal Edildi';}
                ?> </span> </li>
 <li style="    display: block;"> 
 <span class="spans" >Kurye : </span> <span  class="spans" ><?php   $datacon15=$db->prepare("SELECT * FROM kurye_yonetimi where id=?  ");  
             $datacon15->execute(array(  $uruncek['kurye_id'] )); 
              $kuryecek=$datacon15 -> fetch(PDO:: FETCH_ASSOC); echo $kuryecek['kurye_adi'];   ?></span></li>

                 <li style="    display: block;"> 
 <span class="spans" > Ad Soyad :  </span> <span class="spans" ><?php echo $uruncek['ad_soyad'] ?> </span></li>
  <li style="    display: block;"> 
 <span class="spans" > Telefon :  </span> <span class="spans" ><?php echo $uruncek['telefon'] ?> </span></li>  
  <li style="    display: block;"> 
 <span class="spans" > Adres :  </span> <span class="spans" ><?php echo $uruncek['adres'] ?> </span></li>  
           </ul>    
               <p  class="text-white"> Siparişi Görüntüle </p>
           
         </center>
   <div class="col-md-12">
               <?php  if($uruncek['durum']==1){ ?> <div class="row"> <div class="col-md-12 col-xl-12 pr-0   pl-0 ">
                <a href="?masaid=<?php echo $uruncek['id'] ?>&status=2" class="btn btn-success" style="width: 100%;" >Siparişi Onayla </a>
              </div>
              <div class="col-md-12 col-xl-12 pl-0 pr-0">  
                <a href="?masaid=<?php echo $uruncek['id'] ?>&status=0" class="btn btn-danger" style="width: 100%;"  > Siparişi İptal Et </a></div>
                  </div>  <?php } ?> 
               <?php  if($uruncek['durum']==2 || $uruncek['durum']==3 ){ ?> 
                <div class="row"> 
                <div class="col-md-12 col-xl-12 pl-0 pr-0">
                  <a href="?masaid=<?php echo $uruncek['id'] ?>&status=3"  class="btn btn-success" style="width: 100%; background-color: #9fa1a0 !important; border-color:  #9fa1a0 !important">Sipariş Yola Çıktı </a></div>
              <div class="col-md-12 col-xl-12 pl-0 pr-0 ">  <a href="?masaid=<?php echo $uruncek['id'] ?>&status=4"  class="btn btn-danger"  style="width: 100%;">Siparişi Teslim Et </a> </div> </div>  
            

            <?php } ?> 
             </div>
      </div>
    </a>
    
      </div>
      <?php   if($bildirim>0){ ?>
         <script type="text/javascript">
           audio.play()
             </script>
        
<?php   
     $bayiupdate1=$db->prepare("UPDATE `siparis_islemler` set bildirim = 1 where id=? ");
     $update=$bayiupdate1->execute(array(  $uruncek['id']  )); ?>
     
         <?php  } ?>
                     <?php  } ?>

         
        </div><!-- row -->
      </div><!-- container -->

     
