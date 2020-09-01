<?php
  $page_title = 'Movimientos';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micro2017'; // Password
$db_name = 'sam'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$id = $_GET['id'];
//$sql = "SELECT * FROM accionesdemejora where id = '$id'";
$sql = "SELECT id, titulo, tipo, origen, area, proceso, descripcion, objetivo, 
		 observacion, estado, subestado, fecha_validacion FROM accionesdemejora WHERE id='$id'";

$sql2 =	"UPDATE titulo FROM accionesdemejora WHERE id='$id'";	

$query = mysqli_query($conn, $sql);


if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}


?>

<html lang="en">
<head>
  <title>ACCION N</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



    <td><button class="btn btn-danger navbar-btn" onclick="location.href='index.php'">Volver</button></td> 
	<td><button class="btn btn-danger navbar-btn" onclick="location.href='movimientos.php'">Cargar Movimiento</button></td>
 


<div class="container">
<!--		


  </div>
	
	<div class="form-group">
		<label for="objetivo">Objetivo:</label>

    </div>
	
	<div class="form-group">
		<label for="observacion">Observacion:</label>
    </div>
	
	<div class="form-group">
		<label for="estado">Estado:</label>
    </div>
	
	<div class="form-group">
		<label for="subestado">Subestado:</label>
    </div>	
	
	<div class="form-group">
		<label for="archivo_adjunto">Archivo adjunto:</label>
	</div>
	
	<div class="form-group">
			<label for="fecha_validacion">Fecha de validacion:</label>
	</div>
	
	   </div>
-->
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td><div class="form-group"><label for="observacion">Observacion:'.$row['id'].'</div></td>
					<td><div class="form-group"><label for="titulo">Titulo:'.$row['titulo'].'</label><a href="vistaaccion.php?id='.$row['titulo'].'"></a></div></td>
					<td><div class="form-group"><label for="tipo">Tipo:'.$row['tipo'].'</label></div></td>
					<td><div class="form-group"><label for="origen">Origen:'.$row['origen'].'</label></div></td>
					<td><div class="form-group"><label for="proceso">Proceso:'.$row['proceso'].'</label></div></td>
					<td><div class="form-group"><label for="estado">Estado:'.$row['estado'].'</label></div></td>
					<td><div class="form-group"><label for="subestado">Subestado:'.$row['subestado'].'</label></div></td>
			
				</tr>';
	
		}?>


			
</body>
</html>