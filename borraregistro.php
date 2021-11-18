<?php
require __DIR__ . '/dbcon.php';
echo var_dump($_POST);
$tabla=$_POST["tabla"];
$nombreID=$_POST["nombreID"];
$valorID=$_POST["valorID"];
$aborrar = sprintf(" DELETE FROM $tabla WHERE `$nombreID`='$valorID'");
operaciondb($aborrar);
$retorno="Location:".$_POST["pagretorno"];
header($retorno);
?>