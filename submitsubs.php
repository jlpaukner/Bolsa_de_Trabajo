<?php
// echo var_dump($_POST);
require __DIR__ . '/dbcon.php';
$strtohash=$_POST['usuario_registrarse'].$_POST['password_registrarse'];
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
$nuevoID=1;
$id=$_POST['id'];
$consulta = "SELECT `id` FROM `login` WHERE `id` = '$id' ";
$resultado = cunsultadb($consulta);
$tipo=$_POST['tipo'];
if ($tipo==1)
    {$ret="u";
    $doc="DNI";
    }
    else
    {$ret="e";
     $doc="CUIL";    
    };



if ($resultado!=0) 
    {$nuevoID=0; 
     $error=1; 
        echo "<p style='text-align:center'>Ya existe ese {$doc} registrado</p>";
    }
else{
    $consulta = "SELECT `id` FROM `login` WHERE `userpass` = '$hashpass' ";
    $resultado = cunsultadb($consulta);
    if ($resultado!=0 ) 
        {
            echo "<p style='text-align:center'>Ya existe esa combinación de usuario y contraseña.</p>";
            $error=1;        
        }
    else
        {   $error=1;          
            $insertar = "INSERT INTO `login` (`id`, `userpass`, `tipo`) VALUES ('$id', '$hashpass','$tipo')";
            $resultado = operaciondb($insertar);
            if ($resultado==1 )
            {
            $error=0;     
            echo "<center><h2> La suscripción se realizó  exitosamente <h2></center><br>";
            echo "<center><h4> para continuar seleccione el siguiente link  <h4></center><br>";
            }
            
        };
    }

    if($error){
        printf('<center><a href="fsubs.php?t=%s">Volver a intentar </center></a>',$ret)  ;
    }
    else{
        echo '  <center><a href="index.php">Ir a inicio </center></a>' ;
    }

?>
<body>