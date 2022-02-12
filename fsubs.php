<?php

switch ($_GET["t"]){
    case "u": //es un candidato
        $registre="Registro usuario nuevo";
        $nombre="Email de usuario";
        $docum="Numero de DNI";
        $tipo=1;
        $min = 20000000;
        $max = 99999999;
        $longitud = "[0-8]+";
        break;
    case "e"://es una empresa
        $registre="Registro de nueva empresa";
        $nombre="Email de la empresa";
        $docum="Numero de CUIT";
        $tipo=2;
        $min = 2099999999;
        $max = 30999999999;
        $longitud = '[0-11]+';
        break;
    default:
        header("Location: /403.php");
        }
// label
$c1="font-weight-bold fs-4 fst-italic";
// input
$c2="form-control border border-primary fst-italic text-center fs-5";
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
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark bg-opacity-75 border border-success " >
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
          <!-- <a class="nav-link" href="info_empresa.php">Empresas</a> -->
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" href="info_candidato.php">Candidatos</a> -->
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
        <form class=" text-center bg-white  text-stars border border-white" action="submitsubs.php" method="POST">
            <!-- ingreso de dato de nombre usuario-->
            <div class="mb-3">
                <label  for="reg_email" class="<?=$c1?>" > <?php echo $nombre?></label>
                <input type="email" class="<?=$c2?>" name="reg_email" id="reg_email"required placeholder="Ingrese el Email">
                
            </div>
            <!-- ingreso de dato de dni o cuit-->
            <div class="mb-3">
                <label for="id" class=" <?=$c1?>" > <?php echo $docum?></label>
                <input type="number"  class="<?=$c2?>" name="id" id="id" patter="[0-9]+" placeholder="Ingrese su número">                   

            </div>
            <!-- ingreso de dato de password-->
            <div class="mb-3">
                <label  for="password_registrarse"class=" <?=$c1?>" > Contraseña</label>
                <input type="password" minlength="8"class="<?=$c2?>" name="password_registrarse" id="password_registrarse" required  placeholder="Ingrese la contraseña">
            </div>
            <input type="text" hidden name="tipo" value="<?php echo $tipo ?>">
            <!-- Boton de guardar-->
            <button type="submit" class="btn btn-dark  border border-info fst-italic" name="login" id="sign_in">Guardar</button>
            <!-- Boton de cancelar-->
            <button class="border border-while" > <a class="btn btn-dark  border border-info fst-italic" href="index.php">Cancelar</a></button>
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
  <footer class="p-3 mb-2 bg-dark">
    <h3 class="  text-white text-center fst-italic">¡Tu oportunidad esta aquí!</h3>
  </footer>
</body>
</html>