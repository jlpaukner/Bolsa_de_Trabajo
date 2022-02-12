<?php
require __DIR__ . '/dbcon.php';
// var_dump($_POST);
$hash_cambiar = hash('sha256',$_POST['Email'].$_POST['contraseña_nueva']);
$id=$_POST['id'];
$tipo=$_POST['tipo'];
$hash_recupero = $_POST['recupero'];
$logininfo="INSERT INTO login (id, userpass, tipo,recupero ) 
VALUES('$id', '$hash_cambiar', '$tipo', '$hash_recupero' ) 
ON DUPLICATE KEY UPDATE    
userpass=userpass";
$resultado = operaciondb($logininfo);
if($resultado){
echo '<img src="imagenes/tituloyj.PNG" alt="" width="300" height="100">';
echo "<p align='center'>Cambio de contraseña exitoso </p><br>";
echo '<center><a href="index.php">Ir a inicio </center></a>' ;
};


// echo $logininfo;
// $resultado = operaciondb($insertar);
// if ($resultado==1)
//     {
//     header("location:exito.php");    
//     }
// else{
//     header("location:error.php");
// }

