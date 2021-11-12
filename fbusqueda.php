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

// var_dump($ocupaciones);
if ($IdBusqueda=="0"){
echo"<h1> Nueva busqueda</h1><br>";
}
else{
    echo"<h1> Busqueda activa</h1><br>";
};


?>

<h2> Busco un contratar alguien que tenga...</h2>
<form class="formulario" action="submitformbusqueda.php" method="POST">
    <input type="hidden" id="IdBusqueda" name="IdBusqueda"value="<?php echo $IdBusqueda?>"> 
    <label for="EstadoCivil">Estado Civil:</label><br>
    <select id="EstadoCivil" name="EstadoCivil">
        <option value="Soltero">Soltero</option>
        <option value="Casado">Casado</option>
        <option value="Sin Restriccion">Sin Restriccion</option>
    </select><br>
    <!-- <label for="Localidad">Localidad:</label><br>
    <select id="Localidad" name="Localidad">
        <option value="CABA">CABA</option>
        <option value="Cordoba">Cordoba</option>
        <option value="Bariloche">Bariloche</option>
    </select><br> -->
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
    <label for="Carreras">Experiencia en:</label><br>
    <select list="Carreras" name="Carreras[]">
    <!-- <select list="Carreras" name="Carreras[]" required multiple size="3"> -->
        <?php
            printf('<option value="%s">%s</option>',"No requiere experencia","No requiere experencia");
            echo '<option disabled="disabled">———————————————————————</option>';
            foreach($ocupaciones as $ocupacion){
            printf('<option value="%s">%s</option>',$ocupacion["tx_puesto"],$ocupacion["tx_puesto"]);
         };                
        ?>
    </select><br>
    <label for="Titulos">Titulos:</label><br>
    <select list="titulos" name="titulos">
    <!-- <select list="Carreras" name="Carreras[]" required multiple size="3"> -->
        <?php
            printf('<option value="%s">%s</option>',"No requiere estudios","No requiere estudios");
            echo '<option disabled="disabled">———————————————————————</option>';
            foreach($titulos as $titulo){
            printf('<option value="%s">%s</option>',$titulo["tx_carrera"],$titulo["tx_carrera"]);
         };                
        ?>
    </select><br>



    <input type="submit" value="Enviar">
    <a class="btn btn-warning" href="busquedas.php">Cancelar</a>
</form> 



