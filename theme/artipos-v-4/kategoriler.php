<?php include 'header.php';
 $kategori_con=$db->prepare("SELECT * FROM kategoriler  where  id=?");  

 $kategori_con->execute(array( $_GET['id'] ));
  $kategorisorgula = $kategori_con->RowCount(); 
$kategori_cek=$kategori_con -> fetch(PDO:: FETCH_ASSOC); 
 if ($kategorisorgula==0) {
   header('Location:'.$siteyolu);
 }   ?>

    <!-- Main Start -->
    <main class="main-wrap index-page  ">
      

      <!-- Catagories Section Start -->
           
            <section class="offer-section pt-0" style="    margin-bottom: 35px;">
        <div style="background-color:#fff;" class="offer" >
          <div class="top-content" style="    display: block;">
            <div>
              <h4 class="title-color" style=" 
    font-family: system-ui;
    text-align: center;
    font-weight: 700;"><?php echo $kategori_cek['kategori_ad']  ?></h4>
             </div>
           </div>
      
          <?php  $kategoricount = 0;
 $datacon2=$db->prepare("SELECT * FROM kategoriler  where durum='1' and  ust_id=?  and kat_id=".$kat_id."  Order by sira ASC ");  

$datacon2->execute(array( $kategori_cek['id'] ));
       $dataCount = $datacon2->RowCount();
       if($dataCount>=1) { ?> 
       <div class="row">   
<div class="col-sm-12">
               
              <ul class="shop-item pl-0">
 <?php    

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
              </ul>
            </div>
            </div>
           <?php } else { ?>
          <div class="offer-wrap">
           
      <?php      $uruncon=$db->prepare("SELECT * FROM urunler where urun_kategori=? and durum=1 and kat_id=".$kat_id." or  urun_alt_kategori=? and durum=1 and kat_id=".$kat_id." order by id asc  ");

                                     $uruncon->execute(array( $kategori_cek['id'], $kategori_cek['id']  ));
                                        while ($uruncek=$uruncon -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                   
<?php $url  =  seo($uruncek['urun_adi']) .'-'. $uruncek['id'] . '/' ; ?>

            <div class="product-list media" style="border: 1px solid #dfdfdf;     min-height: 50px;">
               <div class="media-body">
     <div  style="    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;">
                  <h4 style="  color: #e30917;
    font-family: system-ui;
    position: absolute;
            font-size: 14px;
    font-weight: 700;"><?php echo substr($uruncek['urun_adi'], 0,50); ?> <br>
      <span class="content-color font-xs" style="font-weight: normal; "> <?php echo substr($uruncek['urun_aciklama'], 0,200); ?>
</span>  </h4> 

  <span style="    padding: 4px 6px;
  min-width: 50px;
  text-align: center;
  border-radius: 2px;
    font-size: 14px;
    float: right;
    background-color: #e30917;
    color: white;
    top: 32%;
        font-family: system-ui;
    position: absolute;
    right: 6px;">  <?php echo  str_replace('.00', '', $uruncek['urun_fiyat']) ; ?>₺ </span> 
   </div>
              
               </div>
            </div>
 <?php } ?>
          </div>
        <?php } ?>
        </div>
      </section>
             
       </div>
      <!-- Catagories Section End -->
        
    </main>
    <!-- Main End -->
<?php include 'footer.php'; ?>