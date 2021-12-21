<?php
session_start();
require __DIR__ . '/dbcon.php';
echo var_dump($_POST);
$tabla = "busquedas";
echo var_dump($_POST); 
$nombrellave="IdBusqueda";
$valorllave=$_POST['IdBusqueda'];   
$consulta = sprintf("SELECT `%s` FROM `%s` WHERE `%s` = '%s' ",$nombrellave ,$tabla, $nombrellave ,$valorllave);
    $resultado = cunsultadb($consulta);
    if ($resultado==0)
        {
            echo "inserta <br>";
            $insertar=construyeinsert($_POST,"$tabla",$nombrellave);
            echo $insertar;
            $resultado = operaciondb($insertar);
            if ($resultado==1)  {  echo "si lo hizo";};            
        }
    else
        {           
            echo "actualiza <br>";
            $actualiza=construyeupdate($_POST,"$tabla",$nombrellave,$valorllave);
            $resultado = operaciondb($actualiza);
            if ($resultado==1)  {  echo "si lo hizo";       };
        } ;    
    header("location:busquedas.php");
?>