<?php
include __DIR__ . '/dbcon.php';
session_start();
$consulta=sprintf("SELECT * FROM busquedas WHERE idEmpresa='%s' ",$_SESSION['id']);
/*echo "<br>";
echo $consulta;
echo "<br>";*/
$busquedas=cunsultadbmultiple($consulta);
$busqueda=array_pop($busquedas);
var_dump($busqueda);

$consulta="Select DNI from candidatos join "


?>