<?php 
require_once("securite.php");
?>
<?php
  $nr_consommation=$_GET['code'];
  require_once("connexion.php");
  $ps = $pdo->prepare("DELETE FROM cons_pres where nr_consommation = ? ");
  $params=array($nr_consommation);
$ps->execute($params);
header("location:listeconsommation.php");
?>
