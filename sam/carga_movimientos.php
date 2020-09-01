
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
$sql = "SELECT * FROM accionesdemejora where id = '$id'";
//$sql = "SELECT id, titulo, tipo, origen, area, proceso, descripcion, objetivo, 
		// observacion, estado, subestado, fecha_validacion FROM accionesdemejora WHERE id='$id'";
//$sql = "INSERT INTO movimientos (id_mov, movi, tipo, derivado_a, descripcion, plazo) SELECT L.id_mov, OT.id , L.derivado_a, L.descripcion, L.plazo FROM movimientos L 
//INNER JOIN accionesdemejora OT ON L.movi = OT.id";
//$sql2 = mysql_query ("UPDATE `movimientos` SET `movi` = '0' WHERE `movimientos`.`id` = '$id'") ;


//$prueba = "INSERT INTO movimientos (movi) Values ('$id->movi')";
//$query = mysqli_query($conn, $sql, $prueba);

$resultado = mysql_query('SELECT id FROM accionesdemejora ORDER BY id DESC LIMIT 1');


if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}


?>

<html lang="en">
<head>
  <title>Carga de Movimientos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ACCION</a>
    </div>
    <td><button class="btn btn-danger navbar-btn" onclick="location.href='index.php'">Volver</button></td> 
	<td><button class="btn btn-danger navbar-btn" onclick="location.href='carga_movimientos.php'">Cargar Movimiento</button></td>
  </div>
</nav>

<div class="container">
		
	<form>
    <div class="form-group">

		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td><div class="form-group"><label for="observacion">Accion N°: '.$row['id'].'</div></td>
					<td><div class="form-group"><label for="tipo">Tipo:</label><select type="text" name="tipo" class="form-control"><option value="Analisis causa raiz">Analisis causa raiz</option><option value="Accion de contingencia">Accion de contingencia</option> <option value="Accion correctiva">Accion correctiva</option><option value="Accion propuesta a realizar">Accion propuesta a realizar</option><option value="Derivacion">Derivacion</option> <option value="Accion para verificar">Accion para verificar</option><option value="Cierre de la accion">Cierre de la accion</option> </select></div></td>
			        <td><div class="form-group"><label for="derivado_a">Derivado a:</label><input type="text" class="form-control" name="derivado_a" placeholder="Ingresa derivacion"></div></td>
					<td><div class="form-group"><label for="descripcion">Descripcion:</label><textarea type="text" class="form-control" name="descripcion" placeholder="Ingresa descripcion" cols="50" rows="7"></textarea></div></td>
					<td><div class="form-group"><label for="plazo">Plazo:</label><input type="date"></div></td>
					<td><div class="form-group"><button type="submit" class="btn btn-default">Cargar movimiento</button></div></td>
					</tr>';
		
		}?>
</form>
</body>
</html>
