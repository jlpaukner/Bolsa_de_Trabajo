<?php
$servername = "localhost";
$username = "bot";
$password = "f4ideEb85YrUIXuU";
$dbname = "bolsatrabajofinal"; 
$conn = new mysqli($servername, $username, $password, $dbname);
$mysqli = new mysqli($servername, $username, $password, $dbname);
function cunsultadb($consulta)
{   // para devolver solo una fila 
    $servername = "localhost";
    $username = "bot";
    $password = "f4ideEb85YrUIXuU";
    $dbname = "bolsatrabajofinal"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Revisa connection
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
    // para ´ñ y tildes
    $conn->query("SET NAMES 'utf8'");
    // Realiza query
    $resultado = $conn->query($consulta);
    $respfila="0";
    if (!empty($resultado))
    {
        while($fila = $resultado->fetch_assoc()) 
        {
            $respfila=$fila;
        }
    } 
    return $respfila;
}


    function cunsultadbmultiple($consulta)
    {   // para devolver varias filas 
        $servername = "localhost";
        $username = "bot";
        $password = "f4ideEb85YrUIXuU";
        $dbname = "bolsatrabajofinal"; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Revisa connection
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
        // para ´ñ y tildes
        $conn->query("SET NAMES 'utf8'");
        // Realiza query
        $resultado = $conn->query($consulta);
        $arrayRes=array();
        if($resultado){
        while($fila = $resultado->fetch_assoc()) 
        {
            array_push($arrayRes,$fila);
        };
        };
        return $arrayRes;
    }


 function operaciondb($inserta)
    { 
        
        $servername = "localhost";
        $username = "bot";
        $password = "f4ideEb85YrUIXuU";
        $dbname = "bolsatrabajofinal"; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Revisa connection
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
        // para ´ñ y tildes
        $conn->query("SET NAMES 'utf8'");
        //quita burocracia respoecto forenign keys in db       
        $conn->query("SET FOREIGN_KEY_CHECKS=0;SET GLOBAL FOREIGN_KEY_CHECKS=0");
        // Realiza query
        $resultado = $conn->query($inserta);
        if ($resultado === TRUE)
        {
            $retorna = "1";
        } 
        else
        {
            $retorna = "0";
            echo"<br> fallo la query<br>";
            echo $inserta;
            // muestra el error que sale en la query de phph myadmin
            echo $conn->error;
        }     
        return $retorna;
    }

    function construyeinsert($columnas,$tabla,$nombrellave)
    {   // construye query para insertar datos
        if ( array_key_exists( $nombrellave, $columnas) ){unset($columnas[$nombrellave]);};  //para autoasignar valor de llave       
        $q1="INSERT INTO `".$tabla."` (";
        $q2=" VALUES (";
        foreach(array_keys($columnas) as $campo){
        $q1=$q1."`".$campo."`,";
        $q2=$q2."'".$columnas[$campo]."'," ;
        }
        $q1=substr($q1, 0, -1).")";
        $q2=substr($q2, 0, -1).")";
        $insertar=$q1.$q2;
        return $insertar;
    }
    
    function construyeupdate($columnas,$tabla,$nombrellave,$valorllave)
    {   // construye query para actualizar datos   
        unset($columnas[$nombrellave]); //no se actualiza la llave del update  
        $q1="UPDATE {$tabla} SET ";
        $q2="";
        foreach(array_keys($columnas) as $campo)
            { $q2=$q2."{$campo} = '{$columnas[$campo]}',";};
        $q2=substr($q2, 0, -1);
        $q3= " WHERE {$nombrellave} = {$valorllave} ";
        $actualizar=$q1.$q2.$q3;
        return $actualizar;
    }

 ?>