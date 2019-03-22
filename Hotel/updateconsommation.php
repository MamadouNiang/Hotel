<?php 
require_once("securite.php");
?>
<?php
  $nr_consommation=$_POST['nr_consommation'];
  $quantite=$_POST['quantite'];
  $code_prestation=$_POST['code_consommation'];
  $montant=$_POST['montant'];
  require_once("connexion.php");
  $ps = $pdo->prepare("UPDATE cons_pres set code_prestation=?,quantite=?,montant=? WHERE nr_cnsommation=?");
  $params=array($code_prestation,$quantite,$montant,$nr_consommation);
  $ps->execute($params);
  header("location:listeconsommation.php");
?>
