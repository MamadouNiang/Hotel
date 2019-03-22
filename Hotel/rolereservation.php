<?php
if(!($_SESSION['PROFILE']['role']=="Receptionniste"||$_SESSION['PROFILE']['role']=="Administrateur")){ header("location:$_SERVER[HTTP_REFERER]"); }
?>
