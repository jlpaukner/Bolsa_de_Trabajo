<?php
session_start();
if ($_SESSION["abierta"]!="si") header("Location:index.php");
if (!isset($_SESSION['tiempo'])) {
  $_SESSION['tiempo']=time();
}
else if (time() - $_SESSION['tiempo'] > 60000) {
  session_destroy();
  /* Aquí redireccionas a la url especifica */
  header("Location:index.php");
  die();  
}
$_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual

require_once('./dbcon.php');
$dni= $_SESSION['id'];
$consulta = sprintf("SELECT Estado FROM candidatos WHERE DNI = $dni");
$resultado = cunsultadb($consulta);


if($resultado['Estado'] == 1){
  $estado_actual = "<a class='nav-link dropdown-toggle text-white   btn btn-sm btn-success rounded-pill '  id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Cuenta Activa</a>";
  $cambio_cuenta = "<li><a class='dropdown-item text-danger text-center border border-white fst-italic' title='No aparecerá en busquedas de empresas'  href='cambiar_estado.php?estado=eliminar_candidato'>Desactivar Cuenta</a></li>";
  $consulta= "SELECT id_busqueda FROM resultados WHERE DNI='{$dni}'";
$filas=cunsultadbmultiple($consulta);
$numRes= count($filas);
if( $numRes > 0){
echo "<h4 class='text-center fs-4'style='color:white;'>   </h4>";
echo "<h4 class='text-center fs-5'style='color:white;'>   </h4>";
//echo "<script class='border border-info'>alert('Tu perfil es tenido en cuenta en {$numRes} busquedas laborales. Te deseamos éxitos y esperamos que pronto se contacten contigo!');</script>";
echo "<script>$(function() { $('#modal_falla').modal('show'); });</script>";
};
}
else if($resultado['Estado'] == 0){
  $estado_actual = "<a class='nav-link dropdown-toggle text-white   btn btn-sm btn-danger rounded-pill '  id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Cuenta Inactiva</a>";
  $cambio_cuenta = "<li><a class='dropdown-item text-success text-center border border-white fst-italic' href='cambiar_estado.php?estado=activa_candidato'>Activar Cuenta</a></li>";
}
else{
  $estado_actual = "<a class='nav-link dropdown-toggle text-white   btn btn-sm btn-danger rounded-pill '  id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Cuenta Pendiente</a>";
  $cambio_cuenta ="";
}


?>

<?php
require_once('./extensionB.php');
?>
<body class="bg-dark fst-italic">
    <!--Nuevo encabezado-->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark bg-opacity-50 border border-success fst-italic " >
  <div class="container-fluid">
    <a class="navbar-brand" href="">
    <img src="imagenes/logoyj.PNG" alt="" width="75" height="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="iniciocandidato.php?ms=0">Perfil</a>
        </li>
                            <!--prueba-->
          <li class="nav-item dropdown ">
          <?php echo $estado_actual; ?>
          <!--a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><hp echo $estado_actual;?></!a-->
          <ul class="dropdown-menu  bg-dark bg-opacity-25 border border-2 border-white" aria-labelledby="navbarDropdownMenuLink">
            <?php echo $cambio_cuenta; ?>

          </ul>
        </li>
            <!--Fin de prueba-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Editar
          </a>
          <ul class="dropdown-menu bg-dark border border-2 border-white" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="fdatospersonales.php">Datos Personales</a></li>
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="experiencia.php">Experiencia Laboral</a></li>
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="estudios.php">Formación Académica</a></li>
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="postulaciones.php">Postulaciones</a></li>
          </ul>
        </li>

          <?php 
          if(isset($_SESSION['adminID'])){
          require __DIR__ .'/cabecerarep.php';
          }
          ;?>

      </ul>
    </div>
    <div class="col-sm-2 border border-info border-opacity-2">
                <!--tercera columna-->
        <a class=" text-center text-white fst-italic text-opacity-50" href="cerrarsession.php"><h5 ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
        </svg>  Cerrar sesión</h5></a>
    </div>
</nav>
    <!--Termina encabezado-->
<!--Logo grande-->
<figure class="text-center">
  <blockquote class="blockquote ">
    <div class="p-3 mb-2 bg-dark  border border-primary-25"><p><img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
  </blockquote>
</figure>
<!--Fin Logo grande-->

</body>
</html>