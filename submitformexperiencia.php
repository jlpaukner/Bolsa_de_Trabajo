<?php
session_start();
require __DIR__ . '/dbcon.php';
$expId=$_POST['Id'];
$esNuevaExperiencia = $expId==0;
var_dump($_POST);


// if (!$esNuevaExperiencia)
// {
//     $aborrar = sprintf(" DELETE FROM `experiencia` WHERE `Id`='$expId'");
//     operaciondb($aborrar);
//     $insertar =sprintf("INSERT INTO `experiencia` (`DNI`, `Empresa`, `Contacto`, `Id_puesto`, `Fc_inicio`, `Fc_fin`, `Sector`, `Descripcion`) VALUES ('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s')",$_SESSION['id'],$_POST['Empresa'],$_POST['Contacto'],$_POST['Id_puesto'],$_POST['Fc_inicio'],$_POST['Fc_fin'],$_POST['Sector'],$_POST['Descripcion']);
// }
// else
// {
//     $insertar =sprintf("INSERT INTO `experiencia` (`Id`,`DNI`, `Empresa`, `Contacto`, `Id_puesto`, `Fc_inicio`, `Fc_fin`, `Sector`, `Descripcion`) VALUES ('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",$expId,$_SESSION['id'],$_POST['Empresa'],$_POST['Contacto'],$_POST['Id_puesto'],$_POST['Fc_inicio'],$_POST['Fc_fin'],$_POST['Sector'],$_POST['Descripcion']);
// }

// $resultado = operaciondb($insertar);
// if ($resultado==1)
//     {
//  header("location:experiencia.php");
//     }
$tabla="experiencia";
$nombrellave="Id";
$valorllave=$expId;
if ($esNuevaExperiencia)
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
header("location:experiencia.php");
?>


