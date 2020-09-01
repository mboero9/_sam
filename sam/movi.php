<?php 
$host = "localhost";
$user = "root";
$pass = "Micro89$";
$db = "sam";

$conn = mysqli_connect($host,$user,$pass, $db);
if(!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
//$sql = "INSERT INTO movimientos (movi) values ('$id')";
$sql = "SELECT * FROM accionesdemejora where id = '$id'";
if(isset($_POST['accion']))
{
	$id_mov = $_POST['id_mov'];
    $movi = $_POST['movi'];
    $tipo = $_POST['tipo'];
    $derivado_a = $_POST['derivado_a'];
    $descripcion = $_POST['descripcion'];
    $plazo = $_POST['plazo'];
	
	// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
$id_mov = mysqli_real_escape_string($connection, $id_mov);
$movi = mysqli_real_escape_string($connection, $movi);
$tipo = mysqli_real_escape_string($connection, $tipo);
$derivado_a = mysqli_real_escape_string($connection, $derivado_a);
$descripcion = mysqli_real_escape_string($connection, $descripcion);
$plazo = mysqli_real_escape_string($connection, $plazo);
	
	
	$query = "insert into movimientos (id_mov, movi, tipo, derivado_a, descripcion, plazo) values ('".$id_mov."', '".$movi."', '".$derivado_a."', '".$tipo."', '".$descripcion."', '".$date('Y-m-d H:i:s')."')";
	
	$result = mysqli_query($conn, $query);
	
        if ($result) {
            //SUCCESS
       header('Location: graciasmov.php');
        } else {
            //FAILURE
            die("Database query failed. " . mysqli_error($connection)); 
            //last bit is for me, delete when done
        }
mysqli_close($conn);	
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
		
	<form action="" method="post">
    <div class="form-group">
	<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					
				    <td><div class="form-group"><label for="observacion">Accion:</label><select type="text" name="tipo" class="form-control"><option value="observacion">'.$row['id'].'</option></select></div></td>
					<td><div class="form-group"><label for="tipo">Tipo:</label><select type="text" name="tipo" class="form-control"><option value="Analisis causa raiz">Analisis causa raiz</option><option value="Accion de contingencia">Accion de contingencia</option> <option value="Accion correctiva">Accion correctiva</option><option value="Accion propuesta a realizar">Accion propuesta a realizar</option><option value="Derivacion">Derivacion</option> <option value="Accion para verificar">Accion para verificar</option><option value="Cierre de la accion">Cierre de la accion</option> </select></div></td>
			        <td><div class="form-group"><label for="derivado_a">Derivado a:</label><input type="text" class="form-control" name="derivado_a" placeholder="Ingresa derivacion"></div></td>
					<td><div class="form-group"><label for="descripcion">Descripcion:</label><textarea type="text" class="form-control" name="descripcion" placeholder="Ingresa descripcion" cols="50" rows="7"></textarea></div></td>
					<td><div class="form-group"><label for="plazo">Plazo:</label><input type="date"></div></td>
					<td><div class="form-group"><a href="procesomov.php?id='.$row['id'].'"><button type="submit" class="btn btn-default" >Cargar movimiento</button></div></td>
            
					</tr>';		
		}?>
		
		
</form>


</body>
</html>
