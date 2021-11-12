<?php $datosp = cunsultadb($consulta); ?>

<?php
$consulta=sprintf("SELECT * FROM experiencia JOIN puestos on experiencia.Id_puesto=puestos.Id_puesto WHERE DNI='%s' ",$_SESSION['id']);
echo $consulta;
$experiencias=cunsultadbmultiple($consulta);
$consulta=sprintf("SELECT * FROM estudios join carreras on estudios.id_Carrera=carreras.Id_carrera WHERE DNI='%s' ",$_SESSION['id']);
$estudios=cunsultadbmultiple($consulta);
//  echo $consulta;
// var_dump($experiencias);
?>


<!-- <body class="bg-dark">    -->
<body >   
<div class="container bg-dark fst-italic border border-info">
            <div class="row">
                <h1 class="text-center text-white text-decoration-underline fw-bolder text-uppercase"> Mi Curriculum Vitae </h1>
            </div>
        </div>
<div class="container fst-italic">
    <div class="row">
        <div class="col-2 bg-primary bg-opacity-25 ">
            <!--Photo del candidato-->
            <!--hr><img class="rounded-circle"src="imagenes/photo.jpg" alt="" width="165" height="200"--><!--aqui va la foto-->

            <hr width="100%" color="white">
            <!--Nacionalidad-->
            <h6 class="card-title text-white">Nacionalidad:</h6>
            <p class="card-text text-white text-center break text-break"><?php echo $datosp['Nacionalidad'];?></p>

            <!--Fecha de Nacimiento-->
            <h6 class="card-title text-white">Fecha de Nacimiento:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Nacimiento'];?></p>

            <!--Lugar de Nacimiento-->
            <h6 class="card-title text-white">Lugar de Nacimiento:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['LugarNac'];?></p>

            <!--Estado Civil-->
            <h6 class="card-title text-white">Estado Civil:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Estado'];?></p>

            <!--Cantidad de hijos-->
            <h6 class="card-title text-white">Cantidad de hijos:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Hijos'];?></p>

            <hr width="100%" color="white">

            <!--Direccion + n° de dirección-->
            <h6 class="card-title text-white">Dirección:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Domicilio'];?>  <?php echo $datosp['NumDireccion'];?></p>

            <!--Codigo Postal-->
            <h6 class="card-title text-white">Código Postal:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Postal'];?></p>

            <!--n° Celular-->
            <h6 class="card-title text-white">N° de Celular:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Contacto'];?></p>

            <!--Email-->
            <h6 class="card-title text-white ">Em@il:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Email'];?></p>

            <!--Red Social-->
            <h6 class="card-title text-white ">Red Social:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['RedSocial1'];?></p>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['RedSocial2'];?></p>

            <hr width="100%" color="white">

            <!--Puesto a postular-->
            <!-- <h6 class="card-title text-white">Puesto a postular:</h6>
            <p class="card-text text-white text-center text-break"><?php 
            // echo $datosp['PuestoPostular'];
            ?></p> -->
            
            <!--Licencia-->
            <h6 class="card-title text-white">Licencia:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Licencia'];?></p>

            <!--Movilidad-->
            <h6 class="card-title text-white">Movilidad:</h6>
            <p class="card-text text-white text-center text-break"><?php echo $datosp['Movilidad'];?></p>
            <hr>
        </div>

        <div class="col-10">
            <div class="row border bg-primary bg-opacity-25 text-white ">
                <h2 class="text-center text-uppercase fw-bolder"> <?php echo $datosp['Nombre'];?></h2>
                <h2 class="text-center text-uppercase fw-bolder"> <?php echo $datosp['Apellido'];?></h2>
            </div>

            <div class="row">
            <div class="card border-light mb-3" style="max-width: S3rem;">
                <div class="card-header bg-dark bg-opacity-75 text-white fs-4 fw-bolder ">Formación Académica</div><hr>
                <!--Empezar el foreach-->
                <?php if (count($estudios)>0)
                {            
                foreach ($estudios as $fila) 
                        {
                           $carrera= $fila["tx_carrera"].'  (Tipo: '.$fila["tipo_Carrera"].' Nivel: '.$fila["nivel"].')';
                            printf(" <div class='row'>
                            <div class='col-1'></div>
                            <div class='col-7'>
                            <div class='row text-start fw-bolder fs-5 lh-2'><p class='card-text'>%s</p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>-%s</p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>%s - %s - %s</p></div>
                            </div>
                            <div class='col-3'>
                            <div class='row'><p class='card-text'>%s   /   %s</p></div>
                            </div>
                            <div class='col-1'></div>
                        </div>",$carrera,$fila['Institucion'],$fila['Pais'],$fila['Provincia'],$fila['Localidad'],$fila['Fc_inicio'],$fila['Fc_fin']);?>
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
                <!--Empezar el foreach-->
                <?php if (count($experiencias)>0)
                {            
                foreach ($experiencias as $fila) 
                        {
                            printf(" <div class='row'>
                            <div class='col-1'></div>
                            <div class='col-7'>
                            <div class='row text-start fw-bolder fs-5 lh-2'><p class='card-text'>%s</p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>-%s</p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>-%s</p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>-%s</p></div>
                            <div class='row fw-normal fs-6 lh-2'><p class='card-text'>-%s</p></div>
                            </div>
                            <div class='col-3'>
                            <div class='row'><p class='card-text'>%s   /   %s</p></div>
                            </div>
                            <div class='col-1'></div>

                        </div>",$fila['tx_puesto'],$fila['Empresa'],$fila['Sector'],$fila['Contacto'],$fila['Descripcion'],$fila['Fc_inicio'],$fila['Fc_fin']);?>
                        <hr width="100%" color="white"><?php

                        };   
                    }; 
                ?>


            </div>
            </div>
        </div>



    </div>
</div>
</body>