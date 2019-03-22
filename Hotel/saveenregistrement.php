<?php 
require_once("securite.php");
?>
<?php

  $nni=$_POST['nni'];
  $date_consommation=$_POST['date_consommation'];
require_once("connexion.php"); 
$ps = $pdo->prepare("INSERT INTO consommation VALUES(?,?,?)"); 
$params=array($nr_consommation,$date_consommation,$nni);
$ps->execute($params);
header("location:consommer.php"); 
?>
