<?php
include __DIR__ . '/herramientas.php';

$consulta=sprintf("SELECT * FROM busquedas WHERE idEmpresa='%s' ",$_SESSION['id']);
$busquedas=cunsultadbmultiple($consulta);
if(sizeof($busquedas)==0){
echo "Realize una búsqueda de personal seleccoinando 'Busqueda' en el menú";

}
foreach($busquedas as $busqueda) 
{
    // $busqueda=array_pop($busquedas);

    $EdadMaxima=nacimiento($busqueda['EdadMaxima']);
    $EdadMinima=nacimiento($busqueda['EdadMinima']);
    $id_Carrera=$busqueda['id_Carrera'];
    $Id_puesto=$busqueda['Id_puesto'];
    $consulta=
    "SELECT * from 
    candidatos JOIN estudios on candidatos.DNI = estudios.DNI 
    join experiencia on candidatos.DNI = experiencia.DNI 
    join puestos on puestos.Id_puesto=experiencia.Id_puesto 
    join carreras on Carreras.Id_carrera=estudios.id_Carrera 
    where estudios.id_Carrera ={$id_Carrera}
    or experiencia.id_Puesto ={$Id_puesto}
    or {$EdadMaxima} < Nacimiento 
    or Nacimiento > {$EdadMinima}
    limit 10
    ";

    $candidatosEncontrados=cunsultadbmultiple($consulta);

    if(sizeof($candidatosEncontrados)>0){
        echo "Su busqueda (id{$busqueda['IdBusqueda']}) obtuvo resultados<br>";
        // echo "Su consulta (IdBusqueda".$busqueda['IdBusqueda'].") tuvo resultados<br>";
        $dat=array('Apellido','Nombre','DNI','Contacto','Email','RedSocial1','RedSocial2','Comentario');
        echo"<table>";
        foreach($candidatosEncontrados as $e){
            $i=0;
            foreach($dat as $d){
            if($i==0){echo"<tr>";}   
            echo "<td> <h6 style='display: inline-block'>$d:</h6>  $e[$d]</td>";
            if($i==2){echo"</tr>";} 
            $i=$i+1;
            $i= $i % 3;
        };
        };
        echo"</table>";
    }
    else {echo "   <p align='center'>  Le comunicaremos cuando sus busqueda (id{$busqueda['IdBusqueda']}) obtenga candidatos.<p>";};
    echo"<hr>";
}


?>