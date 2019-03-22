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
    <nav class="navbar navbar-default navbar-toggleable navbar-dark navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar">
        </span>
    </button>
                <a href="index.php"><img src="logo.png" width="auto" class="pull-left"></a>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Gestion Employés</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="listeemploye.php"><strong>Listes Employés</strong></a>
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
                                <a href="listechambre.php"><strong>Listes chambres</strong></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="ajoutchambre.php"><strong>Ajout Chambre</strong></a>
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
                <ul class="nav navbar-nav nav nav-tabs nav-border-color nav-info navbar-right" style="margin-top:25px">
                    <li><a href="logout.php"><strong><span class="glyphicon glyphicon-log-in"> Log<?php echo((isset($_SESSION['PROFILE']))?"Out":"In")?>[<?php echo((isset($_SESSION['PROFILE']))? ($_SESSION['PROFILE']['nomPrenom']):"")?>]</span></strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
