<?php 
require_once("securite.php");
?>
<?php
  $nr_reservation=$_GET['code'];
  require_once("connexion.php");
  $ps = $pdo->prepare("DELETE FROM reservation where nr_reservation = ? ");
  $params=array($nr_reservation);
$ps->execute($params);
header("location:listereservation.php");
?>
