<?php 
require_once("securite.php");
require_once("rolereservation.php");
?>
<?php
require_once("connexion.php"); 
$req = "SELECT cl.nni,cl.nom_prenom,cl.telephone,cl.adresse,
       re.nr_reservation,re.date_reservation,re.date_debut,re.nombre_nuit,re.montant,
       ch.nr_chambre,ch.telephone_chambre,ch.code_categorie,
       ca.description,
       e.nomPrenom,e.telephone_employe
       FROM clients as cl 
       join reservation as re on cl.nni=re.nni
       JOIN chambre as ch on re.nr_chambre=ch.nr_chambre 
       JOIN categorie as ca on ch.code_categorie=ca.code_categorie 
       JOIN employe as e on cl.id_employe=e.id_employe"; 
$ps=$pdo->prepare($req); 
$ps->execute(); 
?>
    <html>

    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8" />
        <title>Recette</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            #customers td,
            #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            
            #customers tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            
            #customers tr:hover {
                background-color: #ddd;
            }
            
            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #75caeb;
                color: white;
            }
            
            .e1 {
                position: relative;
                top: 45px;
                left: -12px;
            }
            
            .spacer1 {
                margin-top: 55px;
            }

        </style>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar">
        </span>
    </button>
                <img src="logo.png" width="auto" class="pull-left">
            </div>
            <div class="collapse navbar-collapse " id="menu">
                <ul class="nav navbar-nav nav nav-tabs nav-border-color nav-info" style="margin-top: 25px ">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Gestion Clients</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="client.php"><strong>Listes des Clients</strong></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="listereservation.php"><strong>Listes de Reservations</strong></a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="liste.php"><strong>Recette</strong></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="reservation.php"><strong>Reservation</strong></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Gestion des Employés</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="listeemploye.php"><strong>Listes des Employés</strong></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="ajoutemploye.php"><strong>Ajouter Employé</strong></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Gestion Chambres</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="listechambre.php"><strong>Listes des chambres</strong></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><strong>Ajout Chambre</strong></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Gestion Consommation</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="enregistrerconsommation.php"><strong>enregistrerment</strong></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="consommer.php"><strong>Consommer</strong></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="listeconsommation.php"><strong>Liste Consommation</strong></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav nav nav-tabs nav-border-color nav-info navbar-right" style="margin-top: 25px ">
                    <li><a href="logout.php"><strong><span class="glyphicon glyphicon-log-in"> Log<?php echo((isset($_SESSION['PROFILE']))?"Out":"In")?>[<?php echo((isset($_SESSION['PROFILE']))? ($_SESSION['PROFILE']['nomPrenom']):"")?>]</span></strong></a>
                    </li>
                </ul>
            </div>

        </nav>
        <div class="container-fluid ">

            <div class="panel panel-info spacer e">
                <div class="panel-heading">
                    <h3 class="panel-title" align="center"><strong>Recettes</strong></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>NNI</th>
                                <th>Nom/Pre</th>
                                <th>Tel</th>
                                <th>Adresse</th>
                                <th>Nr_res</th>
                                <th>Date_reser</th>
                                <th>debut</th>
                                <th>Nbre_nuit</th>
                                <th>Montantt</th>
                                <th>Nr_Chambre</th>
                                <th>Tel_chambre</th>
                                <th>categorie</th>

                                <th>Nom/pre</th>
                                <th>Tel_Emp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($et=$ps->fetch()) { ?>
                            <tr class="">
                                <td>
                                    <?php echo($et['nni'])?>
                                </td>
                                <td>
                                    <?php echo($et['nom_prenom'])?>
                                </td>
                                <td>
                                    <?php echo($et['telephone'])?>
                                </td>
                                <td>
                                    <?php echo($et['adresse'])?>
                                </td>
                                <td>
                                    <?php echo($et['nr_reservation'])?>
                                </td>
                                <td>
                                    <?php echo($et['date_reservation'])?>
                                </td>
                                <td>
                                    <?php echo($et['date_debut'])?>
                                </td>
                                <td>
                                    <?php echo($et['nombre_nuit'])?>
                                </td>
                                <td>
                                    <?php echo($et['montant'])?>
                                </td>
                                <td>
                                    <?php echo($et['nr_chambre'])?>
                                </td>
                                <td>
                                    <?php echo($et['telephone_chambre'])?>
                                </td>
                                <td>
                                    <?php echo($et['code_categorie'])?>
                                </td>

                                <td>
                                    <?php echo($et['nomPrenom'])?>
                                </td>
                                <td>
                                    <?php echo($et['telephone_employe'])?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <strong>RECETTE TOTAL =  </strong>
                    <td align="right"><strong><?php
                           require_once("connexion.php");
                           $req = "SELECT SUM(montant) as total FROM reservation"; 
                           $ps=$pdo->prepare($req);
                           $ps->execute();
                           while ($row=$ps->fetch(PDO::FETCH_ASSOC)){
                           echo $row['total'];
                           };?></strong> </td>
                    <p class=pull-right><a href="export.php"><strong>Exporter mes données</strong></a></p>

                </div>

            </div>
        </div>
    </body>

    </html>
