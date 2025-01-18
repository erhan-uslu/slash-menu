
<?php if($search_modulu>=1){ ?>

<header class="bg-white style2 pt-3 pb-0">
					<div class="row">
					 
		                <div class="col-sm-12 text-left mt-2 mb-2 pos-top">
			                <div class="form-content style1">
								<form  method="get" action="arama-">
				                    <input type="text" class="form-control  "  name="i"  placeholder="Aramak İçin Dokun...">
				                    <input type="hidden" class="form-control  "  name="masa_id_no"  value="<?php echo $_GET['masa_id_no']; ?>" placeholder="Aramak İçin Dokun...">

				                </form>
			                </div>
		            	</div>
		                
	                </div>
				</header>

				<?php } ?>