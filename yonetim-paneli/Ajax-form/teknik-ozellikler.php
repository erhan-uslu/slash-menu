<?php include "../../islemler/baglan.php";  ?>
<form action="islemler/islem.php?urun_id=<?php  echo $_GET['urun_id']?>"  method="post">
  <div class="card-content collapse show">

                    <div class="card-body card-dashboard">


                    
                        <table class="table table-striped table-bordered zero-configuration">

                            <thead>

                                <tr>
                                      <th>Sıra </th> 
                                     <th>Teknik Özellik Adı</th>

                                    <th> Değeri </th>
  
                                    <th>İşlemler</th>
                                    <th style="display: none"></th>

                                </tr>

                            </thead>

                                <tfoot>

                                <tr>
                                      <th>Sıra </th> 

                                    <th>Teknik Özellik Adı</th>

                                    <th> Değeri </th>
  
                                    <th>İşlemler</th>


                                </tr>

                            </tfoot>

                            <tbody>

                                 <?php  

    

       $firma=$db->prepare("SELECT * FROM urun_teknik_ozellikleri  where urun_id=? order by sira asc");  

       $firma->execute(array( $_GET['urun_id'] ));
    
        while ( $firmacek=$firma -> fetch(PDO:: FETCH_ASSOC)){   ?>

                                     

                                     <tr>      
 <td><input type="text" class="form-control" style="width: 80px; text-align: center;"
  name="sira_<?php echo $firmacek['id']; ?>" value="<?php echo $firmacek['sira']; ?>"></td>
                                    <td><?php echo  $firmacek['teknik_ozellik_adi']; ?></td>

                                    <td><?php echo $firmacek['teknik_ozellik_detay']; ?></td>
 
 
          <td><a href="urun-duzenle.php?id=<?php  echo $firmacek['id']; ?>&tur=teknikozellikler&tip=duzenle&urun_id=<?php echo $_GET['urun_id'] ?>"><button type="button" class="btn btn-icon btn-warning mr-1"><i class="fa fa-edit"></i></button></a>

                                      

                                      <a href="islemler/islem.php?deletetenikozlk=<?php echo
                                       $firmacek['id']; ?>&urun_id=<?php echo $_GET['urun_id'] ?>"><button type="button" class="btn btn-icon btn-danger mr-1"><i class="fa fa-trash"></i></button></a> 



                                    </td>

                                </tr>

                                <?php } ?>

                            </tbody>

                        

                        </table>
                         <div class="col-xl-12 col-lg-12">
   
        <button type="submit" name="teknik-ozellik-sira" style="float: left;"
        class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" >Kaydet</button>  
  
</div>

                    </div>

                </div>
                </form>