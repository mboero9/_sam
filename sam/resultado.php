<?php
  $page_title = 'Movimientos';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
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
$titulo = $_GET['titulo'];
//$sql = "SELECT * FROM accionesdemejora where id = '$id'";
$sql = "SELECT id, titulo, tipo, origen, area, proceso, descripcion, objetivo, 
		 observacion, estado, subestado, fecha_validacion FROM accionesdemejora WHERE titulo='$titulo'";
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
.table {
    border: solid 1px #ff7857;
    border-spacing: 1;
    font: normal 18px Arial, sans-serif;
	width: 100%;
}
td {
	text-align: left;
	margin: 0 0px 10px 0;
    border: solid 2px #ff7857;
    color: #333;
    padding: 5px;
    position: left;
}
tr {
    text-align: left;
	border: solid 2px #ff7857;
    color: #ff7857;
    padding: 5px;
    }
.zui-table-vertical tbody td {
    border-top: #ff7857;
    border-bottom: #ff7857;
}
</style>

		
  
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '
			
			
<table class="table">
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">ACCION</td>
		<td>'.$row['id'].'</td>
	</tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">TITULO</td>
		<td>'.$row['titulo'].'</td>
	</tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">TIPO</td>
		<td>'.$row['tipo'].'</td>
	</tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">ORIGEN</td>
		<td>'.$row['origen'].'</td>
	</tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">PROCESO</td>
		<td>'.$row['proceso'].'</td>
	</tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">DESCRIPCION</td>
		<td>'.$row['descripcion'].'</td>
	</tr>
	<tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">OBSERVACION</td>
		<td>'.$row['observacion'].'</td>
	</tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">ESTADO</td>
		<td>'.$row['estado'].'</td>
	<tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">SUBESTADO</td>
		<td>'.$row['subestado'].'</td>
	<tr>
	<tr>
		<td style="background-color:#ff7857;color:white;" width="20%">FECHA DE VALIDACION</td>
		<td>'.$row['fecha_validacion'].'</td>
	</tr>
</table>
					
					
	<div method="post" >
	  <a href="actualizacion.php?id='.$row['id'].'"> 
		<button type="submit" class="btn btn-danger navbar-btn" onclick="location.href="actualizacion.php" >Actualizar Estado</button>
		</a>
	</div>
		
	<div method="post">
	    <a href="movimientos.php?id='.$row['id'].'"> 
		<button type="submit" class="btn btn-danger navbar-btn" onclick="location.href="movimientos.php" >Cargar Movimiento</button>
		</a>
	</div>';				
				
		}?>





			
</body>
</html>

