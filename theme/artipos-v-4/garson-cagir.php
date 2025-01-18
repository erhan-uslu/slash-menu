<?php include 'header.php';  $page="garson-cagir";
?>
       
       
     
<style type="text/css">
  .list-view h6 span {
    font-size: 18px !important;
    position: relative;
    top: 3px;
    margin-left: 0 !important;
        margin-right: 12px;
}
.thank-wrapper i {
    font-size: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50px;
    display: inline-block;
    line-height: 50px;
    background: linear-gradient(90deg, #017f6f 0%, #0baf9a 100%);
}
</style>
    <main class="main-wrap index-page mb-xxl">

<?php if (isset($_GET['masa_id_no'])) {
     if($_GET['masa_id_no']<=0){

  ?>
    <!-- Main Start -->
        <div class="app-body p-4 form-wrap pt-2">
<h4 class="text-center">Masa Seçimi Yapınız</h4>
 
      <div class="row">
           <?php      $uruncons=$db->prepare("SELECT * FROM `masalar` where kat_id=? order by id asc ");

                                     $uruncons->execute(array( $kat_id ));
                                        while ($urunceks=$uruncons -> fetch(PDO:: FETCH_ASSOC)){ ?>
                                          <?php   $datacon12s=$db->prepare("SELECT * FROM sepet where masa_id=? ");  
             $datacon12s->execute(array(  $urunceks['id'] ));  $masaid = $datacon12s->RowCount(); ?>
          <div class="col-sm-2 mt-2" style="    width: 20%;     padding-right: 2px;
    padding-left: 2px;
}"> <a href="garson-cagir/?masa_id_no=<?php echo $urunceks['id']; ?>&status=1">
         <div class="card" style="    height: 80px;
    padding: 15px 0;  background-color: <?php if($masaid>0){echo '#f75e5e';} else {echo '#3da433';} ?>;">
        <center>  <h2 class="text-white" style="font-size: 13px"><?php echo $urunceks['masa_adi']; ?></h2>
        <p  class="text-white">Masayı Seç</p> </center> 
         </div> </a>
      </div>  
    <?php } ?>
      </div>

        </div> 
        <?php }   else { 
     
        $bayiupdate1=$db->prepare("UPDATE `masalar` set garson_cagir = 1, bildirim = 1 where id=? ");
       $update=$bayiupdate1->execute(array(  $_GET['masa_id_no']  ));
  ?> 

   <div class="app-body p-4 mt-5 thank-wrapper form-wrap">
          <div class="row">
            <div class="col-sm-12">
              <div class=" " style="    box-shadow: 0 8px 30px rgb(0 0 0 / 15%);
    border: 0;     border-radius: 20px;">
                <div class="card-body pt-5 text-center">                  
                  <i class="iconly-Notification icli bg-red-gradiant text-white"></i>
                  <h2 class="mt-4 mb-4" style="    font-family: monospace;
    line-height: 28px;
    font-size: 21px;">Garson Çağırma İşlemi Başarılı!</h2>
                  <p class="pr-4 pl-4">Kısa Sürede Garsonlarımız Sizinle İlgilenecektir!</p>
                  <a href="garson-cagir?masa_id_no=" class="btn btn-success" style="background-color: #017f6f ; border :0px; "> Masamı Değiştir </a>
                </div>
              </div>
            </div>
          </div>
        </div>      
 <?php  } ?> 
    <!-- Main End -->
<?php } ?>
    </main>
 <?php include 'footer.php'; ?>