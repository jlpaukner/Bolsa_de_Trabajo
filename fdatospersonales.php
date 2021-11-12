<?php
require __DIR__ . '/dbcon.php'; 
require __DIR__ . '/encabezadoc.php';
//llena el formulario
//valores default -----------------
$Apellido="";
$Comentario="";
$Contacto="";
$Domicilio="";
$Email="";
$Estado="";
$Hijos="";
$Licencia="";
$LugarNac="";
$Movilidad="";
$Nacimiento="";
$Nacionalidad="";
$Nombre="";
$NumDireccion="";
$Postal="";
$estudio="";
$RedSocial1="";
$RedSocial2="";
$estado_civil="";
$d=strtotime("tomorrow");
//---------------------------------
$dni=$_SESSION['id'];
$consulta = "SELECT * FROM `candidatos` WHERE `DNI`='$dni'";
$resultado = cunsultadb($consulta);
// echo var_dump($dni);
// echo var_dump($resultado);
if ($resultado=="0"){
    echo"<h3 class='text-center text-primary'> Cargue los campos vacíos</h3>";
}
else{
    if ($resultado!="0"){
        $Apellido=$resultado['Apellido'];
        $Comentario=$resultado['Comentario'];
        $Contacto=$resultado['Contacto'];
        $Domicilio=$resultado['Domicilio'];
        $Email=$resultado['Email'];
        $Estado=$resultado['Estado'];
        $Hijos=$resultado['Hijos'];
        $Licencia=$resultado['Licencia'];
        $LugarNac=$resultado['LugarNac'];
        $Movilidad=$resultado['Movilidad'];
        $Nacimiento=$resultado['Nacimiento'];
        $Nacionalidad=$resultado['Nacionalidad'];
        $Nombre=$resultado['Nombre'];
        $NumDireccion=$resultado['NumDireccion'];
        $Postal=$resultado['Postal'];
        $RedSocial1=$resultado['RedSocial1'];
        $RedSocial2=$resultado['RedSocial2'];
        $estado_civil=$resultado['estado_civil'];
    } 
}
// echo $FC_ALTA;
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




<!--Formulario de Datos Personales-->
<div class="container border border-primary fst-italic bg-light text-primary">
    <!--Titulo-->
    <div class="row bg-dark text-dark">
        <div class="p-3 mb-2  text-info  text-opacity-50 text-center fw-bold text-decoration-underline"><h1> Datos Personales</h1></div>
    </div>

    <form class="formulario text-star" action="submitformcandidato.php" method="POST">
        <!--sub titulo informacion personal-->
        <div class="row text-dark">
            <div class="p-3 bg-white text-primary text-start fw-bold text-decoration-underline"><h3> Información personal</h3></div>
        </div>
        <div class="row text-dark">
            <div class="col-sm-4">
                <div class="container">
                    <!--Nombre-->
                    <div class="row">
                        <label for="Nombre" class="font-weight-bold fs-5 text-black">Nombres:</label><br>
                        <input type="text" lid="Nombre" name="Nombre" placeholder="Ingresar Nombres" class="form-control border border-primary text-center fw-bold fs-5" value= "<?php echo $Nombre?>" ><br>
                    </div>
                    <!--Fecha de nacimiento-->
                    <div class="row">
                        <label for="Nacimiento" class="font-weight-bold fs-5 text-black ">Fecha Nacimiento:</label><br>
                        <input type="date" required lid="Nacimiento" name="Nacimiento" placeholder="Ingresar Fecha de Nacimiento" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Nacimiento?>"><br>
                    </div>                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container">
                    <!--Apellido-->
                    <div class="row">
                        <label for="Apellido" class="font-weight-bold fs-5 text-black">Apellidos:</label><br>
                        <input type="text" lid="Apellido" name="Apellido" placeholder="Ingresar Apellidos" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Apellido?>"><br>
                    </div>
                    <!--Lugar de nacimiento--> 
                    <div class="row">
                        <label for="LugarNac" class="font-weight-bold fs-5 text-black">Lugar de Nacimiento:</label><br>
                        <input type="text" lid="LugarNac" name="LugarNac" placeholder="Ingresar Lugar de Nacimiento" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $LugarNac?>"><br>
                    </div>                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container">
                    <!--Nacionalidad-->
                    <div class="row">
                        <label for="Nacionalidad" class="font-weight-bold fs-5 text-black ">Nacionalidad:</label><br>
                        <input type="text" lid="Nacionalidad" name="Nacionalidad" placeholder="Ingresar Nacionalidad" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Nacionalidad ?>"><br>
                    </div>
                    <!--Estado civil y hijos-->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Estado" class="font-weight-bold fs-5 text-black ">Estado Civil:</label><br>
                            <input type="text"  lid="Estado" name="Estado" placeholder="Ingresar E. Civil" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Estado?>">
                        </div>
                        <div class="col-sm-6">
                            <label for="Hijos" class="font-weight-bold fs-5 text-black ">Hijos:</label>
                            <input type="text"  lid="Hijos" name="Hijos" placeholder="Ingresar Cantidad de Hijos" class="form-control border border-primary text-center fw-bold fs-5" value="<?php ?>">
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <!--Sub titulo de Información de contacto-->
        <div class="row">
            <div class="p-3 bg-white text-primary text-start fw-bold text-decoration-underline"><h3> Información de contacto</h3></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="container">
                    <!--Dirección-->
                    <div class="row">
                        <label for="Domicilio" class="font-weight-bold fs-5 text-black ">Dirección:</label><br>
                        <input type="text" lid="Domicilio" name="Domicilio" placeholder="Ingresar Dirección" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Domicilio?>"><br>                    
                    </div>
                    <!--Correo Electronico-->
                    <div class="row">
                        <label for="Email" class="font-weight-bold fs-5 text-black ">Correo Electrónico:</label><br>
                        <input type="text" lid="Email" name="Email" placeholder="Correo Electronico" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Email?>"><br>
                    </div>                                     
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container">
                    <!--N° de dirección y codigo postal-->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="NumDireccion" class="font-weight-bold fs-6 text-black ">N° de Dirección:</label>
                            <input type="number" inputmode="numeric" lid="NumDireccion" name="NumDireccion" placeholder="N° Dirección" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $NumDireccion ?>">                         
                        </div>
                        <div class="col-sm-6">
                            <label for="Postal" class="font-weight-bold fs-6 text-black">Código Postal:</label>
                            <input type="number" inputmode="numeric" lid="Postal" name="Postal" placeholder="Ingresar Código Postal" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Postal?>">
                        </div>
                    </div>
                    <!--Red social 1--> 
                    <div class="row">
                        <label for="RedSocial1" class="font-weight-bold fs-6 text-black ">Red Social Personal 1:</label><br>
                        <input type="text" lid="RedSocial1" name="RedSocial1" placeholder="Ingresar Red social personal" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $RedSocial1 ?>"><br>                   
                    </div>                                       
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container">
                    <!--N° de teléfono-->
                    <div class="row">
                        <label for="Contacto" class="font-weight-bold fs-5 text-black ">N° de Teléfono:</label><br>
                        <input type="text" lid="Contacto" name="Contacto" placeholder="Ingresar N° de Teléfono" class="form-control border border-primary text-center fw-bold fs-5" pattern="[0-9\(\)\+\-]+" title="numero de telefono" value="<?php echo $Contacto?>"><br>                   
                    </div>
                    <!--Red Social 2-->
                    <div class="row">
                        <label for="RedSocial2" class="font-weight-bold fs-5 text-black ">Red Social Personal 2:</label><br>
                        <input type="text" lid="RedSocial2" name="RedSocial2" placeholder="Ingresar Red social personal 2" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $RedSocial2 ?>"><br>                   
                    </div>                                        
                </div>
            </div>
        </div>
        <!--Sub titulo de Información adicional-->
        <div class="row text-dark">
            <div class="p-3 bg-white text-primary text-start fw-bold text-decoration-underline"><h3> Información del perfil</h3></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="container">
                    <!--Licencia de conducir-->
                    <div class="row">
                        <label for="Licencia" class="font-weight-bold fs-5 text-black">Tipo de Licencia de conducir:</label><br>
                        <input type="text" lid="Licencia" name="Licencia" placeholder="Ingresar Licencia de conducir" class="form-control border border-primary text-center fw-bold fs-5" value="<?php ?>"><br>                    
                    </div>                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container">
                    <!--Movilidad propia-->
                    <div class="row">

                        <label class="font-weight-bold fs-5 text-black"for="Movilidad">Movilidad:</label><br>
                        <select class="form-control border border-primary text-center fw-bold fs-5" id="Movilidad" name="Movilidad">
                            <option value="Automovil">Automovil</option>
                            <option value="Motocicleta">Motocicleta</option>
                            <option value="Ninguna">Ninguna</option>
                        </select><br>                        
                        
                        <br>                   
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <!--Redactar un comentario de su perfil-->
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="container">
                    <div class="row">
                        <label for="Comentario" class="font-weight-bold fs-5 text-black ">Redacte su perfil:</label><br>
                        <input type="text" lid="Comentario" name="Comentario" placeholder="Ingresar tu motivo" class="form-control border border-primary text-center fw-bold fs-5" value="<?php echo $Comentario ?>"><br> 
                    </div>
                </div>

            </div>
            <div class="col-sm-2"></div>
                  
        </div>       
        <div class="row p-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
                <button type="submit" class="form-control btn btn-dark centroventana border border-primary" value="Enviar">Guardar</button>
                
            </div>
            <div class="col-sm-2">
            <a class="form-control btn btn-dark centroventana border border-primary" href=iniciocandidato.php?ms=ini>Cancelar</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div name="invisible" style="display: none">
            <input type="text" name="estado_civil" value= "<?php echo $estado_civil ?>">
        </div>
    </form>
</div>



