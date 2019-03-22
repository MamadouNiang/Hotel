<?php 
require_once("securite.php");

?>
<?php
  $nni=$_POST['nni'];
  $quantite=$_POST['quantite'];
  $code_prestation=$_POST["code_prestation"];
  $date_consommation=$_POST['date_consommation'];
  $montant=$_POST['montant'];
  $nr_consommation=$_POST['nr_consommation'];
require_once("connexion.php"); 
$ps = $pdo->prepare("INSERT INTO cons_pres VALUES(?,?,?,?)"); 
$params=array($nr_consommation,$code_prestation,$quantite,$montant);
$ps->execute($params); 

header("location:listeconsommation.php"); 
?>
