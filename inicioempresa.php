<?php
require_once('./dbcon.php');
require_once('./encabezadoe.php');
if(!isset($_GET["ms"])){$_GET["ms"]="nada";} //si no nay mensajes
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
        $mensaje = "Datos de la empresa guardados exitosamente ";    $display="display:center";   break;
    case "ex":
        $mensaje = "Información de estudios guardado exitosamente";  $display="display:center";   break;
    case "nada":
        $mensaje = "Por favor introduzca datos de su empresa en el menu 'Datos de empresa'"; $display="display:center";  break;
    case "pv":
        $mensaje="   Bienvenido , puede modificar datos de su empresa,<br>  o hacer una busqueda de personal en el menú correspondiente.";
        $display="display:center";  break;
    default:
        $mensaje="";  $display="display:none";  break;
    };
?>
<div id="popUp" class="alert alert-success" style="<?=$display?>"> <?=$mensaje?></div>

<ls>
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
include_once('./herramientas.php');
//vemos si empresa esta activa o inactiva
$consulta=sprintf("SELECT * FROM empresa WHERE Cuit='%s' ",$_SESSION['id']);
$resultado=cunsultadb($consulta);
$activa = $resultado['Estado']==1;
if($activa){
$consulta=sprintf("SELECT * FROM busquedas WHERE idEmpresa='%s' ",$_SESSION['id']);
$busquedas=cunsultadbmultiple($consulta);
if(sizeof($busquedas)==0){
echo "Realize una búsqueda de personal seleccoinando 'Busqueda' en el menú";
}
$contador = 0;
foreach($busquedas as $busqueda) 
{
    $contador = $contador + 1; 
    $id_busqueda=$busqueda['id_busqueda'];
    $FDnacMinima=nacimiento($busqueda['EdadMaxima']);
    $FDnacMaxima=nacimiento($busqueda['EdadMinima']);
    $id_carrera=$busqueda['id_carrera'];
    $id_puesto=$busqueda['id_puesto'];
    $sq = "SELECT candidatos.DNI from candidatos ";
    $wq = " Where Nacimiento < '{$FDnacMaxima}' and '{$FDnacMinima}' < Nacimiento ";
    if($busqueda['id_puesto']!="0"){
        $sq = $sq." JOIN experiencia on candidatos.DNI = experiencia.DNI  
        JOIN puestos on puestos.id_puesto = experiencia.id_puesto ";
        $wq = $wq."and experiencia.id_puesto ={$id_puesto} ";
                                    }
    if($busqueda['id_carrera']!="0"){
        $sq = $sq." JOIN estudios on estudios.DNI = candidatos.DNI   
        JOIN carreras on estudios.id_carrera = carreras.id_carrera ";
        $wq = $wq." and estudios.id_carrera ={$id_carrera}";
                                    }
    $consulta= $sq.$wq;
    $candidatosEncontrados=cunsultadbmultiple($consulta);
    if(sizeof($candidatosEncontrados)>0){
        // añadir a tabla resultados          
        $aborrar = " DELETE FROM resultados WHERE id_busqueda = '{$id_busqueda}'";
        operaciondb($aborrar);
        foreach($candidatosEncontrados as $candidato)
        {
         $inserta="INSERT into Resultados (id_busqueda,DNI) VALUES ('{$id_busqueda}','{$candidato['DNI']}')";
         operaciondb($inserta);
        };
        echo "<center>Su busqueda $contador obtuvo resultados";
        ?>
        <form action= muestramatchs.php method="POST" style="display: inline-block;"> 
        <input type = "hidden" name = "id_busqueda" value = <?=$id_busqueda?> >
        <input type=  "submit" class="form-control btn btn-dark  border border-success fst-italic  lh-1" name="boton" value ="Ver candidatos"  >
        </form></center>        
        <?php 
    }
    else {echo "<center><p align='center' class='text-dark fs-5'>  Le comunicaremos cuando sus busqueda $contador obtenga candidatos.<p></center>";};
    echo"<hr>";
}
}
?> 
