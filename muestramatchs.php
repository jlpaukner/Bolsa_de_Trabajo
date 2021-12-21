<?php
require_once('./encabezadoe.php');
require_once('./dbcon.php');
require_once('./herramientas.php');
//session_start();
echo "<center><h4 class='text-dark'>Candidatos con similitud de tu busquedad</h4></center>";

echo " <div class='container'>
<table class='table text-center'>
    <thead>
        <tr>
        <th scope='col'>Apellido</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Email</th>
        <th scope='col'>Red social</th>
        </tr>
    </thead>";
$consulta=sprintf("SELECT * from candidatos WHERE DNI in (SELECT DNI from resultados where idbusqueda='{$_POST['idBusqueda']}')");
$candidatos=cunsultadbmultiple($consulta);

foreach($candidatos as $c) 
{ 
    //var_dump($c) 
    ?> 
   <tbody>
    <tr>
      <th scope="row"><?=$c['Apellido']?> </th>
      <td><?=$c['Nombre']?></td>
      <td><?=$c['Email']?></td>
      <td><?=$c['RedSocial1']?></td>
    </tr>
        
    </tbody>
    <?php 
    //echo "</table>";
}; 
echo "</table>";
?>