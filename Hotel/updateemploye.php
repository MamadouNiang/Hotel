<?php 
require_once("securite.php");
?>
<?php
  $id_employe=$_POST['id_employe'];
  $nomPrenom=$_POST['nomPrenom'];
  $password=md5($_POST['password']);
  $role=$_POST['role'];
  $telephone_employe=$_POST['telephone_employe'];
  $salaire=$_POST['salaire'];
  require_once("connexion.php");
  $ps = $pdo->prepare("UPDATE employe set nomPrenom=?,password=?,role=?,telephone_employe=?,salaire=? WHERE id_employe=?");
  $params=array($nomPrenom,$password,$role,$telephone_employe,$salaire,$id_employe);
  $ps->execute($params);
  header("location:listeemploye.php");
