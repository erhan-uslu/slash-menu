<?php include '../islemler/baglan.php';


$position = $_POST['position'];

 
$i=1;
foreach($position as $k=>$v){

$query = $db->prepare("UPDATE `kategoriler` SET `sira` = ? where id=? ");

$update = $query->execute(array($i, $v  ));

	$i++;
}




 ?>