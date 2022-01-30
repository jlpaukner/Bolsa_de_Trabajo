<?php

session_start();
require_once __DIR__ . '/dbcon.php';

echo var_dump($_POST); 
$id_empresa=$_POST['id_empresa'];
$id_puesto=$_POST['id_puesto'];
$id_carrera=$_POST['id_carrera'];
$id_prov=$_POST['id_prov'];
$id_genero=$_POST['id_genero'];
$movilidad=$_POST['movilidad'];
$id_estadoc=$_POST['id_estadoc'];
$EdadMinima=$_POST['EdadMinima'];
$EdadMaxima=$_POST['EdadMaxima'];


$consulta="SELECT * FROM busquedas 
WHERE  `id_empresa`= '$id_empresa' 
and    `id_puesto`= '$id_puesto'
and    `id_carrera`='$id_carrera'
and    `id_prov`= '$id_prov'
and    `movilidad`= '$movilidad'
and    `id_estadoc`= '$id_estadoc'
and    `id_genero`= '$id_genero'
and    `EdadMinima`= '$EdadMinima'
and    `EdadMaxima`= '$EdadMaxima'";
echo "<br>";
echo $consulta;
echo "<br>";
$resp=cunsultadbmultiple($consulta);
echo "<br>";
echo (sizeof($resp)>0 and $_POST['id_busqueda']=='0');
if(sizeof($resp)>0 and $_POST['id_busqueda']=='0'){
    $_SESSION['mc']="alert alert-warning";
    $_SESSION['ms']="Esta repitiendo una busqueda existente";
    echo "busqueda repetida";
    header("location:busquedas.php");
 }
else{
    $tabla = "busquedas";
    $nombrellave="id_busqueda";
    $valorllave=$_POST['id_busqueda'];   
    $retorno="busquedas.php";
    
    if($_POST['id_busqueda']=='0'){
        $_SESSION['ms']="Busqueda agregada"; 
    }
    else {
        $_SESSION['ms']="Busqueda modificada"; 
    }; 
    $_SESSION['mc']="alert alert-success";   
    EnviarFormulario($tabla,$nombrellave,$valorllave,$retorno,$_POST);
}
?>