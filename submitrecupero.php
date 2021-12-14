<?php
require __DIR__ . '/dbcon.php';

$cambiar = $_POST['email_nuevo'].$_POST['contraseña_nueva'];
$hash_cambiar = hash('sha256',$cambiar);
$hash_recupero = $_POST['recupero'];

$insertar=sprintf("UPDATE `login` SET `userpass` = '%s' WHERE `login`.`recupero` = '%s'",$hash_cambiar,$hash_recupero);

$resultado = operaciondb($insertar);
if ($resultado==1)
    {
    header("location:exito.php");    
    }
else{
    header("location:error.php");
}