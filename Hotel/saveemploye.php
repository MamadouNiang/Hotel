<?php 
require_once("securite.php");

?>
<?php
  //$id_client=$_POST['id_client'];
  //$id_employe=$_POST['id_employe'];
  $nomPrenom=$_POST['nomPrenom'];
  $password=md5($_POST['password']);
  $telephone_employe=$_POST['telephone_employe'];
  $role=$_POST['role'];
  $salaire=$_POST['salaire']; 
require_once("connexion.php"); 
$ps = $pdo->prepare("INSERT INTO employe VALUES(?,?,?,?,?,?)"); 
$params=array($id_employe,$nomPrenom,$password,$telephone_employe,$role,$salaire);
$ps->execute($params); 
header("location:listeemploye.php"); 
?>
