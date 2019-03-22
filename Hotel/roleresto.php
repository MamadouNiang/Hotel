<?php
if(!($_SESSION['PROFILE']['role']=="Caissier"||$_SESSION['PROFILE']['role']=="Administrateur")){ header("location:$_SERVER[HTTP_REFERER]"); }
?>!
