<?php include 'header.php';  $page="contact"; 



if (isset($_POST['iletisimf'])) {

 

$query5 = $db->prepare("INSERT INTO `iletisim_mailleri` (`id`, `adi`, `konu`, `mail`, `telefon`, `mesaj`, `zaman`, `ip`, `okundu`, `kat_id`)
 VALUES (NULL, ?, 'İletişim Mesajı',  '1', ?, ?, ?, '', '0', ?)");

$update5 = $query5->execute(array(  $_POST['name'], $_POST['phone'], $_POST['message']  , '' , $kat_id   ));
 
 }



?>
  
 			 
				 	<div class="app-body p-4 form-wrap pt-2">
				 		<div class="col-md-12 mb-2 mt-2">
				 			<div class="card">
				 				<div class="card-body">
				 					<?php echo $katlarcek['aciklama']; ?>
				 				</div>
				 			</div>
				 		</div>
				 			<div class="col-sm-12 mt-3">
							 
<ul class="menu-item list-inline tooltrip-div pos-top mb-4">
						<li class="list-inline-item d-block p-0 list-view">
							<a href="tel:<?php echo $katlarcek['telefon']; ?>" style="color:black"><h6 class="pt-2 pb-2  "><span class="fa fa-phone mr-2"></span> <?php echo $katlarcek['telefon']; ?></h6></a>
							<h6 class="pt-2 pb-2  "><span class="fa fa-envelope mr-2"></span><?php echo $katlarcek['email']; ?></h6>
							<h6 class="pt-2 pb-2  "><span class="fa fa-map-marker mr-2"></span> <?php echo $katlarcek['adres']; ?></h6>
							 
						</li>
						<li style="display: block;"><h6 class="pt-2 pb-2  " style="text-align: center; display: block;">
							<a href="<?php echo $katlarcek['facebook']; ?>" style="color: black;
    font-size: 27px;
    padding: 5px;" ><span class="fa fa-facebook-f mr-2"></span></a>
							<a href="<?php echo $katlarcek['twitter']; ?>" style="color: black;
    font-size: 27px;
    padding: 5px;"><span class="fa fa-twitter mr-2"></span></a>
							<a href="<?php echo $katlarcek['instagram']; ?>" style="color: black;
    font-size: 27px;
    padding: 5px;"><span class="fa fa-instagram mr-2"></span></a>
						</h6></li>
					</ul>
								 
						</div>	
<h4 class="text-center" >İstek, Öneri ve Şikayetlerinizi  <br> Bizimle Paylaşabilirsiniz!</h4>
					<div class="row mt-3">

						<div class="col-sm-12">
							<center>
<?php if($update5){ ?>
 <div class="alert alert-dismissible fade show alert-success" role="alert"><p class="mb-0">
Mesajınız Alındı. Teşekkürler</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
<?php } ?></center>
							<form class="card" action="" method="POST">
								<div class="card-body pt-3"> 
							 		<div class="input-group mb-3 mt-3 bg-white">
					                	<input class="form-control form-control-lg" id="username" name="name" type="text" required="required" placeholder="Adınız ve Soyadınız (zorunlu)">
					              	</div>
					              	 
					              	<div class="input-group mb-3 mt-3 bg-white">
					                	<input class="form-control form-control-lg" id="username" name="phone" type="text" placeholder="Telefon Numaranız (zorunlu değildir)">
					              	</div>
 					              	<div class="input-group mb-3 mt-3 bg-white">
					                	<textarea name="message" class="form-control" cols="30" rows="3" required="required" placeholder="Mesajınız (zorunlu)"></textarea>
					              	</div>
					               <center><button type="submit" name="iletisimf" class="btn w100 btn-danger"  >Gönder</button> </center>	
								</div>
							</form>

				</div>	

			

							<div class="col-sm-12 mt-3">
							<div class="card">
								<div class="card-body pt-3"> 
							 		<?php echo $katlarcek['konum']; ?>
 					              	 
 								</div>
							</div>

				</div>		
			</div>

				</div>			
			</div>
			<?php include 'footer.php'; ?>