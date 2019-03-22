<?php 
require_once("securite.php");
?>
<?php
  $id_employe=$_GET['code'];
  require_once("connexion.php");
  $ps = $pdo->prepare("DELETE FROM employe where id_employe = ? ");
  $params=array($id_employe);
$ps->execute($params);
header("location:listeemploye.php");
?>
