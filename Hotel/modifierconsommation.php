<?php 
require_once("securite.php");
?>
<?php
$nr_consommation=$_GET['code'];
   require_once("connexion.php");
   $ps=$pdo->prepare("SELECT *FROM cons_pres WHERE nr_consommation=?");
$params=array($nr_consommation);
$ps->execute($params);
$client=$ps->fetch();
?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript">
            function test(element) {
                var n = document.getElementById("quantite").value;
                Number(n);
                var a = element.value;
                if (a == "Boissons") {
                    document.getElementById("montant").value = n * 300;
                } else if (a == "Boissons,Repas") {
                    document.getElementById("montant").value = n * 2200;
                } else if (a == "Boissons,Diner") {
                    document.getElementById("montant").value = n * 2800;
                }

            }

        </script>
        < body>
            <?php require_once("entete.php") ?>
            <div class="container-fluid spacer col-md-6 col-xs-12 b ">
                <div class="panel panel-info">
                    <div class="panel-heading" align="center">
                        <strong> Modifier_Consommation
                    </strong>
                    </div>
                    <div class="panel-body i">
                        <form method="post" action="saveconsommation.php" name="reservation" align="left">
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label">
                        <strong>Nom_Consommateur
                            </strong>
                                </label>
                                            <select class="form-control" id="nr_consommation" name="nr_consommation" style="width:200px ">
                                    <option>  </option>
                                   <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT *from consommation as c join clients as cl on c.nni=cl.nni ");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>    
                                       <option  value="<?php echo $row['nr_consommation']; ?>"> <?php echo $row['nom_prenom']; ?></option>
                                    <?php } ?>
                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                        <strong>employe
                            </strong>
                                </label>
                                            <select class="form-control" id="id_employe" name="id_employe" style="width:200px">
                                    <option>  </option>
                                   <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT nomPrenom,id_employe FROM employe where role='Caissier'");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>    
                                       <option value="<?php echo $row['id_employe']; ?>"> <?php echo $row['nomPrenom']; ?></option>
                                    <?php } ?>
                                </select>
                                        </div>

                                    </td>
                                    <td>
                                        <div class=" i"></div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label"><strong>Quantité<strong></label>
                                            <input type="number" min="1" class="form-control" id="quantite" name="quantite" style="width:200px">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label"><strong>code_prestations</strong> </label><br>
                                            <select class="form-control" id="code_prestation" name="code_prestation" style="width:200px" onchange="test(this)">
                                    <option>  </option>
                                   <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT *from prestation");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>    
                                       <option > <?php echo $row['code_prestation']; ?></option>
                                    <?php } ?>
                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"><strong>Montant<strong></label>
                                            <input readonly type="number" min="0" class="form-control" id="montant" name="montant" style="width:200px">
                                        </div>


                                    </td>
                                </tr>
                            </table>
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
