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
    $Cont_Tel="0";
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
    $Cont_Tel=$experiencia['Cont_Tel'];
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
<style>
/* <  estilos para quitar las flechas de input type number> */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {

    -webkit-appearance: none;
    margin: 0; 
}
input[type=number] {
    -moz-appearance:textfield; 
} 
#my{
zoom: 100%;
}
</style>


<div class="container">
    <div class="row">
        <div class="  text-white  text-opacity-25 text-center  text-decoration-underline fw-lighter fst-italic"><h2> Datos de la experiencia laboral</h2></div>
    </div>
</div>


<form class="formulario bg-white fst-italic " action="submitformexperiencia.php" method="POST" onsubmit="experienciaId()">
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
                <label for="Empresa" class="fw-lighter fs-4 fst-italic">Empresa:</label><br>
                <input type="text" required maxlength="100"  placeholder="Nombre de la empresa" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Empresa" maxlength="30" name="Empresa" value= "<?php echo $Empresa?>" >
            </div><br>
            <!--contacto-->
            <div class="row">
                <label for="Contacto" class="fw-lighter fs-4 fst-italic">Datos de contacto:</label><br>
                <input type="text" required maxlength="60" placeholder="Nombre del contacto laboral " class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Contacto" name="Contacto" value="<?php echo $Contacto?>">
            </div><br>
            <!--Teléfono del contacto-->
            <div class="row">
                <label for="Cont_Tel" class="fw-lighter fs-4 fst-italic">Teléfono del contacto:</label><br>
                <input type="tel" pattern="[0-9]{2}[0-9]{8}" required  placeholder=" numero de 10 cifras" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Cont_Tel" name="Cont_Tel" value="<?php echo $Cont_Tel?>">
            </div><br>
            <!--sector-->
            <div class="row">
                <label for="Sector" class="fw-lighter fs-4 fst-italic">Sector:</label><br>
                <input type="text" required maxlength="60" placeholder="Sector en que se desempeñó " class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Sector" name="Sector" value="<?php echo $Sector?>">
            </div><br>
            <!--Indentificación-->
            <div class="row">

            <label for="Id_puesto" class="fw-lighter fs-4 fst-italic">Identificacion del puesto:</label><br>
                <input type="list" required maxlength="60" placeholder="Puesto ejercido" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" list="puestos" id="Id_puesto" name="Id_puesto" placeholder="<?php echo $Puesto?>">
                <datalist id="puestos">
                    <?php                    
                        $consulta=sprintf("SELECT `Id_puesto`,`tx_puesto` FROM `puestos`");
                        $puestos=cunsultadbmultiple($consulta);
                        foreach($puestos as $puesto){
                        printf( '<option data="%s" value="%s">',$puesto["Id_puesto"] ,$puesto["tx_puesto"]);
                    };                
                    ?>
                </datalist>
            </div><br>

            <!--Fecha inicio-->
            <div class="row">
                <label for="Estado" class="fw-lighter fs-4 fst-italic">Fecha Inicio (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de ingreso?" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Fc_inicio" name="Fc_inicio"  value="<?php echo $Finicio?>">
            </div><br>
            <!--fecha final-->
            <div class="row">
                <label for="Fc_fin" class="fw-lighter fs-4 fst-italic">Fecha Fin (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de egreso?" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Fc_fin" name="Fc_fin"  value="<?php echo $Fin?>">
            </div><br>
            <!--descripción-->
            <div class="row">
                <label for="Descripcion" class="fw-lighter fs-4 fst-italic">Descripcion:</label><br>
                <input type="text" required  maxlength="100" placeholder="Ingrese descripcion del puesto " class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Descripcion" name="Descripcion" value="<?php echo $Descripcion?>">
            </div><br>
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
    <input type="hidden" id="Id" name="Id"value="<?=$ID?>">
    <input type="hidden" id="DNI" name="DNI"value="<?=$dni?>">
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
                        <button class=" form-control btn btn-dark centroventana border border-info fst-italic" > <a class="text-decoration-none text-light" href="experiencia.php">Cancelar</a></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    
    </div><br>
</form> 

