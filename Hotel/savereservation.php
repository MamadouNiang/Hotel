<?php 
require_once("securite.php");

?>
<?php
  //$id_client=$_POST['id_client'];
  $nni=$_POST['nni'];
  $nom_prenom=$_POST['nom_prenom'];
  $telephone=$_POST['telephone'];
  $adresse=$_POST['adresse'];
  $id_employe=$_POST['id_employe'];
//$nr_reservation=$_POST['nr_reservation'];
$date_reservation=$_POST['date_reservation'];
$date_debut=$_POST['date_debut'];
$date_fin=$_POST['date_fin'];
$nombre_nuit=$_POST['nombre_nuit'];
$nr_chambre=$_POST['nr_chambre'];  
$montant=$_POST['montant'];
$nr_facture=$_POST['nr_facture'];
require_once("connexion.php"); 
$ps = $pdo->prepare("INSERT INTO clients VALUES(?,?,?,?,?)"); 
$params=array($nni,$nom_prenom,$telephone,$adresse,$id_employe);
$ps->execute($params); 
require_once("connexion.php"); 
$ps2 = $pdo->prepare("INSERT INTO reservation VALUES(?,?,?,?,?,?,?,?)"); 
$params2=array($nr_reservation,$date_reservation,$date_debut,$nombre_nuit,$date_fin,$montant,$nni,$nr_chambre);
$ps2->execute($params2); 

 require_once("connexion.php");
                           $req =  "SELECT  *FROM chambre AS ch JOIN reservation re ON ch.nr_chambre=re.nr_chambre";
                           $ps3=$pdo->prepare($req);
                           $ps3->execute();
                          if($row=$ps3->fetch(PDO::FETCH_ASSOC)){
                           $ps5 = $pdo->prepare("UPDATE chambre SET etat = 'occupee' WHERE chambre.nr_chambre =?"); 
                           $params5=array($nr_chambre);
                           $ps5->execute($params5); 
                           }
require_once("connexion.php"); 
$ps4 = $pdo->prepare("INSERT INTO facturer VALUES(?,?,?)"); 
$params4=array($nr_facture,$date_reservation,$nni); 
$ps4->execute($params4);

header("location:client.php"); 
?>
