
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$Sector = $_GET['Sector'];
//$sql = "SELECT * FROM accionesdemejora where id = '$id'";
$sql = "SELECT * FROM celulares WHERE FILIAL='$Sector'";
$sql2 =	"UPDATE titulo FROM accionesdemejora WHERE id='$id'";	
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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
</head>
<body>
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



	
			
<div class="container">			
		<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>FILIAL</th>
			<th>IP</th>
			<th>Modelo</th>
			<th>Nombre Equipo</th>
			<th>Serial Number</th>
			<th>Estado</th>
			<th>CA</th>
		</tr>
		</thead>
		<tbody>
				
		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td><a href="index.php?NombreEquipo=' . $row['NombreEquipo'] . '">' . $row['NombreEquipo'] . '</a></td>
					<td>'.$row['FILIAL'].'</td>
					<td>'.$row['IP'].'</td>
					<td>'.$row['Modelo'].'</td>
					<td>'.$row['NombreEquipo'].'</td>
					<td>'.$row['SerialNumber'].'</td>
					<td>'.$row['Estado'].'</td>
					<td>'.$row['CA'].'</td>
				
				</tr>';
	
		}?>
		</tbody>
			
</body>
</html>

