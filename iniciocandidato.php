<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoc.php';
if(!isset($_GET["ms"])){
    $_GET["ms"]="nada";
}
switch ($_GET["ms"]) {
    case "dpx":
        $mensaje = "Datos personales guardados exitosamente";
        $display="display:center";
        break;
    case "ex":
        $mensaje = "Información de estudios guardada exitosamente";
        $display="display:center";
        break;
    case "lx":
        $mensaje = "Información de experiencia guardada exitosamente";
        $display="display:center";
        break;
    default:
        $mensaje="  ";
        $display="display: none";
    };
?>
<div id="popUp" class="alert alert-success" style="<?=$display?>"> <?=$mensaje?></div>
<?php
$dni= $_SESSION['id'];
require __DIR__ . '/curriculum.php';
?>