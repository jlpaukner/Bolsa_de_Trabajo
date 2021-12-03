<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoe.php';
$_SESSION['abierta']="si";
//llena el formulario
//valores default -----------------
$Razon_Social="";
$FC_Inicio_Actividades="";
$Domicilio="";
//$Localidad="";
$Cd_postal="";
//$Pais="un ";
$Rubro="";
$Apellido_Apoderado="";
$Nombre_Apoderado="";
$Tel_Contacto="";
$Email="";
//---------------------------------
$Cuit=$_SESSION['id'];
$consulta = "SELECT * FROM `empresa` WHERE `Cuit`='$Cuit'";
$resultado = cunsultadb($consulta);
// var_dump($resultado);
if ($resultado=="0"){
     echo"<h3 class='text-center text-dark'> Cargue los campos vacíos</h3>";
}
else{
    if ($resultado!="0"){
        $Razon_Social=$resultado['Razon_Social'];
        $FC_Inicio_Actividades=$resultado['FC_Inicio_Actividades'];
        $Domicilio=$resultado['Domicilio'];
        
        // $Localidad=$resultado['Localidad'];   
        // $Pais=$resultado['Pais'];
        $Cd_postal=$resultado['Cd_postal'];
        //$Pais=$resultado['Pais'];
        $Rubro=$resultado['Rubro'];
        $Apellido_Apoderado=$resultado['Apellido_Apoderado'];
        $Nombre_Apoderado=$resultado['Nombre_Apoderado'];
        $Tel_Contacto=$resultado['Tel_Contacto'];
        $Email=$resultado['Email'];
    } 
}
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
<div class="container border border-info bg-opacity-50 bg-success fst-italic">
    <div class="row bg-dark bg-opacity-75 ">
        <h3 class="  text-white   text-center  fst-italic"> Datos de la Empresa </h3>
    </div>
</div>

<form class="formulario bg-white fst-italic " action="submitformempresa.php" method="POST">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="Razon_Social">Razon Social:</label><br>
                        <input type="text" maxlength="100" required  placeholder="Ingrese Razon Social" class="form-control border border-success fst-italic text-center  fs-5" id="Razon_Social" name="Razon_Social" value= "<?php echo $Razon_Social?>" >
                    </div>
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="FC_Inicio_Actividades">Fecha Incio Actividades:</label><br>
                        <input type="date" required  placeholder="Ingrese Fecha de Inicio actividades de la Empresa" class="form-control border border-success fst-italic text-center  fs-5" id="FC_Inicio_Actividades" name="FC_Inicio_Actividades" value="<?php echo $FC_Inicio_Actividades?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="Domicilio"> Domicilio:</label><br>
                        <input type="text" maxlength="100" required  placeholder="Ingrese domicilio" class="form-control border border-success fst-italic text-center  fs-5" id="Domicilio" name="Domicilio" value="<?php echo $Domicilio?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="Cd_postal">Codigo Postal:</label><br>
                        <input type="number" min="1000" max="2500" required  placeholder="Ingrese el código postal" class="form-control border border-success fst-italic text-center  fs-5" id="Cd_postal" name="Cd_postal" value="<?php echo $Cd_postal?>">                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="Rubro">Rubro:</label><br>
                        <input type="text" maxlength="30" required  placeholder="Ingrese Rubro principal de la empresa" class="form-control border border-success fst-italic text-center  fs-5" id="Rubro" name="Rubro" value= "<?php echo $Rubro?>" >
                    </div>
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="Apellido_Apoderado">Apellido del Apoderado:</label><br>
                        <input type="text" maxlength="30" required  placeholder="Ingrese Apellido Apoderado de la Firma" class="form-control border border-success fst-italic text-center  fs-5" id="Apellido_Apoderado" name="Apellido_Apoderado" value="<?php echo $Apellido_Apoderado?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="Nombre_Apoderado">Nombre del Apoderado:</label><br>
                        <input type="text" maxlength="30" required  placeholder="Ingrese Nombre del Apoderado de la Firma" class="form-control border border-success fst-italic text-center  fs-5" id="Nombre_Apoderado" name="Nombre_Apoderado" value="<?php echo $Nombre_Apoderado?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="font-weight-bold fs-4 fst-italic" for="Tel_Contacto">Tel de Contacto:</label><br>
                        <input type="number" min="1100000000" max="1599999999"required  placeholder="Ingrese un numero telefónico para contactarnos" class="form-control border border-success fst-italic text-center  fs-5" id="Tel_Contacto" name="Tel_Contacto" value="<?php echo $Tel_Contacto?>">                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-0"></div>
                    <div class="col-sm-12">
                        <label class="font-weight-bold fs-4 fst-italic" for="Email">Correo Electrónico:</label><br>
                        <input type="email" required  placeholder="Ingrese Correo Elctrónico" class="form-control border border-success fst-italic text-center  fs-5" id="Email" name="Email" value="<?php echo $Email?>">                                                
                    </div>
                    <div class="col-sm-3"></div>
                </div>               
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div><br>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-6"><!--boton guardar-->
                <button type="submit" class="form-control btn btn-dark centroventana border border-primary" value="Enviar">Guardar</button>
                </div>
                <div class="col-sm-6"><!--boton cancelar-->
                <button class=" form-control btn btn-dark centroventana border border-success fst-italic" ><a class=" text-decoration-none text-light" href="inicioempresa?ms=ini.php">Cancelar</a></button>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
            <!--Cuit-->
    <label for="Cuit" hidden >Cuit :</label><br>
    <input type="number" hidden required id="Cuit" name="Cuit" value="<?php echo $Cuit?>"><br>
            

</form> 

