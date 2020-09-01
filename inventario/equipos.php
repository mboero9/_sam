<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$NombreEquipo = $_GET['NombreEquipo'];
//$sql = "SELECT * FROM celulares ";
$sql = "SELECT * FROM computadoras WHERE NombreEquipo='$NombreEquipo'";


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
 <a href="javascript:history.back()"><img src="images/flech.png" height="60" width="60" alt="Botón">
 </a>
<body>


  </nav>

<div class="container">			
		<table class="table table-striped">
  	
		<thead>
		<tr>
		    <th>Nombre Equipo</th>
			<th>FILIAL</th>
			<th>IP</th>
			<th>Modelo</th>
			<th>Serial Number</th>
			<th>Nombre sucursal</th>
			<th>Colaborador</th>
			<th>Usuario NT</th>
			<th>Estado</th>
			<th>Remoto</th>
		</tr>
		</thead>
		
				
		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					
					<td>'.$row['NombreEquipo'].'</td>
					<td>'.$row['FILIAL'].'</td>
					<td>'.$row['IP'].'</td>
					<td>'.$row['Modelo'].'</td>
					<td>'.$row['SerialNumber'].'</td>
					<td>'.$row['Nombre'].'</td>
					<td>'.$row['Usuario'].'<br><form action="#" method="post"><input type="text" id="Usuario" name="submit"
       minlength="4" maxlength="18" size="10"><input type="submit" name="submit" value="Actualizar" class="btn btn-info"></form></td>
					<td>'.$row['UserWindowsNT'].'</td>
					<td>'.$row['Estado'].'</td>
					<td>'.$row['CA'].'</td>
		
				</tr>';

		}
				(isset($_POST["Usuario"])) ? $Usuario = $_POST["Usuario"] : $Usuario=1;
 
	if (isset($_POST['submit'])) {
    
    $sql2 = "UPDATE computadoras SET Usuario = '".$_POST["Usuario"]."' WHERE NombreEquipo='$NombreEquipo'";
     $result = $conn->query($sql2);  
	   if ($conn->query($sql2) === TRUE) {
        echo "<script>location.href='inventario.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
	
		?>
		</tbody>
     </table>  

	

	
</div>



