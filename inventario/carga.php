
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

	if (isset($_POST['submit'])) {
    
    $sql = "INSERT INTO Nomina (Legajo, Nombre, DNI) 
            VALUES ('".$_POST["Legajo"]."','".$_POST["Nombre"]."','".$_POST["DNI"]."')";
       
	   if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='legajos.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
?>

<html lang="en">
<head>
  <title>Cargar</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>


<div class="container">
	<h3 style="font-family:verdana;">Carga</h3>	
	<form action="#" method="post">
    <div class="form-group">
<tr>
					
					<table>


					<td><label for="legajo">Legajo:</label><input type="text" class="form-control" name="Legajo" placeholder="0000"></td></tr>
					</table>
					<tr></tr>
					
					<tr><td><div class="form-group"><label for="nombre">Nombre:</label><input type="text" class="form-control" name="Nombre" placeholder="Juan Perez"></td></tr>
					
					<table>
					<tr><td><label for="dni">DNI:</label><input type="text" class="form-control" name="DNI" placeholder="0000000"></td></tr>
					</table>

					</tr>
							<tr>
             <br>                                         
<td colspan="2"><input type="submit" name="submit" value="Cargar" class="btn btn-success"></td>

</tr>

</nav>
	
</form>
</html>
