<?php
    session_start();
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
    foreach($columnas as $columna){
        array_push($alias,$columna['COLUMN_NAME'] );
    }
    echo '<table id="example" class="table table-striped table-bordered" style="width:100%">';
    echo '<head><tr>';
    foreach($alias as $alia){                  
    printf('<th>%s</th>',$alia);
    };
    printf('<th>%s</th>','Mod');
    printf('<th>%s</th>','Eli');
    echo '</tr></thead>';
    echo'<tbody>';
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
    echo '</tbody></table>';       
?>