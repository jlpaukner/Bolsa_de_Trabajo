<?php
include __DIR__ . '/herramientas.php';
// session_start();
$consulta=sprintf("SELECT * FROM busquedas WHERE idEmpresa='%s' ",$_SESSION['id']);
$busquedas=cunsultadbmultiple($consulta);
$busqueda=array_pop($busquedas);
// var_dump($busqueda);
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
and experiencia.id_Puesto ={$Id_puesto}
and {$EdadMaxima} < Nacimiento 
and Nacimiento > {$EdadMinima}
";
// echo $consulta;
$candidatosEncontrados=cunsultadbmultiple($consulta);
// echo $consulta;
// var_dump($candidatosEncontrados);
if(sizeof($candidatosEncontrados)>0){
    echo "Su busqueda obtuvo resultados<br>";
    // echo "Su consulta (IdBusqueda".$busqueda['IdBusqueda'].") tuvo resultados<br>";
    $dat=array('DNI','Apellido','Nombre','Comentario','Contacto','Email','Licencia','LugarNac','Movilidad','Nacimiento','Nacionalidad','NumDireccion','Postal','RedSocial1','RedSocial2','estado_civil','Institucion','tx_carrera','Empresa','tx_puesto');
    foreach($candidatosEncontrados as $e){
        $i=0;
          foreach($dat as $d){
           $i=$i+1;
           $i= $i % 3;
           echo "<div style='display: inline;width:250px;'><h6 style='display: inline;padding-left: 2cm;'>$d:</h6>  $e[$d]</div>";
           if($i==0){echo"<br>";}
       };
    };
}
else {echo "le comunicaremos cuando la busqueda obtenga un candidato";};

?>