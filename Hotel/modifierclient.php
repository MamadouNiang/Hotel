<?php 
require_once("securite.php");
?>
<?php
  $nni=$_GET['code'];
   require_once("connexion.php");
   $ps=$pdo->prepare("SELECT *FROM clients WHERE nni=?");
$params=array($nni);
$ps->execute($params);
$client=$ps->fetch();
   ?>
    <html>

    <head>
        <meta charset="utf-8" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript">
            function verif_form() {
                if (verif()) {
                    document.reservation.valider.type = "submit";
                } else {
                    alert('** INFORMATIONS NON VALIDE OU MANQUANTE **');
                    document.getElementById("telephone").style.borderColor = 'red';

                    document.reservation.nni.focus();
                }
            }

            function verif() {
                var tel = document.getElementById("telephone").value;

                var regEx_tel = /^[0-9]{8}$/;

                if (!tel.match(regEx_tel)) {
                    return false;
                } else {
                    return true;
                }

            }

        </script>
    </head>

    <body>
        <?php require_once("entete.php") ?>
        <div class="container-fluid spacer col-md-6 col-xs-12 p ">
            <div class="panel panel-info">
                <div class="panel-heading" align="center"><strong>Modifier_Client</strong></div>
                <div class="panel-body">
                    <form method="post" action="updateclient.php" name="reservation">
                        <div class="form-group">
                            <label class="control-label"><strong>nni</strong></label>
                            <input readonly type="number" class="form-control" id="nni" name="nni" value="<?php echo($client['nni'])?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Nom_Prenom</strong></label>
                            <input value="<?php echo($client['nom_prenom'])?>" type="text" class="form-control" id="nom_prenom" name="nom_prenom">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Telephone</strong></label>
                            <input value="<?php echo($client['telephone'])?>" type="number" class="form-control" id="telephone" name="telephone" placeholder="Numero de teléphone">
                            <input type="hidden" name="date_reservation" value="<?php echo gmdate(" Y-m-d H:i:s " ); ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>adresse</strong></label>
                            <input value="<?php echo($client['adresse'])?>" type="text" class="form-control" id="adresse" name="adresse">
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                        <strong>id_employe
                            </strong>
                                </label>
                            <select class="form-control" id="id_employe" name="id_employe" style="width:200px" value="<?php echo($client['id_employe'])?>">
                                    <option>  </option>
                                   <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT nomPrenom,id_employe FROM employe where role='Receptionniste'");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>    
                                       <option value="<?php echo $row['id_employe']; ?>"> <?php echo $row['nomPrenom']; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="button" class="btn btn-info" name="valider" onclick="verif_form()">Valider</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>

    </html>
