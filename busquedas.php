<?php
require __DIR__ . '/encabezadoe.php';
require_once('./dbcon.php');
include __DIR__ . '/ctabla.php';
include __DIR__ . '/mensajes.php';
?>
<h3>Resumen de sus búsquedas</h3>

<?php
$cuil= $_SESSION['id'];
$consulta="SELECT  @i:=@i+1 AS N,  t.*  FROM 
    ((SELECT id_busqueda,EdadMaxima,EdadMinima,tx_puesto,tx_carrera
    FROM `busquedas` join puestos on busquedas.id_puesto=puestos.id_puesto 
    join carreras on busquedas.id_carrera=carreras.id_carrera 
    where `id_empresa`='$cuil' ) AS t ,
    (SELECT @i:=0) AS foo)
";
$filas=cunsultadbmultiple($consulta);
$alias= Array('Numero de Busqueda','Edad Máxima','Edad Mínima','Puesto','Carrera');
$tablagenerada=tabla1($filas,$alias,"fbusqueda.php","id_busqueda","busquedas","busquedas.php");
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
      <input type = "hidden" name = "id_busqueda" value = "0" >
      <button type="submit" name="boton" class="form-control btn btn-dark border border-primary" 
      value="Añadir busqueda">Añadir busqueda</button>
    </div>
    <div class="col-sm-5"></div>
  </div>
 </form>