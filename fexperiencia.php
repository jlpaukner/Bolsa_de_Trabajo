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
    //existe esta entrada, cargar los datos de la BD
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
        <div class="text-white text-opacity-25 text-center text-decoration-underline fw-lighter fst-italic">
            <h2> Datos de la experiencia laboral</h2>
        </div>
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
                <input type="text" required maxlength="100"  placeholder="Nombre de la empresa" 
                class="<?=$c2?>" id="Empresa" maxlength="30" name="Empresa" value= "<?=$Empresa?>" >
            </div><br>
            <!--contacto-->
            <div class="row">
                <label for="Contacto" class="<?=$c1?>">Nombre del contacto:</label><br>
                <input type="text" required maxlength="50" placeholder="Nombre del contacto laboral " 
                class="<?=$c2?>" id="Contacto" name="Contacto" value="<?=$Contacto?>">
            </div><br>
            <!--Tel??fono del contacto-->
            <div class="row">
                <label for="Cont_Tel" class="<?=$c1?>">Tel??fono del contacto:</label><br>
                <input type="text" pattern="(?:549)*([0-9]{10})" 
                required title="Numero de telefono o celular con codigo de area sin espacions ni s??mbolos" 
                oninvalid="setCustomValidity('Ingrese Numero de telefono o celular con codigo de area sin espacions ni s??mbolos')"
                class="<?=$c2?>" id="Cont_Tel" name="Cont_Tel" value="<?=$Cont_Tel?>">
            </div><br>
            <div class="row">
            <label for="id_puesto" class="<?=$c1?>">Identificacion del puesto:</label><br>
                        <select id="id_puesto" name="id_puesto" placeholder="Puesto ejercido" 
                        class="<?=$c2?>">
                        <?php S1Motorcito('Puestos','id_puesto','tx_puesto',$Puesto) ?>
                        </select>
            </div><br>

            <!--Fecha inicio-->
            <div class="row">
                <label for="Estado" class="<?=$c1?>">Fecha Inicio (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de ingreso?" 
                class="<?=$c2?>" id="Fc_inicio" name="Fc_inicio"  value="<?=$Finicio?>">
            </div><br>
            <!--fecha final-->
            <div class="row">
                <label for="Fc_fin" class="<?=$c1?>">Fecha Fin (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de egreso?" 
                class="<?=$c2?>" id="Fc_fin" name="Fc_fin"  value="<?=$Fin?>">
            </div><br>
            <!--descripci??n-->
            <div class="row">
                <label for="Descripcion" class="<?=$c1?>">Descripcion:</label><br>
                <input type="text" required  maxlength="100" title="maximo 100 caracteres" placeholder="Ingrese descripcion del puesto" 
                class="<?=$c2?>" id="Descripcion" name="Descripcion" value="<?=$Descripcion?>">
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
                        <input class=" form-control btn btn-dark  border border-info fst-italic" type="submit" value="Guardar">
                    </div>
                    <!--boton cancelar-->
                    <div class="col-sm-6">
                        <button class=" form-control btn btn-dark  border border-info fst-italic" > 
                            <a class="text-decoration-none text-light" href="experiencia.php">Cancelar</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>    
    </div><br>
</form> 

