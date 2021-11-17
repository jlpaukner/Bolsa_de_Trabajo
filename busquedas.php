<?php
require __DIR__ . '/encabezadoe.php';
include __DIR__ . '/dbcon.php';
include __DIR__ . '/ctabla.php';

$iddueño= $_SESSION['id'];
// $tablagenerada=ctabla('busquedas',$columnas,$alias,'idEmpresa',$iddueño,'IdBusqueda','fbusqueda.php','busquedas.php');
$consulta=sprintf("SELECT IdBusqueda,EstadoCivil,EdadMaxima,EdadMinima,tx_puesto,tx_carrera
FROM `busquedas` join puestos on busquedas.Id_puesto=puestos.Id_puesto join carreras on busquedas.id_Carrera=carreras.Id_carrera where `IdEmpresa`='%s' ",$iddueño);
$filas=cunsultadbmultiple($consulta);
$alias= Array('IdBusqueda','Estado Civil','Edad Máxima','Edad Mínima','Puesto','Carrera');
$tablagenerada=tabla($filas,$alias,"fbusqueda.php","IdBusqueda","busquedas","busquedas.php");

if (!$tablagenerada)
{
echo "<h2>No ha cargado búsquedas aún</h2>";
// echo $consulta;
}
?>
<hr>
<form action=fbusqueda.php method="POST"> 
    <input type = "hidden" name = "IdBusqueda" value = "0" >
    <input type=  "submit" name="boton" value ="Añadir busqueda"> 
</form>
 <?php 
//  require __DIR__ . '/averiguamatch.php';
  ?> 