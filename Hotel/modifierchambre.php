<?php 
require_once("securite.php");
require_once("roleadmin.php");
?>
<?php
  $nr_chambre=$_GET['code'];
   require_once("connexion.php");
   $ps=$pdo->prepare("SELECT *FROM chambre WHERE nr_chambre=?");
$params=array($nr_chambre);
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
                <div class="panel-heading" align="center"><strong>Modifier_Chambres</strong></div>
                <div class="panel-body">
                    <form method="post" action="updatechambre.php" name="chambre">
                        <div class="form-group">
                            <label class="control-label"><strong>Nr_Chambre</strong></label>
                            <input readonly type="text" class="form-control" id="nr_chambre" name="nr_chambre" value="<?php echo($client['nr_chambre'])?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>telephone</strong></label>
                            <input value="<?php echo($client['telephone_chambre'])?>" type="number" class="form-control" id="telephone" name="telephone_chambre">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>code_categorie</strong></label>
                            <select class="form-control" id="code_categorie" name="code_categorie" style="width:200px">
                                    <option>  </option>
                                   <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT code_categorie FROM categorie ");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>    
                                       <option > <?php echo $row['code_categorie']; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Etat</strong></label>
                            <select class="form-control" name="etat" style="width:150px">
                            <option> </option>
                                <option>libre</option>
                                <option>occupee</option>
                            </select>
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
