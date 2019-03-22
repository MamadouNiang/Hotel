<?php
require_once("connexion.php");
$nomPrenom = $_POST['nomPrenom'];
$password = md5($_POST['password']);
$ps=$pdo->prepare("SELECT * FROM employe WHERE nomPrenom=? AND password=?");
$params=array($nomPrenom,$password);
$ps->execute($params);
if($user=$ps->fetch()){
    session_start();
    $_SESSION['PROFILE']=$user;
       if($_SESSION['PROFILE']['role']=='Administrateur' || $_SESSION['PROFILE']['role']=='Receptionniste' || $_SESSION['PROFILE']['role']=='Caissier')
          header("location:client.php");
    else{
        header("location:login.php");
    }
}else{
    header("location:login.php");
}
?>
