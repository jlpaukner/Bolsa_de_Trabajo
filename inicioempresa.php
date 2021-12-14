<?php
require __DIR__ . '/dbcon.php';
require __DIR__ . '/encabezadoe.php';
if(!isset($_GET["ms"])){
    $_GET["ms"]="nada";
}
$_SESSION['abierta']="si";

$Razon_Social="";
$FC_Inicio_Actividades="";
$Domicilio="";
$Cd_postal="";
$Rubro="";
$Apellido_Apoderado="";
$Nombre_Apoderado="";
$Tel_Contacto="";
$Email="";
$Cuit=$_SESSION['id'];
$consulta = "SELECT * FROM `empresa` WHERE `Cuit`='$Cuit'";
$resultado = cunsultadb($consulta);
if ($resultado=="0"){
   // echo"<h3 class='text-center text-dark'> Cargue los campos vacíos</h3>";
}
else{
   if ($resultado!="0"){
       $Razon_Social=$resultado['Razon_Social'];
       $FC_Inicio_Actividades=$resultado['FC_Inicio_Actividades'];
       $Domicilio=$resultado['Domicilio'];
       $Cd_postal=$resultado['Cd_postal'];
       $Cuit=$resultado['Cuit'];
       $Rubro=$resultado['Rubro'];
       $Apellido_Apoderado=$resultado['Apellido_Apoderado'];
       $Nombre_Apoderado=$resultado['Nombre_Apoderado'];
       $Tel_Contacto=$resultado['Tel_Contacto'];
       $Email=$resultado['Email'];
   } 
}

switch ($_GET["ms"]) {
    case "demx":
        $mensaje = "Datos de la empresa guardados exitosamente ";       break;
    case "ex":
        $mensaje = "Información de estudios guardado exitosamente";     break;
    case "nada":
        $mensaje = "Por favor introduzca datos de su empresa en el menu 'Datos de empresa'";   break;
    case "pv":
        $mensaje="   Bienvenido , puede modificar datos de su empresa,<br>   o hacer una busqueda de personal en el menú correspondiente.";
    default:
        $mensaje="";
    };
    echo "<h3 class='text-center'>".$mensaje."</h3>";
?>
<ls>
<!-- <h1> El Cuit de la empresa es 
    <?//=$resultado["Cuit"]   ?>
    <h1><br>
<h1> El Email de la empresa es 
    <?//=$resultado["Email"]   ?>
    <h1><br> -->
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h1 class="text-center fst-italic text-decoration-underline"><?php echo $Razon_Social?></h1>
            </div>
            <div class="col-sm-4"></div>
        </div><hr>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="fst-italic text-end fw-light">Rubro:</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fst-italic text-start"><?php echo $Rubro?></h6>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-5"><h6 class="fst-italic text-end fw-light ">Apoderado: </h6></div>
                                <div class="col-sm-7"><h6 class="text-start fst-italic"><?php echo $Nombre_Apoderado?>  <?php echo $Apellido_Apoderado?></h6></div>                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-4"><h6 class="fst-italic text-end fw-light ">Cuit: </h6></div>
                                <div class="col-sm-8"><h6 class="text-start fst-italic"><?php echo $Cuit?></h6></div>
                            </div>                                            
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-6"><h6 class="fst-italic text-end fw-light">Domicilio: </h6></div>
                                <div class="col-sm-6"><h6 class="text-start fst-italic"><?php echo $Domicilio?></h6></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-6"><h6 class="fst-italic text-end fw-light">C.Postal: </h6></div>
                                <div class="col-sm-6"><h6 class="text-start fst-italic"><?php echo $Cd_postal?></h6></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-7"><h6 class="fst-italic text-end fw-light">Inicio de actividad: </h6></div>
                                <div class="col-sm-5"><h6 class="text-start fst-italic"><?php echo $FC_Inicio_Actividades?></h6></div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-6"><h6 class="fst-italic text-end fw-light">Teléfono: </h6></div>
                                <div class="col-sm-6"><h6 class="text-start fst-italic"><?php echo $Tel_Contacto?></h6></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-6"><h6 class="fst-italic text-end fw-light">E-mail: </h6></div>
                                <div class="col-sm-6"><h6 class="text-start fst-italic"><?php echo $Email?></h6></div>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <hr>


    </div>

</body>

<?php  // para mostrar si hay matchs a la busquedas
include __DIR__ . '/herramientas.php';

$consulta=sprintf("SELECT * FROM busquedas WHERE idEmpresa='%s' ",$_SESSION['id']);
$busquedas=cunsultadbmultiple($consulta);
if(sizeof($busquedas)==0){
echo "Realize una búsqueda de personal seleccoinando 'Busqueda' en el menú";

}
foreach($busquedas as $busqueda) 
{
    $idBusqueda=$busqueda['IdBusqueda'];
    $FDnacMinima=nacimiento($busqueda['EdadMaxima']);
    $FDnacMaxima=nacimiento($busqueda['EdadMinima']);
    $id_Carrera=$busqueda['id_Carrera'];
    $Id_puesto=$busqueda['Id_puesto'];
    $consulta=
    "SELECT * from 
    candidatos JOIN estudios on candidatos.DNI = estudios.DNI 
    join experiencia on candidatos.DNI = experiencia.DNI 
    join puestos on puestos.Id_puesto=experiencia.Id_puesto 
    join carreras on Carreras.Id_carrera=estudios.id_Carrera 
    where estudios.id_Carrera ={$id_Carrera}
    and experiencia.id_Puesto ={$Id_puesto}
    and '{$FDnacMinima}' < Nacimiento 
    and Nacimiento < '{$FDnacMaxima}'
    ";
    $candidatosEncontrados=cunsultadbmultiple($consulta);
    if(sizeof($candidatosEncontrados)>0){
        // añadir a tabla resultados   
        $aborrar = " DELETE FROM resultados WHERE idBusqueda = '{$idBusqueda}'";
        operaciondb($aborrar);
        foreach($candidatosEncontrados as $candidato)
        {
         $inserta="INSERT into Resultados (idBusqueda,DNI) VALUES ('{$idBusqueda}','{$candidato['DNI']}')";
         operaciondb($inserta);
        };
        echo "Su busqueda (id{$busqueda['IdBusqueda']}) obtuvo resultados";
    ?>
        <form action= muestramatchs.php method="POST" style="display: inline-block;"> 
        <input type = "hidden" name = "idBusqueda" value = <?=$idBusqueda?> >
        <input type=  "submit" class="form-control btn btn-dark centroventana border border-success fst-italic  lh-1" name="boton" value ="Ver candidatos"  >
        </form>
        <br>
    <?php 
    }
    else {echo "   <p align='center'>  Le comunicaremos cuando sus busqueda (id{$busqueda['IdBusqueda']}) obtenga candidatos.<p>";};
    echo"<hr>";
}

?> 
