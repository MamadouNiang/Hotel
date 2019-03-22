<?php 
require_once("securite.php");
?>
<?php
  $nni=$_POST['nni'];
  $nom_prenom=$_POST['nom_prenom'];
  $telephone=$_POST['telephone'];
  $adresse=$_POST['adresse'];
  $id_employe=$_POST['id_employe'];
  require_once("connexion.php");
  $ps = $pdo->prepare("UPDATE clients set nom_prenom=?,telephone=?,adresse=?,id_employe=? WHERE nni=?");
  $params=array($nom_prenom,$telephone,$adresse,$id_employe,$nni);
  $ps->execute($params);
  header("location:client.php");
