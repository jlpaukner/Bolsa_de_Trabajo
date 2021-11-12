<?php
function cunsultadb($consulta)
    {   // para devolver solo una fila 
        $servername = "localhost";
        $username = "bot";
        $password = "f4ideEb85YrUIXuU";
        $dbname = "bolsatrabajo"; 
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
        $dbname = "bolsatrabajo"; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Revisa connection
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
        // para ´ñ y tildes
        $conn->query("SET NAMES 'utf8'");
        // Realiza query
        $resultado = $conn->query($consulta);
        $arrayRes=array();
        // var_dump($resultado);
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
        $dbname = "bolsatrabajo"; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Revisa connection
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
        // para ´ñ y tildes
        $conn->query("SET NAMES 'utf8'");
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
            echo $conn->error;
        }     
        return $retorna;
    }

    function construyeinsert($columnas,$tabla,$llave = "poner nombre de columna llave si se necesita nuevo registro")
    {   // construye query para insertar datos
        // se necesita nombre de la llave para autoasignar
        if ( array_key_exists( $llave, $columnas) ){
            unset($columnas[$llave]);
        }            
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



 ?>