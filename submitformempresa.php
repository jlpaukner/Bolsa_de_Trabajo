<?php
session_start();
require __DIR__ . '/dbcon.php';
echo var_dump($_POST);
$Cuit=$_SESSION['id'];
$_POST['Cuit']=$Cuit;

$tabla = "empresa";
$nombrellave="Cuit";
$valorllave=$_SESSION['id'];

$Cuit=$_POST['Cuit'];
if ($Cuit=="0")
    {    
        $inserta=construyeinsert($_POST,"empresa","Cuit");
        $resultado =operaciondb($inserta);
    } 
else
    {
        $aborrar = sprintf(" DELETE FROM `empresa` WHERE `Cuit`='$Cuit'");
        operaciondb($aborrar);
        $inserta=construyeinsert($_POST,"empresa");
        $resultado =operaciondb($inserta);
    }
    echo $inserta;
if ($resultado==1){
    header("location:inicioempresa.php?ms=ini");
    }
?>