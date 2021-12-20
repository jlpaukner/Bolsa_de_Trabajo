<?php
require __DIR__ . '/encabezadoe.php';
require_once('./dbcon.php');
//include __DIR__ . '/dbcon.php';
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
//para cambiar el texto seleccionado en el formulario por su valor real (id por ejemplo) a ser insertado en la db
    function reemplaza(nomDB,nomDatalist){
        var campo=document.getElementById(nomDB);
            var data='';
            const dataList = document.getElementById(nomDatalist);
            const textInput = campo.value;
            var data='';
            for (let i = 0; i < dataList.options.length; i++) {
                if (dataList.options[i].value === textInput) {
                    data=dataList.options[i].getAttribute("data");
                    }
                    }
        campo.value=data;
    };
    function IDS(){
        reemplaza("id_Carrera","estudios");
        reemplaza("Id_puesto","puestos");
        reemplaza("Cd_Prov","lprov");    
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
                <label for="idprov" class="font-weight-bold  fs-4 fst-italic">Provincia:</label>
                <input type="list" required  placeholder="Ingrese provincia " class="form-control border border-success fst-italic text-center  fs-5" list="lprov" id="Cd_Prov" name="Cd_Prov" >
                    <datalist id="lprov">
                        <?php                    
                             $consulta=sprintf("SELECT DISTINCT `idprov`,`provincia` FROM `cod_postal_prov` order by idprov ");
                            $opciones=cunsultadbmultiple($consulta);
                            // printf( '<option data="%s" value="%s">','0' ,'No requiere');
                            // echo '<option disabled="disabled">———————————————————————</option>';
                            foreach($opciones as $op){
                            printf( '<option data="%s" value="%s">',$op["idprov"] ,$op["provincia"]);
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
            <div class="col-sm-3">
                <label class="font-weight-bold  fs-4 fst-italic" for="Genero">Genero:</label><br>
                <select class="form-control border border-success fst-italic text-center  fs-5" id="Genero" name="Genero">
                    <option value="0">No Aplica</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label class="font-weight-bold  fs-4 fst-italic" for="">Estado Civil::</label><br>
                    <select class="form-control border border-success fst-italic text-center  fs-5" id="EstadoCivil" name="EstadoCivil">
                        <option value="0"> No Aplica </option>
                        <option value="1">Casada/o</option>
                        <option value="2">En Concuvinato</option>
                        <option value="3">Divorciada/o</option>
                        <option value="4">Separada/o</option>
                        <option value="5">Soltera/o</option>
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



