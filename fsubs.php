<?php

switch ($_GET["t"]){
    case "u": //es un candidato
        $registre="Registro usuario nuevo";
        $nombre="Nombre de usuario";
        $docum="Numero de DNI";
        $tipo=1;
        break;
    case "e":
        $registre="Registro de nueva empresa";
        $nombre="Nombre de la empresa";
        $docum="Numero de CUIT";
        $tipo=2;
        break;
    default:
        header("Location: /403.php");
        }

?>
<style>
/* <  estilos para quitar las flechas de input type number> */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {

    -webkit-appearance: none;
    margin: 0; 
}
input[type=number] {
    -moz-appearance:textfield; 
} 
#my{
zoom: 100%;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Your Job - registrate</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>
<body class="">
    <!--Nuevo encabezado-->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark border border-success " >
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
        <li class="nav-item">
          <a class="nav-link" href="info_empresa.php">Empresas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="info_candidato.php">Candidatos</a>
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
      </ul>
    </div>

    </div>
</nav>
    <!--Primer container del  Titulo-->
<div class="container-land bg-primary bg-opacity-25 border border-info">      
    <figure class="text-center">
        <blockquote class="blockquote ">
            <div class="p-3 mb-2 bg-dark  border border-primary-25"><p><img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
        </blockquote>
    </figure>
</div>
<!--termina el nuevo encabezado-->
<!-- Fila para el sub-titulo -->
<div class="container">
  <div class="row ">
      <div class="p-3 mb-2 bg-white text-black text-center fst-italic fw-bolder"> <h2><?php echo $registre?></h2></div>
  </div>
</div>
<!-- Fila para los textBox de datos -->
  <div class="row ">
    <div class="col-sm-4" >
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-9">              
          <img src="imagenes/subs2.png" alt="" width="300" height="400">              
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
    <div class="col-sm-4">
                <form class=" text-center bg-white centroventana text-stars border border-white" action="inscribe.php" method="POST">
                    <!-- ingreso de dato de nombre usuario-->
                    <div class="mb-3">
                        <label  for="usuario_registrarse" class="font-weight-bold fs-4 fst-italic" > <?php echo $nombre?></label>
                        <input type="text" class="form-control border border-primary fst-italic text-center  fs-5" name="usuario_registrarse" id="usuario_registrarse"required placeholder="Ingrese el nombre">
                        
                    </div>
                    <!-- ingreso de dato de dni o cuit-->
                    <div class="mb-3">
                        <label for="id" class=" font-weight-bold fs-4 fst-italic" > <?php echo $docum?></label>
                        <input type="number"  class="form-control border border-primary fst-italic text-center  fs-5" name="id" id="id" patter="[0-9]+" aria-describedby="emailHelp" min="4"  max="9999999999999" placeholder="Ingrese su número">
                     

                    </div>
                    <!-- ingreso de dato de password-->
                    <div class="mb-3">
                        <label  for="password_registrarse"class=" font-weight-bold fs-4 fst-italic" > Contraseña</label>
                        <input type="password" class="form-control border border-primary fst-italic text-center  fs-5" name="password_registrarse" id="password_registrarse" required  placeholder="Ingrese la contraseña">
                    </div>
                    <input type="text" hidden name="tipo" value="<?php echo $tipo ?>">
                    <!-- Boton de guardar-->
                    <button type="submit" class="btn btn-dark centroventana border border-info fst-italic" name="login" id="sign_in">Guardar</button>
                    <!-- Boton de cancelar-->
                    <button class="border border-while" > <a class="btn btn-dark centroventana border border-info fst-italic" href="index.php">Cancelar</a></button>
                </form>
    </div>
    <div class="col-sm-4">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <a href="">
            <img src="imagenes/subs3.png" alt="" width="300" height="400">
          </a>
        </div>
      </div>        
    </div>

  </div>

  <div class="row"> 
    <div class="col-12"> <br><br> <br><br> <br> </div>
  </div>
  <!-- Pie de Pagina -->
  <div class="p-3 mb-2 bg-dark text-white text-center fst-italic"> <h3>Tu oportunidad esta aquí!</h3></div>
</body>
</html>