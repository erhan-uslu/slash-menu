<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">

      

      <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
 
             <li class=" nav-item">

            <a href="#">

            <i class="fas fa-users"></i>

            <span class="menu-title" data-i18n="nav.flot_charts.main"> Şubeler ve Departman</span></a>
 
            <ul class="menu-content" style="    display: block;">
  <?php  

       $slidercon=$db->prepare("SELECT * FROM `katlar` where durum=1 ");  

       $slidercon->execute(array(  ));

                                       while ( $slidercek=$slidercon -> fetch(PDO:: FETCH_ASSOC)){ ?>
              <li><a class="menu-item" href="./?departman=<?php echo $slidercek['id']; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts"><?php echo $slidercek['kat_adi']; ?> Yönetimi</a>  </li>
            <?php } ?>

            </ul>

          </li>
       <li class="navigation-header"><span> <hr> </span> 
          </li>
          <li class=" nav-item"><a href="index.php?departman=<?php echo $kat_id; ?>"><i class="fas fa-home"></i><span class="menu-title" data-i18n="nav.rickshaw_charts.main">Anasayfa</span></a>

          </li>
 
 

           <li class=" nav-item">

            <a href="#">

            <i class="fas fa-shopping-basket"></i>

            <span class="menu-title" data-i18n="nav.flot_charts.main"> Ürün Yönetimi </span></a>

            <ul class="menu-content">

              <li><a class="menu-item" href="urun-ekle.php?departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts">Yeni Ürün Oluştur</a>  </li>
           

               <li><a class="menu-item" href="kategoriler.php?ust_id=0&departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts"> Kategoriler </a>  </li>


                  
             <li><a class="menu-item" href="urunler.php?departman=<?php echo $kat_id; ?>" data-i18n="nav.flot_charts.flot_pie_charts"> Tüm Ürünleri Görüntüle  </a> </li>

            </ul>

          </li>

      <li class=" nav-item">

            <a href="#">

            <i class="icon-basket-loaded"></i>

            <span class="menu-title" data-i18n="nav.flot_charts.main"> Sipariş Yönetimi </span></a>

            <ul class="menu-content">
 
          
               <li><a class="menu-item" href="siparis-yonetimi.php?ust_id=0&departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts"> Masa Siparişleri </a>  </li>

                 <li><a class="menu-item" href="paket-siparis-yonetimi.php?departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts"> Paket Siparişleri </a>  </li>


                  
 
            </ul>

          </li>      
<li class=" nav-item">

            <a href="#">

            <i class="fa fa-user"></i>

            <span class="menu-title" data-i18n="nav.flot_charts.main"> Personel Yönetimi </span></a>

            <ul class="menu-content">
 
               <li><a class="menu-item" href="kuryeler.php?ust_id=0&departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts"> Kurye Yönetimi </a>  </li>

 


                  
 
            </ul>

          </li>      

  <li class=" nav-item" style="display: none">
    <a href="koleksiyon-yonetimi.php?departman=<?php echo $kat_id; ?>"> <i class="fas fa-atom"></i>
      <span class="menu-title" data-i18n="nav.rickshaw_charts.main"> Koleksiyon Yönetimi </span></a>
       </li>
   
     <li class=" nav-item">
    <a href="masalar.php?departman=<?php echo $kat_id; ?>"> <i class="fas fa-table"></i>
      <span class="menu-title" data-i18n="nav.rickshaw_charts.main"> Masa Yönetimi </span></a>
       </li>
     
<li class=" nav-item" >
    <a href="site-slider.php?departman=<?php echo $kat_id; ?>">   <i class="fas fa-atom"></i>
      <span class="menu-title" data-i18n="nav.rickshaw_charts.main">  Reklam Yönetimi  </span></a>
       </li>   
           <li class=" nav-item">

            <a href="#">

                    <i class="fas fa-cogs"></i>
            <span class="menu-title" data-i18n="nav.flot_charts.main"> Genel Ayarlar </span></a>

            <ul class="menu-content">
            
           <!--     <li><a class="menu-item" href="site-ceviriler.php" 
                   data-i18n="nav.flot_charts.flot_line_charts"> Çeviri  </a>  </li>    -->
   
 <li><a class="menu-item" href="site-ayarlari.php?departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts">  Şube Ayarları  </a>  </li>                

               <li><a class="menu-item" href="tema-ayarlari.php?departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts">  Tema Ayarları  </a>  </li>

               <li><a class="menu-item" href="qrkod-yonetimi.php?departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts">  Qrkod Yönetimi  </a>  </li>
   
            </ul>

          </li>

                    <li class=" nav-item">

            <a href="#">

                    <i class="fas fa-file-excel"></i>
            <span class="menu-title" data-i18n="nav.flot_charts.main"> Excel İle Ürün Ekle </span></a>

            <ul class="menu-content">
            
               <li><a class="menu-item" href="artipos-excel.xlsx" target="_blank" 
              data-i18n="nav.flot_charts.flot_line_charts">  Excel Formatını İndir </a>  </li>
                 <li><a class="menu-item" href="excel-yukle.php?departman=<?php echo $kat_id; ?>" 
              data-i18n="nav.flot_charts.flot_line_charts">  Excel İle Ürün Ekle </a>  </li>
   
            </ul>

          </li>
 

<li class=" nav-item">
    <a href="site-yoneticiler.php"> <i class="fas fa-lock"></i>
      <span class="menu-title" data-i18n="nav.rickshaw_charts.main">  Yöneticiler   </span></a>
       </li>   

 
        </ul>

      </div>

    </div>

