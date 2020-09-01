<?php
  $page_title = 'Home SAM';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
 page_require_level(1);
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

//$sql = 'SELECT t1.*,t2.plazo FROM accionesdemejora AS t1 INNER JOIN movimientos AS t2 ON t1.id = t2.id_mov';
$sql = 'SELECT * FROM accionesdemejora WHERE estado="cerrada"';		
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
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
 <style type="text/css">
div.scrollmenu {
    background-color: #333;
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu a:hover {
    background-color: #777;
}
</style>
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
			<th>VENCIMIENTO</th>
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
					<td>'.$row['plazo'].'</td>
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

