<?php
  $page_title = 'Actualiza Accion';
  require_once('includes/load.php');
?>
<?php

 page_require_level(1);

 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>

<?php

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'sam'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$id_mov = $_GET['id_mov'];
echo "<h3>Movimiento N°: $id_mov</h3>";
$datepicker = date('Y-m-d',strtotime($_POST['datepicker']));
?>





<html lang="en">
<head>
  <title>ACTUALIZACION ESTADO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
</head>
<body>
    </div>
    <td><button class="btn btn-danger navbar-btn" onclick="location.href='index.php'">Volver</button></td> 

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
	width: 300px;
    height: 200px;
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

</style>
<?php
{
	(isset($_POST["tipo"])) ? $tipo = $_POST["tipo"] : $tipo=1;
 
	if (isset($_POST['submit'])) {
    
    $sql = "UPDATE movimientos SET tipo = '".$_POST["tipo"]."', plazo = '".$datepicker."' WHERE id_mov='$id_mov'";
     $result = $conn->query($sql);  
	   if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='graciasupdatemov.php';</script>";
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

<form action="#" method="post">
	<table>
		<tbody>		
	<tr><td>Tipo</td> <td><select type="text" name="tipo" class="form-control">
		<option <?php if ($tipo == analisis ) echo 'seleccionar' ; ?>value="Analisis causa raiz">Analisis causa raiz</option> 
		<option <?php if ($tipo == accion ) echo 'seleccionar' ; ?>value="Accion de contingencia">Accion de contingencia</option> 
		<option <?php if ($tipo == correctiva ) echo 'seleccionar' ; ?>value="Accion Correctiva">Accion Correctiva</option>
		<option <?php if ($tipo == propuesta ) echo 'seleccionar' ; ?>value="Accion Propuesta a realizar">Accion Propuesta a realizar</option> 
		<option <?php if ($tipo == derivacion ) echo 'seleccionar' ; ?>value="Derivacion">Derivacion</option> 
		<option <?php if ($tipo == verificar ) echo 'seleccionar' ; ?>value="Accion Para Verificar">Accion Para Verificar</option>
		<option <?php if ($tipo == cierre ) echo 'seleccionar' ; ?>value="Cierre de la Accion">Cierre de la Accion</option>			
		</select></td></tr>
	<tr><td>Plazo</td><td><input type="text" name="datepicker" placeholder="dd/mm/aaaa" id="id2" ></td></tr>
	
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
