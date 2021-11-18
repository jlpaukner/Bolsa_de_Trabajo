<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>ESCOJE A REPRESENTAR</title>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"> -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>	
    <?php include __DIR__ . '/javas1.php'; ?>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</head>
<script type="text/javascript" class="init">
        function muevenodo(){ 
            var dropdown = document.getElementById("dd");
            var barra = document.getElementById("barra"); 
            var filtro = document.getElementById("example_filter");
            barra.appendChild(filtro);
            };
		$(document).ready(function() {$('#example').DataTable();muevenodo(); }  );
</script>
<body >
<?php
 require __DIR__ . '/encabezadoadmin.php';
 require __DIR__ . '/dbcon.php';
$tabla=$_GET['t'];

if($tabla=="candidatos")
{
    $consulta="SELECT DNI,Apellido,Nombre FROM candidatos";
    $idFila="DNI";
}
if($tabla=="empresa")
{
    $consulta="SELECT Cuit,Razon_Social,Apellido_Apoderado FROM empresa" ;
    $idFila="Cuit";
}

$filas=cunsultadbmultiple($consulta);
$columnas=array_keys($filas[0]);
?>

<table id="example" class="table table-striped table-bordered bg-dark bg-opacity-50" style="width:100%">
<thead>
    <tr>
    <?php foreach($columnas as $columna){ printf('<th>%s</th>',$columna);} ?>
    <th>Representar</th>
    </tr>
</thead>
<tbody>
<?php
    foreach($filas as $fila){ 
        echo '<tr>';
        foreach($columnas as $columna){                    
            printf('<td class="text-white">%s</td>',$fila[$columna]);
        };
    ?>
        <td>
        <form action=<?php echo 'representar.php'?> method="POST"> 
            <input type = "hidden" name = "repID" value = "<?php echo $fila[$idFila]?>">
            <input type = "hidden" name = "tipousuario" value = "<?php echo $tabla?>">
            <input type=  "submit" class="form-control btn btn-danger btn-opacity-50" name="boton" value ="REPRESENTAR"> 
        </form>
        </td>
</tr>
    <?php                       
    }
    ?>
</tbody>
</table>
                </div>
			</div>
		</div>
	</div>
</body>
</html>
