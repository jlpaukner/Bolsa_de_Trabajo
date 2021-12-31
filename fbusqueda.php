<?php
require __DIR__ . '/encabezadoe.php';
require_once('./dbcon.php');
//include __DIR__ . '/dbcon.php';
$_SESSION['abierta']="si";
//echo "<br>";
$IdBusqueda=$_POST["IdBusqueda"];
$consulta="SELECT * FROM busquedas 
join carreras on carreras.Id_carrera=busquedas.id_Carrera 
join puestos on puestos.Id_puesto=busquedas.Id_puesto 
join provincias on provincias.idprov =busquedas.idprov 
WHERE `IdBusqueda`='$IdBusqueda";
$fila=cunsultadb($consulta);
$id_Carrera="0";
$Puesto="0";
$idprov="0";
$c1="font-weight-bold text-center fs-4 fst-italic";
$c2="form-control border border-success fst-italic text-center fs-5";
?>

<script>
function validaciones() {
    var x;
    EdadMaxima = document.getElementById("EdadMaxima").value;
    EdadMinima= document.getElementById("EdadMinima").value;
    continua=true;
    if(EdadMinima>EdadMaxima){ continua= false ;   window.alert("Edad maxima debe ser mayor a la Edad minima" ) } 
    return continua;
    };
</script>

<form class="formulario text-center" action="submitformbusqueda.php" method="POST" onsubmit="return validaciones()">
    <input type="hidden" id="IdBusqueda" name="IdBusqueda"value="<?php echo $IdBusqueda?>">
    <input type="hidden" id="IdEmpresa" name="IdEmpresa"value="<?php echo $_SESSION['id']?>">
    <div class="container">
        <!-- Primera Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label for="Id_puesto" class= "<?=$c1?>" > Puesto: </label><br>
                    <select id="Id_puesto" name="Id_puesto" placeholder="Puesto" class="<?=$c2?>">
                    <?php S1Motorcito('puestos','Id_puesto','tx_puesto',$Puesto) ?>
                    </select>
            </div>
            <div class="col-sm-3">
                <label for="id_Carrera" class= "<?=$c1?>"> Titulo adquirido: </label><br>
                    <select id="id_Carrera" name="id_Carrera" placeholder="Titulo" class="<?=$c2?>">
                    <?php S1Motorcito('carreras','id_Carrera','tx_carrera',$id_Carrera) ?>
                    </select>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <!-- Segunda Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">   
                <label for="idprov" class="<?=$c1?>"> Provincia: </label><br>
                        <select id="idprov" name="idprov" placeholder="Provincia" class="<?=$c2?>">
                        <?php S1Motorcito('Provincias','idprov','provincia',$idprov) ?>
                        </select>
            </div>
            <div class="col-sm-3">   
                <label for="idprov" class="<?=$c1?>"> Movilidad Propia: </label><br>
                    <select class="<?=$c2?>" id="movilidad" name="movilidad">
                        <option value="No">No requiere</option>
                        <option value="Si">Requiere movilidad Propia</option>
                      </select>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <!-- Tercera Fiia-->
        <div class="row">
            <div class="col-sm-3"> </div>
            <div class="col-sm-3">            
                <label for="idestadoc" class="<?=$c1?>">Estado Civil:</label><br>                       
                <select required  placeholder="Ingrese E. Civil" name="idestadoc" id="idestadoc" class="<?=$c2?>"  >
                <?php S1Motorcito("estado_civil","idestadoc","txestadoc",$idestadoc ) ?>
                </select> </div>
            <div class="col-sm-3">                 
                <label for="idgenero" class= "<?=$c1?>" > Genero: </label><br>
                <select id="idgenero" name="idgenero" placeholder="Genero" class="<?=$c2?>">
                <?php S1Motorcito('generos','idgenero','txgenero',$idgenero) ?>
                </select></div>
            <div class="col-sm-3"> </div>
        </div>
        <!-- Cuarta Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label class="font-weight-bold  fs-4 fst-italic" for="EdadMinima">Edad Minima:</label><br>
                <select class="<?=$c2?>" id="EdadMinima" name="EdadMinima">
                    <option value="18">sin restricción</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label class="<?=$c1?>" for="EdadMaxima">Edad Maxima:</label><br>
                <select type="number" min="18" max="70" class="<?=$c2?>" id="EdadMaxima" name="EdadMaxima">
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">sin restricción</option>
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
                        <input  type="submit" value="Enviar" onClick="return validaciones()" class="form-control btn btn-dark border border-success fst-italic" >
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



