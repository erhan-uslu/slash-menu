<?php include 'header.php'; ?>
<?php 
 $uruncon=$db->prepare("SELECT * FROM urunler  where id=?");  

$uruncon->execute(array(  $_GET['id'] ));
 $urunsorgula = $uruncon->RowCount(); 

 if ($urunsorgula==0) {
   header('Location:'.$siteyolu);
 }

$uruncek=$uruncon -> fetch(PDO:: FETCH_ASSOC); ?>
	 
<?php if($sepet_modulu==1){   if (isset($_GET['masa_id_no']) && $_GET['masa_id_no']!='package') {
     if($_GET['masa_id_no']<=0){

  ?>
    <!-- Main Start -->
        <div class="app-body p-4 form-wrap pt-2">
<h4 class="text-center">Masa Seçimi Yapınız</h4>
 
      <div class="row">
           <?php      $uruncons=$db->prepare("SELECT * FROM `masalar` where kat_id=? order by id asc ");

                                     $uruncons->execute(array( $kat_id ));
                                        while ($urunceks=$uruncons -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                          <?php   $datacon12s=$db->prepare("SELECT * FROM sepet where masa_id=? ");  
             $datacon12s->execute(array(  $urunceks['id'] ));  $masaid = $datacon12s->RowCount(); ?>
        <div class="col-sm-4 mt-2" style="width: 33%"> <a href="<?php echo $_GET['i'] .'-'.  $_GET['id']  ?>/?masa_id_no=<?php echo $urunceks['id']; ?>">
         <div class="card" style="height: 100px; padding: 25px 0; background-color: <?php if($masaid>0){echo '#f75e5e';} else {echo '#3da433';} ?>;">
        <center>  <h2 class="text-white" style="font-size: 16px"><?php echo $urunceks['masa_adi']; ?></h2>
        <p  class="text-white">Masayı Seç</p> </center> 
         </div> </a>
      </div>  
    <?php } ?>
      </div>

        </div> 
        </div>



			<?php include 'footer.php'; ?>
        <?php  exit(); }  ?>





   <?php  }  }  ?>
				<div class="app-body single-item p-0">
					<div class="row">
						<div class="col-sm-12 mb-3">
							 <div class="owl-carousel owl-theme single-product owl-diot">
								<div class="item"><img src="<?php echo $siteyolu; ?><?php echo $uruncek['urun_resim'] ?>" alt="product"></div>
								  <?php  $urun_resimler=$db->prepare("SELECT * FROM urun_resim where urun_id=? Order By sira ASC  ");

                $urun_resimler->execute(array( $uruncek['id']  ));
                   while ($urun_resimlercek=$urun_resimler -> fetch(PDO:: FETCH_ASSOC)){ ?>
								<div class="item"><img src="<?php echo $siteyolu; ?><?php echo $urun_resimlercek['resim_yol'] ?>" alt="product"></div> <?php } ?>
						 <div class="item"><img src="<?php echo $siteyolu; ?><?php echo $uruncek['urun_resim'] ?>" alt="product"></div>

							</div>
						</div>
					</div>
				 

				<div class="app-body single-item pr-4 pl-4 ">
					<div class="row">
						<div class="col-sm-12 mb-3 content-div text-center">
 							<h4 class="item-title"><?php echo $uruncek['urun_adi'] ?></h4>
							<h5 class="item-price"><span><?php echo $uruncek['urun_fiyat']; ?>₺</span> </h5>
						</div>
					</div>    

<?php if($_GET['durum']=="sepet_eklendi"){ ?>
 <div class="alert alert-dismissible fade show alert-success" role="alert"><p class="mb-0">
 Tebrikler! Siparişiniz Sepete Eklendi.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
<?php } ?>
<?php if($sepet_modulu==1){ ?>
					<?php $detayname = seo($uruncek["urun_adi"]); ?>  
					<form class="row" action="../../islemler/islem.php?<?php echo "urun_id=". $uruncek["id"] . "&name=" . $detayname . "&masa_id_no=" . $_GET['masa_id_no'] ?>" method="post">
						 <?php $varyantcon=$db->prepare("SELECT * FROM urun_varyantlar where urun_id=? and ust_id=0  ");

                                  $varyantcon->execute(array( $uruncek['id']  ));

                                  while ($varyantcek=$varyantcon -> fetch(PDO:: FETCH_ASSOC)){ ?>
						<div class="col-sm-6 pr-2 pt-2">
							<div class="select">
								<select  name="varyant<?php echo $varyantcek['id']; ?>"   id="price">
									<option selected="" disabled=""><?php echo $varyantcek['varyant_ad']; ?></option>
									
              <?php $alt_varyantcon=$db->prepare("SELECT * FROM urun_varyantlar where ust_id=?  order by id asc ");

                 $alt_varyantcon->execute(array(  $varyantcek['id']  ));

                      while ($alt_varyantcek=$alt_varyantcon -> fetch(PDO:: FETCH_ASSOC)){ ?>                    
                  
                  <option value="<?php echo $alt_varyantcek['id']; ?>" <?php if($alt_varyantcek['stok']==0){echo 'disabled="disabled"';} ?>> <?php echo $alt_varyantcek['varyant_ad']; ?> 
                  <?php if($alt_varyantcek['stok']==0){echo '(Tükendi)';} ?>  </option> <?php } ?>
								</select>
							</div>
						</div>			<?php } ?>
<div class="col-sm-6 pr-2 pt-2">
	<input type="hidden" name="kullanici_user_id" value="<?php echo $kullanici_user_id; ?>">
							<div class="select">
								 
								<select name="adet" id="sort" >
									<option  disabled="">Adet</option>
									<option selected="" value="1">1 Adet</option>
									<option value="2">2 Adet</option>
									<option value="3">3 Adet</option>
									<option value="3">4 Adet</option>
									<option value="3">5 Adet</option>
									<option value="3">6 Adet</option>

								</select>
							</div>
						</div> 
									<div class="col-sm-12 mt-4 content-div text-left">

						<hr>
							 
							<button type="submit" name="sepet-ekle" class="bg-red-gradiant fw-600 mt-2 next-tour btn btn-lg text-center w-100 text-white"><i class="ti-shopping-cart mr-2"></i> Sepete Ekle
							</button>
							<hr></div>
					</form>
				<?php } ?>
					<div class="row">
						<div class="col-sm-12 mt-4 content-div text-left">
 							<p><?php echo $uruncek['urun_aciklama'];?></p>
							<p><?php echo $uruncek['seo_aciklama'];?></p>
							
						</div>
					</div>
				</div>			
			</div></div>

			
			<?php include 'footer.php'; ?>