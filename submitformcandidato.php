<?php
session_start();
require __DIR__ . '/dbcon.php';
$dni=$_SESSION['id'];
$_POST['DNI']=$dni;
echo var_dump($_POST);

$tabla="candidatos";
$nombrellave="DNI";
$valorllave=$_SESSION['id'];


$consulta = sprintf("SELECT `%s` FROM `%s` WHERE `%s` = '%s' ",$nombrellave ,$tabla, $nombrellave ,$valorllave);
$resultado = cunsultadb($consulta);
if ($resultado!=0)
    {           
        $aborrar = sprintf(" DELETE FROM `%s` WHERE `%s`='%s'" ,$tabla ,$nombrellave ,$valorllave);
        operaciondb($aborrar);
    } 

$insertar=construyeinsert($_POST,"$tabla");

$resultado = operaciondb($insertar);
if ($resultado==1)
    {
    header("location:iniciocandidato.php?ms=dpx");
    echo "insertado bien";
    }
?>