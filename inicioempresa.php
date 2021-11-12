<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoe.php';
switch ($_GET["ms"]) {
    case "demx":
        $mensaje = "Datos de la empresa guardados exitosamente ";
        break;
    case "ex":
        $mensaje = "Información de estudios guardado exitosamente";
        break;
    case 2:
        $mensaje = "i equals 0";
        break;
    default:
        $mensaje="   Bienvenido , puede introducir datos de su empresa,<br>   o hacer una busqueda de personal en el menú correspondiente.";
    };
    echo "<h3 class='text-center'>".$mensaje."</h3>";
    ?>