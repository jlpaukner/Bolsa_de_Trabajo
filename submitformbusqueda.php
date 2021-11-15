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
        $aborrar = sprintf(" DELETE FROM `busquedas` WHERE `IdBusqueda`='$IdBusqueda'");
        operaciondb($aborrar);
        $inserta=construyeinsert($_POST,"busquedas");
        $resultado =operaciondb($inserta);
    }
    echo $inserta;
if ($resultado==1){
    header("location:busquedas.php");
    }
?>