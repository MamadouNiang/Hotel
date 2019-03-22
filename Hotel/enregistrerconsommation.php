<?php 
require_once("securite.php");
require_once("roleresto.php");
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    < body>
        <?php require_once("entete.php") ?>
        <div class="container-fluid spacer col-md-6 col-xs-12 b ">
            <div class="panel panel-info">
                <div class="panel-heading" align="center">
                    <strong> Enregistrment
                    </strong>
                </div>
                <div class="panel-body i">
                    <form method="post" action="saveenregistrement.php" name="reservation" align="left">


                        <div class="form-group">
                            <label class="control-label">
                        <strong>Nom_client
                            </strong>
                                </label>
                            <select class="form-control" id="nni" name="nni" style="width:200px">
                                    <option>  </option>
                                   <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT nom_prenom,nni FROM clients ");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>    
                                       <option value="<?php echo $row['nni']; ?>"> <?php echo $row['nom_prenom']; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                        <strong>Date_Consommation
                            </strong>
                                </label>
                            <input readonly name="date_consommation" value="<?php echo gmdate(" Y-m-d H:i:s " ); ?>" class="form-control">
                        </div>


                        <div class="form-group ">
                            <div class="col-lg-10 col-lg-offset-3 ">
                                <button type="reset" class="btn btn-default ">
                        <span> Reset
                            </span>
                                </button>
                                <button type="submit" class="btn btn-info bu" name="valider">
                        <span> Valider
                            </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
        </div>


        </body>

</html>
