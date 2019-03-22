<?php 
require_once("securite.php");
require_once("rolereservation.php");
?>
<!DOCTYPE html>
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
                document.getElementById("nni").style.borderColor = 'red';
                document.reservation.nni.focus();
            }
        }

        function check() {
            var a = document.getElementById("type1").checked;
            var b = document.getElementById("type2").checked;
            var c = document.getElementById("type3").checked;
            var date1 = document.getElementById('date_debut').value;
            var debut = date1.split("-");
            var annee1 = debut[0];
            var mois1 = debut[1];
            var jours1 = debut[2];
            var date2 = document.getElementById('date_fin').value;
            var fin = date2.split("-");
            var annee2 = fin[0];
            var mois2 = fin[1];
            var jours2 = fin[2];
            var nb = document.reservation.nombre_nuit.value = jours2 - jours1;
            var nb = document.getElementById("nombre_nuit").value;
            if (a) {
                document.reservation.montant.value = nb * 25000;
            } else if (b) {
                document.reservation.montant.value = nb * 37000;
            } else if (c) {
                document.reservation.montant.value = nb * 55000;
            }
            var z = document.reservation.type_hebergement.value;
            
            var hebergement = $("input[name=type_hebergement]:checked").val();
            var heb = document.getElementById('heb').value=hebergement;
            
        }

        function verif() {
            var tel = document.getElementById("telephone").value;
            var nni = document.getElementById("nni").value;
            var regEx_tel = /^[0-9]{8}$/;
            var regEx_nni = /^[0-9]{10}$/;
            if (!tel.match(regEx_tel) || (!nni.match(regEx_nni))) {
                return false;
            } else {
                return true;
            }
        }

        function recup() {
            var debut = document.getElementById("date_debut").value;
            var newDate = debut.split('-');
            var annee = newDate[0];
            var mois = newDate[1];
            var jours = Number(newDate[2]) + 1;
            var date = annee + '-' + mois + '-' + jours;
            var x = document.getElementById("date_fin").min = date;
        }
        
        function recupe(){
            var tt = '';
            if(document.getElementById("type1").checked)
               tt = document.getElementById("type1").value;
            else if(document.getElementById("type2").checked)
                tt = document.getElementById("type2").value;
            else if(document.getElementById("type3").checked)
                tt = document.getElementById("type3").value;

            var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var sel = document.getElementById("nr_chambre");
        sel.options.length = 0;
        
        var options = this.responseText.split(',');
        
        for (var i = 0;i < options.length - 1;i++ ) {
            var option = document.createElement('option');
            option.text = options[i];
            option.value = options[i];
            sel.add(option);
        }
    }
  };
  xhttp.open("POST", "recup.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("heb="+tt);
}
       
    </script>

    <body>
        <?php require_once("entete.php") ?>
        <div class="container-fluid spacer col-md-6 col-xs-12 b ">
            <div class="panel panel-info">
                <div class="panel-heading" align="center"> <strong> Reservation
                    </strong> </div>
                <div class="panel-body i">
                    <form method="post" action="savereservation.php" name="reservation" align="left">
                        <table>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="control-label"><strong>Date_Debut</strong></label>
                                        <input type="hidden" name="date_reservation" value="<?php echo gmdate(" Y-m-d H:i:s " ); ?>">
                                        <input type="hidden" name="nr_facture">
                                        <input onchange="recupe()" type="date" class="form-control" id="date_debut" onclick="document.getElementById('date_debut').min = new Date().toISOString().slice(0,10);" name="date_debut" placeholder="Date_Debut"> </div>
                                    <label class="control-label"><strong>Date_fin</strong></label>
                                    <input type="date" class="form-control" id="date_fin" onclick="recup()" onchange="recupe()"  name="date_fin" placeholder="Date_fin">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" onclick="calculer()" id="nombre_nuit" name="nombre_nuit" min="0" placeholder="Nombre de Nuits"> </div>
                                    <div class="form-group ">
                                        <label class="control-label"><strong>Type D 'hebegement</strong> </label>
                                        <br>
                                        <input onclick="recupe()" type="radio" name="type_hebergement" id="type1" value="chambre-seul" onclick="check()"> Chambre-Seul
                                        <br>
                                        <input onclick="recupe()" type="radio" name="type_hebergement" id="type2" value="demi-pension" onclick="check()"> Demi-Pension
                                        <br>
                                        <input onclick="recupe()" type="radio" name="type_hebergement" id="type3" value="pension-complet" onclick="check()"> Pension-Complet </div>
                                    <div class="form-group">
                                        <label class="control-label"><strong>Montant<strong></label>
                                        <input type="number" min="0" class="form-control" id="montant" name="montant" placeholder="prix_total" readonly>
                                    </div>
                                            <input type="text" class="form-control" id="heb" name="heb" > </div>
                                    <div class="form-group">
                                        <strong> Nr_Chambre</strong>
                                        <select class="form-control" id="nr_chambre" name="nr_chambre" style="width:200px" >
                                            
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class=" i"></div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="control-label"> <strong>NNI
                            </strong> </label>
                                        <input type="text" class="form-control" id="nni" name="nni" placeholder="Nr d'intentification national"> </div>
                                    <div class="form-group">
                                        <label class="control-label"> <strong>Nom_Prenom
                            </strong> </label>
                                        <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" placeholder="Nom_Prenom"> </div>
                                    <div class="form-group">
                                        <label class="control-label"> <strong>Teléphone
                            </strong> </label>
                                        <input type="number" min="0" class="form-control" id="telephone" name="telephone" placeholder="Teléphone"> </div>
                                    <div class="form-group">
                                        <label class="control-label"> <strong>Adresse
                            </strong> </label>
                                        <input type="texte" class="form-control" id="adresse" name="adresse" placeholder="Adresse"> </div>
                                    <div class="form-group">
                                        <label class="control-label"> <strong>employe
                            </strong> </label>
                                        <select class="form-control" id="id_employe" name="id_employe" style="width:200px">
                                                    <option> </option>
                                                    <?php
                                        require_once('connexion.php');
                                        $ps = $pdo->prepare("SELECT nomPrenom,id_employe FROM employe where role='Receptionniste'");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); ?>
                                                        <option value="<?php echo $row['id_employe']; ?>">
                                                            <?php echo $row['nomPrenom']; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group ">
                            <div class="col-lg-10 col-lg-offset-3 ">
                                <button type="reset" class="btn btn-default "> <span> Reset
                            </span> </button>
                                <button type="button" class="btn btn-info bu" name="valider" onclick="verif_form()"> <span> Valider
                            </span> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </body>

</html>
