<?php
session_start();
require __DIR__ . '/dbcon.php';
require __DIR__ . '/herramientas.php';
echo var_dump($_POST);
$_POST['IdEmpresa']=$_SESSION['id'];

$IdBusqueda=$_POST['IdBusqueda'];
if ($_POST['IdBusqueda']=="0")
    {    
        $inserta=construyeinsert($_POST,"busquedas","Idbusqueda");
        $resultado =operaciondb($inserta);
    } 
else
    {
        $actualiza=construyeupdate($_POST,"busquedas","Idbusqueda",$IdBusqueda);
        $resultado =operaciondb($actualiza);
    }
if ($resultado==1){
    header("location:busquedas.php");
    }
?>