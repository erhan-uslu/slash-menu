<?php include 'header.php';  $page="kategori"; ?>
				<?php include 'search-form.php'; ?>
<?php $kategori_con=$db->prepare("SELECT * FROM kategoriler  where  seo_url=?");  

 $kategori_con->execute(array( $_GET['i'] ));
  $kategorisorgula = $kategori_con->RowCount(); 
$kategori_cek=$kategori_con -> fetch(PDO:: FETCH_ASSOC); 
 if ($kategorisorgula==0) {
   header('Location:'.$siteyolu);
 }    ?>
			 						  

				<div class="app-body p-4">
					
						  
					<?php  $kategoricount = 0;
 $datacon2=$db->prepare("SELECT * FROM kategoriler  where  durum='1' and ust_id=? and kat_id=".$kat_id."  Order by sira ASC ");  

$datacon2->execute(array( $kategori_cek['id'] ));
       $dataCount = $datacon2->RowCount();
       if($dataCount>=1) { ?> 
       <div class="row">	 
<div class="col-sm-12">
					 		 
					 		<ul class="shop-item pl-0">
 <?php    

       while ($kategoricek=$datacon2 -> fetch(PDO:: FETCH_ASSOC)){   ?>
					 			<li> <a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>	"><div class="item list-item-full bg-gradiant-black pl-0 pr-0">
 							 				<img src="timthumb?src=<?php echo $siteyolu; ?><?php echo  $kategoricek['ust_kategori_resim']; ?>&w=200&h=130&zc=4&a=tc" alt="image"> 
							 			 
							 		</div> 
	<a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>">	<h5 class=" fw-600 mb-0" style="  color : #111; text-align: center;
     font-size: 15px"><?php echo  $kategoricek['kategori_ad']; ?></h5> </a>
						</a>	 	</li>
					 			 <?php } ?>
					 		</ul>
					 	</div>
					 	</div>
					 <?php } else { ?>

					
					<div class="row">
						  
			 	 
<div class="col-sm-12">
					 		 <div class="item-header fw-600 text-black mt-3 mb-3"  style=" display:flex;     align-items: center;">
                                  <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-danger mb-2 mr-3"><i class="fa fa-arrow-left" style="top:0!important;"></i></a>

                               <h4 style="margin-bottom: 14px;"><?php echo $kategori_cek['kategori_ad']  ?>
</h4> </div>
					 		<ul class="shop-item pl-0">
 
                              <?php      $uruncon=$db->prepare("SELECT * FROM urunler where urun_alt_kategori=? and durum=1  and kat_id=".$kat_id." order by id asc ");

                                     $uruncon->execute(array( $kategori_cek['id']  ));
                                        while ($uruncek=$uruncon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                              
<?php $url  =  seo($uruncek['urun_adi']) .'-'. $uruncek['id'] . '/' ; ?>
					 			<li>

<div class="item list-item-full bg-gradiant-black pl-0 pr-0" style="border-radius: 7px;">
							 			<figure class="mb-0"><a href="<?php echo  $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>">
							 				<img id="img<?php echo $uruncek['id'] ?>" src="timthumb?src=<?php echo $siteyolu; ?><?php echo $uruncek['urun_resim']; ?>&w=600&h=450&zc=4&a=tc" style="width: 100%; " 
					 				 onerror="this.onerror=null;this.src='timthumb?src=<?php echo $siteyolu ?>images/default-img.png&w=210&h=210&zc=4&a=tc';"></a></figure>
							 			<a href="<?php echo  $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><div class="content-div" style="
       padding-top: 113px;
    padding-right: 4px;">
							 			<h6 class="text-white fw-600 mb-0" style="     float: right;
    background-color: #ff051c;
    padding: 3px 6px;
    border-radius: 5px;     min-width: 49px;
    text-align: center;"><?php echo $fiyat = str_replace('.00', '' , $uruncek['urun_fiyat']); ?>₺</h6>
 							 			</div></a>
							 		</div>
					 			 
					 			<a   href="<?php echo  $url ; ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>">	<h4 style="text-align: center;   color: #ff0017;"><?php echo substr($uruncek['urun_adi'], 0,50); ?></h4>
					 			</a> </li>     
                              
					 			 <?php }  ?>
					 		</ul>
					 	</div>
					 

					 

					</div>
				<?php } ?>
				</div>			
			</div>
			<?php include 'footer.php'; ?>