<?php

function creaConnexion()
{
    $servername = "localhost";
    $username = "bot";
    $password = "f4ideEb85YrUIXuU";
    $dbname = "YourJob"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Revisa connection
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
    // para ´ñ y tildes
    $conn->query("SET NAMES 'utf8'");
    return $conn;
}

function cunsultadb($consulta)
{   // para devolver solo una fila de la query
    $conn = creaConnexion();
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
        $conn = creaConnexion();
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
        //retorna 1 o 0 si la query fue exitosa
        $conn = creaConnexion();
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

function EnviarFormulario($tabla,$nombrellave,$valorllave,$retorno,$form)  
    {    
        // si es nueva entrada hace insert
        // si ya existe entrada con esa llave hace update    
        // si falla, queda en la pagina sin retornar para mostrar el error 
        $consulta = sprintf("SELECT `%s` FROM `%s` WHERE `%s` = '%s' ",$nombrellave ,$tabla, $nombrellave ,$valorllave);
        $ExisteEsaentrada = cunsultadb($consulta);
        if ($ExisteEsaentrada == 0)
            {
                echo "inserta <br>";
                $insertar=construyeinsert($form,"$tabla",$nombrellave);
                echo $insertar;
                $resultado = operaciondb($insertar);        
            }
        else
            {           
                echo "actualiza <br>";
                $actualiza=construyeupdate($form,"$tabla",$nombrellave,$valorllave);
                echo $actualiza;
                $resultado = operaciondb($actualiza);
            } ;        
        if ($resultado==1)  {header("location:".$retorno) ; } else{echo'<br> fallo <br>'; };
    }


    function S1Motorcito($tabla,$valor,$texto,$valPrevio)
    {
        // opciones para un select de una sola tabla
        // el valor previo seleccionado esta en $valPrevio
        $conn = creaConnexion();
        $isselected=' ';
        $q="SELECT DISTINCT $valor , $texto FROM $tabla order by $texto";
        $query= $conn -> query ($q);
        while ($valores = mysqli_fetch_array($query )) {
            if($valores[$valor]==$valPrevio){$isselected=' selected ';} else {$isselected=' ';};
            echo '<option'.$isselected.'value="'.$valores[$valor].'">'.$valores[ $texto].'</option>';
        }
    }

    function S2Motorcito($query,$valor,$texto,$valPrevio)
    {
        //opciones para un select formado por una query, puede ser de varias tablas unidas
        $conn = creaConnexion();
        $isselected=' ';
        $q= $conn -> query ($query);
        while ($valores = mysqli_fetch_array($q)) {
            if($valores[$valor]==$valPrevio){$isselected=' selected ';} else {$isselected=' ';};
            echo '<option'.$isselected.'value="'.$valores[$valor].'">'.$valores[ $texto].'</option>';
        }
    }






 ?>