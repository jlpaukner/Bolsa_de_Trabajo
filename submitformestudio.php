<?php
session_start();
require_once('./dbcon.php');
echo"<br> post:  ".var_dump($_POST)."<br>";
$tabla='estudios';
$nombrellave='ID_Estudio';
$valorllave=$_POST['ID_Estudio'];

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

if ($resultado==1)
    {
    //header("location:iniciocandidato.php?ms=ex");    
    }
?>