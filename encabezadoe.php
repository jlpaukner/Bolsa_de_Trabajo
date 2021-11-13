<?php
if(!isset($_SESSION)){session_start();};
if ($_SESSION["abierta"]!="si") header("Location:index.php");
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
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-success border border-dark fst-italic" >
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
          </ul>
        </li>
      </ul>
    </div>
    <div class="col-sm-2 border border-success border-opacity-2">
                <!--tercera columna-->
        <a class=" text-center text-white fst-italic text-opacity-50" href="cerrarsession.php"><h5 >Cerrar sesión</h5></a>
    </div>
</nav>
<!--Logo grande-->
<figure class="text-center bg-success">
  <blockquote class="blockquote ">
    <div class="p-3 mb-2 bg-dark bg-opacity-75 border border-primary-25"><p><img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
  </blockquote>
</figure>
<!--Fin Logo grande-->

</body>
</html>

