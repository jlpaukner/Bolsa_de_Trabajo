<?php
session_start();
require __DIR__ . '/dbcon.php';
$tabla=$_POST["tabla"];
$nombreID=$_POST["nombreID"];
$valorID=$_POST["valorID"];
$aborrar = sprintf(" DELETE FROM $tabla WHERE `$nombreID`='$valorID'");
operaciondb($aborrar);
var_dump($_POST);
$retorno="location:".$_POST['retorno'];
header($retorno);
?>