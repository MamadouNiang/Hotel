<?php 
require_once("securite.php");
?>
<?php
  $nr_reservation=$_POST['nr_reservation'];
  $date_reservation=$_POST['date_reservation'];
  $date_debut=$_POST['date_debut'];
  $date_fin=$_POST['date_fin'];
  $nni=$_POST['nni'];
  $nr_chambre=$_POST['nr_chambre'];
  require_once("connexion.php");
  $ps = $pdo->prepare("UPDATE reservation set date_reservation=?,date_debut=?,date_fin=?,nni=?,nr_chambre=? WHERE nr_reservation=?");
  $params=array($date_reservation,$date_debut,$date_fin,$nni,$nr_chambre,$nr_reservation);
  $ps->execute($params);
  header("location:listereservation.php");
?>
