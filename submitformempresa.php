<?php

session_start();
require_once __DIR__ . '/dbcon.php';
$Cuit=$_SESSION['id'];
$_POST['Cuit']= $Cuit;
echo var_dump($_POST);

$tabla = "empresa";    
$nombrellave="Cuit";
$valorllave= $Cuit;   
$retorno="inicioempresa.php?ms=demx";

EnviarFormulario($tabla,$nombrellave,$valorllave,$retorno,$_POST) ;

?>