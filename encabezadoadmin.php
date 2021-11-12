<?php
   if (!isset($_SESSION["abierta"])){session_start();};
if ($_SESSION["abierta"]!="si") header("Location:index.php");
?>
<?php require __DIR__ . '/extensionB.php';?>
<body class="bg-dark">
    <!--Nuevo encabezado-->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark border border-success " >
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
          <h3  style="text-align:center;color:cadetblue">Administracion</h3>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            TABLAS
          </a>
          <ul class="dropdown-menu bg-dark border border-2 border-white" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="rtabla.php?t=candidatos">Candidatos</a></li>
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="rtabla.php?t=carreras">Carreras</a></li>
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="rtabla.php?t=Estudios">Estudios</a></li>
            <li><a class="dropdown-item text-info text-center border border-white fst-italic" href="rtabla.php?t=Empresa">Empresa</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="col-sm-2 border border-info border-opacity-2">
                <!--tercera columna-->
        <a class=" text-center text-white fst-italic text-opacity-50" href="cerrarsession.php"><h5 >Cerrar sesión</h5></a>
    </div>
</nav>
    <!--Termina encabezado-->

</body>
</html>
