
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
//$sql = "SELECT * FROM celulares where id = '$id'";
$sql = "SELECT * FROM celulares WHERE id='$id'";
$sql2 =	"UPDATE Computadora FROM celulares WHERE id='$id'";	
$query = mysqli_query($conn, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<html lang="en">
<head>
  <title>Contacto/title>
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

<style>

</style>

		
  
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '
			
			
<table class="table">
	<tr>
		<td style="background-color:#3FDF59;color:white;" width="20%">ID</td>
		<td>'.$row['id'].'</td>
	</tr>
	<tr>
		<td style="background-color:#3FDF59;color:white;" width="20%">Legajo</td>
		<td>'.$row['DNI'].'</td>
	</tr>
	<tr>
		<td style="background-color:#3FDF59;color:white;" width="20%">Nombre</td>
		<td>'.$row['Nombre'].'</td>
	</tr>
	<tr>
		<td style="background-color:#3FDF59;color:white;" width="20%">Celular_Ultimo</td>
		<td>'.$row['Celular_Ultimo'].'</td>
	</tr>
	<tr>
		<td style="background-color:#3FDF59;color:white;" width="20%">Numero_Movistar</td>
		<td>'.$row['Numero_Movistar'].'</td>
	</tr>

</table>
					
					
	<div method="post" >
	  <a href="actualizacion.php?id='.$row['id'].'"> 
		<button type="submit" class="btn btn-success" onclick="location.href="actualizacion.php" >Actualizar Estado</button>
		</a>
	</div>
		
	<div method="post">
	    <a href="cargar_dato.php?id='.$row['id'].'"> 
		<button type="submit" class="btn btn-success" onclick="location.href="cargar_dato.php" >Cargar Equipo</button>
		</a>
	</div>';				
				
		}?>





			
</body>
</html>

