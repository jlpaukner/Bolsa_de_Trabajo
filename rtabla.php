<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>	
    <?php include __DIR__ . '/javas1.php'; ?>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        table{table-layout: fixed;}
        td{word-wrap:break-word}
    </style>
</head>
<script type="text/javascript" class="init">
        function muevenodo(){ 
            var dropdown = document.getElementById("dd");
            var barra = document.getElementById("barra"); 
            var filtro = document.getElementById("example_filter");
            barra.appendChild(filtro);
            };
		$(document).ready(function() {$('#example').DataTable();muevenodo(); }  );
        // document.addEventListener("DOMContentLoaded", function(){
        // muevenodo();});


</script>
<body >
<?php
 require __DIR__ . '/encabezadoadmin.php';
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
    <div class="row">
        <div class="col-sm-10 text-center text-white text-opacity-50 fst-italic "><h3 class="fw-light ">Tabla: <?=ucfirst($tabla)?></h3></div>
        <div class="col-sm-2">
            <form action=<?php echo 'form.php'?> method="POST"> 
                <input type = "hidden" name = "ntabla" value = "<?php echo $tabla?>">
                <input type = "hidden" name = "nkey" value = "<?php echo $idFila?>">
                <input type = "hidden" name = "key" value = "nuevo">
                <input type = "hidden" name = "pagretorno" value = "<?php echo 'rtabla?t='.$tabla?>">
                <input type = "submit" class="btn btn-primary" name="crear" value ="Nuevo Registro"> 
                </form>
        </div>
        <!--div class="d-flex justify-content-between bd-highlight mb-3 text-center">
            <div class="  text-end">    </div>

            <div-- class="p-2 bd-highlight">

            </div-->
        
    </div>




<!-- -------------para los registros existentes ---->
<?php
    foreach($columnas as $columna){
        array_push($alias,$columna['COLUMN_NAME'] );
    }
 ?>
<div class="container-xxl">
<div class="table-responsive">
<table id="example" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover align-middle table-dark table-striped  text-center table-bordered text-info fw-light fst-italic bg-dark bg-opacity-50" style="width:100%">
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
            printf('<td class="text-white">%s</td>',$fila[$columna['COLUMN_NAME']]);
        };
    ?>
        <td>
        <form action=<?php echo 'form.php'?> method="POST"> 
            <input type = "hidden" name = "ntabla" value = "<?php echo $tabla?>">
            <input type = "hidden" name = "nkey" value = "<?php echo $idFila?>">
            <input type = "hidden" name = "key" value = "<?php echo $fila[$idFila]?>">
            <input type = "hidden" name = "pagretorno" value = "<?php echo 'rtabla?t='.$tabla?>">
            <input type=  "submit" class="form-control btn btn-primary btn-opacity-50" name="boton" value ="Modificar"> 
        </form>
        </td>
        <td>
        <form action=borraregistro.php method="POST">
                <input type = "hidden" name = "tabla" value = "<?php echo $tabla?>">
                <input type = "hidden" name = "nombreID" value = "<?php echo $idFila?>">
                <input type = "hidden" name = "retorno" value = "<?php echo $return?>">
                <input type = "hidden" name = "valorID" value = "<?php echo $fila[$idFila]?>">
                <input type = "hidden" name = "pagretorno" value = "<?php echo 'rtabla?t='.$tabla?>">
                <input type=  "submit" name="boton" class="form-control btn btn-primary btn-opacity-50" value ="Eliminar" onclick="return confirm('¿Seguro? Perderá esos datos.')"> 
        </form>
        </td></tr>
    <?php                       
    }
    ?>


</tbody>
</table>
</div>
</div>
  

<!-------------- fin tabla--------------------------------->
                </div>
			</div>
		</div>
	</div>
</body>
</html>
