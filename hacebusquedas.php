<!-- Soltero	60	20	Auxiliar en topografía	Agente de Viajes y Turismo -->

<?php

$dni=$_SESSION['id'];
$consulta = "SELECT * FROM `candidatos` WHERE `DNI`='$dni'";
$datosp = cunsultadb($consulta);



SELECT * FROM candidatos JOIN estudios
on candidatos.DNI = estudios.DNI
JOIN carreras ON
carreras.id_carrera= estudios.id_carrera
WHERE id_estadoc='casado' 
and '1979-04-12'<Nacimiento
and Nacimiento<'2010-04-12'
and carreras.tx_carrera='Auxiliar en topografía'
?>