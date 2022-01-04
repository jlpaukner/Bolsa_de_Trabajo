<?php 
//--------------------
if(!isset($_SESSION)) session_start();
$dni=$_SESSION['id'];
//--------------------
$qd = "SELECT * FROM `candidatos` join estado_civil
on estado_civil.id_estadoc= candidatos.id_estadoc
join provincias 
on candidatos.id_prov = provincias.id_prov
WHERE `DNI`='$dni'";
$datosp = cunsultadb($qd);
$qe = "SELECT * FROM experiencia JOIN puestos 
on experiencia.id_puesto=puestos.id_puesto 
WHERE DNI='$dni'";
$experiencias=cunsultadbmultiple($qe);
$qt=
"SELECT * FROM estudios join carreras
on estudios.id_carrera=carreras.id_carrera 
join provincias on provincias.id_prov=estudios.id_prov
WHERE DNI= '{$dni}'";
$estudios=cunsultadbmultiple($qt);
?>

<body >   
<div class="container bg-dark fst-italic border border-info">
            <div class="row">
                <h1 class="text-center text-white text-decoration-underline fw-bolder text-uppercase"> Mi Curriculum Vitae </h1>
            </div>
        </div>
<div class="container fst-italic">
    <div class="row">
        <div class="col-2 bg-primary bg-opacity-25 ">

            <hr width="100%" color="white">
            <!--Nacionalidad-->
            <h6 class="card-title text-white">DNI:</h6>
            <p class="card-text text-white text-center break text-break"><?= $dni ?></p>
            <h6 class="card-title text-white">Nacionalidad:</h6>
            <p class="card-text text-white text-center break text-break"><?= $datosp['Nacionalidad'] ?></p>
            <!--Fecha de Nacimiento-->
            <h6 class="card-title text-white">Fecha de Nacimiento:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Nacimiento'] ?></p>

            <!--Lugar de Nacimiento-->
            <h6 class="card-title text-white">Lugar de Nacimiento:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['LugarNac'] ?></p>

            <!--Estado Civil-->
            <h6 class="card-title text-white">Estado Civil:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['txestadoc'] ?></p>

            <!--Cantidad de hijos-->
            <h6 class="card-title text-white">Cantidad de hijos:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Hijos'] ?></p>

            <hr width="100%" color="white">

            <!--Direccion + n° de dirección-->
            <h6 class="card-title text-white">Dirección:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Domicilio']." ".$datosp['NumDireccion'] ?></p>

            <!--Codigo Postal-->
            <h6 class="card-title text-white">Código Postal:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Postal'] ?></p>

            <!--n° Celular-->
            <h6 class="card-title text-white">N° de Celular:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Contacto'] ?></p>

            <!--Email-->
            <h6 class="card-title text-white ">Em@il:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Email'] ?></p>

            <!--Red Social-->
            <h6 class="card-title text-white ">Red Social:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['RedSocial1'] ?></p>
            <p class="card-text text-white text-center text-break"><?= $datosp['RedSocial2'] ?></p>

            <hr width="100%" color="white">
            
            <!--Licencia-->
            <h6 class="card-title text-white">Licencia:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Licencia'] ?></p>

            <!--Movilidad-->
            <h6 class="card-title text-white">Movilidad:</h6>
            <p class="card-text text-white text-center text-break"><?= $datosp['Movilidad'] ?></p>
            <hr>
        </div>

        <div class="col-10">
            <div class="row border bg-primary bg-opacity-25 text-white ">
                <h2 class="text-center text-uppercase fw-bolder"> <?= $datosp['Nombre'] ?></h2>
                <h2 class="text-center text-uppercase fw-bolder"> <?= $datosp['Apellido'] ?></h2>
            </div>

            <div class="row">
            <div class="card border-light mb-3" style="max-width: S3rem;">
                <div class="card-header bg-dark bg-opacity-75 text-white fs-4 fw-bolder ">Formación Académica</div><hr>
                <!--Empezar el foreach para la formacion academica-->
                <?php if (count($estudios)>0)
                {            
                foreach ($estudios as $fila) 
                        {
                           $carrera= $fila["tx_carrera"].'  (Tipo: '.$fila["tipo_Carrera"].' Nivel: '.$fila["nivel"].')';
                           ?>
                            <div class='row'>
                            <div class='col-1'></div>
                            <div class='col-7'>
                            <div class='row text-start fw-bolder fs-5 lh-2'><p class='card-text'><?=$carrera?></p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'><?=$fila['Institucion'] ?></p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'<?=$fila['Pais']."-".$fila['provincia']."-".$fila['Localidad']?>></p></div>
                            </div>
                            <div class='col-3'>
                            <div class='row'><p class='card-text'><?=$fila['Fc_inicio']." / ".$fila['Fc_fin']   ?></p></div>
                            </div>
                            <div class='col-1'></div>
                        </div>
                        <hr width="100%" color="white"><?php
                        };   
                    }; 
                ?>
                <!--Termina el Foreach-->
            </div>
            </div>
            <div class="row">            
            <div class="card border-light mb-3" style="max-width: S3rem;">
                <div class="card-header bg-dark bg-opacity-75 fw-bolder text-white fs-4">Experiencia Laboral</div><hr>
                <!--Empezar el foreach para la experiencia laboral-->
                <?php if (count($experiencias)>0)
                {            
                foreach ($experiencias as $fila) 
                        {
                          ?>  
                            <div class='row'>
                            <div class='col-1'></div>
                            <div class='col-7'>
                            <div class='row text-start fw-bolder fs-5 lh-2'><p class='card-text'><?=$fila['tx_puesto'] ?></p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>Empresa:   <?=$fila['Empresa']?></p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>Contacto:   <?=$fila['Contacto'] ?></p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>Tel contacto:   <?=$fila['Cont_Tel'] ?></p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>Descripcion:   <?=$fila['Descripcion'] ?></p></div>
                            </div>
                            <div class='col-3'>
                            <div class='row'><p class='card-text'><?=$fila['Fc_inicio']."/".$fila['Fc_fin']?></p></div>
                            </div>
                            <div class='col-1'></div>
                        </div>
                        <hr width="100%" color="white">
                        <?php
                        };   
                    }; 
                ?>
            </div>
            </div>
        </div>
    </div>
</div>
</body>