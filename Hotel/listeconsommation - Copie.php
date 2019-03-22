<?php 
require_once("securite.php");

require_once("roleresto.php");
?>
<?php
require_once("connexion.php"); 
$req = "SELECT c.nr_consommation,c.date_consommation,cl.nom_prenom,c.nni,p.quantite,p.code_prestation,p.montant FROM consommation as c join cons_pres as p on c.nr_consommation=p.nr_consommation join clients as cl on c.nni=cl.nni join prestation as pr on p.code_prestation=pr.code_prestation"; 
$ps=$pdo->prepare($req); 
$ps->execute(); 
?>
    <html>

    <head>
        <meta charset="utf-8" />
        <title>Les Clients</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <?php require_once("entete.php") ?>
        <div class="panel panel-info spacer e">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"><strong>Listes Consommations</strong></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nom_clients</th>
                            <th>NNi</th>
                            <th>Nr_Consommation</th>
                            <th>Date_Consommation</th>


                            <th>Quantite</th>
                            <th>Code_Prestation</th>
                            <th>Montant</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($et=$ps->fetch()) { ?>
                        <tr>
                            <td>
                                <?php echo($et['nom_prenom'])?>
                            </td>
                            <td>
                                <?php echo($et['nni'])?>
                            </td>
                            <td>
                                <?php echo($et['nr_consommation'])?>
                            </td>
                            <td>
                                <?php echo($et['date_consommation'])?>
                            </td>
                            <td>
                                <?php echo($et['quantite'])?>
                            </td>
                            <td>
                                <?php echo($et["code_prestation"])?>
                            </td>
                            <td>
                                <?php echo($et['montant'])?>
                            </td>
                            <td><a class="btn btn-info btn-xs" href="modifierconsommation.php?code=<?php echo($et['nr_consommation']) ?> "><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td><a class="btn btn-info btn-xs" onclick="return   confirm('**Etes vous sure de SUPPRIMER ?**');" href="suprimerconsommation.php?code=<?php echo($et['nr_consommation'])?>"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>

    </html>
