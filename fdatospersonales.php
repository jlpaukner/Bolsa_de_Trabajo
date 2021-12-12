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
        <div class="p-3 mb-2  text-info  text-opacity-50 text-center   text-decoration-underline"><h1> Datos Personales</h1></div>
    </div>

    <form class="formulario text-star" action="submitformcandidato.php" method="POST">
        <!--sub titulo informacion personal-->
        <div class="row text-dark">
            <div class="p-3 bg-white text-primary text-start   text-decoration-underline"><h3> Información personal</h3></div>
        </div>
        <div class="row text-dark">
        <div class="row">
            <div class="col-sm-4">
                <label for="Nombre" class="font-weight-bold  fs-6 text-black">Nombres:</label><br>
                <input type="text" maxlength="30" lid="Nombre" name="Nombre" required placeholder="Ingresar Nombres" class="form-control border border-primary text-center    fs-6" value= "<?php echo $Nombre?>" ><br>
            </div>
            <div class="col-sm-4">
                <label for="Apellido" class="font-weight-bold  fs-6 text-black">Apellidos:</label><br>
                <input type="text"  maxlength="30" lid="Apellido" name="Apellido" required placeholder="Ingresar Apellidos" class="form-control border border-primary text-center    fs-6" value="<?php echo $Apellido?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="Nacionalidad" class="  fs-6 text-black ">Nacionalidad:</label><br>
                <input type="text" maxlength="30" lid="Nacionalidad" required name="Nacionalidad" placeholder="Ingresar Nacionalidad" class="form-control border border-primary text-center   fs-6" value="<?php echo $Nacionalidad ?>"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="Nacimiento" class="font-weight-bold  fs-6 text-black ">Fecha Nacimiento:</label><br>
                <input type="date" required lid="Nacimiento" name="Nacimiento" required placeholder="Ingresar Fecha de Nacimiento" class="form-control border border-primary text-center    fs-6" value="<?php echo $Nacimiento?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="LugarNac" class="font-weight-bold  fs-6 text-black">Lugar de Nacimiento:</label><br>
                <input type="text" maxlength="30" lid="LugarNac" required name="LugarNac" placeholder="Ingresar Lugar de Nacimiento" class="form-control border border-primary text-center    fs-6" value="<?php echo $LugarNac?>"><br>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="estado_civil" class="  fs-6 text-black ">Estado Civil:</label><br>
                            <!-- <input type="text"  lid="Estado" name="Estado" placeholder="Ingresar E. Civil" class="form-control border border-primary text-center    fs-6" value="<php// echo $Estado?>"> -->
                        <select  maxlength="30" class="form-control border border-primary text-center    fs-6" required placeholder="Ingrese E. Civil" name="estado_civil" id="estado_civil" value="<?php echo $estado_civil?>"  >
                        <option value="<?php echo $estado_civil?>"> No informado</option>
                        <option value="Casado">Casado</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Divorciado">Concuvinato</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="Hijos" class="font-weight-bold  fs-6 text-black ">Hijos:</label>
                        <input type="number" min="0" max="22" lid="Hijos" name="Hijos" required placeholder="Ingresar Cantidad de Hijos" class="form-control border border-primary text-center    fs-6" value="<?php echo $Hijos ?>">
                    </div>
                </div>
            </div>
        </div>

        <!--Sub titulo de Información de contacto-->
        <div class="row">
            <div class="p-3 bg-white text-primary text-start   text-decoration-underline"><h3> Información de contacto</h3></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="Domicilio" class="font-weight-bold  fs-6 text-black ">Dirección:</label><br>
                <input type="text" lid="Domicilio" maxlength="30" name="Domicilio" required placeholder="Ingresar Dirección" class="form-control border border-primary text-center    fs-6" value="<?php echo $Domicilio?>"><br> 
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="NumDireccion" class="font-weight-bold fs-6 text-black ">N° de Dirección:</label>
                        <input type="number" min="1" max="35000" inputmode="numeric" lid="NumDireccion" name="NumDireccion" placeholder="N° Dirección" class="form-control border border-primary text-center    fs-6" required value="<?php echo $NumDireccion ?>"> 
                    </div>
                    <div class="col-sm-6">
                        <label for="Postal" class="font-weight-bold fs-6 text-black">Código Postal:</label>
                        <input type="number" min="1000" max="4000" inputmode="numeric" lid="Postal" required name="Postal" placeholder="Ingresar Código Postal" class="form-control border border-primary text-center    fs-6" value="<?php echo $Postal?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="Contacto" class="font-weight-bold  fs-6 text-black ">N° de Celular:</label><br>
                <input type="number" min="1100000000" max="1599999999"lid="Contacto" required name="Contacto" placeholder="Ingresar N° de Teléfono" class="form-control border border-primary text-center  fs-6" pattern="[0-9\(\)\+\-]+" title="numero de telefono" value="<?php echo $Contacto?>"><br> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="Email" class="font-weight-bold  fs-6 text-black ">Correo Electrónico:</label><br>
                <input type="email" lid="Email" name="Email"  size="100" required placeholder="Correo Electronico" class="form-control border border-primary text-center    fs-6" value="<?php echo $Email?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="RedSocial1" class="font-weight-bold fs-6 text-black ">Red Social Personal 1:</label><br>
                <input type="text"  maxlength="100" lid="RedSocial1" name="RedSocial1" placeholder="Ingresar Red social personal" class="form-control border border-primary text-center    fs-6" value="<?php echo $RedSocial1 ?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="RedSocial2" class="font-weight-bold  fs-6 text-black ">Red Social Personal 2:</label><br>
                <input type="text"  maxlength="100" lid="RedSocial2" name="RedSocial2" placeholder="Red social" class="form-control border border-primary text-center    fs-6" value="<?php echo $RedSocial2 ?>"><br>
            </div>
        </div>

        <!--Sub titulo de Información adicional-->
        <div class="row text-dark">
            <div class="p-3 bg-white text-primary text-start   text-decoration-underline"><h3> Información del perfil</h3></div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Licencia" class="  fs-6 text-black ">Tipo de Licencia:</label><br>
                        <select  class="form-control border border-primary text-center fs-6" required placeholder="Ingrese tipo de licencia" name="Licencia" id="Licencia" value="<?php echo $Licencia ?>"  >
                        <option value="A">Clase A</option>
                        <option value="B">Clase B</option>
                        <option value="C">Clase C</option>
                        <option value="D">Clase D</option>
                        <option value="E">Clase E</option>
                        <option value="F">Clase F</option>
                        </select>
                    </div>


                    </div>
                    <div class="col-sm-6">
                        <label for="Movilidad"  maxlength="30" class="font-weight-bold  fs-6 text-black"for="Movilidad">Movilidad:</label><br>
                        <select class="form-control border border-primary text-center    fs-6" id="Movilidad" name="Movilidad" >
                                    value="<?php echo $Movilidad ?>""
                            <option value="No informado">No informado</option>
                            <option value="Automovil">Automovil</option>
                            <option value="Motocicleta">Motocicleta</option>
                            <option value="Ninguna">Ninguna</option>
                        </select><br>  
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <label for="Comentario" class="font-weight-bold  fs-6 text-black ">Redacte su perfil:</label><br>
                <input type="text"  maxlength="150" lid="Comentario" name="Comentario" placeholder="Ingresar tu motivo" class="form-control border border-primary text-center    fs-6" value="<?php echo $Comentario ?>"><br> 
            </div>
        </div>

     
        <div class="row p-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
                <button type="submit" class="form-control btn btn-dark centroventana border border-primary" value="Enviar">Guardar</button>
                
            </div>
            <div class="col-sm-2">
            <a class="form-control btn btn-dark centroventana border border-primary" href="iniciocandidato.php?ms=ini">Cancelar</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <!--div name="invisible" style="display: none">
            <input type="text" name="estado_civil" value= "<php echo $estado_civil ?>">
        </!--div-->
    </form>
</div>



