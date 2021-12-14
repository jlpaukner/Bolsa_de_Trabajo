<?php
require __DIR__ . '/encabezadoe.php';
include __DIR__ . '/dbcon.php';
$_SESSION['abierta']="si";
//echo "<br>";
$IdBusqueda=$_POST["IdBusqueda"];
$consulta=sprintf("SELECT * FROM `busquedas` WHERE `IdBusqueda`='%s' ",$IdBusqueda);
$fila=cunsultadb($consulta);
$consulta=sprintf("SELECT `tx_puesto`FROM `puestos`");
$ocupaciones=cunsultadbmultiple($consulta);
$consulta=sprintf("SELECT `tx_carrera`FROM `carreras`");
$titulos=cunsultadbmultiple($consulta);
$id_Carrera="";
$Puesto="";

if ($IdBusqueda=="0"){
//echo"<h1> Nueva busqueda</h1>";
}
else{
    //echo"<h1> Busqueda activa</h1><";
};
?>
       
<script> 
    function IDS(){
    var estudio=document.getElementById("id_Carrera");
    var data='';
    const dataList = document.getElementById("estudios");
    const textInput = estudio.value;
    var data='';
    for (let i = 0; i < dataList.options.length; i++) {
        if (dataList.options[i].value === textInput) {
            data=dataList.options[i].getAttribute("data");
            }
            }
    estudio.value=data;
    var puesto=document.getElementById("Id_puesto");
    var data='';
    const dataList2 = document.getElementById("puestos");
    const textInput2 = puesto.value;
    var data='';
    for (let i = 0; i < dataList2.options.length; i++) {
        if (dataList2.options[i].value === textInput2) {
            data=dataList2.options[i].getAttribute("data");
            }
            }
            puesto.value=data;
    }
</script>

<form class="formulario text-center" action="submitformbusqueda.php" method="POST" onsubmit="IDS()">
    <input type="hidden" id="IdBusqueda" name="IdBusqueda"value="<?php echo $IdBusqueda?>">
    <input type="hidden" id="IdEmpresa" name="IdEmpresa"value="<?php echo $_SESSION['id']?>">
    <div class="container">
        <!-- Primera Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label for="Id_puesto" class="font-weight-bold  fs-4 fst-italic">Puesto:</label>
                <input type="list" required  placeholder="Ingrese puesto " class="form-control border border-success fst-italic text-center  fs-5" list="puestos" id="Id_puesto" name="Id_puesto" placeholder="<?php echo $Puesto?>">
                    <datalist id="puestos">
                        <?php                    
                            $consulta=sprintf("SELECT `Id_puesto`,`tx_puesto` FROM `puestos`");
                            $puestos=cunsultadbmultiple($consulta);
                            // printf( '<option data="%s" value="%s">','0' ,'No requiere');
                            // echo '<option disabled="disabled">———————————————————————</option>';
                            foreach($puestos as $puesto){
                            printf( '<option data="%s" value="%s">',$puesto["Id_puesto"] ,$puesto["tx_puesto"]);
                        };                
                        ?>
                    </datalist>
            </div>
            <div class="col-sm-3">
                <label for="id_Carrera" class="font-weight-bold text-center fs-4 fst-italic">Titulo adquirido:</label>
                <input type="list" required  placeholder="Ingrese estudio" class="form-control border border-success fst-italic text-center  fs-5" list="estudios" id="id_Carrera" name="id_Carrera" placeholder="<?php echo $id_Carrera?>">
                    <datalist id="estudios">
                        <?php                    
                            $consulta=sprintf("SELECT `id_carrera`,`tx_carrera`,`tipo_Carrera`,`nivel` FROM `carreras`");
                            $titulos=cunsultadbmultiple($consulta);
                            // printf( '<option data="%s" value="%s">','0' ,'No requiere');
                            // echo '<option disabled="disabled">———————————————————————</option>';
                            // echo var_dump($titulos); 
                            foreach($titulos as $titulo){
                            printf( '<option data="%s" value="%s">',$titulo["id_carrera"] ,$titulo["tx_carrera"].'  (Tipo: '.$titulo["tipo_Carrera"].' Nivel: '.$titulo["nivel"].')');
                        };                
                        ?>
                    </datalist>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <!-- Segunda Fiia-->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label for="" class="font-weight-bold  fs-4 fst-italic">Provincia:</label>
                <input type="list" required  placeholder="Ingrese Provincia" class="form-control border border-success fst-italic text-center  fs-5" list="" id="" name="" >
                    <datalist id="">
                        <?php 
                                         
                            $consulta=sprintf("SELECT `Id_puesto`,`tx_puesto` FROM `puestos`");
                            $puestos=cunsultadbmultiple($consulta);
                            foreach($puestos as $puesto){
                            printf( '<option data="%s" value="%s">',$puesto["Id_puesto"] ,$puesto["tx_puesto"]);
                        };              
                        ?>
                    </datalist>
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
                <label class="font-weight-bold  fs-4 fst-italic" for="">Genero:</label><br>
                    <select class="form-control border border-success fst-italic text-center  fs-5" id="" name="">
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
                <select class="form-control border border-success fst-italic text-center  fs-5" id="EdadMinima" name="EdadMinima">
                    <option value="18">sin restricción</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label class="font-weight-bold  fs-4 fst-italic" for="EdadMaxima">Edad Maxima:</label><br>
                <select type="number" min="18" max="70" class="form-control border border-success fst-italic text-center  fs-5" id="EdadMaxima" name="EdadMaxima">
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
                        <input class=" form-control btn btn-dark centroventana border border-success fst-italic " type="submit" value="Enviar">
                    </div>
                    <div class="col-sm-6">
                        <a class=" form-control btn btn-dark centroventana border border-success fst-italic" href="busquedas.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div><br>
</form> 



