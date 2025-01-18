<?php include 'header.php'; ?>

    <!-- Main Start -->
    <main class="main-wrap index-page mb-xxl">
      
 <!-- Catagories Section Start -->
      <div class="section-p-t">
        <div class="catagories-wrap">
           <?php  $kategoricount = 0;
 $datacon2=$db->prepare("SELECT * FROM kategoriler  where durum='1' and  ust_id=0   and kat_id=".$kat_id."  Order by sira ASC ");  

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