<?php 
require_once("securite.php");
?>
<?php
  $nr_chambre=$_GET['code'];
  require_once("connexion.php");
  $ps = $pdo->prepare("DELETE FROM chambre where nr_chambre = ? ");
  $params=array($nr_chambre);
$ps->execute($params);
header("location:listechambre.php");
?>
