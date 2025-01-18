<?php include 'header.php'; ?>
 <?php include '../../popup.php'; ?>

    <!-- Main Start -->
    <main class="main-wrap index-page mb-xxl">
      
  

      <!-- Catagories Section Start -->
      <div class="section-p-t">
        <div class="catagories-wrap">
           
          <?php  $kategoricount = 0;
 $datacon2=$db->prepare("SELECT * FROM kategoriler  where durum='1' and ust_id=0 and kat_id=".$kat_id."  Order by sira ASC ");  

$datacon2->execute(array(  ));
       

       while ($kategoricek=$datacon2 -> fetch(PDO:: FETCH_ASSOC)){   ?>
                 <img src="<?php echo $siteyolu; ?><?php echo  $kategoricek['ust_kategori_resim']; ?>" class="w-100" alt="image">
                 <hr>
                 <?php } ?>
             
         </div>
      </div>
      <!-- Catagories Section End -->
        
    </main>
    <!-- Main End -->
<?php include 'footer.php'; ?>