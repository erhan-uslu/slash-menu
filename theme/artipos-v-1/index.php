<?php include 'header.php'; $page="home"; ?>
 <?php include 'search-form.php'; ?>
 <?php include '../../popup.php'; ?>

				<div class="app-body p-4">
					<div class="row">
						 
						<div class="col-sm-12 mb-1">
							<div class="profile-content-tab active-tab" id="Popular">
								<div class="owl-carousel owl-theme item-category travel-slider" style="width:135%;">
									
   <?php  

       $slidercon=$db->prepare("SELECT * FROM `slider` where slide_turu='0' and kat_id=".$kat_id."  ");  

       $slidercon->execute(array(  ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                      <?php $url  =   $slidercek['slider_url']  ; ?>
									<div class="item list-item-full bg-gradiant-black pl-0 pr-0">
							 			<figure class="mb-0"><a href="<?php echo $url; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>#">
							 				<img src="timthumb?src=<?php echo $siteyolu; ?><?php echo $slidercek['slider_resim']; ?>&w=800&h=560&zc=4&a=tc" alt="image"></a></figure>
							 			<div class="content-div">
							 				<a href="<?php echo $url; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>">
							 				<h5 class="text-white fw-600 mb-0"><?php echo $slidercek['buyuk_slogan']; ?></h5> </a>
							 			</div>
 							 		</div>
							 	<?php } ?>
 							 		 					 		 
							 	</div>
							</div>
		  			  		</div>
					 	 <style type="text/css">
					 	 	 .list-item-full.bg-gradiant-black:after{
    background: linear-gradient(180deg, rgb(11 2 2 / 0%) 70%, transparent 100%);					 	}
					 	 </style>

<div class="col-sm-12">
					 		 <div class="item-header fw-600 text-black mt-3 mb-3" style="text-align: center;"><h4>Kategoriler
</h4> </div>
					 		<ul class="shop-item pl-0">
 <?php  $kategoricount = 0;
 $datacon2=$db->prepare("SELECT * FROM kategoriler  where durum='1' and ust_id=0  and kat_id=".$kat_id." Order by sira ASC ");  

$datacon2->execute(array(  ));
          

       while ($kategoricek=$datacon2 -> fetch(PDO:: FETCH_ASSOC)){   ?>
					 		<li> <a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&id=<?php echo $kategoricek['id'] ?>"><div class="item list-item-full bg-gradiant-black pl-0 pr-0">
 							 				<img src="timthumb?src=<?php echo $siteyolu; ?><?php echo  $kategoricek['ust_kategori_resim']; ?>&w=200&h=130&zc=4&a=tc" alt="image"> 
							 			 
							 		</div> 
	<a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&id=<?php echo $kategoricek['id'] ?>">	<h5 class=" fw-600 mb-0" style="  color : #111; text-align: center;
     font-size: 15px"><?php echo  $kategoricek['kategori_ad']; ?></h5> </a>
						</a>	 	</li>
					 			 <?php } ?>
					 		</ul>
					 	</div>

					</div>
				</div>			
			</div>

		 
			<?php include 'footer.php'; ?>