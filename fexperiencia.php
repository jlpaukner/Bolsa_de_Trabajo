<?php
require __DIR__ . '/dbcon.php'; //funciones para conectar con la base de datos
require __DIR__ . '/encabezadoc.php';
$dni=$_SESSION['id'];
$consulta=sprintf("SELECT * FROM `experiencia` WHERE `Id`='%s' ",$_POST['Id']);
// echo '<br>'.$consulta.'<br>';
// echo var_dump($_POST);
// echo '<br>';
$experiencia=cunsultadb($consulta);
if ($experiencia=="0")
    {
    //es una nueva entrada
    $Empresa="";
    $Contacto="";
    $Puesto="";
    $Finicio=null;
    $Fin=null;
    $Sector="";
    $Descripcion="";
    $ID="0";
    }
else
{
    $Empresa=$experiencia['Empresa'];
    $Contacto=$experiencia['Contacto'];
    $Puesto=$experiencia['Id_puesto'];
    $Finicio=$experiencia['Fc_inicio'];
    $Fin=$experiencia['Fc_fin'];
    $Sector=$experiencia['Sector'];
    $Descripcion=$experiencia['Descripcion'];
    $ID=$_POST['Id'];
};
?>
<script> 
            function experienciaId(){
            var puesto=document.getElementById("Id_puesto");
            var data='';
            const dataList = document.getElementById("puestos");;
            const textInput = puesto.value;
            var data='';
            for (let i = 0; i < dataList.options.length; i++) {
                if (dataList.options[i].value === textInput) {
                    data=dataList.options[i].getAttribute("data");
                  }
                 }
                 puesto.value=data;
            }
</script>



<div class="container">
    <div class="row">
        <div class="p-3 mb-2  text-info  text-opacity-50 text-center fw-bold text-decoration-underline fst-italic"><h1> Datos de la experiencia laboral</h1></div>
    </div>
</div>


<form class="formulario bg-white fst-italic " action="submitformexperiencia.php" method="POST" onsubmit="experienciaId()">>
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaIzq1.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaIzq2.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
        <div class="col-sm-4"><br>
            <!--Empresa-->
            <div class="row">
                <label for="Empresa" class="font-weight-bold fs-4 fst-italic">Empresa:</label><br>
                <input type="text" required  placeholder="Escriba el nombre de la empresa en que trabajó" class="form-control border border-primary fst-italic text-center  fs-5" id="Empresa" name="Empresa" value= "<?php echo $Empresa?>" ><br>
            </div>
            <!--contacto-->
            <div class="row">
                <label for="Contacto" class="font-weight-bold fs-4 fst-italic">Datos de contacto:</label><br>
                <input type="text" required  placeholder="Ingrese Nombre y número telefónico del contacto laboral " class="form-control border border-primary fst-italic text-center  fs-5" id="Contacto" name="Contacto" value="<?php echo $Contacto?>"><br>
            </div>
            <!--sector-->
            <div class="row">
                <label for="Sector" class="font-weight-bold fs-4 fst-italic">Sector:</label><br>
                <input type="text" required  placeholder="Ingrese Sector en que se desempeñó " class="form-control border border-primary fst-italic text-center  fs-5" id="Sector" name="Sector" value="<?php echo $Sector?>"><br>
            </div>
            <!--Indentificación-->
            <div class="row">

            <label for="Id_puesto" class="font-weight-bold fs-4 fst-italic">Identificacion del puesto:</label><br>
                <input type="list" required  placeholder="Ingrese el puesto ejercido" class="form-control border border-primary fst-italic text-center  fs-5" list="puestos" id="Id_puesto" name="Id_puesto" placeholder="<?php echo $Puesto?>"><br>
                <datalist id="puestos">
                    <?php                    
                        $consulta=sprintf("SELECT `Id_puesto`,`tx_puesto` FROM `puestos`");
                        $puestos=cunsultadbmultiple($consulta);
                        foreach($puestos as $puesto){
                        printf( '<option data="%s" value="%s">',$puesto["Id_puesto"] ,$puesto["tx_puesto"]);
                    };                
                    ?>
                </datalist>
            </div>

            <!--Fecha inicio-->
            <div class="row">
                <label for="Estado" class="font-weight-bold fs-4 fst-italic">Fecha Inicio (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de ingreso?" class="form-control border border-primary fst-italic text-center  fs-5" id="Fc_inicio" name="Fc_inicio"  value="<?php echo $Finicio?>"><br>
            </div>
            <!--fecha final-->
            <div class="row">
                <label for="Fc_fin" class="font-weight-bold fs-4 fst-italic">Fecha Fin (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de egreso?" class="form-control border border-primary fst-italic text-center  fs-5" id="Fc_fin" name="Fc_fin"  value="<?php echo $Fin?>"><br>
            </div>
            <!--descripción-->
            <div class="row">
                <label for="Descripcion" class="font-weight-bold fs-4 fst-italic">Descripcion:</label><br>
                <input type="text" required  placeholder="Ingrese descripcion del puesto " class="form-control border border-primary fst-italic text-center  fs-5" id="Descripcion" name="Descripcion" value="<?php echo $Descripcion?>"><br>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaDer1.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaDer2.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div><br>
    <input type="hidden" id="Id" name="Id"value="<?php echo $ID?>">
    <datalist id="puestos">
        <?php
            foreach($ocupaciones as $ocupacion){
            echo '<option value="'.$ocupacion["tx_puesto"].'">';
         };                
        ?>
    </datalist>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="row">
                    <!--boton guardar-->
                    <div class="col-sm-6">
                        <input class=" form-control btn btn-dark centroventana border border-info fst-italic" type="submit" value="Guardar">
                    </div>
                    <!--boton cancelar-->
                    <div class="col-sm-6">
                        <button class=" form-control btn btn-dark centroventana border border-info fst-italic" > <a class="text-decoration-none text-light" href="puestos.php">Cancelar</a></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    
    </div><br>
</form> 

