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
    
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark bg-opacity-50 border border-success " >
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <img src="imagenes/logoyj.PNG" alt="" width="75" height="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="info_who_are_we.php">¿Quienes somos?</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Registrate
          </a>
          <ul class="dropdown-menu bg-dark border border-2 border-white" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="fsubs.php?t=e">Empresa</a></li>
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="fsubs.php?t=u">Candidato</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="recupero.php">¿olvidaste tu contraseña?</a>
        </li>
      </ul>
    </div>

    <?php   
         session_start();
        // var_dump($_SESSION);
        if (isset($_SESSION["abierta"]) and isset($_SESSION["iniciosesion"]) ){ 
          header($_SESSION['iniciosesion']);
         }
         else { require __DIR__ . '/flogin.html';}       
         ?> 
    </div>
</nav>
    <!--Primer container del  Titulo-->

        
<figure class="text-center ">
  <blockquote class="blockquote ">
    <div class="p-3 mb-2 bg-dark bg-opacity-50 border border-primary-25"><p><img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
  </blockquote>
</figure>

</body>

