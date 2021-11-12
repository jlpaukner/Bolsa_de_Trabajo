<?php
// session_start();
require __DIR__ . '/encabezadoe.php';
$campos=$_SESSION['cols'];
$tabl=$_SESSION['tabl'];
$ntabla=$_POST['ntabla'];
$key=$_POST['key'];
$nkey=$_POST['nkey'];
$resp= array_search($key, array_column($tabl, $nkey));
$fila= $tabl[$resp];
$_SESSION['pagretorno']=$_POST['pagretorno'];
// var_dump($_POST);
// var_dump($fila);
// var_dump($campos);
// var_dump($_SESSION);
?>

<style>
/* <  estilos para quitar las flechas de input type number> */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0; 
}
input[type=number] {
    -moz-appearance:textfield; } 
#my{
zoom: 100%;
}
</style>

<div class="container border border-primary fst-italic bg-light text-primary">
    <!--Titulo-->
    <div class="row bg-dark text-dark">
        <div class="p-3 mb-2  text-info  text-opacity-50 text-center fw-bold text-decoration-underline"><h1><?= $ntabla?></h1></div>
    </div>

    <form class="formulario text-star" action="submitform.php" method="POST">

    <?php
    for($i = 0; $i < count($fila);$i++){
    ?>
        <div class="row text-dark">
            <div class="col-sm-4">
                <div class="container">
                    <div class="row"> 
                        <?php
                        //-------------seccion para encontrar el nombre del campo y su valor                        
                        $ncampo=$campos[$i]['COLUMN_NAME']; 
                        if($_POST['key']=='nuevo'){  $valorcampo=null;}
                        else{$valorcampo=$fila[$ncampo];}                    
                        //-------------seccion para validar... resultado es el tipo de dato
                        switch ($campos[$i]['DATA_TYPE']) {
                            case 'varchar': $tipo='text'; break;
                            case 'bigint': $tipo='number'; break;
                            case 'int': $tipo='number'; break;
                            case 'date': $tipo='date'; break;                            
                            default: $tipo='text'; 
                        };     
                        //-------------------------------------------------------------------                   
                        ?>                                  
                        <label class="font-weight-bold fs-5 text-black" style="display: inline-block; min-width: 200px">
                        <?= $ncampo?>:</label>
                        <input 
                        type= <?= $tipo?> 
                        name= <?= $ncampo?> 
                        class="form-control border border-primary text-center fw-bold fs-5" 
                        value= "<?= $valorcampo?>" 
                        style="width: 400px"
                        ><br>
                    </div>             
                </div>
            </div> 
        </div>  
    <?php
        }
    ?>

        <div class="row p-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
                <button type="submit" class="form-control btn btn-dark centroventana border border-primary" value="Enviar">Guardar</button>                
            </div>
            <div class="col-sm-2">
            <a class="form-control btn btn-dark centroventana border border-primary" href=<?=$_POST['pagretorno']?>>Cancelar</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </form>
</div>