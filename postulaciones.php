<?php
require_once('./dbcon.php');
include_once('./encabezadoc.php');
ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
$fcpostulacion   = date('Y-m-d', time());
$DNI=$_SESSION['id'];//dni conectado
$estadopostulacion  = 1;
$c1="font-weight-bold text-center fs-4 fst-italic";
$c2="form-control border border-primary text-center fs-6";
///---------------mensajes para el popup
if(!isset($_GET["ms"])){
    $_GET["ms"]="nada";
}
switch ($_GET["ms"]) {
    case "ex":
        $mensaje = "Postulacion registrada exitosamente";
        $style="display:center";
        $class="alert alert-success";
        break;
    case "nan":
        $mensaje = "Ya tienes una postulacion de ese tipo";
        $style="display:center";
        $class="alert alert-warning";
        break;
    default:
        $mensaje="";
        $style="display: none";
        $class="alert alert-success";
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <?php echo  $class."    ".$style            ?> -->
<p style="color:palegoldenrod"> Indique que puesto(s) desea ocupar. 
<br> Las empresas solo lo veran si su preferencia coincide con lo que ellas buscan. </p>
<div id="popUp" class="<?=$class?>" style="<?=$style?>"> <?=$mensaje?> </div>
<div class="container bg-white">
    <form action="submit_postulaciones.php" method="POST">
            <br><br><div class="row">
            <div class="col-sm-3 text-end fs-5"><label class="text-start"for="">Elige una postulación</label></div>
            <div class="col-sm-7">
                <select id="id_puesto" name="id_puesto" placeholder="Puesto ejercido" class="<?=$c2?>">
                    <?php S1Motorcito('Puestos','id_puesto','tx_puesto',$Puesto) ?>
                </select>
            </div>
            <div class="col-sm-2">
                <input type="hidden" name="fcpostulacion" value="<?=$fcpostulacion?>">
                <input type="hidden" name="DNI" value="<?=$DNI?>">
                <input type="hidden" name="estadopostulacion" value="<?=$estadopostulacion?>">
                <input class="form-control btn btn-dark border border-success fst-italic" type="submit" value="guardar">
            </div>
            
        </div><br><br>
    </form>
</div>   
<div id="listapostulaciones">
    <?php
    $consulta="SELECT tx_puesto,id_postulacion from postulaciones join puestos 
    on postulaciones.id_puesto = puestos.id_puesto
    where DNI = '$DNI'";
    $filas=cunsultadbmultiple($consulta);
    ?>
        <table class="table table-striped table-bordered">
        <tr><thead>';               
        <th style="text-align:center;color:white">Puesto</th>
        <th style="text-align:center;color:white">Eliminar</th>
        </tr></thead><tbody>
    <?php         
        foreach($filas as $fila){ 
    ?>  
            <tr>            
            <td style="padding:10px;text-align:center;color:white"><?=$fila['tx_puesto']?></td>
            <td>
            <form action=borraregistro.php method="POST">
                    <input type = "hidden" name = "tabla" value = "postulaciones">
                    <input type = "hidden" name = "nombreID" value = "id_postulacion">
                    <input type = "hidden" name = "retorno" value = "postulaciones.php">
                    <input type = "hidden" name = "valorID" value = "<?= $fila['id_postulacion']?>">
                    <input type=  "submit" name="boton" class="form-control btn btn-dark  border border-success fst-italic  lh-1" value ="Borrar" > 
            </form>
            </td>
        </tr>
        <?php
            };
         ?>
    </tbody>
    </table>
</div>
</body>