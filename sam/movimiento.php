<?php
  $page_title = 'Vista Accion';
  require_once('includes/load.php');
?>
<?php

 page_require_level(1);

 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<?php

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'sam'; // Database Name   

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$id_mov = $_GET['id_mov'];
//$sql = "SELECT * FROM accionesdemejora where id = '$id'";
$sql = "SELECT id_mov, movi, fecha_movimiento, tipo, derivado_a, descripcion, plazo FROM movimientos WHERE id_mov='$id_mov'";
//$sql2 =	"UPDATE titulo FROM accionesdemejora WHERE id='$id'";	
$query = mysqli_query($conn, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
	if (isset($_POST['submit'])) {
    
    $sql2 = "DELETE FROM movimientos WHERE id_mov='$id_mov'";
     $result = $conn->query($sql2);  
	   if ($conn->query($sql2) === TRUE) {
        echo "<script>location.href='home.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
?>


<html lang="en">
<head>
  <title>Movimiento N</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


      <a class="navbar-brand" href="#"></a>

    <td><button class="btn btn-danger navbar-btn" onclick="location.href='index.php'">Volver</button></td> 

  </div>
</nav>



<meta charset="UTF-8">

<style>
.table {
    border: solid 1px #ff7857;
    border-spacing: 1;
    font: normal 18px Arial, sans-serif;
	width: 100%;
}


td {
	text-align: left;
	margin: 0 20px 10px 0;
    border: solid 2px #ff7857;
    color: #333;
    padding: 10px;
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

<div class="container">
		
  
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '
			
					
					<table class="table">
					<tbody>
						<tr><th style="background-color:#ff7857;color:white;" width="20%">ID</th><td>'.$row['id_mov'].'</td></tr>
						<tr><th style="background-color:#ff7857;color:white;" width="20%">Accion</th><td>'.$row['movi'].'</td></tr>
						<tr><th style="background-color:#ff7857;color:white;" width="20%">fecha Movimiento</th><td>'.$row['fecha_movimiento'].'</td></tr>
						<tr><th style="background-color:#ff7857;color:white;" width="20%">tipo</th><td>'.$row['tipo'].'</td></tr>
						<tr><th style="background-color:#ff7857;color:white;" width="20%">Derivado a</th><td>'.$row['derivado_a'].'</td></tr>
						<tr><th style="background-color:#ff7857;color:white;" width="20%">Descripcion</th><td>'.$row['descripcion'].'</td></tr>								
						<tr><th style="background-color:#ff7857;color:white;" width="20%">Plazo	</th><td>'.$row['plazo'].'</td></tr>
					</tbody>
					</table>
					
	<tr><div method="post" class="container">
	  <a href="actualizacion_mov.php?id_mov='.$row['id_mov'].'"> 
					
		<button type="submit" class="btn btn-danger navbar-btn" onclick="location.href="actualizacion.php" >Actualizar Movimiento</button>
		</a>
		<br></br>
		<form id="userInfo" action="#" method="post">
					<td colspan="2"><input type="submit" name="submit" value="Borrar" class="btn btn-danger navbar-btn"></td>
					</form>
	</div></tr>		
	';	
					
				
		}?>

</div>

			
</body>
</html>