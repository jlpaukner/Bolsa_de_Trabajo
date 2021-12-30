<?php
$dni=$_SESSION['id'];
$consulta = "SELECT DNI FROM `candidatos` WHERE `DNI`='$dni'";
$datosp = cunsultadb($consulta);
if ($datosp=="0"){
    echo "<h4 class='text-info  text-opacity-50 text-center fst-italic'>Perfil sin datos, edita tus datos.</h4>";
}
else{
    require __DIR__ .'/infocv.php';   
    };
    
?>


