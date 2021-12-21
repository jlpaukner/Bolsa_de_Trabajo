<?php
require __DIR__ . '/dbcon.php'; //funciones para conectar con la base de datos
require __DIR__ . '/encabezadoc.php';
$dni=$_SESSION['id'];
$consulta=sprintf("SELECT * FROM `estudios` WHERE `ID_Estudio`='%s' ",$_POST['ID_Estudio']);
$estudio=cunsultadb($consulta);

// echo var_dump($_POST);
// echo '<br>';
// echo '<br>'.var_dump($estudio).'<br>';
if ($estudio=="0")
    {
    //es una nueva entrada
    $institucion="";
    $localidad="";
    $provincia=" ";
    $pais="";
    $Fc_inicio=null;
    $Fc_fin=null;
    $id_Carrera=null;
    $ID_Estudio="0";
    }
else
{
    $institucion=$estudio['Institucion'];
    $localidad=$estudio['Localidad'];
    $provincia=$estudio['Provincia'];
    $pais=$estudio['Pais'];
    $Fc_inicio=$estudio['Fc_inicio'];
    $Fc_fin=$estudio['Fc_fin'];
    $id_Carrera=$estudio['id_Carrera'];
    $ID_Estudio=$estudio['ID_Estudio'];
}
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
                <label for="Institucion" class="font-weight-bold fs-4 fst-italic">Institucion:</label><br>
                <input type="text" maxlength="30" id="Institucion" required  placeholder="Ingrese Institución" class="form-control border border-primary fst-italic text-center  fs-5"  name="Institucion" value= "<?php echo $institucion?>" ><br>
            </div>
            <!--Localidad-->
            <div class="row">
                <label for="Localidad" class="font-weight-bold fs-4 fst-italic">Localidad:</label><br>
                <input type="text" maxlength="100" id="Localidad" required  placeholder="Ingrese Localidad" class="form-control border border-primary fst-italic text-center  fs-5" name="Localidad" value="<?php echo $localidad?>"><br>
            </div>
            <!--Provincia-->
            <div class="row">
                <label for="Provincia" class="font-weight-bold fs-4 fst-italic">Provincia:</label><br>
                <input type="text" maxlength="30" id="Provincia" required  placeholder="Ingrese Provincia" class="form-control border border-primary fst-italic text-center  fs-5" name="Provincia" value="<?php echo $provincia?>"><br>
            </div>
            <!--Pais-->
            <div class="row">
                <label for="Pais" class="font-weight-bold fs-4 fst-italic">Pais:</label><br>
                <input type="text" maxlength="30" id="Pais" required  placeholder="Ingrese Pais" class="form-control border border-primary fst-italic text-center  fs-5" name="Pais"  value="<?php echo $pais?>"><br>
            </div>
            <!--Titulo adquirido-->
            <div class="row">

            <label for="id_Carrera" class="font-weight-bold fs-4 fst-italic">Titulo adquirido:</label><br>
                <input type="list" maxlength="100" required  placeholder="Ingrese estudio" class="form-control border border-primary fst-italic text-center  fs-5" list="estudios" id="id_Carrera" name="id_Carrera" placeholder="<?php echo $id_Carrera?>"><br>
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
                <label for="fc_inicio" class="font-weight-bold fs-4 fst-italic">Fecha inicio:</label><br>
                <input type="date" id="fc_inicio" class="form-control border border-primary fst-italic text-center  fs-5" name="fc_inicio"  value="<?php echo $Fc_inicio?>"><br>
            </div>
            <!--Fecha final-->
            <div class="row">
                <label for="fc_fin" class="font-weight-bold fs-4 fst-italic">Fecha fin:</label><br>
                <input type="date" id="fc_fin" class="form-control border border-primary fst-italic text-center  fs-5" name="fc_fin" value="<?php echo $Fc_fin?>"><br>
            </div><br>
            <!--Botones-->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <input class=" form-control btn btn-dark centroventana border border-info fst-italic" type="submit" value="Enviar">
                </div>
                <div class="col-sm-5">
                    <input type="hidden" id="ID_Estudio" name="ID_Estudio"value="<?php echo $ID_Estudio?>">
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
