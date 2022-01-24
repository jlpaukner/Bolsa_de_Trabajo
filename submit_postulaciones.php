<?php
require_once('./dbcon.php');
echo "POST";
var_dump($_POST); 
$DNI=$_POST['DNI'];
$id_puesto=$_POST['id_puesto'];
$tabla = "postulaciones";
$nombrellave="id_postulacion";
$valorllave="0";   
$consulta="SELECT DNI FROM postulaciones WHERE DNI='$DNI'and id_puesto='$id_puesto'";
$filas=cunsultadbmultiple($consulta);

if(count($filas)>0) header("Location:postulaciones.php?ms=nan");
else{
$retorno="postulaciones.php?ms=ex";
EnviarFormulario($tabla,$nombrellave,$valorllave,$retorno,$_POST); 
}
?>
