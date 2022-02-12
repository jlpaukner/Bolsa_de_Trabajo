<?php
require __DIR__ . '/dbcon.php';
$email=$_POST['Email'];
$id=$_POST['DNI'];
    $consulta = "SELECT `email` FROM `candidatos` 
    WHERE `Email` = '$email'
    and `DNI` = '$id' ";
    $tipo="1";
    $hay_IDusuario_Email = cunsultadb($consulta);
if($hay_IDusuario_Email != True){
    $consulta = "SELECT `email` FROM `empresa` 
    WHERE `Email` = '$email'
    and `Cuit` = '$id' ";
    $hay_IDusuario_Email = cunsultadb($consulta);
    $tipo="2";
}

if($hay_IDusuario_Email != True){
    $formhidden="hidden";
    $retornarhidden="";
}
else
{
    $formhidden="";
    $retornarhidden="hidden";
}

$hash_recupero="na";
// $recupero = $email.$DNI;
// $hash_recupero = hash('sha256',$recupero);
// $consulta = "SELECT `id` FROM `login` WHERE `recupero` = '$hash_recupero' ";
// $resultado = cunsultadb($consulta);

// if($resultado != True){
    // header("location:error.php");
// }

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
        <!--Primer container del  Titulo-->
        <div class="container-land bg-primary bg-opacity-25 border border-info">      
            <figure class="text-center">
                <blockquote class="blockquote ">
                    <div class="p-3 mb-2 bg-dark  border border-primary-25"><p>
                        <img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
                </blockquote>
            </figure>
        </div><br><br><br>
        <form <?=$formhidden?> 
        class=" text-center bg-white  text-stars border border-white" action="submitrecupero.php" method="POST">
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
                        <input type="password" minlength="8"  class="text-center form-control border border-info fst-italic " 
                        name="contraseña_nueva" id="contraseña_nueva"  placeholder="8 o más caracteres" title="8 o mas caracteres">
                    </div>
                    <div class="col-sm-5"></div>
                </div><br>
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Boton de guardar-->
                                <input type = "hidden" name = "Email" value = "<?php echo $email?>" >
                                <input type = "hidden" name = "recupero" value = "<?php echo $hash_recupero?>" >
                                <input type = "hidden" name = "tipo" value = "<?php echo $tipo?>" >
                                <input type = "hidden" name = "id" value = "<?php echo $id?>" >
                                <button type="submit" class="btn btn-dark border border-info fst-italic" name="login" id="sign_in">Verificar</button>
                            </div>
                            <div class="col-sm-6">
                                <!-- Boton de cancelar-->
                                <!-- <button class="btn btn-dark border border-info fst-italic" >  -->
                                    <a class="btn btn-dark border border-info fst-italic" href="index.php">Cancelar</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5"></div>
                </div>
            </div>                 
        </form>

    <div <?=$retornarhidden?>>
        No encontramos esa combinacion de email y dni. <br>
        Vuelve a intentar o contactanos <br>
        <a href = "mailto: YourYob@email.com">Escribir correo a YourJob</a><br>
        <a href="recupero.php">Volver a intentar</a> 
    </div>

    </body>
</html>

