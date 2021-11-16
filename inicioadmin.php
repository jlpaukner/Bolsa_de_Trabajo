<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoadmin.php';
if(!isset($_GET["ms"])){
    $_GET["ms"]="nada";
}
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
        $mensaje=" ";
    };
?>
<body>
    <div class="card-header bg-dark bg-opacity-75 text-white fs-4 fw-bolder ">
    <div class="card-header bg-dark bg-opacity-75 text-white fs-4 fw-bolder "><?php echo $mensaje?></div>

    </div>

</body>


