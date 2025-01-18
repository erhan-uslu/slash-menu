<?php include 'header.php';  $page="kategori"; ?>
				<?php include 'search-form.php'; ?>
 
 			 
				<div class="app-body p-4">
					<div class="row">
						  
			 	 
<div class="col-sm-12">
					 		 <div class="item-header fw-600 text-black mt-3 mb-3"><h4><?php echo  $_GET['i'] ;?>
</h4> </div>
					 		<ul class="shop-item pl-0">
 
                              <?php    $urun_adi = $_GET['i'];     $uruncon=$db->prepare("SELECT * FROM urunler where  urun_adi LIKE ? and durum=1 and kat_id=".$kat_id." order by id asc ");

                                     $uruncon->execute(array( "%$urun_adi%"  )); 
                                        while ($uruncek=$uruncon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                   
<?php $url  =  seo($uruncek['urun_adi']) .'-'. $uruncek['id'] . '/' ; ?>
					 			<li><a href="<?php echo  $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>">
					 				<img src="<?php echo $siteyolu; ?><?php echo $uruncek['urun_resim']; ?>" alt="banner"></a>
					 			<a href="<?php echo  $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>">	<h4><?php echo substr($uruncek['urun_adi'], 0,50); ?></h4>
					 			</a><span><?php echo $uruncek['urun_fiyat']; ?>€</span></li>
					 			 <?php }  ?>
					 		</ul>
					 	</div>
					 

					 

					</div>
				</div>			
			</div>
			<?php include 'footer.php'; ?>