<?php 
require_once("securite.php");
require_once("rolereservation.php");
?>
<?php
  $nni=$_GET['code'];
   require_once("connexion.php");
   $ps=$pdo->prepare("SELECT *FROM clients as cl join facturer as f on cl.nni=f.nni join employe as e on cl.id_employe=e.id_employe JOIN reservation as r on cl.nni=r.nni WHERE cl.nni=?");
$params=array($nni);
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
            function printlayer(layer) {
                var generator = window.open("");
                var layetext = document.getElementById(layer);
                generator.document.write(layetext.innerHTML.replace("id"));
                generator.document.close();
                generator.print();
                generator.close();
            }

        </script>
        < body>
            <?php require_once("entete.php") ?>
            <div class="container-fluid spacer col-md-6 col-xs-12 b ">
                <div class="panel panel-info">
                    <div class="panel-heading" align="center">
                        <strong> Facturation
                    </strong>
                    </div>
                    <div class="panel-body i">
                        <form method="post" action="savereservation.php" name="reservation" align="left" id="id">
                            <table align="center">
                                <tr>
                                    <h3 align="center" id="label"><strong>FACTURATION-ROYAL_HOTEL</strong></h3>

                                    <td>

                                        <strong>Numéro_Facture</strong><br>
                                        <input type="number" name="nr_facture" readonly value="<?php echo($client['nr_facture'])?>" id="nr_facture"><br>

                                        <strong>Date_Facuration</strong><br>
                                        <input name="date_reservation" value="<?php echo gmdate(" Y-m-d H:i:s " ); ?>" readonly id="date_facture"><br>


                                        <strong>Nom_employe</strong><br>
                                        <input readonly type="text" id="nomPrenom" name="nomPrenom" value="<?php echo($client['nomPrenom'])?>"><br>





                                    </td>
                                    <td>
                                        <div class=" i"></div>
                                    </td>
                                    <td>

                                        <strong>Nom_client<strong><br>
                                            <input type="text" id="nom_prenom" name="nom_prenom" readonly value="<?php echo($client['nom_prenom'])?>"><br>
                                       
                                            <strong>Nombre_Nuit</strong><br>
                                        <input readonly type="number" id="nombre_nuit" name="nombre_nuit" value="<?php echo($client['nombre_nuit'])?>"> <br>
                                        <strong>Montant<strong><br>
                                            <input type="number" id="montant" name="montant" readonly value="<?php echo($client['montant'])?>"><br>
                                    
                                    </td>
                                           
                                </tr>
                            <tr>
                                <td align="left">
                                        <h5 align="left"><strong> Signature_Employé:</strong></h5>
                                    </td>

                                    <td align="center">
                                        <h5 align="center"><strong>Merci Pour Votre Fidelité !</strong></h5>
                                    </td>
                                    <td align="right">
                                        <h5 align="right"><strong>Signature_Client:</strong></h5>
                                    </td>


                                </tr>
                            </table>

                        </form>

                        <br>
                        <div class="col-lg-10 col-lg-offset-4 ">
                            <button type="button" name="imprimer" onclick="printlayer('id')">
                        <span> imprimer
                            </span>
                                </button>
                        </div>


                    </div>



                </div>
            </div>
            </div>


            </body>

    </html>
