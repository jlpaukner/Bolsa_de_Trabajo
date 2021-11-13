<?php
include __DIR__ . '/dbcon.php';
include __DIR__ . '/herramientas.php';
session_start();
$consulta=sprintf("SELECT * FROM busquedas WHERE idEmpresa='%s' ",$_SESSION['id']);
$busquedas=cunsultadbmultiple($consulta);
$busqueda=array_pop($busquedas);
$EdadMaxima=nacimiento($busqueda['EdadMaxima']);
$EdadMinima=nacimiento($busqueda['EdadMinima']);;
var_dump($busqueda);
$consulta=
"SELECT * from 
candidatos JOIN estudios on candidatos.DNI = estudios.DNI 
join experiencia on candidatos.DNI = experiencia.DNI 
where id_Carrera ='200'
and id_Puesto='074'
and Nacimiento <{$EdadMaxima}
and {$EdadMinima} < Nacimiento
";
$candidatosEncontrados=cunsultadbmultiple($consulta);
var_dump($candidatosEncontrados);
?>


<!-- 
'IdBusqueda' => string '22' (length=2)
'IdEmpresa' => string '20146156776' (length=11)
'EstadoCivil' => string 'Soltero' (length=7)
'Localidad' => null
'EdadMaxima' => string '20' (length=2)
'EdadMinima' => string '0' (length=1)
'Carreras' => string 'No requiere experencia' (length=22)
'titulos' 
-->