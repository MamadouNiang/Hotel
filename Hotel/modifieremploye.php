<?php 
require_once("securite.php");
require_once("roleadmin.php");
?>
<?php
  $id_employe=$_GET['code'];
   require_once("connexion.php");
   $ps=$pdo->prepare("SELECT *FROM employe WHERE id_employe=?");
$params=array($id_employe);
$ps->execute($params);
$client=$ps->fetch();
   ?>
    <html>

    <head>
        <meta charset="utf-8" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <?php require_once("entete.php") ?>
        <div class="container-fluid spacer col-md-6 col-xs-12 p ">
            <div class="panel panel-info">
                <div class="panel-heading" align="center"><strong>Modifier_Employe</strong></div>
                <div class="panel-body">
                    <form method="post" action="updateemploye.php" name="reservation">
                        <div class="form-group">
                            <label class="control-label"><strong>id_employe</strong></label>
                            <input readonly type="number" class="form-control" id="id_employe" name="id_employe" value="<?php echo($client['id_employe'])?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Nom_prenom</strong></label>
                            <input value="<?php echo($client['nomPrenom'])?>" type="text" class="form-control" id="nomPrenom" name="nomPrenom">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Mot_de_passe</strong></label>
                            <input value="<?php echo($client['password'])?>" type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Telephone</strong></label>
                            <input value="<?php echo($client['telephone_employe'])?>" type="number" class="form-control" id="telephone" name="telephone_employe">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Role</strong></label>
                            <select class="form-control" name="role">
                            <option> </option>
                                <option>Administrateur</option>
                                <option>Receptionniste</option>
                                <option>Serveur</option>
                                <option>Majordome</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Salaire</strong></label>
                            <input value="<?php echo($client['salaire'])?>" type="number" class="form-control" id="salaire" name="salaire">
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-info" name="valider">Valider</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>

    </html>
