<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoc.php';
switch ($_GET["ms"]) {
    case "dpx":
        $mensaje = "Datos personales guardados exitosamente";
        break;
    case "ex":
        $mensaje = "Información de estudios guardada exitosamente";
        break;
    case "lx":
        $mensaje = "Información de experiencia guardada exitosamente";
        break;
    default:
        $mensaje="  ";
    };
?>
<div class="card-header bg-dark bg-opacity-75 text-white fs-4 fw-bolder "><?php echo $mensaje?></div>
<?php
require __DIR__ . '/curriculum.php';
?>

 
