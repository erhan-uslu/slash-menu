<?php include 'header.php';
 $kategori_con=$db->prepare("SELECT * FROM kategoriler  where  seo_url=?");  

 $kategori_con->execute(array( $_GET['i'] ));
  $kategorisorgula = $kategori_con->RowCount(); 
$kategori_cek=$kategori_con -> fetch(PDO:: FETCH_ASSOC); 
 if ($kategorisorgula==0) {
   header('Location:'.$siteyolu);
 }   ?>

    <!-- Main Start -->
    <main class="main-wrap index-page mb-xxl">
      

      <!-- Catagories Section Start -->
      <div class="section-p-t">
        <div class="catagories-wrap">
             <div class="item-header fw-600 text-black mt-3 mb-3"><h4><?php echo $kategori_cek['kategori_ad']  ?>
</h4> 
<hr>
</div>
          <?php  $kategoricount = 0;
 $datacon2=$db->prepare("SELECT * FROM kategoriler  where durum='1' and  ust_id=?  and kat_id=".$kat_id."  Order by sira ASC ");  

$datacon2->execute(array( $kategori_cek['id'] ));
       

       while ($kategoricek=$datacon2 -> fetch(PDO:: FETCH_ASSOC)){   ?>
                 <img src="<?php echo $siteyolu; ?><?php echo  $kategoricek['ust_kategori_resim']; ?>" class="w-100" alt="image">
                 <?php } ?>
             
         </div>
      </div>
      <!-- Catagories Section End -->
        
    </main>
    <!-- Main End -->
<?php include 'footer.php'; ?>