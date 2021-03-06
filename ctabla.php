
<?php
function ctabla($tabla,$columnas,$alias,$tituloIdDueño,$iddueño,$idFila,$form,$return)
    {   
        $consulta=sprintf("SELECT * FROM `%s` WHERE `%s`='%s' ",$tabla,$tituloIdDueño,$iddueño);
        $filas=cunsultadbmultiple($consulta);
        if (count($filas)>0)
            {
              echo '<table class="table table-striped table-bordered text-center border-success fst-italic table-hover lh-1"><tr><thead>';
              foreach($alias as $alia){                  
                printf('<th style="text-align:center lh-1 ">%s</th>',$alia);
              };
              printf('<th>%s</th><th>%s</th>','Modificar','Eliminar');
              echo '</tr></thead><tbody>';
              foreach($filas as $fila){ 
                  echo '<tr>';
                  foreach($columnas as $columna){                    
                    printf('<td style="text-align:center lh-1 ">%s</td>',$fila[$columna]); };
                ?>
                  <td>
                    <form action=<?php echo $form?> method="POST"> 
                      <input type = "hidden" name = <?php echo $idFila?> value = "<?php echo $fila[$idFila]?>">
                      <input type=  "submit" class="form-control btn btn-dark  border border-success fst-italic  lh-1" name="boton" value ="Modificar"  >
                    </form>
                  </td>
                  <td>
                  <form action=borraregistro.php method="POST">
                          <input type = "hidden" name = "tabla" value = "<?php echo $tabla?>">
                          <input type = "hidden" name = "nombreID" value = "<?php echo $idFila?>">
                          <input type = "hidden" name = "retorno" value = "<?php echo $return?>">
                          <input type = "hidden" name = "valorID" value = "<?php echo $fila[$idFila]?>">                          
                          <input type=  "submit" name="boton" class="form-control btn btn-dark  border border-success fst-italic  lh-1" value ="Borrar" onclick="return confirm('¿Seguro? Perderá esos datos.')"> 
                  </form>
                  </td>
                </tr>
                <?php echo '</tr>';                           
                 }
              echo '</table></tbody>'; 
              return true;              
            }              
        else {return false;};
    }

    function tabla($filas,$alias,$form,$idFila,$tabla,$return)
    {   
      //crea tabla con las filas de la query, renombrandolas en orden segun el alias, 
      // utiliza el formulario indicado para modificar y la pagina indicada para retornar
        if (count($filas)>0)
            {
              $columnas=array_keys($filas[0]);
              echo '<table class="table table-striped table-bordered"><tr><thead>';
              foreach($alias as $alia){                  
                printf('<th style="text-align:center">%s</th>',$alia);
              };
              printf('<th>%s</th><th>%s</th>','Modificar','Eliminar');
              echo '</tr></thead><tbody>';
              foreach($filas as $fila){ 
                  echo '<tr>';
                  foreach($columnas as $columna){                    
                      printf('<td style="padding:10px">%s</td>',$fila[$columna]); };
                ?>
                  <td>
                    <form action=<?php echo $form?> method="POST"> 
                      <input type = "hidden" name = <?php echo $idFila?> value = "<?php echo $fila[$idFila]?>">
                      <input type=  "submit" 
                      class="form-control btn btn-darkborder border-success fst-italiclh-1" name="boton" value ="Modificar"> 
                    </form>
                  </td>
                  <td>
                  <form action=borraregistro.php method="POST">
                          <input type = "hidden" name = "tabla" value = "<?php echo $tabla?>">
                          <input type = "hidden" name = "nombreID" value = "<?php echo $idFila?>">
                          <input type = "hidden" name = "retorno" value = "<?php echo $return?>">
                          <input type = "hidden" name = "valorID" value = "<?php echo $fila[$idFila]?>">
                          <input type=  "submit" name="boton" 
                          class="form-control btn btn-dark border border-success fst-italic lh-1" 
                          value ="Borrar" onclick="return confirm('¿Seguro? Perderá esos datos.')"> 
                  </form>
                  </td>
                </tr>
                <?php echo '</tr>';                           
                 }
              echo '</table></tbody>'; 
              return true;              
            }              
        else {return false;};
    }

    function tabla1($filas,$alias,$form,$idFila,$tabla,$return)
    {                       
            //crea tabla con las filas de la query, renombrandolas en orden segun el alias, 
            // utiliza el formulario indicado para modificar y la pagina indicada para retornar
      // no muestra columna de ID
      if (count($filas)>0)
      {
        $columnas=array_keys($filas[0]);
        echo '<table class="table table-striped table-bordered"><tr><thead>';
        foreach($alias as $alia){                  
          printf('<th style="text-align:center">%s</th>',$alia);
        };
        printf('<th style="text-align:center">%s</th><th style="text-align:center">%s</th>','Modificar','Eliminar');
        echo '</tr></thead><tbody>';
        foreach($filas as $fila){ 
            echo '<tr>';
            foreach($columnas as $columna)
            { 
              if(  strpos($columna, 'id_') === false  ){                 
                printf('<td style="padding:10px;text-align:center">%s</td>',$fila[$columna]); };
              };
          ?>
            <td>
              <form action=<?php echo $form?> method="POST"> 
                <input type = "hidden" name = <?php echo $idFila?> value = "<?php echo $fila[$idFila]?>">
                <input type=  "submit" class="form-control btn btn-dark border border-success fst-italic  lh-1"
                name="boton" value ="Modificar"> 
              </form>
            </td>
            <td>
            <form action=borraregistro.php method="POST">
                    <input type = "hidden" name = "tabla" value = "<?php echo $tabla?>">
                    <input type = "hidden" name = "nombreID" value = "<?php echo $idFila?>">
                    <input type = "hidden" name = "retorno" value = "<?php echo $return?>">
                    <input type = "hidden" name = "valorID" value = "<?php echo $fila[$idFila]?>">
                    <input type=  "submit" name="boton" 
                    class="form-control btn btn-dark  border border-success fst-italic  lh-1" 
                    value ="Borrar" onclick="return confirm('¿Seguro? Perderá esos datos.')"> 
            </form>
            </td>
          </tr>
          <?php echo '</tr>';                           
           }
        echo '</table></tbody>'; 
        return true;              
      }              
  else {return false;};
}

?>