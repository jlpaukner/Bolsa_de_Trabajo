<?php
include __DIR__ . '/encabezadoc.php';
include __DIR__ . '/dbcon.php';
$consulta=sprintf("SELECT * FROM `experiencia` join puestos on experiencia.Id_puesto=puestos.Id_puesto WHERE `DNI`='%s' ",$_SESSION['id']);
$experiencias=cunsultadbmultiple($consulta);
// echo $consulta;
if (count($experiencias)>0)
    {
        ?>
        <div class="container border border-info text-dark  fst-italic">
            <div class="row">
                <h1 class="p-3 mb-2  text-info  text-opacity-50 text-center fw-bold text-decoration-underline"> Lista de experiencias </h1>
            </div>
        </div>
        <div class="container-fluid border border-primary bg-light  fst-italic">
            <div class="row">
                <div class="col-sm-1 text-center fs-5 fw-bold border border-primary">
                    <th class="text-center bg-success">Empresa</th>
                </div>
                <div class="col-sm-1 text-center fs-5 fw-bold border border-primary">
                    <th class="text-center bg-success">Contacto</th>
                </div>
                <div class="col-sm-1 text-center fs-5 fw-bold border border-primary">
                    <th class="text-center bg-success">Sector</th>
                </div>
                <div class="col-sm-1 text-center fs-5 fw-bold border border-primary">
                    <th class="text-center bg-success">Puesto</th>
                </div>
                <div class="col-sm-3 text-center fs-5 fw-bold border border-primary">
                    <th class="text-center bg-success">Descripción</th>
                </div>
                <div class="col-sm-3 text-center fs-5 ">
                    <div class="row">
                        <div class="col-sm-6 text-center fw-bold border border-primary">
                            <th class="border border-primary">Fecha Inicio</th>
                        </div>
                        <div class="col-sm-6 text-center fw-bold border border-primary">
                            <th class="border border-primary">Fecha Final</th>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 text-center fw-bold fs-5 border border-primary">
                    <th class="border border-primary">Editar</th>
                </div> 
            <hr>

        <?php

    foreach ($experiencias as $fila) 
        {
            printf(" <div class='col-sm-1 text-center border-bottom  border-info '>%s</div> <div class='col-sm-1 text-center border-bottom border-info'>%s</div> <div class='col-sm-1 text-center border-bottom border-info'>%s</div> <div class='col-sm-1 text-center border-bottom border-info'>%s</div> <div class='col-sm-3 text-center text-break border-bottom border-info '>%s</div> <div class='col-sm-3 border-bottom border-info'><div class='row '> <div class='col-sm-6 text-center '>%s</div> <div class='col-sm-6 text-center'>%s</div></div></div> ",$fila['Empresa'],$fila['Contacto'],$fila['Sector'],$fila['tx_puesto'],$fila['Descripcion'],$fila['Fc_inicio'],$fila['Fc_fin']);

            ?>
            <div class="col-sm-2 border-bottom border-info">
                <div class="row">
                    <div class="col-sm-6">
                        <form action=fexperiencia.php method="POST"> 
                            <input type = "hidden" name = "Id" value = "<?php echo $fila["Id"]?>" >
                            <input type=  "submit" name="boton" class="form-control btn btn-dark border border-info text-center" value ="Modificar">             
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <form action=borraregistro.php method="POST">
                            <input type = "hidden" name = "tabla" value = "experiencia" >
                            <input type = "hidden" name = "nombreID" value = "Id" >
                            <input type = "hidden" name = "pagina" value = "experiencia.php" >
                            <input type = "hidden" name = "valorID" value = "<?php echo $fila["Id"]?>" >
                            <input type=  "submit" name="boton" class="form-control btn btn-dark border border-info text-center" value ="Borrar"> 
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <?php

        };
        echo "</div>";
    }
else
    {
        echo "<h4 class='text-info  text-opacity-50 text-center fst-italic'>Cargue sus datos en Añadir experiencia laboral.</h4>";
    }
    ?>
<form action=fexperiencia.php method="POST"> 
    <div class="container ">
        <div class="row ">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <input type = "hidden" name = "Id" value = "0" >
                <input type=  "submit" name="boton" class="form-control btn btn-dark centroventana border border-info" value ="Añadir experiencia">  
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
</form>
