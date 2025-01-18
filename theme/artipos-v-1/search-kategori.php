<?php include 'header.php';  $page="kategori"; ?>
				<?php include 'search-form.php'; ?>

			 
				<div class="app-body p-4">
					<div class="row">
						  
					 	 
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
	<a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>">	<h5 class=" fw-600 mb-0" style="  color : #111; text-align: center;
     font-size: 15px"><?php echo  $kategoricek['kategori_ad']; ?></h5> </a>
						</a>	 	</li>
					 			 <?php } ?>
					 		</ul>
					 	</div>
					 

					</div>
				</div>			
			</div>
			<?php include 'footer.php'; ?>