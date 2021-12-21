<?php
require_once('./dbcon.php'); //funciones para conectar con la base de datos
require __DIR__ . '/encabezadoc.php';
$dni=$_SESSION['id'];
$consulta=sprintf("SELECT * FROM `experiencia` WHERE `Id`='%s' ",$_POST['Id']);
$experiencia=cunsultadb($consulta);
if ($experiencia=="0")
    {
    //es una nueva entrada
    $Empresa="";
    $Contacto="";
    $Cont_Tel="";
    $Puesto="";
    $Finicio=null;
    $Fin=null;
    $Sector="";
    $Descripcion="";
    $ID="0";
    }
else
{
    $Empresa=$experiencia['Empresa'];
    $Cont_Tel=$experiencia['Cont_Tel'];
    $Contacto=$experiencia['Contacto'];
    $Puesto=$experiencia['Id_puesto'];
    $Finicio=$experiencia['Fc_inicio'];
    $Fin=$experiencia['Fc_fin'];
    $Sector=$experiencia['Sector'];
    $Descripcion=$experiencia['Descripcion'];
    $ID=$_POST['Id'];
};
?>
<script> 
    function experienciaId(){
        var puesto=document.getElementById("Id_puesto");
        var data='';
        const dataList = document.getElementById("puestos");;
        const textInput = puesto.value;
        var data='';
        for (let i = 0; i < dataList.options.length; i++) {
            if (dataList.options[i].value === textInput) {
                data=dataList.options[i].getAttribute("data");
            }
        }
         puesto.value=data;
    }
    function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = [8, 37, 39, 46];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }

  function soloNumeros(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = "1234567890";
      especiales = [8, 37, 39, 46];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }

  function limpia() {
      var val = document.getElementById("miInput").value;
      var tam = val.length;
      for(i = 0; i < tam; i++) {
          if(!isNaN(val[i]))
              document.getElementById("miInput").value = '';
      }
  }

</script>
<style>
/* <  estilos para quitar las flechas de input type number> */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {

    -webkit-appearance: none;
    margin: 0; 
}
input[type=number] {
    -moz-appearance:textfield; 
} 
#my{
zoom: 100%;
}
textarea,
fieldset {
  width : 100%;
  border: 1px solid #333;
  box-sizing: border-box;
}
input:invalid {
  border: 2px dashed red;
}

input:invalid:required {
  background-image: linear-gradient(to right, pink, lightgreen);
}

input:valid {
  border: 2px solid black;
}
select:invalid:required {
  background-image: linear-gradient(to right, pink, lightgreen);
}
select:invalid {
  border: 2px dashed red;
}
</style>


<div class="container">
    <div class="row">
        <div class="  text-white  text-opacity-25 text-center  text-decoration-underline fw-lighter fst-italic"><h2> Datos de la experiencia laboral</h2></div>
    </div>
</div>


<form class="formulario bg-white fst-italic " action="submitformexperiencia.php" method="POST" onsubmit="experienciaId()">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaIzq1.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaIzq2.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
        <div class="col-sm-4"><br>
            <!--Empresa-->
            <div class="row">
                <label for="Empresa" class="fw-lighter fs-4 fst-italic">Empresa:</label><br>
                <input type="text" required maxlength="30"  placeholder="Nombre de la empresa" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Empresa" maxlength="30" name="Empresa" value= "<?php echo $Empresa?>" >
            </div><br>
            <!--contacto-->
            <div class="row">
                <label for="Contacto" class="fw-lighter fs-4 fst-italic">Datos de contacto:</label><br>
                <input type="text" required maxlength="30" onkeypress="return soloLetras(event)" id="miInput" placeholder="Nombre del jefe o encargado " class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter"  name="Contacto" value="<?php echo $Contacto?>">
            </div><br>
            <!--Teléfono del contacto-->
            <div class="row">
                <label for="Cont_Tel" class="fw-lighter fs-4 fst-italic">Teléfono del contacto:</label><br>
                <input type="text" onkeypress="return soloNumeros(event)" minlength="10" maxlength="10" required  placeholder=" Ingrese su número" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Cont_Tel" name="Cont_Tel" value="<?php echo $Cont_Tel?>">
            </div><br>
            <!--sector-->
            <div class="row">
                <label for="Sector" class="fw-lighter fs-4 fst-italic">Sector:</label><br>
                <input type="text" required maxlength="30" placeholder="Sector en que se desempeñó " class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Sector" name="Sector" value="<?php echo $Sector?>">
            </div><br>
            <!--Indentificación-->
            <div class="row">

            <label for="Id_puesto" class="fw-lighter fs-4 fst-italic">Identificacion del puesto:</label><br>
                <select class="form-control border border-primary fst-italic text-start fs-6"  required id="Movilidad" placeholder="Seleccione" name="Id_puesto" >
                    <option  value="0" >Seleccione:</option>                                    
                    <?php                    
                                //$consulta=sprintf("SELECT * FROM `estudios`");
                                //$puestos=cunsultadbmultiple($consulta);
                                $query = $mysqli -> query ("SELECT * FROM puestos order by tx_puesto");
                                while ($valores = mysqli_fetch_array($query )) {
                                    echo '<option value="'.$valores[Id_puesto].'">'.$valores[tx_puesto].'</option>';
                                  }
                                //foreach($puestos as $puesto){
                                //printf( '<option data="%s" value="%s">',$puesto["codestadocivil"] ,$puesto["txestadocivil"],'</option>');
                            //};                
                            ?>
                    </select>            
            </div><br>

            <!--Fecha inicio-->
            <div class="row">
                <label for="Estado" class="fw-lighter fs-4 fst-italic">Fecha Inicio (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de ingreso?" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Fc_inicio" name="Fc_inicio"  value="<?php echo $Finicio?>">
            </div><br>
            <!--fecha final-->
            <div class="row">
                <label for="Fc_fin" class="fw-lighter fs-4 fst-italic">Fecha Fin (aproximada):</label><br>
                <input type="date" required  placeholder="Fecha aproximada de egreso?" class="form-control border border-secundary fst-italic text-center  fs-5 fw-lighter" id="Fc_fin" name="Fc_fin"  value="<?php echo $Fin?>">
            </div><br>
            <!--descripción-->
            <div class="row">
                <label for="Descripcion" class="fw-lighter fs-4 fst-italic">Descripcion:</label><br>
                <!--input type="text" required  maxlength="100" placeholder="Ingrese descripcion del puesto " class="form-control border border-secundary fst-italic text-center fst-italic fs-5 fw-lighter" id="Descripcion" name="Descripcion" value="<php echo $Descripcion?>"-->
                <textarea id="t3" class="form-control border border-primary text-center fst-italic fs-6 " required name="Descripcion"  maxlength="100" rows="5" placeholder="Ingrese descripcion del puesto " ><?php echo $Descripcion?></textarea> 
            </div><br>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaDer1.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <img src="imagenes/experienciaDer2.png" alt="" width="300" height="300">
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div><br>
    <input type="hidden" id="Id" name="Id"value="<?=$ID?>">
    <input type="hidden" id="DNI" name="DNI"value="<?=$dni?>">
    <datalist id="puestos">
        <?php
            foreach($ocupaciones as $ocupacion){
            echo '<option value="'.$ocupacion["tx_puesto"].'">';
         };                
        ?>
    </datalist>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="row">
                    <!--boton guardar-->
                    <div class="col-sm-6">
                        <input class=" form-control btn btn-dark centroventana border border-info fst-italic" type="submit" value="Guardar">
                    </div>
                    <!--boton cancelar-->
                    <div class="col-sm-6">
                        <button class=" form-control btn btn-dark centroventana border border-info fst-italic" > <a class="text-decoration-none text-light" href="experiencia.php">Cancelar</a></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    
    </div><br>
</form> 

