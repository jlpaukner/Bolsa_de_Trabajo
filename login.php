<?php
session_start();
require __DIR__ . '/dbcon.php';
// concatena usuario password y hace el hash
$strtohash=$_POST['usuario'].$_POST['password'];
$hashpass= hash("sha256",$strtohash);
$consulta = "SELECT * FROM `login` WHERE `userpass` = '$hashpass' ";
$resultado = cunsultadb($consulta);
if ($resultado!=0) 
    {
        var_dump($resultado);
        $_SESSION['id']=$resultado["id"];
        $_SESSION['usuario']=$_POST['usuario'];
        $_SESSION['ha']=$hashpass;
        switch ($resultado['tipo']):
            case 1:
                $_SESSION['iniciosesion']="Location:iniciocandidato.php?ms=d";
                break;
            case 2:
                $_SESSION['iniciosesion']="Location:inicioempresa.php?ms=d";
                break;
            case 3:
                $_SESSION['iniciosesion']="Location:paginaadmin.php?ms=d";
                break;
        endswitch;        
        $_SESSION['abierta']="si";
        header($_SESSION['iniciosesion']);
    }
else
    {
    echo "Error al intruducir nombre de usuario o contraseña";
    echo '<br>  <a href="index.php">Intentar nuevamente </a>' ;
    }
?>