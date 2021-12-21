<?php
session_start();
require_once('./dbcon.php');
$dni= $_SESSION['id'];
$_SESSION['abierta']="si";
$Cuit=$_SESSION['id'];
$estado = $_REQUEST['estado'];


if($estado == "eliminar_candidato"){
    
    $otro_estado=0;
    $insertar = sprintf("UPDATE `candidatos` SET `Estado` = '%s' WHERE `DNI` = '%d'",$otro_estado,$dni);
    //$insertar = sprintf("UPDATE DATE `candidatos` SET `Estado` = '%s' WHERE `DNI` = '%d'",$otro_estado,$dni);
    $resultado = operaciondb($insertar);
    echo "<h1>Eliminaste candidato</h1>";
    header("location:iniciocandidato.php?ms=0");
}else if($estado == "activa_candidato"){
    $otro_estado=1;
    $insertar = sprintf("UPDATE `candidatos` SET `Estado` = '%s' WHERE `DNI` = '%d'",$otro_estado,$dni);
    $resultado = operaciondb($insertar);
    echo "<h1>no Eliminaste candidato</h1>";
    header("location:iniciocandidato.php?ms=0");
}else if($estado == "activa_empresa"){
    $otro_estado=1;
    $insertar = sprintf("UPDATE `empresa` SET `Estado` = '%s' WHERE `Cuit` = '%d'",$otro_estado,$Cuit);
    //$insertar = sprintf("UPDATE DATE `candidatos` SET `Estado` = '%s' WHERE `DNI` = '%d'",$otro_estado,$dni);
    $resultado = operaciondb($insertar);
    echo "<h1>no Eliminaste candidato</h1>";
    header("location:inicioempresa.php?ms=d");
}else if($estado == "eliminar_empresa"){
    $otro_estado=0;
    $insertar = sprintf("UPDATE `empresa` SET `Estado` = '%s' WHERE `Cuit` = '%d'",$otro_estado,$Cuit);
    $resultado = operaciondb($insertar);
    echo "<h1>no Eliminaste candidato</h1>";
    header("location:inicioempresa.php?ms=d");
}

?>
<html>
    <h1>Hola mundo</h1>
</html>