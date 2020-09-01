
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
//$sql = "SELECT * FROM celulares ";
$sql = "SELECT * FROM celulares WHERE id='$id'";

//$sql = "SELECT A.id, A.movi, A.fecha_movimiento, A.tipo, A.derivado_a, A.plazo, A.descripcion FROM movimientos A JOIN accionesdemejora T ON A.id=t.id where a.id='$id'";

//$sql2 = mysql_query ("UPDATE movimientos SET movi=movi+1 WHERE movimientos id = '$id'") ;
	

$query = mysqli_query($conn, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>
<html lang="en">
<head>
  <title>Inventario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
</head>
<body>


  </nav>

<div class="container">			
		<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ID</th>
			<th>DNI</th>
			<th>Legajo</th>
			<th>Nombre</th>
			<th>Celular Ultimo</th>
			<th>Numero Movistar</th>
			<th>Computadora</th>
		</tr>
		</thead>
		
				
		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td><a href="index.php?id=' . $row['id'] . '">' . $row['id'] . '</a></td>
					<td>'.$row['DNI'].'</td>
					<td>'.$row['Legajo'].'</td>
					<td>'.$row['Nombre'].'</td>
					<td>'.$row['Celular_Ultimo'].'</td>
					<td>'.$row['Numero_Movistar'].'</td>
					<td>'.$row['Computadora'].'</td>
				</tr>';
	
		}?>
		</tbody>
     </table>  
</div>


