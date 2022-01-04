<?php
require_once('./dbcon.php');
include_once('./encabezadoc.php');
ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

$time = date('Y-m-d', time());
$dni=$_SESSION['id'];//dni conectado
$estado = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-white">
    <div class="container bg-white">
        <form action="submit_postulaciones.php" method="POST">
    <br><br><div class="row">
                <div class="col-sm-3 text-end fs-5"><label class="text-start"for="">Elige una postulación</label></div>
                <div class="col-sm-7">
                    <select class="form-control border border-primary text-center  fs-6" id="Movilidad" name="puesto" >
                        <option value="0">Seleccione:</option>                                    
                        <?php 
                            $query = $mysqli -> query ("SELECT * FROM puestos group by tx_puesto order by tx_puesto");
                            while ($valores = mysqli_fetch_array($query )) {
                                echo '<option value="'.$valores[id_puesto].'">'.$valores[tx_puesto].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="hidden" name="time" value="<?php echo $time; ?>">
                    <input type="hidden" name="dni" value="<?php echo $dni; ?>">
                    <input type="hidden" name="estado" value="<?php echo $estado; ?>">
                    <input class=" form-control btn btn-dark   border border-success fst-italic " type="submit" value="guardar">
                </div>
                
            </div><br><br>
        </form>
    </div>   
</body>
</html>