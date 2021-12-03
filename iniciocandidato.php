<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoc.php';
if(!isset($_GET["ms"])){
    $_GET["ms"]="nada";
}
switch ($_GET["ms"]) {
    case "dpx":
        $mensaje = "<h3 class=' text-center fst-italic'>Datos personales guardados exitosamente</h3>";
        break;
    case "ex":
        $mensaje = "<h3 class=' text-center fst-italic'>Información de estudios guardada exitosamente</h3>";
        break;
    case "lx":
        $mensaje = "<h3 class=' text-center fst-italic'>Información de experiencia guardada exitosamente</h3>";
        break;
    default:
        $mensaje="  ";
    };
?>
<div class="card-header bg-dark bg-opacity-75 text-white fs-4 fw-bolder "><?php echo $mensaje?></div>
<?php
require __DIR__ . '/curriculum.php';
?>

 
