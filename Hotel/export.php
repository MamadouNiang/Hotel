<?php
header("Content-Type: text/csv;");
header('Content-Disposition:attachment; filename="Export.csv"');
require_once("connexion.php");
$req=$pdo->prepare("SELECT cl.nni,cl.nom_prenom,cl.telephone,cl.adresse,
       re.nr_reservation,re.date_reservation,re.date_debut,re.nombre_nuit,re.montant,
       ch.nr_chambre,ch.telephone_chambre,ch.code_categorie,
       e.nomPrenom,e.telephone_employe
       FROM clients as cl 
       join reservation as re on cl.nni=re.nni
       JOIN chambre as ch on re.nr_chambre=ch.nr_chambre 
       JOIN employe as e on cl.id_employe=e.id_employe");
$req->execute();
$data = $req->fetchAll();
//print_r ($data);
?>
    "NNI";"NOM/PRENOM";"TELEPHONE";"ADRESSE";"NR_RESERVATION";"DATE_RESERVATION";"DEBUT";"NOMBRE_NUITS";"MONTANT";"NR_CHAMBRE";"TEL_CHAMBRE";"CATEGORIE";"NOM/PRENOM";"TEL_EMP"
    <?php
foreach($data as $d) 
{
    echo $d['nni'].'";"'.$d['nom_prenom'].'";"'.$d['telephone'].'";"'.$d['adresse'].'";"'.$d['nr_reservation'].'";"'.$d['date_reservation'].'";"'.$d['date_debut'].'";"'.$d['nombre_nuit'].'";"'.$d['montant'].'";"'.$d['nr_chambre'].'";"'.$d['telephone_chambre'].'";"'.$d['code_categorie'].'";"'.$d['nomPrenom'].'";"'.$d['telephone_employe'].'"'."\n";
}
?>
