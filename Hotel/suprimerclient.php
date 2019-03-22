<?php 
require_once("securite.php");
?>
<?php
  $nni=$_GET['code'];
  require_once("connexion.php");
  $ps = $pdo->prepare("DELETE FROM clients where nni = ? ");
  $params=array($nni);
$ps->execute($params);
header("location:client.php");
?>
