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
$id_estadoc="0";
$id_genero="0";
$d=strtotime("tomorrow");
//---------------------------------
$dni=$_SESSION['id'];
$consulta = "SELECT * FROM `candidatos` WHERE `DNI`='$dni'";
$resultado = cunsultadb($consulta);
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
        $id_genero=$resultado['id_genero'];
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
        $id_estadoc=$resultado['id_estadoc'];
    } 
}
// input
$c1="form-control border border-primary text-center fs-6";
// div class
$c2="p-3 bg-white text-primary text-start text-decoration-underline";
// Label
$c3="font-weight-bo ld fs-6 text-black";


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
        <div class="p-3 mb-2 text-info text-opacity-50 text-center text-decoration-underline"><h1> Datos Personales</h1></div>
    </div>

    <form class="formulario text-star" action="submitformcandidato.php" method="POST">
        <input type="hidden" id="DNI" name="DNI"value="<?=$dni?>">
        <!--sub titulo informacion personal-->
        <div class="row text-dark">
            <div class="<?=$c2?>"><h3> Información personal</h3></div>
        </div>
        <div class="row text-dark">
        <div class="row">
            <div class="col-sm-4">
                <label for="Nombre" class="<?=$c3?>">Nombres:</label><br>
                <input type="text" maxlength="30" lid="Nombre" name="Nombre" required placeholder="Ingresar Nombres" class="<?=$c1?>" value= "<?php echo $Nombre?>" ><br>
            </div>
            <div class="col-sm-4">
                <label for="Apellido" class="<?=$c3?>">Apellidos:</label><br>
                <input type="text"  maxlength="30" lid="Apellido" name="Apellido" required placeholder="Ingresar Apellidos" class="<?=$c1?>" value="<?php echo $Apellido?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="Nacionalidad" class="  fs-6 text-black ">Nacionalidad:</label><br>
                <input type="text" maxlength="30" lid="Nacionalidad" required name="Nacionalidad" placeholder="Ingresar Nacionalidad" class="<?=$c1?>" value="<?php echo $Nacionalidad ?>"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="Nacimiento" class="<?=$c3?>">Fecha Nacimiento:</label><br>
                <input type="date" required lid="Nacimiento" name="Nacimiento" required placeholder="Ingresar Fecha de Nacimiento" class="<?=$c1?>" value="<?php echo $Nacimiento?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="LugarNac" class="<?=$c3?>">Lugar de Nacimiento:</label><br>
                <input type="text" maxlength="30" lid="LugarNac" required name="LugarNac" placeholder="Ingresar Lugar de Nacimiento" class="<?=$c1?>" value="<?php echo $LugarNac?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="id_estadoc" class="<?=$c3?>">Estado Civil:</label><br>                       
                <select required  placeholder="Ingrese E. Civil" name="id_estadoc" id="id_estadoc" class="<?=$c1?>"  >
                <?php S1Motorcito("estado_civil","id_estadoc","txestadoc",$id_estadoc ) ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                            <label for="Hijos" class="<?=$c3?> ">Hijos:</label>
                            <input type="number" min="0" max="22" lid="Hijos" name="Hijos" required placeholder="Ingresar Cantidad de Hijos" class="<?=$c1?>" value="<?php echo $Hijos ?>">
            </div>
            <div class="col-sm-4">
            <label for="id_genero" class= "<?=$c3?>" > Genero: </label><br>
                    <select id="id_genero" name="id_genero" placeholder="Genero" class="<?=$c1?>">
                    <?php S1Motorcito('generos','id_genero','txgenero',$id_genero) ?>
                    </select>
            </div>
    
    
    
        </div>

        <!--Sub titulo de Información de contacto-->
        <div class="row">
            <div class="<?=$c2?>"><h3> Información de contacto</h3></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="Domicilio" class="<?=$c3?> ">Dirección:</label><br>
                <input type="text" lid="Domicilio" maxlength="30" name="Domicilio" required placeholder="Ingresar Dirección" class="<?=$c1?>" value="<?php echo $Domicilio?>"><br> 
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="NumDireccion" class="<?=$c3?> ">N° de Dirección:</label>
                        <input type="number" min="1" max="35000" inputmode="numeric" lid="NumDireccion" name="NumDireccion" placeholder="N° Dirección" class="<?=$c1?>" required value="<?php echo $NumDireccion ?>"> 
                    </div>
                    <div class="col-sm-6">
                        <label for="Postal" class="<?=$c3?>">Código Postal:</label>
                        <input type="number" min="1000" max="4000" inputmode="numeric" lid="Postal" required name="Postal" placeholder="Ingresar Código Postal" class="<?=$c1?>" value="<?php echo $Postal?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="Contacto" class="<?=$c3?> ">N° de Celular:</label><br>
                <input type="text" lid="Contacto" 
                required="" name="Contacto"                 
                class="<?=$c1?>" id="Cont_Tel" name="Cont_Tel" 
                pattern="(?:549)*([0-9]{10})" 
                title="Numero de telefono o celular con codigo de area,sin espacions ni símbolos" 
                oninvalid="setCustomValidity('Ingrese Numero de telefono o celular con codigo de area sin espacions ni símbolos')"
                value="<?=$Contacto?>"/><br>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="Email" class="<?=$c3?> ">Correo Electrónico:</label><br>
                <input type="email" lid="Email" name="Email"  size="100" required placeholder="Correo Electronico" class="<?=$c1?>" value="<?php echo $Email?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="RedSocial1" class="<?=$c3?> ">Red Social Personal 1:</label><br>
                <input type="text"  maxlength="100" lid="RedSocial1" name="RedSocial1" placeholder="Ingresar Red social personal" class="<?=$c1?>" value="<?php echo $RedSocial1 ?>"><br>
            </div>
            <div class="col-sm-4">
                <label for="RedSocial2" class="<?=$c3?> ">Red Social Personal 2:</label><br>
                <input type="text"  maxlength="100" lid="RedSocial2" name="RedSocial2" placeholder="Red social" class="<?=$c1?>" value="<?php echo $RedSocial2 ?>"><br>
            </div>
        </div>

        <!--Sub titulo de Información adicional-->
        <div class="row text-dark">
            <div class="<?=$c2?>"><h3> Información del perfil</h3></div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Licencia" class="<?=$c3?>">Tipo de Licencia:</label><br>
                        <select name="Licencia" id="Licencia" placeholder="Ingrese tipo de licencia" class="<?=$c1?>">
                        <?php S1Motorcito('Candidatos','Licencia','Licencia',$Licencia)?>
                        </select>
                    </div>


                    </div>
                    <div class="col-sm-6">
                        <label for="Movilidad" class="<?=$c3?>" for="Movilidad">Movilidad:</label><br>
                        <select id="Movilidad" name="Movilidad" class="<?=$c1?>" >
                        <?php S1Motorcito('Candidatos','Movilidad','Movilidad',$Movilidad)?>
                        </select><br>  
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <label for="Comentario" class="<?=$c3?> ">Redacte su perfil:</label><br>
                <input type="text"  maxlength="150" lid="Comentario" name="Comentario" placeholder="Ingresar tu motivo" class="<?=$c1?>" value="<?php echo $Comentario ?>"><br> 
            </div>
        </div>

     
        <div class="row p-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
                <button type="submit" class="form-control btn btn-dark border border-primary" value="Enviar">Guardar</button>
                
            </div>
            <div class="col-sm-2">
            <a class="form-control btn btn-dark border border-primary" href="iniciocandidato.php?ms=ini">Cancelar</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </form>
</div>



