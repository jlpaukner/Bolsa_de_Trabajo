<?php
include __DIR__ . '/dbcon.php';
include __DIR__ . '/herramientas.php';
session_start();
$consulta="SELECT * from candidatos WHERE DNI in (SELECT DNI from resultados where idbusqueda='{$_POST['idBusqueda']}')";
$candidatos=cunsultadbmultiple($consulta);
foreach($candidatos as $c) 
{ 
    var_dump($c) 
    ?> 

        <h2> <?=$c['Apellido']?>  <?=$c['Nombre']?>  <?=$c['Email']?> <?=$c['RedSocial1']?></h2>  
    <?php 
}; 
?>