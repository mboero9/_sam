<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$Linea = $_GET['Linea'];

	if (isset($_POST['submit'])) {
    
   $sql = "UPDATE flota SET Modelo_Utilizado = '".$_POST["Modelo_Utilizado"]."', Alias_Movistar = '".$_POST["Alias_Movistar"]."' WHERE Linea='$Linea'";
       
	   if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='flota.php';</script>";
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
<a href="javascript:history.back()"><img src="images/flech.png" height="60" width="60" alt="Boton">
<body>

<div class="container">
	<h3 style="font-family:verdana;">Editar</h3>	
	<form action="#" method="post">
    <div class="form-group">
<tr>					
   	<table><td><label class="control-label" value="<?php echo $Linea; ?>"></label></td></table>
					<table>

				<tr><td><label for="Modelo_Utilizado">Modelo Utilizado:</label><input type="text" class="form-control" name="Legajo" placeholder="Samsung S9"></td></tr>
					</table>
				
					<table>
        <tr><td><div class="form-group"><label for="nombre">Alias Movistar:</label><input type="text" class="form-control" name="Alias_Movistar" placeholder="Juan Perez"></td></tr>
						</table>
				
				<br>			
                                         
<td colspan="2"><input type="submit" name="submit" value="Cargar" class="btn btn-success"></td>

</tr>


</form>
</body>
</html>