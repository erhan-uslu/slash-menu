<?php

 include "../../islemler/baglan.php";

if (isset($_POST['plakaKodu'])){

    $plakaKodu = $_POST['plakaKodu'];

    // ilçelerini bul
    $sorgu = $db->prepare('SELECT * FROM kategoriler Where ust_id=? ORDER BY kategori_ad ASC');
    $sorgu->execute([$plakaKodu]);
    $alt_kategoriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);

    $html = ' <option value="null">- Alt Kategori Seçin -</option>';
    foreach ($alt_kategoriler as $kategori_ad){
        $html .= '<option value="' . $kategori_ad['id'] . '">' . $kategori_ad['kategori_ad'] . '</option>';
    }

    echo $html;

}