<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$DNI = $_GET['DNI'];

$sql = "SELECT * FROM computadoras";
//$sql = "SELECT  sec1.*, sec2.FILIAL, sec2.Usuario FROM celulares AS sec1 JOIN computadoras AS sec2 ON SUBSTRING(sec1.Sector,1,4) = sec2.FILIAL where sec1.Sector = '".$Sector."';";
//$sql2 =	"UPDATE titulo FROM celulares WHERE id='$id'";	
$query = mysqli_query($conn, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<html lang="en">
<head>
  <title>Computadoras</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
</head>
 <a href="javascript:history.back()"><img src="images/flech.png" height="60" width="60" alt="Botón">
 </a>
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
		<tr><th>ID</th>
		    <th>Filial</th>
			<th>Nombre Filial</th>
			<th>IP</th>
			<th>Modelo</th>
			<th>Nombre de equipo</th>
			<th>Serial Number</th>
			<th>Usuario</th>
			<th>Usuario NT Windows</th>
		
		</tr>
		</thead>
		<tbody>
				
		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
			        <td>'.$row['id_pc'].'</td>
			        <td>'.$row['FILIAL	'].'</td>
			        <td>'.$row['Nombre'].'</td>
					<td>'.$row['IP'].'</td>
				<!--<td><a href="telefonos.php?DNI=' . $row['DNI'] . '">' . $row['DNI'] . '</a></td>-->
					<td>'.$row['Modelo'].'</td>
					<td>'.$row['NombreEquipo'].'</td>
					<td>'.$row['SerialNumber'].'</td>
					<td>'.$row['Usuario'].'</td>
					<td>'.$row['UserWindowsNT'].'</td>
			
				
				</tr>';
	
		}?>
		</tbody>
			
</body>
</html>

