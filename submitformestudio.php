<?php
session_start();
require __DIR__ . '/dbcon.php';
$estudioId=$_POST['ID_Estudio'];
$esNuevoEstudio= $estudioId==0;

echo"<br> post:  ".var_dump($_POST)."<br>";

if (!$esNuevoEstudio)
{
    $aborrar = sprintf(" DELETE FROM `estudios` WHERE `ID_Estudio`='$estudioId'");
    operaciondb($aborrar);
    $insertar =sprintf("INSERT INTO `estudios` (`ID_Estudio`, `DNI`, `id_Carrera`, `Institucion`, `Localidad`, `Provincia`, `Pais`, `Fc_inicio`, `Fc_fin`) VALUES ('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s','%s')",$estudioId,$_SESSION['id'],$_POST['id_Carrera'],$_POST['Institucion'],$_POST['Localidad'],$_POST['Provincia'],$_POST['Pais'],$_POST['c_inicio'],$_POST['c_fin']);
    echo "modificar registro existente";
}
else
{
    $insertar =sprintf("INSERT INTO `estudios` (`DNI`, `id_Carrera`, `Institucion`, `Localidad`, `Provincia`, `Pais`, `Fc_inicio`, `Fc_fin`) VALUES ('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s')",$_SESSION['id'],$_POST['id_Carrera'],$_POST['Institucion'],$_POST['Localidad'],$_POST['Provincia'],$_POST['Pais'],$_POST['c_inicio'],$_POST['c_fin']);
    echo "nuevo registro";
}

$resultado = operaciondb($insertar);
if ($resultado==1)
    {
    header("location:iniciocandidato.php?ms=ex");    
    }
?>