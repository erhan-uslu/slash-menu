<?php include 'header.php'; ?>
 <?php include '../../popup.php'; ?>

    <!-- Main Start -->
    <main class="main-wrap index-page mb-xxl">
     

      <!-- Banner Section Start -->
      <section class="banner-section ratio2_1">
        <div class="h-banner-slider">
              <?php  

       $slidercon=$db->prepare("SELECT * FROM `slider` where kat_id=".$kat_id." and slide_turu=0");  

       $slidercon->execute(array(  ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                      <?php $url  =   $slidercek['slider_url']  ; ?>
          <div>
            <div class="banner-box" style="">
              <img src="<?php echo $siteyolu; ?><?php echo $slidercek['slider_resim']; ?>" alt="banner" class="bg-img">
              <div class="content-box">
             <a href="<?php echo $url; ?>">   <h1 class="title-color font-md heading text-white"><?php echo $slidercek['buyuk_slogan']; ?></h1></a>
               </div>
            </div>
          </div>
<?php } ?>
        
        </div>
      </section>
      <!-- Banner Section End -->

      <!-- Catagories Section Start -->
      <div class=" ">
        <div class="catagories-wrap">
        	 <?php  $kategoricount = 0;
 $datacon2=$db->prepare("SELECT * FROM kategoriler  where durum='1' and ust_id=0   and kat_id=".$kat_id."  Order by sira ASC ");  

$datacon2->execute(array(  ));
          

       while ($kategoricek=$datacon2 -> fetch(PDO:: FETCH_ASSOC)){   ?>
         <div class="product-list media" style="background-color: #f6f6f6">
            <a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&id=<?php echo $kategoricek['id'] ?>">
              <img src="<?php echo $siteyolu; ?><?php echo  $kategoricek['ust_kategori_resim']; ?>" class="img-fluid" alt="offer"></a>
            <div  style=" width: auto;" class="media-body">
              <a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&id=<?php echo $kategoricek['id'] ?>" style='    font-family: "Quicksand","sans-serif";
    font-weight: 700;'> <?php echo  $kategoricek['kategori_ad']; ?> </a>
             </div>
            <span>
              <a href="kategoriler-<?php echo $kategoricek['seo_url'] ?>?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&id=<?php echo $kategoricek['id'] ?>" class="arrow-nav">  </a></span>
          </div>
      <?php } ?>
          
        </div>
      </div>
      <!-- Catagories Section End -->
        
    </main>
    <!-- Main End -->
<?php include 'footer.php'; ?>