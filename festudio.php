<?php
require __DIR__ . '/dbcon.php'; //funciones para conectar con la base de datos
require __DIR__ . '/encabezadoc.php';
$dni=$_SESSION['id'];
$consulta=sprintf("SELECT * FROM `estudios` WHERE `id_estudio`='%s' ",$_POST['id_estudio']);
$estudio=cunsultadb($consulta);

if ($estudio=="0")
    {
    //es una nueva entrada
    $institucion="";
    $localidad="";
    $id_prov="0";
    $pais="";
    $Fc_inicio=null;
    $Fc_fin=null;
    $id_carrera="0";
    $id_estudio="0";
    }
else
{
    $institucion=$estudio['Institucion'];
    $localidad=$estudio['Localidad'];
    $id_prov=$estudio['id_prov'];
    $pais=$estudio['Pais'];
    $Fc_inicio=$estudio['Fc_inicio'];
    $Fc_fin=$estudio['Fc_fin'];
    $id_carrera=$estudio['id_carrera'];
    $id_estudio=$estudio['id_estudio'];
}
//estilos para Label
$c1= "font-weight-bold fs-4 fst-italic";
//estilos para input
$c2= "form-control border border-primary fst-italic text-center fs-5";
?>
        <script> 
        function validaciones(){
        Fc_inicio =  new Date(document.getElementById("Fc_inicio").value);
        Fc_fin = new Date(document.getElementById("Fc_fin").value);
        if(Fc_fin<Fc_inicio){ continua= false ;   window.alert("Fecha de inicio debe ser menor a fecha de fin" ); } 
        else {continua=true;}
        return continua;
        };

            
        </script>

    <div class="container border border-info bg-light fst-italic">
            <div class="row bg-dark text-dark">
                <h1 class="p-3 mb-2  text-info  text-opacity-50 text-center fw-bold text-decoration-underline fst-italic"> Datos del estudio </h1>
            </div>
        </div>


<form id="festudio" class="formulario bg-white fst-italic " action="submitformestudio.php" method="POST" onsubmit="return validaciones()" >
    <input type="hidden" id="id_estudio" name="id_estudio"value="<?= $id_estudio?>">
    <input type="hidden" id="DNI" name="DNI" value="<?=$dni?>">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9">
                    <img src="imagenes/estudioIzq1.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <img src="imagenes/estudioIzq2.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        <div class="col-sm-4"><br><!--Formulario-->
            <!--Instituci??n-->
            <div class="row">
                <label for="Institucion" class="<?=$c1?>">Institucion:</label><br>
                <input type="text" maxlength="30" id="Institucion" required  placeholder="Ingrese Instituci??n" class="<?=$c2?>"
                       name="Institucion" value= "<?= $institucion?>" ><br>
            </div>
            <!--Localidad-->
            <div class="row">
                <label for="Localidad" class="<?=$c1?>">Localidad:</label><br>
                <input type="text" maxlength="100" id="Localidad" required  placeholder="Ingrese Localidad" class="<?=$c2?>"  
                       name="Localidad" value="<?= $localidad?>"><br>
            </div>
            <!--Provincia-->
            <div class="row">
                <label for="id_prov" class="  fs-6 text-black ">Provincia:</label><br>
                        <select id="id_prov" name="id_prov" placeholder="Provincia" class="<?=$c2?>">
                        <?php S1Motorcito('Provincias','id_prov','provincia',$id_prov) ?>
                        </select>
            </div>

            <!--Pais-->
            <div class="row">
                <label for="Pais" class="<?=$c1?>">Pais:</label><br>
                <input type="text" maxlength="30" id="Pais" required  placeholder="Ingrese Pais" class="<?=$c2?>"  name="Pais"  value="<?= $pais?>"><br>
            </div>
            <!--Titulo adquirido-->
            <div class="row">

            <label for="id_carrera" class="<?=$c1?>">Titulo adquirido:</label><br>
                <select id="id_carrera" name="id_carrera" placeholder="Titulo adquirido:" class="<?=$c2?>" >
                <?php 
                 $query=" SELECT `id_carrera`, Concat(`tx_carrera`,'  Tipo: ',`tipo_Carrera`,'  Nivel: ',`nivel`) as texto FROM `carreras`";
                 S2Motorcito($query,'id_carrera','texto',$id_carrera);
                 ?>
                </select>
            </div>
            <!--Fecha Incio-->
            <div class="row">
                <label for="Fc_inicio" class="<?=$c1?>">Fecha inicio:</label><br>
                <input type="date" id="Fc_inicio" class="<?=$c2?>"  name="Fc_inicio"  value="<?= $Fc_inicio?>"><br>
            </div>
            <!--Fecha final-->
            <div class="row">
                <label for="Fc_fin" class="<?=$c1?>">Fecha fin:</label><br>
                <input type="date" id="Fc_fin" class="<?=$c2?>"  name="Fc_fin" value="<?= $Fc_fin?>"><br>
            </div><br>
            <!--Botones-->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <input class=" form-control btn btn-dark  border border-info fst-italic" type="submit" value="Enviar">
                </div>
                <div class="col-sm-5">                    
                    <button class=" form-control btn btn-dark  border border-info fst-italic" > 
                        <a class=" text-decoration-none text-light" href="estudios.php">Cancelar</a></button>
                </div>
                <div class="col-sm-1"></div>
            
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <img src="imagenes/estudioDer1.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9">
                    <img src="imagenes/estudioDer2.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>   
</form> 
