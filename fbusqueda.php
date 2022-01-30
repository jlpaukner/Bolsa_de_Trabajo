<?php
require __DIR__ . '/encabezadoe.php';
require_once('./dbcon.php');
$_SESSION['abierta']="si";
$id_busqueda=$_POST["id_busqueda"];
$consulta="SELECT * FROM busquedas 
join carreras on carreras.id_carrera=busquedas.id_carrera 
join puestos on puestos.id_puesto=busquedas.id_puesto 
join provincias on provincias.id_prov =busquedas.id_prov 
WHERE `id_busqueda`='$id_busqueda'";
$busqueda=cunsultadb($consulta);
$nuevabusqueda = $busqueda=="0";
if($nuevabusqueda){
    $id_carrera="0";
    $id_puesto="0";
    $id_prov="0"; 
    $EdadMinima="18";   
    $EdadMaxima=70 ; 
    $Movilidad="no"; 
    $id_estadoc="0";
    $id_genero="0";            
}
else
{
    $id_carrera=$busqueda['id_carrera'];
    $id_puesto=$busqueda['id_puesto'];
    $id_prov=$busqueda['id_prov'];
    $EdadMinima=$busqueda['EdadMinima'];   
    $EdadMaxima=$busqueda['EdadMaxima'];
    $Movilidad=$busqueda['movilidad'];  
    $id_estadoc=$busqueda['id_estadoc'];
    $id_genero=$busqueda['id_genero'];         
}

$c1="font-weight-bold text-center fs-4 fst-italic";
$c2="form-control border border-success fst-italic text-center fs-5";
?>

<script>
function validaciones() {
    EdadMaxima = document.getElementById("EdadMaxima").value;
    EdadMinima= document.getElementById("EdadMinima").value;
    continua=true;
    if(EdadMinima>EdadMaxima){ continua= false ;   window.alert("Edad maxima debe ser mayor a la Edad minima" ) } 
    return continua;
    };
</script>

<form class="formulario text-center" action="submitformbusqueda.php" method="POST" onsubmit="return validaciones()">
    <input type="hidden" id="id_busqueda" name="id_busqueda"value="<?php echo $id_busqueda?>">
    <input type="hidden" id="id_empresa" name="id_empresa"value="<?php echo $_SESSION['id']?>">
    <div class="container">
        <!-- Primera Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label for="id_puesto" class= "<?=$c1?>" > Puesto: </label><br>
                    <select id="id_puesto" name="id_puesto" placeholder="Puesto" class="<?=$c2?>">
                    <?php S1Motorcito('puestos','id_puesto','tx_puesto',$Puesto) ?>
                    </select>
            </div>
            <div class="col-sm-3">
                <label for="id_carrera" class= "<?=$c1?>"> Titulo adquirido: </label><br>
                    <select id="id_carrera" name="id_carrera" placeholder="Titulo" class="<?=$c2?>">
                    <?php S1Motorcito('carreras','id_carrera','tx_carrera',$id_carrera) ?>
                    </select>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <!-- Segunda Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">   
                <label for="id_prov" class="<?=$c1?>"> Provincia: </label><br>
                        <select id="id_prov" name="id_prov" placeholder="Provincia" class="<?=$c2?>">
                        <?php S1Motorcito('Provincias','id_prov','provincia',$id_prov) ?>
                        </select>
            </div>
            <div class="col-sm-3">   
                <label for="id_prov" class="<?=$c1?>"> Movilidad Propia: </label><br>
                    <select class="<?=$c2?>" id="movilidad" name="movilidad">
                    <?php
                    $opciones= ["Requiere movilidad provia" => "si","No requiere" => "no"];
                    foreach($opciones as $opk => $opv)  {
                    if ($opv == $Movilidad){$sel="selected";} else{$sel="";}
                    ?>
                <option <?=$sel?> value= "<?=$opv?>"> <?=$opk?> </option>
                <?php
                }
                ?>
                    </select>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <!-- Tercera Fiia-->
        <div class="row">
            <div class="col-sm-3"> </div>
            <div class="col-sm-3">            
                <label for="id_estadoc" class="<?=$c1?>">Estado Civil:</label><br>                       
                <select required  placeholder="Ingrese E. Civil" name="id_estadoc" id="id_estadoc" class="<?=$c2?>"  >
                <?php S1Motorcito("estado_civil","id_estadoc","txestadoc",$id_estadoc ) ?>
                </select> </div>
            <div class="col-sm-3">                 
                <label for="id_genero" class= "<?=$c1?>" > Genero: </label><br>
                <select id="id_genero" name="id_genero" placeholder="Genero" class="<?=$c2?>">
                <?php S1Motorcito('generos','id_genero','txgenero',$id_genero) ?>
                </select></div>
            <div class="col-sm-3"> </div>
        </div>
        <!-- Cuarta Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label class="font-weight-bold  fs-4 fst-italic" for="EdadMinima">Edad Minima:</label><br>
                <select class="<?=$c2?>" id="EdadMinima" name="EdadMinima">
                <?php
                $opciones= ["sin restricción" => 18, "20" => 20, "30" => 30,"40" => 40,"50" => 50,"60" => 60];
                foreach($opciones as $opk => $opv)  {
                if ($opv == $EdadMinima){$sel="selected";} else{$sel="";}
                ?>
                <option <?=$sel?> value= "<?=$opv?>"> <?=$opk?> </option>
                <?php
                }
                ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label class="<?=$c1?>" for="EdadMaxima">Edad Maxima:</label><br>
                <select type="number" min="18" max="70" class="<?=$c2?>" id="EdadMaxima" name="EdadMaxima">
                <?php
                $opciones= [ "20" => 20, "30" => 30,"40" => 40,"50" => 50,"60" => 60,"sin restricción" => 70];
                foreach($opciones as $opk => $opv)  {
                if ($opv == $EdadMaxima){$sel="selected";} else{$sel="";}
                ?>
                <option <?=$sel?> value= "<?=$opv?>"> <?=$opk?> </option>
                <?php
                }
                ?>
                </select>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div><br>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <input  type="submit" value="Enviar" onClick="return validaciones()" 
                        class="form-control btn btn-dark border border-success fst-italic" >
                    </div>
                    <div class="col-sm-6">
                        <a  href="busquedas.php" class=" form-control btn btn-dark border border-success fst-italic">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div><br>
</form> 



