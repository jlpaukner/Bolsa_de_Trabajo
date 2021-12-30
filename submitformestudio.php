<?php

session_start();
require_once __DIR__ . '/dbcon.php';
$estudioId=$_POST['ID_Estudio'];
$esNuevoEstudio= $estudioId==0;

echo"<br> post:  ".var_dump($_POST)."<br>";

$tabla = "estudios";    
$nombrellave="ID_Estudio";
$valorllave= $estudioId;   
$retorno="iniciocandidato.php?ms=ex";

EnviarFormulario($tabla,$nombrellave,$valorllave,$retorno,$_POST) ;

?>