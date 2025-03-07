<style class="cp-pen-styles">
  .product-description {
  transform: translate3d(0, 0, 0);
  transform-style: preserve-3d;
  perspective: 1000;
  backface-visibility: hidden;
}

  
.secondary-text {
  color: #b6b6b6;
}

.list-inline {
  margin: 0;
}
.list-inline li {
  padding: 0;
}

.card-wrapper {
  position: relative;
  width: 100%;
  height: 390px;
  border: 1px solid #e5e5e5;
  border-bottom-width: 2px;
  overflow: hidden;
  margin-bottom: 30px;
}
.card-wrapper:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  transition: opacity 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.card-wrapper:hover:after {
  opacity: 1;
}
.card-wrapper:hover .image-holder:before {
  opacity: .75;
}
.card-wrapper:hover .image-holder:after {
  opacity: 1;
  transform: translate(-50%, -50%);
}
.card-wrapper:hover .image-holder--original {
  transform: translateY(-15px);
}
.card-wrapper:hover .product-description {
  height: 205px;
}
@media (min-width: 768px) {
  .card-wrapper:hover .product-description {
    height: 185px;
  }
}

.image-holder {
  display: block;
  position: relative;
  width: 100%;
  height: 310px;
  background-color: #ffffff;
  z-index: 1;
}
@media (min-width: 768px) {
  .image-holder {
    height: 325px;
  }
}
.image-holder:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #4CAF50;
  opacity: 0;
  z-index: 5;
  transition: opacity 0.6s;
}
.image-holder:after {
  content: '+';
  font-family: 'Raleway', sans-serif;
  font-size: 70px;
  color: #4CAF50;
  text-align: center;
  position: absolute;
  top: 92.5px;
  left: 50%;
  width: 75px;
  height: 75px;
  line-height: 75px;
  background-color: #ffffff;
  opacity: 0;
  border-radius: 50%;
  z-index: 10;
  transform: translate(-50%, 100%);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  transition: all 0.4s ease-out;
}
@media (min-width: 768px) {
  .image-holder:after {
    top: 107.5px;
  }
}
.image-holder .image-holder__link {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 15;
}
.image-holder .image-holder--original {
  transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.image-liquid {
  width: 100%;
  height: 325px;
  background-size: cover;
  background-position: center center;
}

.product-description {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 80px;
  padding: 10px 15px;
  overflow: hidden;
  background-color: #fafafa;
  border-top: 1px solid #e5e5e5;
  transition: height 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  z-index: 2;
}
@media (min-width: 768px) {
  .product-description {
    height: 65px;
  }
}
.product-description p {
  margin: 0 0 5px;
}
.product-description .product-description__title {
  font-family: 'Raleway', sans-serif;
  position: relative;
  white-space: nowrap;
  overflow: hidden;
  margin: 0;
  font-size: 18px;
  line-height: 1.25;
}
.product-description .product-description__title:after {
  content: '';
  width: 60px;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  background: linear-gradient(to right, rgba(255, 255, 255, 0), #fafafa);
}
.product-description .product-description__title a {
  text-decoration: none;
  color: inherit;
}
.product-description .product-description__category {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.product-description .product-description__price {
  color: #4CAF50;
  text-align: left;
  font-weight: bold;
  letter-spacing: 0.06em;
}
@media (min-width: 768px) {
  .product-description .product-description__price {
    text-align: right;
  }
}
.product-description .sizes-wrapper {
  margin-bottom: 15px;
}
.product-description .color-list {
  font-size: 0;
}
.product-description .color-list__item {
  width: 25px;
  height: 10px;
  position: relative;
  z-index: 1;
  transition: all .2s;
}
.product-description .color-list__item:hover {
  width: 40px;
}
.product-description .color-list__item--red {
  background-color: #F44336;
}
.product-description .color-list__item--blue {
  background-color: #448AFF;
}
.product-description .color-list__item--green {
  background-color: #CDDC39;
}
.product-description .color-list__item--orange {
  background-color: #FF9800;
}
.product-description .color-list__item--purple {
  background-color: #673AB7;
} 
.right-margin-1{ margin-left: 5px; }
.right-margin-2{ margin-left: 10px; }

</style> 
 
   <div class="row">
   <?php 
         include '../../islemler/baglan.php';  
   $urunler = $db->query('SELECT * FROM urunler')->fetchAll(PDO::FETCH_ASSOC); 
       foreach($urunler as $urun):    ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <article class="card-wrapper">
        <div class="image-holder">
          <a href="#" class="image-holder__link"></a>
          <div class="image-liquid image-holder--original"
           style="background-image: url('../<?php echo $urun['urun_resim'] ?>')">
          </div>
        </div>

        <div class="product-description">
          <!-- title -->
          <h1 class="product-description__title">
            <a href="#">            
             <?=$urun['urun_adi']?>
              </a>
          </h1>

          <!-- category and price -->
          <div class="row">
            <div class="col-xs-12 col-sm-7 product-description__category secondary-text">
                <?php

  $kategoricon=$db->prepare("SELECT * FROM kategoriler where id=?");

                                $kategoricon->execute(array( $urun['urun_kategori'] ));

 
                              $kategoricek=$kategoricon -> fetch(PDO:: FETCH_ASSOC); 
                                     echo  $kategoricek['kategori_ad'];
                                  ?>
             </div>
            <div class="col-xs-12 col-sm-5 product-description__price">
               <?php if ($urun['stok']>0) {  echo '<span style="color:green"; >'. $urun['urun_fiyat'].'₺ </span>';    }
                  else {   echo '<span style="color:red"; >'. $urun['urun_fiyat'].'₺ </span>';    }    ?>  
            </div>
          </div>

          <!-- divider -->
          <hr />

          <!-- sizes -->
           
          <!-- colors -->
          <div class="color-wrapper">
            <b> İşlemler :  </b>
            <br>  
             <div class="row" style="margin-bottom:  15px;  ">
              
    <a  href="urun-duzenle.php?urun_id=<?php echo $urun['id']; ?>&tur=gorseller" data-toggle="tooltip" data-placement="top" title="Resimler"  class="col-xs-4 btn btn-info right-margin-2"><i class="la la-image"></i> 
     </a> 
               
        <a href="urun-duzenle.php?urun_id=<?php echo $urun['id']; ?>">   <button type="button" data-toggle="tooltip" data-placement="top" title="Düzenle"  class="col-xs-4 btn btn-warning right-margin-2"><i class="la la-pencil-square"></i></button>  </a> 
               <a href="islemler/islem.php?deleteurunler=<?php echo $urun['id']; ?>">  
            <button type="button" data-toggle="tooltip" data-placement="top" title="Ürünü Sil" 
               class="col-xs-4 btn btn-danger right-margin-2"><i class="la la-trash"></i> </button> </a>

            </div>
                 
          </div>
        </div>

      </article>
    </div>
    
     <?php endforeach; ?>
 
  </div>
  