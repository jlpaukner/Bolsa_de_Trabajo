<?php
require __DIR__ . '/encabezadoe.php';
include __DIR__ . '/dbcon.php';
include __DIR__ . '/ctabla.php';
// echo "<br>";
$columnas = array("EstadoCivil", "EdadMaxima", "EdadMinima", "Carreras", "titulos");
$alias = array("Estado Civil", "Edad Maxima", "Edad Minima", "Carrera", "Títulos");
$iddueño= $_SESSION['id'];
$tablagenerada=ctabla('busquedas',$columnas,$alias,'idEmpresa',$iddueño,'IdBusqueda','fbusqueda.php','busquedas.php');

if (!$tablagenerada)
{
echo "<h2>No ha cargado búsquedas aún</h2>";
}
?>
<hr>
<form action=fbusqueda.php method="POST"> 
    <input type = "hidden" name = "IdBusqueda" value = "0" >
    <input type=  "submit" name="boton" value ="Añadir busqueda"> 
</form>
<?php require __DIR__ . '/averiguamatch.php'; ?>