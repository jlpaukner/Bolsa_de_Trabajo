<?php
require_once('./dbcon.php');
require_once('./encabezadoadmin.php');
require_once('./extensionB.php');

?>
<body>
  <center><h3>Estatus de cuentas registradas!</h3></center>

<center><div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
<form action="#" method="POST">
  <input type="hidden" name="genero" value="Todos los usuarios"></input>
  <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Cuentas registradas"/>
</form>
<form action="#" method="POST">
  <input type="hidden" name="genero" value="Todos los activos"></input>
  <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Todos los activos"/>
</form>
<form action="#" method="POST">
  <input type="hidden" name="genero" value="Todos los Inactivos"></input>
  <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Todos los Inactivos"/>
</form>
<form action="#" method="POST">
  <input type="hidden" name="genero" value="Activos candidatos"></input>
  <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Activos candidatos"/>
</form>
<form action="#" method="POST">
  <input type="hidden" name="genero" value="Baja candidatos"></input>
  <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Baja candidatos"/>
</form>
<form action="#" method="POST">
  <input type="hidden" name="genero" value="Activos empresas"></input>
  <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Activos empresas"/>
</form>
<form action="#" method="POST">
  <input type="hidden" name="genero" value="Baja empresas"></input>
  <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Baja empresas"/>
</form>
</div></center><br>
<div class="container">
<?php

// COndicional para validad el genero
if (isset($_POST['genero'])){
  $mostrar= $_POST['genero']; // Muestra el CheckBox marcado.

  //Condicional para mostrar tablas..
  if($mostrar == "Todos los usuarios"){
    $consulta=sprintf("SELECT DNI as iden, Concat(candidatos.apellido, ' ' ,candidatos.Nombre) AS Nombres, Email,estados.txestado as Estado_cta from candidatos inner join estados on candidatos.Estado=estados.idestado UNION SELECT empresa.Cuit, empresa.Razon_Social as Nombres, empresa.Email, estados.txestado FROM empresa inner join estados on empresa.Estado=estados.idestado order by Nombres;");
    $respuesta = cunsultadbmultiple("$consulta");
    if(count($respuesta)>0){
      echo "<table class='table caption-top'>
      <thead>
        <tr>
          <th scope='col'>Identificación</th>
          <th scope='col'>Nombres</th>
          <th scope='col'>Email</th>
          <th scope='col'>Estado</th>          
        </tr>
      </thead>
      <tbody>";
      foreach ($respuesta as $fila){
        printf("<tr><th scope='row'>%s</th><td>%s</td><td>%s</td><td>%s</td></tr>",$fila['iden'],$fila['Nombres'],$fila['Email'],$fila['Estado_cta']);
  
      }
      echo"</tbody></table>";
    }
    //echo "primera opcion";
  }else if($mostrar == "Todos los activos"){
    echo "segunda opcion";
  }else if($mostrar == "Todos los Inactivos"){
    echo "Tercera opcion";
  }else if($mostrar == "Activos candidatos"){
    $consulta=sprintf("SELECT `DNI`,`Nombre`,`Apellido`,`Domicilio`,`Email`,`Estado` FROM `candidatos` WHERE `Estado`=1 Order by `Nombre`;");
    $respuesta = cunsultadbmultiple("$consulta");
    if(count($respuesta)>0){
      echo "<table class='table caption-top'>
      <thead>
        <tr>
          <th scope='col'>DNI</th>
          <th scope='col'>Nombres completos</th>
          <th scope='col'>Domicilio</th>
          <th scope='col'>Email</th>
          <th scope='col'>Estado</th>
        </tr>
      </thead>
      <tbody>";
      foreach ($respuesta as $fila){
        printf("<tr><th scope='row'>%s</th><td>%s %s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$fila['DNI'],$fila['Nombre'],$fila['Apellido'],$fila['Domicilio'],$fila['Email'],$fila['Estado']);
  
      }
      echo"</tbody></table>";
    }
    //echo "Cuarta opcion";
  }else if($mostrar == "Baja candidatos"){
    $consulta=sprintf("SELECT `DNI`,`Nombre`,`Apellido`,`Domicilio`,`Email`,`Estado` FROM `candidatos` WHERE `Estado`=0 Order by `Nombre`;");
    $respuesta = cunsultadbmultiple("$consulta");
    if(count($respuesta)>0){
      echo "<table class='table caption-top'>
      <thead>
        <tr>
          <th scope='col'>DNI</th>
          <th scope='col'>Nombres completos</th>
          <th scope='col'>Domicilio</th>
          <th scope='col'>Email</th>
          <th scope='col'>Estado</th>
        </tr>
      </thead>
      <tbody>";
      foreach ($respuesta as $fila){
        printf("<tr><th scope='row'>%s</th><td>%s %s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$fila['DNI'],$fila['Nombre'],$fila['Apellido'],$fila['Domicilio'],$fila['Email'],$fila['Estado']);
  
      }
      echo"</tbody></table>";
    }
    //echo "Quinta opcion";
  }else if($mostrar == "Activos empresas"){
    $consulta=sprintf("SELECT `Cuit`,`Razon_Social`,`Rubro`,`Email`,`Estado` FROM `empresa` WHERE `Estado`= 1 Order by `Razon_Social`");
    $respuesta = cunsultadbmultiple("$consulta");
    if(count($respuesta)>0){
      echo "<table class='table caption-top'>
      <thead>
        <tr>
          <th scope='col'>Cuit</th>
          <th scope='col'>Razon Social</th>
          <th scope='col'>Rubro</th>
          <th scope='col'>Email</th>
          <th scope='col'>Estado</th>
        </tr>
      </thead>
      <tbody>";
      foreach ($respuesta as $fila){
        printf("<tr><th scope='row'>%s</th><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$fila['Cuit'],$fila['Razon_Social'],$fila['Rubro'],$fila['Email'],$fila['Estado']);
  
      }
      echo"</tbody></table>";
    }
    //echo "Sexta opcion";
  }else if($mostrar == "Baja empresas"){
    echo "<center><h5>Lista de bajas de empresa!</h5></center><hr>";
    $consulta=sprintf("SELECT `Cuit`,`Razon_Social`,`Rubro`,`Email`,`Estado` FROM `empresa` WHERE `Estado`= 0 Order by `Razon_Social`");
    $respuesta = cunsultadbmultiple("$consulta");
    if(count($respuesta)>0){
      echo "<table class='table caption-top'>
      <thead>
        <tr>
          <th scope='col'>Cuit</th>
          <th scope='col'>Razon Social</th>
          <th scope='col'>Rubro</th>
          <th scope='col'>Email</th>
          <th scope='col'>Estado</th>
        </tr>
      </thead>
      <tbody>";
      foreach ($respuesta as $fila){
        printf("<tr><th scope='row'>%s</th><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$fila['Cuit'],$fila['Razon_Social'],$fila['Rubro'],$fila['Email'],$fila['Estado']);
  
      }
      echo"</tbody></table>";
    }
    //echo "Septima opcion";
  }

}
?>
</div>
</body>


