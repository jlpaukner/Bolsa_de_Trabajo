<?php
require __DIR__ . '/dbcon.php'; //funciones para conectar con la base de datos
require __DIR__ . '/encabezadoc.php';
$dni=$_SESSION['id'];
$consulta=sprintf("SELECT * FROM `experiencia` WHERE `Id`='%s' ",$_POST['Id']);
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
// clase para label
$c1="fw-lighter fs-4 fst-italic";
// clase para input
$c2="form-control border border-secundary fst-italic text-center fs-5 fw-lighter";

?>

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

<script>
        function validaciones(){
        Fc_inicio =  new Date(document.getElementById("Fc_inicio").value);
        Fc_fin = new Date(document.getElementById("Fc_fin").value);
        if(Fc_fin<Fc_inicio){ continua= false ;   window.alert("Fecha de inicio debe ser menor a fecha de fin" ); } 
        else {continua=true;}
        return continua;
        };
</script>

<div class="container">
    <div class="row">
        <div class="  text-white  text-opacity-25 text-center  text-decoration-underline fw-lighter fst-italic"><h2> Datos de la experiencia laboral</h2></div>
    </div>
</div>


<form class="formulario bg-white fst-italic " action="submitformexperiencia.php" method="POST" onsubmit="return validaciones()"> 
    <input type="hidden" id="Id" name="Id"value="<?=$ID?>">
    <input type="hidden" id="DNI" name="DNI"value="<?=$dni?>">
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
                <label for="Empresa" class="<?=$c1?>">Empresa:</label><br>
                <input type="text" required maxlength="100"  placeholder="Nombre de la empresa" class="<?=$c2?>" id="Empresa" maxlength="30" name="Empresa" value= "<?=$Empresa?>" >
            </div><br>
            <!--contacto-->
            <div class="row">
                <label for="Contacto" class="<?=$c1?>">Nombre del contacto:</label><br>
                <input type="text" required maxlength="50" placeholder="Nombre del contacto laboral " class="<?=$c2?>" id="Contacto" name="Contacto" value="<?=$Contacto?>">
            </div><br>
            <!--Teléfono del contacto-->
            <div class="row">
                <label for="Cont_Tel" class="<?=$c1?>">Teléfono del contacto:</label><br>
                <input type="tel" pattern="(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}" required  title="Numero de telefono o celular con codigo de area sin espacions ni símbolos" class="<?=$c2?>" id="Cont_Tel" name="Cont_Tel" value="<?=$Cont_Tel?>">
            </div><br>
            <!--sector-->
            <!-- <div class="row">
                <label for="Sector" class="<?=$c1?>">Sector:</label><br>
                <input type="text" required maxlength="60" placeholder="Sector en que se desempeñó " class="<?=$c2?>" id="Sector" name="Sector" value="<?=$Sector?>">
            </div><br> -->
            <!--Indentificación-->
            <div class="row">
            <label for="Id_puesto" class="<?=$c1?>">Identificacion del puesto:</label><br>
                        <select id="Id_puesto" name="Id_puesto" placeholder="Puesto ejercido" class="<?=$c2?>">
                        <?php S1Motorcito('Puestos','Id_puesto','tx_puesto',$Puesto) ?>
                        </select>
            </div><br>

            <!--Fecha inicio-->
            <div class="row">
                <label for="Estado" class="<?=$c1?>">Fecha Inicio (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de ingreso?" class="<?=$c2?>" id="Fc_inicio" name="Fc_inicio"  value="<?=$Finicio?>">
            </div><br>
            <!--fecha final-->
            <div class="row">
                <label for="Fc_fin" class="<?=$c1?>">Fecha Fin (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de egreso?" class="<?=$c2?>" id="Fc_fin" name="Fc_fin"  value="<?=$Fin?>">
            </div><br>
            <!--descripción-->
            <div class="row">
                <label for="Descripcion" class="<?=$c1?>">Descripcion:</label><br>
                <input type="text" required  maxlength="100" title="maximo 100 caracteres" placeholder="Ingrese descripcion del puesto " class="<?=$c2?>" id="Descripcion" name="Descripcion" value="<?=$Descripcion?>">
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

