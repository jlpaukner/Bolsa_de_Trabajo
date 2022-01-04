<?php
// echo var_dump($_POST);
require_once __DIR__ . '/dbcon.php';
$strtohash=$_POST['reg_email'].$_POST['password_registrarse'];
$hashpass= hash("sha256",$strtohash);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Your Job</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>


<body>   
<figure class="text-center">
  <blockquote class="blockquote ">
    <div class="p-3 mb-2 bg-dark  border border-primary-25"><p><img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
  </blockquote>
</figure>

<?php

$error = false;
$id=$_POST['id'];
$tipo=$_POST['tipo'];
$email=$_POST['reg_email'];
if ($tipo==1)    {$ret="u"; $doc="DNI";    }
    else         {$ret="e"; $doc="CUIL";   };

//--------esta id en login?
$consulta = "SELECT `id` FROM `login` WHERE `id` = '$id' ";
$idenlogin = cunsultadb($consulta) != "0" ;
if ($idenlogin) 
    { $error=true; 
        echo "<p style='text-align:center'>Ya existe ese {$doc} registrado</p><br>";
    }

//-------- existe ese hash?
$consulta = "SELECT `id` FROM `login` WHERE `userpass` = '$hashpass' ";
$tienehash = cunsultadb($consulta) != "0";

if ($tienehash) 
    {
        $error=true; 
        echo "<p style='text-align:center'>Ya existe esa combinación de email y contraseña.</p><br>";       
    }

//-------- Esta usado ese email?
$consulta = "SELECT `email` FROM `candidatos` WHERE `email` = '$email' ";
$emailC = cunsultadb($consulta) != "0" ;
$consulta = "SELECT `email` FROM `empresa` WHERE `email` = '$email' ";
$emailE = cunsultadb($consulta) != "0" ;

if ($emailC or $emailE ) 
    { $error=true; 
        echo "<p style='text-align:center'>Ya existe ese email registrado</p><br>";
    }  

// --- si no hay errores procede a insertar
if (!$error)
    {          
        $insertlogin = "INSERT INTO `login` (`id`, `userpass`, `tipo`) VALUES ('$id', '$hashpass','$tipo')";
        $resultado = operaciondb($insertlogin);
        if ($tipo==1)  { $insertu= "INSERT INTO `candidatos` (`DNI`, `Email`) VALUES ('$id','$email')"; }
             else      { $insertu= "INSERT INTO `empresa` (`Cuit`, `Email`) VALUES ('$id','$email')";  };     
        $insertau = operaciondb($insertu);
        if ($resultado==1 )
        {
        $error=0;     
        echo "<center><h2> La suscripción se realizó  exitosamente <h2></center><br>";
        echo "<center><h4> para continuar seleccione el siguiente link  <h4></center><br>";
        }        
    };

if($error){
        printf('<center><a href="fsubs.php?t=%s">Volver a intentar </center></a>',$ret)  ;
    }
    else{
        echo '<center><a href="index.php">Ir a inicio </center></a>' ;
    }

?>
<body>