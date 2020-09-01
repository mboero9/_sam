
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
    
    $sql = "INSERT INTO flota (Linea, Alias_Movistar, Modelo_registrado, IMEI, Fecha, Contratacion, Garantia, Modelo_Utilizado, IMEI_MU ) 
            VALUES ('".$_POST["Linea"]."','".$_POST["Alias_Movistar"]."','".$_POST["Modelo_registrado"]."','".$_POST["IMEI"]."','".$_POST["Fecha"]."','".$_POST["Contratacion"]."','".$_POST["Garantia"]."','".$_POST["Modelo_Utilizado"]."','".$_POST["IMEI_MU"]."')";
       
	   if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='flota.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
?>

<html>
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


					<td><label for="Linea">Linea:</label><input type="text" class="form-control" name="Linea" placeholder="118212281"></td></tr>
					</table>
					
					<table>
					<tr><td><div class="form-group"><label for="Alias_Movistar">Nombre:</label><input type="text" class="form-control" name="Alias_Movistar" placeholder="Juan Perez"></td></tr>
				
					<table>
					<tr><td><label for="Modelo_registrado">Modelo registrado Movistar:</label><input type="text" class="form-control" name="Modelo_registrado" placeholder="Samsung S9 Plus"></td></tr>
					</table>
             <br> 
            	<table>
					<tr><td><label for="IMEI">IMEI:</label><input type="text" class="form-control" name="IMEI" placeholder="134234232122"></td></tr>
					</table> 
          	<table>
					<tr><td><label for="Fecha">Fecha:</label><input type="text" class="form-control" name="Fecha" placeholder="22/12/2019"></td></tr>
					</table>
          	<table>
					<tr><td><label for="Contratacion">Contratacion:</label><input type="text" class="form-control" name="Contratacion" placeholder="Venta nuevo"></td></tr>
					</table>        
          	<table>
					<tr><td><label for="Garantia">Garantia:</label><input type="text" class="form-control" name="Garantia" placeholder="SI/NO"></td></tr>
					</table>
          	<table>
					<tr><td><label for="Modelo_Utilizado">Modelo Utilizado:</label><input type="text" class="form-control" name="Modelo_Utilizado" placeholder="Samsung S9 Plus"></td></tr>
					</table>
          	<table>
					<tr><td><label for="IMEI_MU">IMEI MU:</label><input type="text" class="form-control" name="IMEI_MU" placeholder="321321312232"></td></tr>
					</table> 
          <br>                                        
<td colspan="2"><input type="submit" name="submit" value="Cargar" class="btn btn-success"></td>

</tr>

</nav>
	
</form>
</body>
</html>