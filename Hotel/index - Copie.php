<html>

<head>
    <meta charset="utf-8" />
    <title>Les Clients</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#myCarousel").carousel({
                interval: 3000,
                pause: false
            });
        });

    </script>
    <style type="text/css">
        .carousel {
            background: rgba(255, 255, 255, 0.1);
            margin-top: -10px;
        }
        
        .carousel .item img {
            margin: 0 auto;
            /* Align slide image horizontally center */
        }
        
        .bs-example {
            margin: 5px;
        }

    </style>
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
                <ul class="nav navbar-nav nav nav-tabs nav-border-color nav-info navbar-right" style="margin-top:32px">
                    <li><a href="logout.php"><strong><span class="glyphicon glyphicon-log-in"> Log<?php echo((isset($_SESSION['PROFILE']))?"Out":"In")?>[<?php echo((isset($_SESSION['PROFILE']))? ($_SESSION['PROFILE']['nomPrenom']):"")?>]</span></strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bs-example">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="active item"><img src="img/indigo.jpg" alt="First Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item"><img src="img/indigo1.jpg" alt="Second Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item"><img src="img/indigo2.jpg" alt="Third Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item"><img src="img/indigo5.jpg" alt="Four Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item"><img src="img/indigo3.jpg" alt="Five Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
            <!-- Carousel controls --><a class="carousel-control left" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a><a class="carousel-control right" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a></div>
    </div>
    <table class="table table-striped table-hover ">
        <tr>
            <td>
                <div class="panel panel-info " id="reservation">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center"><strong>Informations</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Services</a></li>
                                <li><a data-toggle="tab" href="#menu1">Confort</a></li>
                                <li><a data-toggle="tab" href="#menu2">Telephone</a></li>
                                <li><a data-toggle="tab" href="#menu3">Salle de Sejour</a></li><br></ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active"><br>
                                    <p>- Accueil chaleureux</p>
                                    <p>- Réception 24H/24H</p>
                                    <p>- Service pressing et blanchisserie</p>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <p>- Chambres non fumeurs </p>
                                    <p>- Minibar</p>
                                    <p>- Lit bébé sur demande</p>
                                    <p>- Ascenseur</p>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <p>- Service de réveil</p>
                                    <p>- Toute nos chambre sont équipé d'un téléphone</p>
                                    <p>- Service de messagerie</p><br>
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <h4>RS-HÔTEL</h4>
                                    <p>Est également pourvu d'une jolie terrasse pour prendre</p>
                                    <p>le petit déjeuner à l'approche des beaux jours.</p><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="panel panel-info  ">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center"><strong>Tarifications</strong></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th><strong>Types D'hebergement</strong></th>
                                    <th>Nos Tarifs</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chambre Seul </td>
                                    <td>25.000 Um</td>
                                </tr>
                                <tr>
                                    <td>Demi-Pension</td>
                                    <td>37.000 Um</td>
                                </tr>
                                <tr>
                                    <td>Pension-Complet</td>
                                    <td>55.000 Um</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </td>
        </tr>

    </table>
    </div>


</body>

</html>
