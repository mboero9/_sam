<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');

   page_require_level(1);
?>

<?php include_once('layouts/header.php'); ?>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micro89$'; // Password
$db_name = 'sam'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT id, titulo, tipo, origen, proceso, area, estado, subestado, fecha_validacion FROM accionesdemejora';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<html lang="en">
<head>
  <title>SAM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>



<div class="container">

			
		<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ACCION</th>
			<th>TITULO</th>
			<th>TIPO</th>
			<th>ORIGEN</th>
			<th>PROCESO</th>
			<th>AREA</th>
			<th>ESTADO</th>
			<th>SUBESTADO</th>
			<th>VENCIDA</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		
				
		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
			        <div style="max-height: 100px; max-width: 100px; width: 100px; overflow: auto;">
					<td>'.$row['id'].'</td>
					<td>'.$row['titulo'].'</td>
					<td>'.$row['tipo'].'</td>
					<td>'.$row['origen'].'</td>
					<td>'.$row['proceso'].'</td>
					<td>'.$row['area'].'</td>
					<td>'.$row['estado'].'</td>
					<td>'.$row['subestado'].'</td>
					<td>'.$row['fecha_validacion'].'</td>
					<td><a href="vistaaccion.php?id='.$row['id'].'"><button onclick="myFunction()">Ver accion</button></a></td>
					<td><a href="movimientos.php?id='.$row['id'].'"><button onclick="myFunction()">Cargar Movimiento</button></a></td>
					<td><a href="movimientosxaccion.php?id='.$row['id'].'"><button onclick="myFunction()">Ver Movimientos</button></a></td>	
</div>					
				</tr>';
		}?>
		</tbody>
     </table>  
</div>

</body>
</html>

<?php include_once('layouts/footer.php'); ?>
