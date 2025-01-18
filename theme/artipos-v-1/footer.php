<nav class="navigation style6 style1">
				<div class="container pl-0 pr-0">
					<div class="nav-content">
						<ul>
		 <li><a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="nav-content-bttn <?php if($page=="home"){echo 'active';} ?>" data-tab="friends"><i class="ti-home"></i>Menü</a></li>
							<li><a href="category/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="nav-content-bttn <?php if($page=="kategori"){echo 'active';} ?>" data-tab="chats"><i class="ti-search"></i>Arama</a></li>
<?php if($garson_modulu>=1){ 
if($_GET['masa_id_no']!='package'){ ?>
<li ><a href="garson-cagir/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&status=1" class="nav-content-bttn nav-center menu-active text-white" style="padding-bottom: 5px;"  ><i class="ti-user text-white"></i>Garson <br> Çağır</a></li>
<?php }} ?>
						<?php if($sepet_modulu) { ?>	<li><a href="sepetim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="nav-content-bttn <?php if($page=="sepetim"){echo 'active';} ?>" data-tab="favorites"><i class="ti-shopping-cart"></i>Sepetim</a></li>
								<?php } else { ?> 
								
								<?php } ?>
                          	<li><a href=" <?php echo $katlarcek['instagram']; ?>" class="nav-content-bttn <?php if($page=="sepetim"){echo 'active';} ?>" data-tab="favorites"><i class="ti-instagram"></i>İnstagram</a></li>
                          							<li><a  href="iletisim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="nav-content-bttn <?php if($page=="contact"){echo 'active';} ?> "><i class="ti-info-alt"></i>Bilgi</a></li>	

						</ul>
					</div>
				</div>
			</nav>
		</div>
		
		<nav class="outer-nav left vertical ">
			<header class="bg-tranparent style2 mt-3 pb-0 bg-home">
				<div class="row">
					<div class="col-sm-4 text-left pos-top">
						<a href="#" class="menu-btn " id="close-sidebar" style="    padding: 10px;
    margin-top: 21px;"></a>
					</div>
					<div class="col-sm-4 text-center pos-top">
						<a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="logo d-block mt-1"><img src="<?php echo $siteyolu  . 'artiposlogowhite.png' ?>" style="    width: 100%;" alt=""></a>
					</div>
					<div class="col-sm-4 text-right pos-top">
						<?php if($sepet_modulu) { ?>	<a href="sepetim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="cart-btn mt-1"><i class="ti-shopping-cart"></i><span><?php 	  $sepet = 0 ; 

             $sepetcoun=$db->prepare("SELECT * FROM sepet where masa_id=? and durum=1");  
             $sepetcoun->execute(array(  $_GET['masa_id_no'] ));
          echo   $sepet = $sepetcoun->rowCount(); ?></span></a> <?php } ?>
	                </div>
	            </div>
	        </header>
	        <ul class="nav-item"> 
	        	 
	        	<li><a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" style="    padding-bottom: 0px;"><i class="ti-home"></i>Menü</a></li>

	        	<?php if($garson_modulu>=1){ ?><li><a href="category/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><i class="ti-search"></i>Arama</a></li>
	        <?php } ?>
	        	<?php if($sepet_modulu) { ?>		<li><a href="sepetim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>"><i class="ti-shopping-cart"></i>Sepetim</a></li>
	        <?php } ?>
	        	<li><a href="iletisim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" style="    padding-bottom: 0px;"><i class="ti-headphone-alt"></i>İletişim</a></li>
                            	        	<li><a href="<?php echo $katlarcek['instagram']; ?>"><i class="ti-instagram"></i>Instagram</a></li>

 		        	<li  style="    margin-top: 180%;"><a href="http://artipos.com/" style="font-size: 13px; padding: 0px"> Artıpos tarafından yapılmıştır.  </a></li>
	        	<li ><a href="tel:0 850 441 11 91" style="     padding: 0px;"><i class="fa fa-phone"></i> 0 850 441 11 91</a></li>
	        	<li ><a href="tel:0 850 441 11 91" style="     padding: 0px;"><i class="fa fa-globe"></i> www.artipos.com</a></li>

	    
	      </ul>
		</nav>
	</div>
	<!-- main wrapper -->

	

	
	<!-- SCRIPTS -->
	<script src="<?php echo $siteyolu ?>theme/artipos-v-1/js/plugin.js"></script>
	<script src="<?php echo $siteyolu ?>theme/artipos-v-1/js/main.js"></script>
	
	

</body>

</html>
 
