<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoe.php';
if(!isset($_GET["ms"])){
    $_GET["ms"]="nada";
}
$Cuit=$_SESSION['id'];
$consulta = "SELECT * FROM `empresa` WHERE `Cuit`='$Cuit'";
// $resultado = cunsultadb($consulta);
// var_dump($resultado);
// if ($resultado=="0"){    $_GET["ms"]="nada";   }
// else{
// var_dump($resultado);
// }

switch ($_GET["ms"]) {
    case "demx":
        $mensaje = "Datos de la empresa guardados exitosamente ";       break;
    case "ex":
        $mensaje = "Información de estudios guardado exitosamente";     break;
    case "nada":
        $mensaje = "Por favor introduzca datos de su empresa en el menu 'Datos de empresa'";   break;
    case "pv":
        $mensaje="   Bienvenido , puede modificar datos de su empresa,<br>   o hacer una busqueda de personal en el menú correspondiente.";
    default:
        $mensaje="";
    };
    echo "<h3 class='text-center'>".$mensaje."</h3>";
?>
<ls>
<!-- <h1> El Cuit de la empresa es 
    <?//=$resultado["Cuit"]   ?>
    <h1><br>
<h1> El Email de la empresa es 
    <?//=$resultado["Email"]   ?>
    <h1><br> -->
<?php 
require __DIR__ . '/averiguamatch.php';
  ?> 
