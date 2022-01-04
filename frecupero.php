<?php
require __DIR__ . '/dbcon.php';
$recupero = $_POST['email'].$_POST['dni'];
$hash_recupero = hash('sha256',$recupero);
$dni=$_POST['dni'];
$email=$_POST['email'];
$consulta = "SELECT `id` FROM `login` WHERE `recupero` = '$hash_recupero' ";
$resultado = cunsultadb($consulta);

if($resultado != True){
    header("location:error.php");
}

?>

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
    <body class="bg-white bg-opacity-50">
        <!--Nuevo encabezado-->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark bg-opacity-75 border border-success " >
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="imagenes/logoyj.PNG" alt="" width="75" height="24">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <!--a class="nav-link active" aria-current="page" href="info_who_are_we.php">¿Quienes somos?</!--a-->
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
        </div><br><br><br>

        <form class=" text-center bg-white  text-stars border border-white" action="submitrecupero.php" method="POST">
            <!--Label de email-->
            <div class="contain">
                <!--Label de dni-->
                <div class="row text-center">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <label for="contraseña_nueva" class="form-label fs-5 fst-italic text-center">Ingrese contraseña nueva</label>
                    </div>
                    <div class="col-sm-5"></div>
                </div>
                <!--input de dni-->
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <input type="password" minlength="8"  class="text-center form-control border border-info fst-italic " name="contraseña_nueva" id="contraseña_nueva"  placeholder="Ingrese contraseña" >
                    </div>
                    <div class="col-sm-5"></div>
                </div><br>
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Boton de guardar-->
                                <input type = "hidden" name = "email_nuevo" value = "<?php echo $email?>" >
                                <input type = "hidden" name = "recupero" value = "<?php echo $hash_recupero?>" >
                                <button type="submit" class="btn btn-dark  border border-info fst-italic" name="login" id="sign_in">Verificar</button>
                            </div>
                            <div class="col-sm-6">
                                <!-- Boton de cancelar-->
                                <button class="border border-while " > <a class="form-control btn btn-dark  border border-info fst-italic" href="index.php">Cancelar</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5"></div>
                </div>
            </div>
            
            
        </form>
    </body>
</html>

