<?php 
require_once("securite.php");
require_once("roleadmin.php");
?>
<?php
require_once("connexion.php"); 
$req = "SELECT * FROM employe where role!='Administrateur'"; 
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
                <h3 class="panel-title" align="center"><strong>Listes des Employés</strong></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>ID_Employe</th>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Telephone</th>
                            <th>Salaire</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($et=$ps->fetch()) { ?>
                        <tr>
                            <td>
                                <?php echo($et['id_employe'])?>
                            </td>
                            <td>
                                <?php echo($et['nomPrenom'])?>
                            </td>
                            <td>
                                <?php echo($et['password'])?>
                            </td>
                            <td>
                                <?php echo($et['role'])?>
                            </td>
                            <td>
                                <?php echo($et['telephone_employe'])?>
                            </td>
                            <td>
                                <?php echo($et['salaire'])?>
                            </td>
                            <td><a class="btn btn-info btn-xs" href="modifieremploye.php?code=<?php echo($et['id_employe']) ?> "><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td><a class="btn btn-info btn-xs" onclick="return   confirm('**Etes vous sure de SUPPRIMER ?**');" href="suprimeremploye.php?code=<?php echo($et['id_employe'])?>"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>

    </html>
