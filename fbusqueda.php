<?php
require __DIR__ . '/encabezadoe.php';
include __DIR__ . '/dbcon.php';
$_SESSION['abierta']="si";
echo "<br>";
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
echo"<h1> Nueva busqueda</h1><br>";
}
else{
    echo"<h1> Busqueda activa</h1><br>";
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




<h2> Busco un contratar alguien que tenga...</h2>
<form class="formulario" action="submitformbusqueda.php" method="POST" onsubmit="IDS()">
    <input type="hidden" id="IdBusqueda" name="IdBusqueda"value="<?php echo $IdBusqueda?>"> 
    <label for="EstadoCivil">Estado Civil:</label><br>
    <select id="EstadoCivil" name="EstadoCivil">
        <option value="Soltero">Soltero</option>
        <option value="Casado">Casado</option>
        <option value="Sin Restriccion">Sin Restriccion</option>
    </select><br>
    <label for="EdadMinima">Edad Minima:</label><br>
    <select id="EdadMinima" name="EdadMinima">
        <option value="0">sin restricción</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
        <option value="60">60</option>
    </select><br>
    <label for="EdadMaxima">Edad Maxima:</label><br>
    <select id="EdadMaxima" name="EdadMaxima">
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
        <option value="60">60</option>
        <option value="120">sin restricción</option>
    </select><br>
    
    <div class="row">
        <label for="Id_puesto" class="font-weight-bold fs-4 fst-italic">Identificacion del puesto:</label><br>
                <input type="list" required  placeholder="Ingrese el puesto ejercido" class="form-control border border-primary fst-italic text-center  fs-5" list="puestos" id="Id_puesto" name="Id_puesto" placeholder="<?php echo $Puesto?>"><br>
                <datalist id="puestos">
                    <?php                    
                        $consulta=sprintf("SELECT `Id_puesto`,`tx_puesto` FROM `puestos`");
                        $puestos=cunsultadbmultiple($consulta);
                        printf('<option value="%s">%s</option>',"No requiere experiencia","No requiere experiencia");
                        echo '<option disabled="disabled">———————————————————————</option>';
                        foreach($puestos as $puesto){
                        printf( '<option data="%s" value="%s">',$puesto["Id_puesto"] ,$puesto["tx_puesto"]);
                    };                
                    ?>
                </datalist>
            </div>  

    <div class="row">
        <label for="id_Carrera" class="font-weight-bold fs-4 fst-italic">Titulo adquirido:</label><br>
        <input type="list" required  placeholder="Ingrese estudio" class="form-control border border-primary fst-italic text-center  fs-5" list="estudios" id="id_Carrera" name="id_Carrera" placeholder="<?php echo $id_Carrera?>"><br>
        <datalist id="estudios">
            <?php                    
                $consulta=sprintf("SELECT `id_carrera`,`tx_carrera`,`tipo_Carrera`,`nivel` FROM `carreras`");
                $titulos=cunsultadbmultiple($consulta);
                printf('<option value="%s">%s</option>',"No requiere estudios","No requiere estudios");
                echo '<option disabled="disabled">———————————————————————</option>';
                echo var_dump($titulos); 
                foreach($titulos as $titulo){
                printf( '<option data="%s" value="%s">',$titulo["id_carrera"] ,$titulo["tx_carrera"].'  (Tipo: '.$titulo["tipo_Carrera"].' Nivel: '.$titulo["nivel"].')');
            };                
            ?>
        </datalist>
</div>

    <input type="submit" value="Enviar">
    <a class="btn btn-warning" href="busquedas.php">Cancelar</a>
</form> 



