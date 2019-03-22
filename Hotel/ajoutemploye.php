<?php 
require_once("securite.php");
require_once("roleadmin.php");
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
                document.reservation.telephone.focus();
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
            <div class="panel-heading" align="center"><strong>Ajout_Employe</strong></div>
            <div class="panel-body">
                <form method="post" action="saveemploye.php" name="reservation">
                    <div class="form-group">
                        <label class="control-label"><strong>Nom_prenom</strong></label>
                        <input placeholder="Login" type="text" class="form-control" id="nomPrenom" name="nomPrenom">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>Mot_de_passe</strong></label>
                        <input placeholder="password" type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>Telephone</strong></label>
                        <input type="number" class="form-control" id="telephone" name="telephone_employe">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>Role</strong></label>
                        <select class="form-control " name="role">
                            <option> </option>
                                <option>Administrateur</option>
                                <option>Receptionniste</option>
                                <option>Serveur</option>
                                <option>Majordome</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>Salaire</strong></label>
                        <input type="number" min="1" class="form-control" id="salaire" name="salaire">
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-5">
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
