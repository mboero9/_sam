<html>
<head>


  <title>Carga de Movimiento</title>
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
      <a class="navbar-brand" href="#">Nuevo Movimiento</a>
    </div>
    <button class="btn btn-danger navbar-btn" onclick="location.href='principal.php'">Volver</button> 
  </div>
</nav>


	<div class="container">
		
	<form>
    <div class="form-group">
     
<!--	 <label for="accion">Accion:</label>
      <input type="accion" class="form-control" id="accion" placeholder="Ingresa accion">
	  
    </div> -->

	
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
//$sql = "SELECT * FROM accionesdemejora where id = '$id'";
//$sql = "SELECT * FROM accionesdemejora WHERE id='$id'";

//$sql2 =	"UPDATE titulo FROM accionesdemejora WHERE id='$id'";	

//$query = mysqli_query($conn, $sql);
$sql = "INSERT INTO movimientos 
             (id_mov, movi, tipo, derivado_a, descripcion, plazo)
      VALUES ('$id_mov', '$movi', $tipo, '$derivado_a', '$descripcion', '$plazo')";
$result = mysql_query($sql);

if ( ! $result ) {
    // the insert failed 
}

$sql = "SELECT id_mov, movi, tipo, derivado_a, descripcion, plazo 
        FROM movimientos 
           LEFT JOIN accionesdemejora ON 
                movimientos.movi = accionesdemejora.id
        WHERE
          accionesdemejora.id = $id";
$result = sql_query($sql);
if ( ! $result ) {
    // the select failed
} 

while ( $row = mysql_fetch_array($result) ) {
	
		echo '<tr>
					
				    <td><div class="form-group"><label for="observacion">Accion:</label><select type="text" name="tipo" class="form-control"><option value="observacion">'.$row['id'].'</option></select></div></td>
					<td><div class="form-group"><label for="tipo">Tipo:</label><select type="text" name="tipo" class="form-control"><option value="Analisis causa raiz">Analisis causa raiz</option><option value="Accion de contingencia">Accion de contingencia</option> <option value="Accion correctiva">Accion correctiva</option><option value="Accion propuesta a realizar">Accion propuesta a realizar</option><option value="Derivacion">Derivacion</option> <option value="Accion para verificar">Accion para verificar</option><option value="Cierre de la accion">Cierre de la accion</option> </select></div></td>
			        <td><div class="form-group"><label for="derivado_a">Derivado a:</label><input type="text" class="form-control" name="derivado_a" placeholder="Ingresa derivacion"></div></td>
					<td><div class="form-group"><label for="descripcion">Descripcion:</label><textarea type="text" class="form-control" name="descripcion" placeholder="Ingresa descripcion" cols="50" rows="7"></textarea></div></td>
					<td><div class="form-group"><label for="plazo">Plazo:</label><input type="date"></div></td>
					<td><div class="form-group"><a href="procesomov.php?id='.$row['id'].'"><button type="submit" function = class="btn btn-default">Cargar movimiento</button></div></td>
            
					</tr>';
    // process each row returned by the select query
}	

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}


?>
</form>
	
</body> 
</html>


	
