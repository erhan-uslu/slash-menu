<?php include 'header.php'; $page="sepetim"; ?>
<div class="app-body p-4 form-wrap">
					<?php if($_GET['masa_id_no']=='package'){ 

 $datacon1222=$db->prepare("SELECT * FROM siparis_islemler where uye_id=?  ");  
             $datacon1222->execute(array(  $kullanici_user_id ));
             		$sayyy = $datacon1222->RowCount();
             		if($sayyy>=1){					 ?>
             			<style type="text/css">
             				.main-wrapper .main-content .menu-item li {
    box-shadow: 0px 0 0 rgb(0 0 0 / 15%);
    background-color: #fff;
    margin: 0 0 10px 0;
    display: block;
    padding: 10px;
    border-radius: 10px;
    font-size: 14px;
    text-align: left;
    justify-content: space-between;
    display: flex;
}
             			</style>
					<h4 class="mt-4">Verilen Siparişler</h4>
					<?php  while ( $siparis_islem_cek=$datacon1222 -> fetch(PDO:: FETCH_ASSOC)){ ?>
					<div class="row mt-2 mb-3">
						
						 <?php 	 $toplamtutar = 0 ;

								  $datacon12=$db->prepare("SELECT * FROM siparisler where siparis_id=?  ");  
             $datacon12->execute(array( $siparis_islem_cek['id'] ));
                 



                      while ( $datacek12=$datacon12 -> fetch(PDO:: FETCH_ASSOC)){
                 
                     $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                            
 

                            while ( $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC)){

                            
                           $url  =  seo($datacek11['urun_adi']) .'-'. $datacek11['id'] . '/' ; ?>

						<div class="col-sm-12 mt-1">
							<div class="card">
								<div class="card-body pt-3">
									<div class="col-sm-12 mt-0 list-item pl-0 pr-0 d-flex">
							 			<figure class="mr-3"><a href="<?php echo $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><img src="<?php echo $siteyolu; ?><?php echo $datacek11["urun_resim"]; ?>" alt="image"></a></figure>
							 			<div class="content-div mr-3">
							 				<h4 class="text-black mb-1"><?php echo substr($datacek11["urun_adi"], 0,30) ;?> </h4>

							 				<h4 class="text-black mb-1"><?php  echo   $datacek11["urun_fiyat"];  ?>₺ </h4>
							 				<h5><?php 

                                           

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
                                   	 	
                                                      }

                     

echo '<br>' .  $datacek12["urun_adet"]  . ' x '  . number_format($geneltoplam, 2) .  ' ₺  '   ;  $toplamtutar += $geneltoplam ;                                             

 ?> </h5>
 							 			</div>
 							 			<?php if($datacek12["durum"]==2){ ?>
							 		 <h4 style="color:green;">Hazırlanıyor! <br> </i> 
							 		<p> Hazırlama Süresi:  <?php echo $datacek12['tahmini_hazirlama']; ?> dk </p> </h4>  
							 		
							 		 <?php } ?>
							 		 	<?php if($datacek12["durum"]==3){ ?>
							 		 <h4 style="color:green;">Sipariş Hazırlandı!</h4>
							 		 <?php } ?>
							 		 </div>
							 		 
							 		 
								</div>
							</div>
						</div>


						 <?php 	}} ?>

						<div class="col-sm-12 mt-2">
							<div class="card">
								<div class="card-body pt-3">
<h4>  Toplam Tutar:  </b> <span class="float-right"> <?php echo   number_format($toplamtutar, 2)    ; ?>  ₺</span>
</h4>
</div>
 
</div>


</div>
	<div class="col-sm-12 mt-2 mb-2">
							<div class="card">
								 	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne<?php echo $siparis_islem_cek['id'] ?>" style="border-bottom : 0px;">
									<h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $siparis_islem_cek['id'] ?>" 
										aria-expanded="true" aria-controls="collapseOne<?php echo $siparis_islem_cek['id'] ?>" class="collapsed">Sipariş Detayları <span></span></a></h4>
								</div>
								<div id="collapseOne<?php echo $siparis_islem_cek['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $siparis_islem_cek['id'] ?>">
									<div class="panel-body">
										 
<ul class="menu-item list-inline tooltrip-div pos-top">
					 <li> <span>Sipariş Durumu  </span> : 
					  <span style="    text-align: right;"> <?php  if($siparis_islem_cek['durum']==1){ echo 'Siparişiniz Alındı, Onay Beklemektedir'; } 
					  else if($siparis_islem_cek['durum']==2){ echo 'Siparişiniz Hazırlanıyor'; }
					   else if($siparis_islem_cek['durum']==3){echo 'Siparişiniz Yola Çıktı';}
					   else if($siparis_islem_cek['durum']==4){echo 'Siparişiniz Teslim Edildi';}
					   else if($siparis_islem_cek['durum']==0){echo 'Siparişiniz İptal Edildi. Bizimle İletişime Geçiniz';}
					      ?> </span> </li><li>
 <span> Ad Soyad :  </span> <span><?php echo $siparis_islem_cek['ad_soyad'] ?> </span></li><li>
 <span> Telefon :  </span> <span><?php echo $siparis_islem_cek['telefon'] ?> </span></li><li>
 <span> Adres :  </span> <span style="font-size: 12px;"><?php echo $siparis_islem_cek['adres'] ?> </span></li><li>
 <span> Ödeme Şekli :  </span> <span><?php echo $siparis_islem_cek['odeme_turu'] ?> </span> </li><li>
 <span> Şipariş Türü : </span>  <span><?php echo $siparis_islem_cek['siparis_turu'] ?> </span></li><li>
 <span> Sipariş Notu:  </span> <span style="font-size: 12px;"><?php echo $siparis_islem_cek['mesaj'] ?> </span></li>
					</ul>
									</div>
								</div>
							</div>
						</div>
 							
 							</div>
						</div>

					</div>
					 <hr>
				<?php } } }?>
					<h4 class="mt-2">Sepetteki Ürünler</h4>
					<div class="row">
						 <?php 	
 
								  $datacon12=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1 ");  
             $datacon12->execute(array(   $masa_id_no ));
                 



                      while ( $datacek12=$datacon12 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
										  <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                            


                            while ( $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC)){

                            
                            $url  =  seo($datacek11['urun_adi']) .'-'. $datacek11['id'] . '/' ; ?>

						<div class="col-sm-12 mt-1">
							<div class="card">
								<div class="card-body pt-3">
									<div class="col-sm-12 mt-0 list-item pl-0 pr-0 d-flex">
							 			<figure class="mr-3"><a href="<?php echo $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><img src="<?php echo $siteyolu; ?><?php echo $datacek11["urun_resim"]; ?>" alt="image"></a></figure>
							 			<div class="content-div mr-3">
							 				<h4 class="text-black mb-1"><?php echo substr($datacek11["urun_adi"], 0,30) ;  echo  ' ' .  $datacek11["urun_fiyat"];  ?>₺ </h4>
							 				<h5><?php 

                                           

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
                                   	 	
                                                      }

                     

echo '<br>' .  $datacek12["urun_adet"]  . ' x '  . number_format($geneltoplam, 2) .  ' ₺  '   ;  $toplamtutar += $geneltoplam ;                                             

 ?> </h5>
 							 			</div>
							 		<a href="<?php echo $siteyolu; ?>islemler/islem.php?deletesepet=<?php echo $datacek12["id"]; ?>&masa_id_no=<?php echo $_GET['masa_id_no']; ?>">	<i class="ti-close mt-2 text-red"></i></a>
							 		</div>
							 		 
							 		 
								</div>
							</div>
						</div>


						 <?php 	}} ?>
						<div class="col-sm-12 mt-2"><div class="card">
								<div class="card-body pt-3">
<h4 >  Toplam Tutar:  </b> <span class="float-right"> <?php echo   number_format($toplamtutar, 2)    ; ?>  ₺</span>
</h4></div></div>
	<?php if($_GET['masa_id_no']!='package'){ ?>
	 <a href="<?php echo $siteyolu; ?>islemler/islem.php?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&siparisi_olustur=<?php echo rand(121212,9999999); ?>" class="bg-red-gradiant fw-600 mt-4 next-tour btn btn-lg pl-0 text-center w-100 text-white">
	 	<i class="ti-shopping-cart mr-2"></i>Siparişi Oluştur</a>
	<?php } else { ?>
	  <a href="siparis-olustur?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&siparisi_olustur=<?php echo rand(121212,9999999); ?>" class="bg-red-gradiant fw-600 mt-4 next-tour btn btn-lg pl-0 text-center w-100 text-white">
	  	<i class="ti-shopping-cart mr-2"></i>Siparişi Oluştur</a>
	<?php } ?>
</div>
					</div>
					<?php if($_GET['masa_id_no']!='package'){ ?>
					<h4 class="mt-4">Verilen Siparişler</h4>
					<div class="row mt-2">
						 <?php 	 $toplamtutar = 0 ;

								  $datacon12=$db->prepare("SELECT * FROM sepet where masa_id=? and durum >=2 and durum <=3 ");  
             $datacon12->execute(array(  $masa_id_no ));
                 



                      while ( $datacek12=$datacon12 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
										  <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                            


                            while ( $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC)){

                            
                            $url  =  seo($datacek11['urun_adi']) .'-'. $datacek11['id'] . '/' ; ?>

						<div class="col-sm-12 mt-1">
							<div class="card">
								<div class="card-body pt-3">
									<div class="col-sm-12 mt-0 list-item pl-0 pr-0 d-flex">
							 			<figure class="mr-3"><a href="<?php echo $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><img src="<?php echo $siteyolu; ?><?php echo $datacek11["urun_resim"]; ?>" alt="image"></a></figure>
							 			<div class="content-div mr-3">
							 				<h4 class="text-black mb-1"><?php echo substr($datacek11["urun_adi"], 0,30) ;?> </h4>

							 				<h4 class="text-black mb-1"><?php  echo   $datacek11["urun_fiyat"];  ?>₺ </h4>
							 				<h5><?php 

                                           

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
                                   	 	
                                                      }

                     

echo '<br>' .  $datacek12["urun_adet"]  . ' x '  . number_format($geneltoplam, 2) .  ' ₺  '   ;  $toplamtutar += $geneltoplam ;                                             

 ?> </h5>
 							 			</div>
 							 			<?php if($datacek12["durum"]==2){ ?>
							 		 <h4 style="color:green;">Hazırlanıyor! <br> </i> 
							 		<p> Hazırlama Süresi:  <?php echo $datacek12['tahmini_hazirlama']; ?> dk </p> </h4>  
							 		
							 		 <?php } ?>
							 		 	<?php if($datacek12["durum"]==3){ ?>
							 		 <h4 style="color:green;">Sipariş Hazırlandı!</h4>
							 		 <?php } ?>
							 		 </div>
							 		 
							 		 
								</div>
							</div>
						</div>


						 <?php 	}} ?>
						<div class="col-sm-12 mt-2">
							<div class="card">
								<div class="card-body pt-3">
<h4>  Toplam Tutar:  </b> <span class="float-right"> <?php echo   number_format($toplamtutar, 2)    ; ?>  ₺</span>
</h4>
</div>
 
</div>

 
</div>

					</div>
				<?php } ?>
				</div>		


			</div>
			<?php include 'footer.php'; ?>