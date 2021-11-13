<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>	
    <?php include __DIR__ . '/javas1.php'; ?>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</head>
<script type="text/javascript" class="init">	
		$(document).ready(function() {$('#example').DataTable();} );
	</script>
<body >
<?php
require __DIR__ . '/dbcon.php';
$tabla=$_GET['t'];
$_SESSION['ntabla']=$tabla;
$consulta=sprintf("SELECT `COLUMN_NAME`,`DATA_TYPE` from INFORMATION_SCHEMA.COLUMNS where table_schema = 'bolsatrabajo' and table_name = '%s'",$tabla);
$columnas=cunsultadbmultiple($consulta);
$_SESSION['cols']=$columnas;
$consulta=sprintf("SELECT * FROM %s ",$tabla);
$filas=cunsultadbmultiple($consulta);
$_SESSION['tabl']=$filas;
$consulta=sprintf("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'bolsatrabajo' AND TABLE_NAME = '%s' AND COLUMN_KEY = 'PRI'",$tabla);
$resp=cunsultadb($consulta);
$idFila=$resp['COLUMN_NAME'];
$_SESSION['llave']=$idFila;
$_SESSION['nllave']=$idFila;
$_SESSION['idllave']=$idFila;
$return='ret';
$alias=array();
?>
<!----------------para alta de registro ----------->
<div class="d-flex justify-content-center">
<form action=<?php echo 'form.php'?> method="POST"> 
    <label><?=ucfirst($tabla)?></label>
    <input type = "hidden" name = "ntabla" value = "<?php echo $tabla?>">
    <input type = "hidden" name = "nkey" value = "<?php echo $idFila?>">
    <input type = "hidden" name = "key" value = "nuevo">
    <input type = "hidden" name = "pagretorno" value = "<?php echo 'rtabla?t='.$tabla?>">
    <input type = "submit" class="btn btn-primary" name="crear" value ="Nuevo Registro"> 
</form>
</div>
<!-- -------------para los registros existentes ---->
<?php
    foreach($columnas as $columna){
        array_push($alias,$columna['COLUMN_NAME'] );
    }
 ?>   
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
    <tr>
    <?php foreach($alias as $alia){ printf('<th>%s</th>',$alia);} ?>
    <th>Modif</th><th>eliminar</th>
    </tr>
</thead>
<tbody>
<?php
    foreach($filas as $fila){ 
        echo '<tr>';
        foreach($columnas as $columna){                    
            printf('<td>%s</td>',$fila[$columna['COLUMN_NAME']]);
        };
    ?>
        <td>
        <form action=<?php echo 'form.php'?> method="POST"> 
            <input type = "hidden" name = "ntabla" value = "<?php echo $tabla?>">
            <input type = "hidden" name = "nkey" value = "<?php echo $idFila?>">
            <input type = "hidden" name = "key" value = "<?php echo $fila[$idFila]?>">
            <input type = "hidden" name = "pagretorno" value = "<?php echo 'rtabla?t='.$tabla?>">
            <input type=  "submit" class="btn btn-primary" name="boton" value ="modificar"> 
        </form>
        </td>
        <td>
        <form action=borraregistro.php method="POST">
                <input type = "hidden" name = "tabla" value = "<?php echo $tabla?>">
                <input type = "hidden" name = "nombreID" value = "<?php echo $idFila?>">
                <input type = "hidden" name = "pagina" value = "<?php echo $return?>">
                <input type = "hidden" name = "valorID" value = "<?php echo $fila[$idFila]?>">
                <input type = "hidden" name = "pagretorno" value = "<?php echo 'rtabla?t='.$tabla?>">
                <input type=  "submit" name="boton" class="btn btn-warning" value ="Borrar" onclick="return confirm('¿Seguro? Perderá esos datos.')"> 
        </form>
        </td></tr>
    <?php                       
    }
    ?>


</tbody>
</table>

<!-------------- fin tabla--------------------------------->
                </div>
			</div>
		</div>
	</div>
</body>
</html>
