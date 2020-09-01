<?php
  $page_title = 'Home SAM';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
  //page_require_level(1);
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

//$sql = 'SELECT acc1.*,mov2.id_mov, mov2.plazo FROM accionesdemejora AS acc1 JOIN movimientos AS mov2 ON acc1.id = mov2.movi ORDER BY mov2.plazo DESC lIMIT 9';
$sql = 'SELECT id, fecha_alta, titulo, tipo, origen, proceso, area, estado, subestado FROM accionesdemejora';		
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
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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


		
		<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ACCION</th>
			<th>FECHA ACCION</th>
			<th>TITULO</th>
			<th>TIPO</th>
			<th>ORIGEN</th>
			<th>PROCESO</th>
			<th>AREA</th>
			<th>ESTADO</th>
			<th>SUBESTADO</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		
				
		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
			        <div style="max-height: 100px; max-width: 100px; width: 100px; overflow: auto;">
					<td><a href="vistaaccion.php?id=' . $row['id'] . '">' . $row['id'] . '</a></td>
					<td>'.$row['titulo'].'</td>
					<td>'.$row['fecha_alta'].'</td>
					<td>'.$row['tipo'].'</td>
					<td>'.$row['origen'].'</td>
					<td>'.$row['proceso'].'</td>
					<td>'.$row['area'].'</td>
					<td>'.$row['estado'].'</td>
					<td>'.$row['subestado'].'</td>				
					<td>'.$row['plazo'].'</td>					
					<td><a href="movimientos.php?id='.$row['id'].'"><button onclick="myFunction()">Cargar Movimientos</button></a></td>
					<td><a href="movimientosxaccion.php?id='.$row['id'].'"><button onclick="myFunction()">Ver Movimientos</button></a></td>	
</div>					
				</tr>';
		}?>
		</tbody>
     </table>  


</body>

</html>

