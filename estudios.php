<?php
require_once('./encabezadoc.php');
require_once('./dbcon.php');
require __DIR__ . '/mensajes.php';
$dni=$_SESSION['id'];
$consulta= " SELECT * FROM `estudios`
JOIN carreras on estudios.id_carrera=carreras.id_carrera 
JOIN provincias on estudios.id_prov = provincias.id_prov
where `DNI`='$dni' ";
$estudios=cunsultadbmultiple($consulta);
if (count($estudios)>0)
    {
        ?><div class="container border border-info bg-light fst-italic">
            <div class="row bg-dark text-dark">
                <h1 class="p-3 mb-2  text-info  text-opacity-50 text-center fw-bold text-decoration-underline"> Lista de estudios </h1>
            </div>
        </div>

        <div class="container-fluid border border-info bg-light  fst-italic ">
            <div class="row ">
                <div class="col-sm-2 text-center fs-5 fw-bold border border-primary">
                    <th class="text-center bg-success">Institución</th>
                </div>
                <div class="col-sm-2 text-center fs-5 fw-bold border border-primary">
                    <th class="text-center bg-success">Estudio</th>
                </div>
                <div class="col-sm-1 text-center fs-5 fw-bold border border-primary">
                    <th class="border border-primary">Localidad</th>
                </div>
                <div class="col-sm-1 text-center fs-5 fw-bold border border-primary">
                    <th class="border border-primary">Provincia</th>
                </div>
                <div class="col-sm-1 text-center fs-5 fw-bold border border-primary">
                    <th class="border border-primary">Pais</th>
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

foreach ($estudios as $fila) 
{   
    ?>
<div class='col-sm-2 text-center border-bottom border-info'><?=$fila['Institucion'] ?></div> 
<div class='col-sm-2 text-center border-bottom border-info'><?=$fila['tx_carrera'] ?></div> 
<div class='col-sm-1 text-center border-bottom border-info'><?=$fila['Localidad'] ?></div> 
<div class='col-sm-1 text-center border-bottom border-info '><?=$fila['provincia'] ?></div>
<div class='col-sm-1 text-center border-bottom border-info '><?=$fila['Pais'] ?></div>  
<div class='col-sm-3 border-bottom border-info'><div class='row '> 
<div class='col-sm-6 text-center '><?=$fila['Fc_inicio']?></div> 
<div class='col-sm-6 text-center'><?=$fila['Fc_fin'] ?></div>
</div>
</div>
    <div class="col-sm-2 border-bottom border-info">
        <div class="row">
            <div class="col-sm-6">
                <form action=festudio.php method="POST">
                    <input type = "hidden" name = "id_estudio" value = "<?php echo $fila["id_estudio"]?>" >
                    <input type=  "submit" name="boton" class="form-control  btn btn-dark border border-info text-center" value ="Modificar"> 
                </form>
            </div>
            <div class="col-sm-6">
                <form action=borraregistro.php method="POST">
                    <input type = "hidden" name = "tabla" value = "estudios" >
                    <input type = "hidden" name = "nombreID" value = "id_estudio" >
                    <input type = "hidden" name = "retorno" value = "estudios.php" >
                    <input type = "hidden" name = "valorID" value = "<?php echo $fila["id_estudio"]?>" >
                    <input type=  "submit" name="boton" class="form-control  btn btn-dark border border-info text-center" value ="Borrar"> 
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
    echo "<h4 class='text-info  text-opacity-50 text-center fst-italic'>Cargue sus datos en Añadir estudio.</h4>";
}
?>

<form action=festudio.php method="POST">
    <div class="container ">
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <input type = "hidden" name = "id_estudio" value = "0" >
                <input type=  "submit" name="boton" class="form-control btn btn-dark  border border-info" value ="Añadir estudio"> 
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>


</form>