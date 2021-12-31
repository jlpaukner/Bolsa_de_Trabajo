<?php
require __DIR__ . '/encabezadoe.php';
require_once('./dbcon.php');
include __DIR__ . '/ctabla.php';

$iddueño= $_SESSION['id'];
$consulta="SELECT IdBusqueda,EdadMaxima,EdadMinima,tx_puesto,tx_carrera
FROM `busquedas` join puestos on busquedas.Id_puesto=puestos.Id_puesto 
join carreras on busquedas.id_Carrera=carreras.Id_carrera 
where `IdEmpresa`='$iddueño' ";
//echo $consulta;
$filas=cunsultadbmultiple($consulta);
$alias= Array('IdBusqueda','Edad Máxima','Edad Mínima','Puesto','Carrera');
$tablagenerada=tabla($filas,$alias,"fbusqueda.php","IdBusqueda","busquedas","busquedas.php");
if (!$tablagenerada)
{
echo "<h2>No ha cargado búsquedas aún</h2>";
}
?>
<hr>
<form action=fbusqueda.php method="POST"> 
  <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
      <input type = "hidden" name = "IdBusqueda" value = "0" >
      <button type="submit" name="boton" class="form-control btn btn-dark centroventana border border-primary" value="Añadir busqueda">Añadir busqueda</button>
    </div>
    <div class="col-sm-5"></div>
  </div>
 </form>