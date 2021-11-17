<?php
   if (!isset($_SESSION["abierta"])){session_start();};
if ($_SESSION["abierta"]!="si") header("Location:index.php");
?>
<?php require __DIR__ . '/extensionB.php';?>
<body class="bg-danger fst-italic">
    <!--Nuevo encabezado-->
    <nav id="barra" class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger bg-dark bg-opacity-50 border border-success fst-italic" >
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
        <!-- <a class="nav-link active" aria-current="page" href="paginaadmin.php">Perfil administrativo</a> -->
        <h3>   Administrador  </h3>
        </li>
        <li class="nav-item dropdown" id="dd">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          ABM-Registros
          </a>
          <ul class="dropdown-menu bg-dark bg-opacity-50 border border-2 border-white" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=empresa"> Empresa </a></li>
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=candidatos"> Candidatos </a></li>
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=login"> Login </a></li>
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=busquedas"> Busquedas </a></li>
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=carreras"> Carreras </a></li>
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=estudios"> Estudios </a></li>
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=experiencia"> Experiencia </a></li>
            <li><a class="dropdown-item text-white text-center border border-white fst-italic" href="rtabla.php?t=puestos"> Puestos </a></li>
          </ul>
          </li>

<li class="nav ml-auto justify-content-end">
        <a class=" text-center text-white fst-italic text-opacity-50" href="cerrarsession.php">
          <h5 >Cerrar sesión</h5>
        </a>
</li>

</nav>
    <!--Termina encabezado-->
<!--Logo grande-->
<figure class="text-center">
  <blockquote class="blockquote ">
    <div class="p-3 mb-2  bg-dark bg-opacity-50  border border-primary-25"><p><img src="imagenes/tituloyj.PNG" alt="" width="300" height="100"></p></div>
  </blockquote>
</figure>
<!--Fin Logo grande-->
</body>
</html>
