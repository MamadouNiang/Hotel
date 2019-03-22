<?php 
require_once("securite.php");
?>
<?php
  $nr_reservation=$_GET['code'];
   require_once("connexion.php");
   $ps=$pdo->prepare("SELECT *FROM reservation WHERE nr_reservation=?");
$params=array($nr_reservation);
$ps->execute($params);
$client=$ps->fetch();
   ?>
    <html>

    <head>
        <meta charset="utf-8" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript">
            function check() {
                var a = document.getElementById("type1").checked;
                var b = document.getElementById("type2").checked;
                var c = document.getElementById("type3").checked;
                var n = document.getElementById("nombre_nuit").value;

                if (a) {
                    document.reservation.montant.value = n * 25000;
                } else if (b) {
                    document.reservation.montant.value = n * 37000;
                } else if (c) {
                    document.reservation.montant.value = n * 55000;
                }
            }

        </script>
    </head>

    <body>
        <?php require_once("entete.php") ?>
        <div class="container-fluid spacer col-md-6 col-xs-12 p ">
            <div class="panel panel-info">
                <div class="panel-heading">Reservation</div>
                <div class="panel-body">
                    <form method="post" action="updatereservation.php" name="reservation">
                        <div class="form-group">
                            <label class="control-label"><strong>nr_reservation</strong></label>
                            <input readonly type="number" class="form-control" id="nr_reservation" name="nr_reservation" value="<?php echo($client['nr_reservation'])?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Date_Reservation</strong></label>
                            <input type="hidden" name="date_reservation" value="<?php echo gmdate(" Y-m-d H:i:s " ); ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Date_Debut</strong></label>
                            <input value="<?php echo($client['date_debut'])?>" type="date" class="form-control" id="tdate_debut" name="date_debut">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Nombre_Nuits</strong></label>
                            <input value="<?php echo($client['nombre_nuit'])?>" type="number" class="form-control" id="nombre_nuit" name="nombre_nuit">
                        </div>
                        <div class="form-group ">
                            <label class="control-label"><strong>Type D 'hebegement</strong> </label><br>
                            <input type="radio" name="type_hebergement" id="type1" value="chambre seul" onclick="check()"> Chambre Seul
                            <br>
                            <input type="radio" name="type_hebergement" id="type2" value="demi pension" onclick="check()"> Demi-Pension
                            <br>
                            <input type="radio" name="type_hebergement" id="type3" value="pension complet" onclick="check()"> Pension-Complet
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Montant</strong></label>
                            <input value="<?php echo($client['montant'])?>" type="number" class="form-control" id="montant" name="montant">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>NNI</strong></label>
                            <input value="<?php echo($client['nni'])?>" type="number" class="form-control" id="nni" name="nni">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><strong>Nr_Chambre</strong></label>
                            <select class="form-control" id="nr_chambre" name="nr_chambre" style="width:200px" value="<?php echo($client['nr_chambre'])?>">
                                    <option>  </option>
                                   <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT nr_chambre FROM chambre ");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>    
                                       <option > <?php echo $row['nr_chambre']; ?></option>
                                    <?php } ?>
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
