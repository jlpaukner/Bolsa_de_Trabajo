<?php
session_start();
require __DIR__ . '/dbcon.php';
$expId=$_POST['Id'];
$esNuevaExperiencia = $expId==0;
var_dump($_POST);

$tabla="experiencia";
$nombrellave="Id";
$valorllave=$expId;
if ($esNuevaExperiencia)
    {
        echo "inserta <br>";
        $insertar=construyeinsert($_POST,"$tabla",$nombrellave);
        echo $insertar;
        $resultado = operaciondb($insertar);
    }
else
    {           
        echo "actualiza <br>";
        $actualiza=construyeupdate($_POST,"$tabla",$nombrellave,$valorllave);
        $resultado = operaciondb($actualiza);
    } ;

if ($resultado==1)  {header("location:experiencia.php");} else{ echo'<br>  No lo hizo<br>';}   

?>


