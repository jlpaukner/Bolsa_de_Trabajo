<?php
session_start();
require_once __DIR__ . '/dbcon.php';
echo var_dump($_POST);

$tabla="candidatos";
$nombrellave="DNI";
$valorllave=$_SESSION['id'];
$retorno= "iniciocandidato.php?ms=dpx"; 
EnviarFormulario($tabla,$nombrellave,$valorllave,$retorno,$_POST)  ; 
?>