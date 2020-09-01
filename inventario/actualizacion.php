

<?php

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$id = $_GET['id'];
echo "<h3> ID N°: $id</h3>";
$datepicker = date('Y-m-d',strtotime($_POST['datepicker']));
?>

<html lang="en">
<head>
  <title>ACTUALIZACION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</head>
<body>
    </div>
    <td><button class="btn btn-success" onclick="location.href='index.php'">Volver</button></td> 

  </div>
</nav>



<meta charset="UTF-8">
<style>

table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
	position: absolute;
	width: 350px;
    height: 260px;
    left: 300px;
    top: 140px;
}


td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table-vertical tbody td {
    border-top: none;
    border-bottom: none;	
}
button {
	position: absolute;
    left: 300px;
    top: 350px;

}
#id2{
    display:none;
}
</style>
<?php
{
	(isset($_POST["estado"])) ? $estado = $_POST["estado"] : $estado=1;
    (isset($_POST["suestado"])) ? $subestado = $_POST["subestado"] : $subestado=1;
	if (isset($_POST['submit'])) {
    
    $sql = "UPDATE accionesdemejora SET estado = '".$_POST["estado"]."', subestado = '".$_POST["subestado"]."', fecha_validacion = '".$datepicker."' WHERE id='$id'";
     $result = $conn->query($sql);  
	   if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='graciasupdate.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
	

?>
<div class="container">

	<script>
function myFunction() {

    var x = document.getElementById("id1").value;
  
    if(x=="cerrada")
        document.getElementById("id2").style.display="block";
	
}
$(document).ready(function() {
   $("#id2").datepicker();
});
</script>
<form id="userInfo" action="#" method="post">
	<table>
		<tbody>		
	<tr><td>Estado</td> <td><select type="text" name="estado" id="id1" onchange="myFunction()" class="form-control">
		<option <?php if ($estado == abierta ) echo 'seleccionar' ; ?>value="abierta">Abierta</option> 
		<option <?php if ($estado == presentada ) echo 'seleccionar' ; ?>value="presentada">Presentada</option> 
		<option <?php if ($estado == cerrada ) echo 'seleccionar' ; ?>value="cerrada" >Cerrada</option>
		</select></td></tr>
	<tr><td>Subestado</td> <td><select type="text" name="subestado" class="form-control">
		<option <?php if ($subestado == aprobada ) echo 'seleccionar' ; ?>value="aprobada">Aprobada</option> 
		<option <?php if ($subestado == ejecucion ) echo 'seleccionar' ; ?>value="ejecucion">En ejecucion</option> 
		<option <?php if ($subestado == estudio ) echo 'seleccionar' ; ?>value="estudio">En estudio</option>
		<option <?php if ($subestado == implementada ) echo 'seleccionar' ; ?>value="implementada">Implementada</option> 
		<option <?php if ($subestado == rechazada ) echo 'seleccionar' ; ?>value="rechazada">Rechazada</option> 
		<option <?php if ($subestado == exitosa ) echo 'seleccionar' ; ?>value="exitosa">Exitosa</option>
		<option <?php if ($subestado == sin_exito ) echo 'seleccionar' ; ?>value="sin exito">Sin exito</option>			
		</select></td></tr>
	<tr><td>Fecha de validacion</td><td><input type="text" name="datepicker" placeholder="dd/mm/aaaa" id="id2" ></td></tr>
	
		</tbody>
		<tr>
<td colspan="2"><input type="submit" name="submit" value="Actualizar" class="btn btn-danger navbar-btn"></td>
</tr>
		</table>
		
</form>
<?php 

}
?>

<?php include_once('layouts/footer.php'); ?>
