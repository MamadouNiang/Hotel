<?php 
require_once("securite.php");
?>
<?php
  $nr_chambre=$_POST['nr_chambre'];
  $telephone_chambre=$_POST['telephone_chambre'];
  $code_categorie=$_POST['code_categorie'];
  $etat=$_POST['etat'];
  require_once("connexion.php");
  $ps = $pdo->prepare("UPDATE chambre set telephone_chambre=?,code_categorie=?,etat=? where nr_chambre=?" );
  $params=array($telephone_chambre,$code_categorie,$etat,$nr_chambre);
  $ps->execute($params);
  header("location:listechambre.php");
