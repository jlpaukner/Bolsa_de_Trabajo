<?php

session_start();
require_once __DIR__ . '/dbcon.php';

echo var_dump($_POST); 

$tabla = "busquedas";
$nombrellave="id_busqueda";
$valorllave=$_POST['id_busqueda'];   
$retorno="busquedas.php";

EnviarFormulario($tabla,$nombrellave,$valorllave,$retorno,$_POST)  ; 

?>