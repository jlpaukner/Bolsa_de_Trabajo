<?php
session_start();
require __DIR__ . '/dbcon.php';

echo var_dump($_SESSION);
$tabla=$_POST["tabla"];
$nombreID=$_POST["nombreID"];
$valorID=$_POST["valorID"];
$aborrar = sprintf(" DELETE FROM $tabla WHERE `$nombreID`='$valorID'");
operaciondb($aborrar);
$retorno="location:".$_SESSION['pagretorno'];
//$retorno="location:".$_POST['pagretorno'];
header($retorno);
?>