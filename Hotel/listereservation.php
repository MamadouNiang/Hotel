<?php 
require_once("securite.php");
require_once("rolereservation.php");
?>
<?php
require_once("connexion.php"); 
$req = "SELECT * FROM reservation"; 
$ps=$pdo->prepare($req); 
$ps->execute(); 
?>
    <html>

    <head>
        <meta charset="utf-8" />
        <title>Les Clients</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
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
            </div>
        </nav>

        <div class="panel panel-info spacer e ">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"><strong>Listes de Reservations</strong></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nr_Reservation</th>
                            <th>Date_Reservation</th>
                            <th>Date_Debut</th>                            
                            <th>Nombre_Nuits</th>
                            <th>Date_Fin</th>
                            <th>Montant</th>
                            <th>NNi</th>
                            <th>Nr_Chambre</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($et=$ps->fetch()) { ?>
                        <tr>
                            <td>
                                <?php echo($et['nr_reservation']) ?>
                            </td>
                            <td>
                                <?php echo($et['date_reservation']) ?>
                            </td>
                            <td>
                                <?php echo($et['date_debut']) ?>
                            </td>
                            <td>
                                <?php echo($et['nombre_nuit']) ?>
                            </td>
                            <td>
                                <?php echo($et['date_fin']) ?>
                            </td>
                            <td>
                                <?php echo($et['montant']) ?>
                            </td>
                            <td>
                                <?php echo($et['nni']) ?>
                            </td>
                            <td>
                                <?php echo($et['nr_chambre']) ?>
                            </td>
                            <td><a class="btn btn-info btn-xs" href="modifierreservation.php?code=<?php echo($et['nr_reservation']) ?> "><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td><a class="btn btn-info btn-xs" onclick="return confirm('**Etes vous sure de SUPPRIMER ?**');" href="suprimerreservation.php?code=<?php echo($et['nr_reservation'])?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
