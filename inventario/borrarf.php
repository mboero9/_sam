<?php
  $page_title = 'Home Inventario';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}  
?>
<?php
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = 'Micr0E123'; 
$db_name = 'inventario';  

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$Linea = $_GET['Linea'];

$sql = "SELECT * FROM flota WHERE Linea='$Linea'";
//$sql2 =	"UPDATE titulo FROM WHERE id='$id'";	
$query = mysqli_query($conn, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
	if (isset($_POST['submit'])) {
    
    $sql2 = "DELETE FROM flota WHERE Linea='$Linea'";
     $result = $conn->query($sql2);  
	   if ($conn->query($sql2) === TRUE) {
        echo "<script>location.href='flota.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
?>


<html lang="en">
<head>
  <title>Borrar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<a href="javascript:history.back()"><img src="images/flech.png" height="60" width="60" alt="Boton">
<div class="container">
<script language="javascript">
function veriFicar() {
    if (confirm("Seguro que queres borrar?")) {
    } else {
        return false;
    }
}
</script>
		
  
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '
			
					
					<table class="table">
					<tbody>
						<tr><th>Linea</th><td>'.$row['Linea'].'</td></tr>
						<tr><th>Alias Movistar</th><td>'.$row['Alias_Movistar'].'</td></tr>
						<tr><th>Modelo registrado</th><td>'.$row['Modelo_registrado'].'</td></tr>
         
					</tbody>
					</table>
					
	<tr><div method="post" class="container">
	  <a href="borrarf.php?Linea='.$row['Linea'].'"> 
					  
		</a>

		<form id="userInfo" action="#" method="post">
					<td colspan="2"><input type="submit" name="submit" value="Borrar" class="btn btn-danger navbar-btn" onClick="return veriFicar()"></td>
					</form>
	</div></tr>		
	';	
					
				
		}?>
   

</body>
</html>