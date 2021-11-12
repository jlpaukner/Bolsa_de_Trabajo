<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoe.php';
$_SESSION['abierta']="si";
//llena el formulario
//valores default -----------------
$Razon_Social="";
$Domicilio="";
$Localidad="";
$Cd_postal="";
$Pais="un ";
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
        $Domicilio=$resultado['Domicilio'];
        // $Localidad=$resultado['Localidad'];   
        // $Pais=$resultado['Pais'];
        $Cd_postal=$resultado['Cd_postal'];
        $Email=$resultado['Email'];
    } 
}
?>
<div class="container border border-info bg-success fst-italic">
    <div class="row bg-dark bg-opacity-75 text-dark">
        <h1 class="p-3 mb-2  text-dark   text-center fw-bold  fst-italic"> Datos de la Empresa </h1>
    </div>
</div>

<form class="formulario bg-white fst-italic " action="submitformempresa.php" method="POST">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><!--Formulario-->
            <!--razon social-->
            <div class="row">
                <label class="font-weight-bold fs-4 fst-italic" for="Razon_Social">Razon Social:</label><br>
                <input type="text" required  placeholder="Ingrese Razon Social" class="form-control border border-success fst-italic text-center  fs-5" id="Razon_Social" name="Razon_Social" value= "<?php echo $Razon_Social?>" ><br>
            </div>

            <div class="row">
                <label class="font-weight-bold fs-4 fst-italic" for="Domicilio">Domicilio:</label><br>
                <input type="text" required  placeholder="Ingrese Domicilio" class="form-control border border-success fst-italic text-center  fs-5" id="Domicilio" name="Domicilio" value="<?php echo $Domicilio?>"><br>
            </div>
            <div class="row">
                <label class="font-weight-bold fs-4 fst-italic" for="Cd_postal">Código Postal:</label><br>
                <input type="text" required  placeholder="Ingrese Código Postal" class="form-control border border-success fst-italic text-center  fs-5" id="Cd_postal" name="Cd_postal" value="<?php echo $Cd_postal?>"><br>
            </div>
            <div class="row">
                <label class="font-weight-bold fs-4 fst-italic" for="Email">Correo Electrónico:</label><br>
                <input type="text" required  placeholder="Ingrese Correo Elctrónico" class="form-control border border-success fst-italic text-center  fs-5" id="Email" name="Email" value="<?php echo $Email?>"><br>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div><br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-6"><!--boton guardar-->
            <input type="submit" class=" form-control btn btn-dark centroventana border border-success fst-italic" value="Guardar">
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

