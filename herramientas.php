<?php

function edad($nacimiento)
{ 
    // con una fecha nacimiento, retorna edad
    $edad = date_diff(date_create($nacimiento), date_create() );
    return $edad->format("%y");
};

function nacimiento($years)
{ 
    // con una edad, retorna una fecha de nacimiento
    $time = strtotime("-".$years." year", time());
    $date = date("Y-m-d", $time); 
    return $date;
}


?>

