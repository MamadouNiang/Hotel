<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
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
                                <a href="liste.php"><strong>Contenue</strong></a>
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

            </div>
        </div>
    </nav>
    <div class="container-fluid spacer p col-md-6 col-xs-12 col-lg-5">
        <div class="panel panel-info">
            <div class="panel-heading" align="center"><strong>Authentification</strong></div>
            <div class="panel-body">
                <form method="post" action="authentifier.php">
                    <div class="form-group">
                        <label class="control-label"><strong>Login</strong></label>
                        <input type="text" class="form-control " id="nomPrenom" name="nomPrenom" placeholder="Identifiez vous">
                    </div>
                    <div class="form-group ">
                        <label class="control-label "><strong>Password</strong></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot De Passe">
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-4">
                            <button type="submit" class="btn btn-info bu"><span>Login</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center ">
        <span class="bodytext"><marquee direction=left><h2><strong>HOTEL_ROYAL,vous souhaites les bienvenues</strong></h2></marquee></span>
        <span class="bodytext"><marquee direction=right><h2><strong>tous les droits sont reserv&eacute;s pour ROYAL_HOTEL</strong></h2></marquee></span>

    </footer>
</body>

</html>
