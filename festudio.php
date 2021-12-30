<?php
require __DIR__ . '/dbcon.php'; //funciones para conectar con la base de datos
require __DIR__ . '/encabezadoc.php';
$dni=$_SESSION['id'];
$consulta=sprintf("SELECT * FROM `estudios` WHERE `ID_Estudio`='%s' ",$_POST['ID_Estudio']);
$estudio=cunsultadb($consulta);

if ($estudio=="0")
    {
    //es una nueva entrada
    $institucion="";
    $localidad="";
    $idprov="0";
    $pais="";
    $Fc_inicio=null;
    $Fc_fin=null;
    $id_Carrera="0";
    $ID_Estudio="0";
    }
else
{
    $institucion=$estudio['Institucion'];
    $localidad=$estudio['Localidad'];
    $idprov=$estudio['idprov'];
    $pais=$estudio['Pais'];
    $Fc_inicio=$estudio['Fc_inicio'];
    $Fc_fin=$estudio['Fc_fin'];
    $id_Carrera=$estudio['id_Carrera'];
    $ID_Estudio=$estudio['ID_Estudio'];
}
//estilos para Label
$c1= "font-weight-bold fs-4 fst-italic";
//estilos para input
$c2= "form-control border border-primary fst-italic text-center fs-5";
?>
        <script> 
            function estudioID(){
            var estudio=document.getElementById("id_Carrera");
            var data='';
            const dataList = document.getElementById("estudios");;
            const textInput = estudio.value;
            var data='';
            for (let i = 0; i < dataList.options.length; i++) {
                if (dataList.options[i].value === textInput) {
                    data=dataList.options[i].getAttribute("data");
                  }
                 }
            estudio.value=data;
            }
        </script>

    <div class="container border border-info bg-light fst-italic">
            <div class="row bg-dark text-dark">
                <h1 class="p-3 mb-2  text-info  text-opacity-50 text-center fw-bold text-decoration-underline fst-italic"> Datos del estudio </h1>
            </div>
        </div>


<form id="festudio" class="formulario bg-white fst-italic " action="submitformestudio.php" method="POST" onsubmit="estudioID()">
    <input type="hidden" id="ID_Estudio" name="ID_Estudio"value="<?= $ID_Estudio?>">
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
            <!--Institución-->
            <div class="row">
                <label for="Institucion" class="$c1">Institucion:</label><br>
                <input type="text" maxlength="30" id="Institucion" required  placeholder="Ingrese Institución" class="<?=$c2?>"   name="Institucion" value= "<?= $institucion?>" ><br>
            </div>
            <!--Localidad-->
            <div class="row">
                <label for="Localidad" class="$c1">Localidad:</label><br>
                <input type="text" maxlength="100" id="Localidad" required  placeholder="Ingrese Localidad" class="<?=$c2?>"  name="Localidad" value="<?= $localidad?>"><br>
            </div>
            <!--Provincia-->
            <div class="row">
                <label for="idprov" class="  fs-6 text-black ">Provincia:</label><br>
                        <select id="idprov" name="idprov" placeholder="Provincia" class="<?=$c2?>">
                        <?php S1Motorcito('Provincias','idprov','provincia',$idprov) ?>
                        </select>
            </div>

            <!--Pais-->
            <div class="row">
                <label for="Pais" class="$c1">Pais:</label><br>
                <input type="text" maxlength="30" id="Pais" required  placeholder="Ingrese Pais" class="<?=$c2?>"  name="Pais"  value="<?= $pais?>"><br>
            </div>
            <!--Titulo adquirido-->
            <div class="row">

            <label for="id_Carrera" class="$c1">Titulo adquirido:</label><br>
                <input type="list" maxlength="100" required  placeholder="Ingrese estudio" class="<?=$c2?>"  list="estudios" id="id_Carrera" name="id_Carrera" placeholder="<?= $id_Carrera?>"><br>
                <datalist id="estudios">
                    <?php                    
                        $consulta=sprintf("SELECT `id_carrera`,`tx_carrera`,`tipo_Carrera`,`nivel` FROM `carreras`");
                        $titulos=cunsultadbmultiple($consulta);
                        echo var_dump($titulos); 
                        foreach($titulos as $titulo){
                        printf( '<option data="%s" value="%s">',$titulo["id_carrera"] ,$titulo["tx_carrera"].'  (Tipo: '.$titulo["tipo_Carrera"].' Nivel: '.$titulo["nivel"].')');
                    };                
                    ?>
                </datalist>
            </div>
            <!--Fecha Incio-->
            <div class="row">
                <label for="Fc_inicio" class="$c1">Fecha inicio:</label><br>
                <input type="date" id="Fc_inicio" class="<?=$c2?>"  name="Fc_inicio"  value="<?= $Fc_inicio?>"><br>
            </div>
            <!--Fecha final-->
            <div class="row">
                <label for="Fc_fin" class="$c1">Fecha fin:</label><br>
                <input type="date" id="Fc_fin" class="<?=$c2?>"  name="Fc_fin" value="<?= $Fc_fin?>"><br>
            </div><br>
            <!--Botones-->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <input class=" form-control btn btn-dark centroventana border border-info fst-italic" type="submit" value="Enviar">
                </div>
                <div class="col-sm-5">                    
                    <button class=" form-control btn btn-dark centroventana border border-info fst-italic" > <a class=" text-decoration-none text-light" href="estudios.php">Cancelar</a></button>
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
