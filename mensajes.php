<?php
// var_dump($_SESSION);
if(!isset($_SESSION['ms'])){
    $_SESSION['ms']="nada";
};
if(!isset($_SESSION['mc'])){
    $_SESSION['mc']="none";
};

if ($_SESSION['ms']=="nada")
    {
    $mensaje="";
    $display="display: none";
    }
    else
    {
        $mensaje =  $_SESSION['ms'];
        $display="display:center";
    };
?>
<!-- alert alert-success" -->
<div id="popUp" class="<?=$_SESSION['mc']?>" style="<?=$display?>"> <?=$mensaje?></div>
<?php unset($_SESSION['ms'],$_SESSION['mc'])?>