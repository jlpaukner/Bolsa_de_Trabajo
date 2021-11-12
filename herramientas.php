<?php

function edad($nacimiento)
{ 
    // $fechahoy = date_create();    
    $edad = date_diff(date_create($nacimiento), date_create() );
    return $edad->format("%y");
};

function nacimiento($years)
{ 
    // $fechahoy = date_create();    
    $time = strtotime("-".$years." year", time());
    $date = date("Y-m-d", $time); 
    return $date;
}


?>

