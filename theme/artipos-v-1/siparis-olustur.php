<?php include 'header.php'; $page="sepetim"; ?>
<?php 

if(isset($_POST['whatsapp-siparis-olustur'])){

	$phone =  $katlarcek['whatsapp'];
	$text = ' Merhabalar, Sipariş vermek istiyorum.  ';

 $text .= ' Ad Soyad : ' .  $_POST['name']  .  ' Telefon : ' .  $_POST['phone']   .  ' Adres : ' .  $_POST['address']   .  ' Sipariş Türü : ' . $_POST['siparis-type'] .  ' Ödeme Türü : ' .  $_POST['payments'] .  ' Sipariş Notu : ' .  $_POST['message'] . ' Siparişim :  ' ;
								  $datacon12=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1 ");  
             $datacon12->execute(array(   $masa_id_no ));
                 



                      while ( $datacek12=$datacon12 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
										  <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                        
                         $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC);

 
  $karakter_sayisi = strlen($datacek12["varyantlar"]);
 $geneltoplam = 0;

$text .= ' ' . $datacek11['urun_adi'] .  ' ' . $datacek12["urun_adet"]  .  ' Adet  ' ;


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

											     $text .= ' ' .  $alt_varyantcek["varyant_ad"] ; 
												  } 

                                       
                                      	    

                                      
                   
                   }
                                                      } else {   $urun_fiyat = $datacek11["urun_fiyat"] ;

                                   	   $geneltoplam   =   $datacek12["urun_adet"] *  $datacek11["urun_fiyat"] ;
                                   	 	
                                                      }
                                                  }


                                         	

	header("location:https://api.whatsapp.com/send/?phone=".$phone."&text=".$text."&type=phone_number&app_absent=0");
}

if(isset($_POST['siparis-olustur'])){


  $kaydet=$db->prepare("INSERT INTO `siparis_islemler` (`id`, `uye_id`, `tarih`, `siparis_toplam`, `durum`, `ad_soyad`, `telefon`, `adres`, `siparis_turu`, `odeme_turu`, `mesaj`, `kurye_id`) 
  	VALUES (NULL, ?, current_timestamp(), ?, ?, ?, ?, ?, ?, ?, ?, '0')");

  $insert=$kaydet->execute(array( $kullanici_user_id, '0', '1' , $_POST['name'], $_POST['phone'], $_POST['address'], $_POST['siparis-type'] , $_POST['payments'] , $_POST['message'] ));



  if ($insert) {

  

echo $siparis_id = $db->lastInsertId(); 



								  $datacon12=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1 ");  
             $datacon12->execute(array(   $masa_id_no ));
                 



                      while ( $datacek12=$datacon12 -> fetch(PDO:: FETCH_ASSOC)){

                        ?>
										  <?php   $datacon11=$db->prepare("SELECT * FROM urunler where id=?");  



                            $datacon11->execute(array(  $datacek12["urun_id"] ));

                            
                        
                         $datacek11=$datacon11 -> fetch(PDO:: FETCH_ASSOC);


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

                     

                           

$kaydet=$db->prepare("INSERT INTO `siparisler` (`id`, `uye_id`, `siparis_id`, `siparis_tarihi`, `urun_id`, `urun_adet`, `tutar`, `durum`, `varyantlar`)
 VALUES (NULL, ?, ?, current_timestamp(), ?, ?, ?, ?, ?)");

			$insert=$kaydet->execute(array( $kullanici_user_id, $siparis_id ,  $datacek11["id"],  $datacek12["urun_adet"] ,   $geneltoplam , '1' , $datacek12['varyantlar']	));



                      
					  }



	 

}

	$sil=$db->prepare("DELETE  from sepet where masa_id=?");

			$kontrol=$sil->execute(array(

				 $kullanici_user_id

				));



			Header("Location:sepetim.php?durum=okey&masa_id_no=package");

			exit;

} ?>
<div class="app-body p-4 form-wrap">
<form action="" method="POST" class="mb-3">
						<h4 class="mt-2 ">Siparişi Tamamla</h4>
<hr>
								<div class=" pt-3"> 
									<label>Sipariş Tipi</label>
									<div class="input-group  bg-white" style="    justify-content: flex-start;  align-items: center;">
					                	
	<div style=" justify-content: center; align-items: center; display: contents; "> 
					                	<input type="radio"  id="siparis-type" name="siparis-type" value="Eve Sipariş" checked="checked">
										<label for="siparis-type" style="margin-bottom: 0px; margin-left: 5px; margin-right: 10px">Eve Sipariş</label>
									</div>
										<div style=" justify-content: center; align-items: center; display: contents; ">
					                		 <input type="radio"  id="siparis-type1" name="siparis-type" value="Gel Al Servis">
										<label for="siparis-type1" style="margin-bottom: 0px; margin-left: 5px;">Gel Al Servis</label> </div>
										</div>
					              	</div>
					              	<hr>
<div class=" pt-3"> 
									<label>Ödeme Tipi</label>
									<div class="input-group  bg-white" style="    justify-content: flex-start;  align-items: center;">
					                		<div style=" justify-content: center; align-items: center; display: contents; ">
					                		 <input type="radio"  id="payments" name="payments" value="Nakit" checked>
										<label for="payments" style="margin-bottom: 0px; margin-left: 5px; margin-right: 10px">Nakit</label> </div>
	<div style=" justify-content: center; align-items: center; display: contents; "> 
										<input type="radio"  id="payments1" name="payments" value="Kredi Kartı" >
										<label for="payments1" style="margin-bottom: 0px; margin-left: 5px;">Kredi Kartı</label>
									</div>
										</div>
					              	</div>

							 		<div class="input-group mb-3 mt-3 bg-white">
					                	<input class="form-control form-control-lg" id="username" name="name" type="text" required="required" placeholder="Adınız ve Soyadınız (zorunlu)">
					              	</div>
					              	 
					              	<div class="input-group mb-3 mt-3 bg-white">
					                	<input class="form-control form-control-lg" id="username" name="phone" type="text"  required="required" placeholder="Telefon Numaranız (zorunlu)">
					              	</div>
 					              	<div class="input-group mb-3 mt-3 bg-white">
 					              		<input class="form-control form-control-lg" id="username"  name="address" type="text"  required="required" placeholder="Adresiniz (zorunlu)">

 					              	</div>
					              		<div class="input-group mb-3 mt-3 bg-white">
					               <input class="form-control form-control-lg" id="username"  name="message" type="text"  placeholder="Sipariş Notu (zorunlu değil)">

 					              	</div>
					               <center><button type="submit" name="siparis-olustur" class="bg-red-gradiant fw-600 mt-4 next-tour btn btn-lg pl-0 text-center w-100 text-white"> 
					               	<i class="ti-shopping-cart mr-2"></i>  Siparişi Tamamla</button> 
					               </center>	
					                 <center><button type="submit" name="whatsapp-siparis-olustur" style="background: linear-gradient(90deg, #25d366 0%, #128a3f 100%);" class="bg-red-gradiant fw-600 mt-4 next-tour btn btn-lg pl-0 text-center w-100 text-white"> 
					               	<i class="fa fa-whatsapp mr-2"></i>  Whatsapp'tan Siparişini İlet</button> 
					               </center>		
								 
							</form>
					<h4 class="mt-3">Sepetteki Ürünler</h4>
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
	
</div>
					</div>
				 
				</div>		


			</div>
			<?php include 'footer.php'; ?>