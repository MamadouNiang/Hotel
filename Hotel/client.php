<?php 
require_once("securite.php");

?>
<?php
require_once("connexion.php");
$mc="";
$size=7;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=0;
}
$offset = $size*$page;
if(isset($_GET['motcle'])){
    $mc=$_GET['motcle'];
    $req="SELECT *FROM clients as cl join employe as e on cl.id_employe=e.id_employe WHERE nom_prenom like '%$mc%' LIMIT $size OFFSET $offset ";
}else{
    $req="SELECT *FROM clients as cl join employe as e on cl.id_employe=e.id_employe LIMIT $size OFFSET $offset";
}

$ps=$pdo->prepare($req);
$ps->execute();
if(isset($_GET['motcle']))
$ps2=$pdo->prepare("SELECT COUNT(*) as nb_cl FROM clients  WHERE nom_prenom like '%$mc%' ");
else{
    $ps2=$pdo->prepare("SELECT COUNT(*) as nb_cl FROM clients as cl join employe as e on cl.id_employe=e.id_employe ");
}
$ps2->execute();
$ligne=$ps2->fetch(PDO::FETCH_ASSOC);
$nbc=$ligne['nb_cl'];
$npp=floor($nbc/$size)+1;
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
                                    <a href="client.php"><strong>Listes Clients</strong></a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="listereservation.php"><strong>Listes Reservations</strong></a>
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
                                    <a href="listechambre.php"><strong>Listes  chambres</strong></a>
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
                        <form class="navbar-form navbar-left " role="search">
                            <div class="form-group" style="margin-top:23px">
                                <input type="text" class="form-control input-sm" name="motcle" value="<?php echo ($mc) ?>" placeholder="Mot_clés" />
                                <button type="submit" class="btn btn-info btn-xs">Rechercher</button>
                            </div>
                        </form>
                    </ul>
                    <ul class="nav navbar-nav nav nav-tabs nav-border-color nav-info navbar-right" style="margin-top: 32px ">
                        <li><a href="logout.php"><strong><span class="glyphicon glyphicon-log-in"> Log<?php echo((isset($_SESSION['PROFILE']))?"Out":"In")?>[<?php echo((isset($_SESSION['PROFILE']))? ($_SESSION['PROFILE']['nomPrenom']):"")?>]</span></strong></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="view">
            <div class="full-bg-img flex-center">
                <div class="panel panel-info spacer e ">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center"><strong>Listes des Clients</strong></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>NNI</th>
                                    <th>Nom_Prenom</th>
                                    <th>Telephone</th>
                                    <th>Adresse</th>
                                    <th>Nom_Employe</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                    <th>Facturé</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($et=$ps->fetch()) { ?>
                                <tr>
                                    <td>
                                        <?php echo($et['nni']) ?>
                                    </td>
                                    <td>
                                        <?php echo($et['nom_prenom']) ?>
                                    </td>
                                    <td>
                                        <?php echo($et['telephone']) ?>
                                    </td>
                                    <td>
                                        <?php echo($et['adresse']) ?>
                                    </td>
                                    <td>
                                        <?php  echo($et['nomPrenom']) ?>
                                    </td>
                                    <td><a class="btn btn-info btn-xs" href="modifierclient.php?code=<?php echo($et['nni']) ?> "><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td><a class="btn btn-info btn-xs" onclick="return confirm('**Etes vous sure de SUPPRIMER ?**');" href="suprimerclient.php?code=<?php echo($et['nni'])?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                    <td><a class="btn btn-info btn-xs" href="facturer.php?code=<?php echo($et['nni']) ?> "><span class="glyphicon glyphicon-print"></span></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="breadcrumb">
                        <?php for($i=0;$i<$npp;$i++) { ?>
                        <li class="<?php echo(($i==$page)? 'active':'') ?>">
                            <a href="client.php?page=<?php echo ($i)?>&motcle=<?php echo ($mc)?>">Page <?php echo ($i+1) ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
    </body>

    </html>
