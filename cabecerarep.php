<ul style="background-color: coral;
    width:850px;
    display: inline-block;
    border-radius: 25px;
    text-align: center" >
<h5 style="display:inline;" >Representado a usuario:</h5>
<h4 style="display:inline;" > <?=$_SESSION['id']?> </h4>
<form action=inicioadmin.php method="POST" style="display:inline">
<input type="submit" name="boton" class="btn btn-dark" style="border-radius: 40px;" value ="Dejar de representar" onclick="return confirm('¿Seguro? Perderá los datos no guardados.')"> 
</form>
</ul>