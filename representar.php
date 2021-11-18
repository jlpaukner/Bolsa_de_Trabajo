<?php
 session_start();
unset($_SESSION['cols']);
unset($_SESSION['tabl']);
unset($_SESSION['ha']);
var_dump($_SESSION);
var_dump($_POST);
$_SESSION['adminID']=$_SESSION['id'];
$_SESSION['id']=$_POST['repID'];
$_SESSION['tipousuario']=$_POST['tipousuario'];
if($_SESSION['tipousuario']=="empresa"){
    header("Location:inicioempresa.php?ms=d");
}
if($_SESSION['tipousuario']=="candidatos"){
    header("Location:iniciocandidato.php?ms=d");    
}
 ?>

