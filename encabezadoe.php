<?php
if(!isset($_SESSION)){session_start();};
if ($_SESSION["abierta"]!="si") header("Location:index.php");
if (!isset($_SESSION['tiempo'])) {
  $_SESSION['tiempo']=time();
}
else if (time() - $_SESSION['tiempo'] > 6000) {
  session_destroy();
  /* Aquí redireccionas a la url especifica */
  header("Location:index.php");
  die();  
}
$_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual
require __DIR__ . '/extensionB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Your Job</title>
</head>
<body>
    <!--Nuevo encabezado-->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-success bg-opacity-50 border border-dark fst-italic" >
    <div class="container-fluid bg-dark bg-opacity-75">
    <a class="navbar-brand" href="inicioempresa.php?ms=ini">
    <img src="imagenes/logoyj.PNG" alt="" width="75" height="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicioempresa.php?ms=ini">Perfil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menú
          </a>
          <ul class="dropdown-menu bg-success border border-2 border-white" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item text-dark text-center border border-white fst-italic" href="fdatosempresa.php">Datos Empresa</a></li>
            <li><a class="dropdown-item text-dark text-center border border-white fst-italic" href="busquedas.php">Búsqueda</a></li>            
            <li><form action=borrarcuenta.php method="POST">
                  <input type="submit" name="boton" class="dropdown-item text-danger text-center border border-red fst-italic" value ="Eliminar Cuenta" onclick="return confirm('¿Seguro? Perderá todos los datos de su cuenta.')"> 
                </form>
            </li>
          </ul>
        </li>
        <?php 
          if(isset($_SESSION['adminID'])){
          require __DIR__ .'/cabecerarep.php';
          }
          ;?>
      </ul>
    </div>
    <div class="col-sm-2 border border-success border-opacity-2">
                <!--tercera columna-->
        <a class=" text-center text-white fst-italic text-opacity-50" href="cerrarsession.php"><h5 ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> Cerrar sesión</h5></a>
    </div>
</nav>
<!--Logo grande-->
<figure class="text-center bg-success bg-opacity-50">
  <blockquote class="blockquote ">
    <div class="p-3 mb-2 bg-dark bg-opacity-75 border border-primary-25"><p><img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
  </blockquote>
</figure>
<!--Fin Logo grande-->

</body>
</html>

