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
       
<form class="formulario text-center" action="submitformbusqueda.php" method="POST" >
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
            <!-- <div class="col-sm-3">
                <label class="font-weight-bold  fs-4 fst-italic" for="EstadoCivil">Idioma:</label><br>
                    <select class="form-control border border-success fst-italic text-center  fs-5" id="" name="">
                        <option value="Español">Español</option>
                        <option value="Ingles">Ingles</option>
                        <option value="Portugues">Portugues</option>
                        <option value="Italiano">Italiano</option>
                        <option value="Frances">Frances</option>
                        <option value="Español_Ingles">Español y Ingles</option>
                        <option value="Portugues_Ingles">Portugues y Ingles</option>
                        <option value="Frances_Ingles">Frances y Ingles</option>
                        <option value="Italiano_Ingles">Italiano y Ingles</option>
                        <option value="Varios">Varios</option>
                    </select>
            </div> -->
            <div class="col-sm-3"></div>
        </div>
        <!-- Tercera Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <!-- <div class="col-sm-3">
                <label class="font-weight-bold  fs-4 fst-italic" for="EstadoCivil">Estado Civil:</label><br>
                <select class="form-control border border-success fst-italic text-center  fs-5" id="EstadoCivil" name="EstadoCivil">
                    <option value="Soltero">Soltero/a</option>
                    <option value="Casado">Casado/a</option>
                    <option value="Concuvino">Concuvino/a</option>
                    <option value="Sin Restriccion">Sin Restriccion</option>
                </select>
            </div> -->
            <div class="col-sm-3">
                <label class="<?=$c1?>" for="">Genero:</label><br>
                    <select class="<?=$c2?>" id="" name="">
                        <option value="Ambos">Ambos</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Hombre">Hombre</option>
                    </select>
            </div>
            <div class="col-sm-3"></div>
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
                        <input  type="submit" value="Enviar" class="form-control btn btn-dark border border-success fst-italic">
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



