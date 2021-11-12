<?php
session_start();
require __DIR__ . '/dbcon.php';
// var_dump($_POST);
// var_dump($_SESSION);

$nllave=$_SESSION['nllave'];
$ntabla=$_SESSION['ntabla'];
$retorno="location:".$_SESSION['pagretorno'];
echo $retorno;
$llave=$_POST[$nllave];

if ($llave=="0")
    {    
        $inserta=construyeinsert($_POST,$ntabla,$nllave);
        $resultado =operaciondb($inserta);
    } 
else
    {
        $aborrar = sprintf(" DELETE FROM $ntabla WHERE $nllave='$llave'");
        operaciondb($aborrar);
        $inserta=construyeinsert($_POST,$ntabla);
        $resultado =operaciondb($inserta);
    }
    echo $inserta;
if ($resultado==1){
    header($retorno);
    }
?>