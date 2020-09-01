<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$FILIAL = $_GET['FILIAL'];
//$sql = "SELECT * FROM celulares ";
$sql = "SELECT * FROM computadoras WHERE FILIAL='$FILIAL'";

//$sql = "SELECT A.id, A.movi, A.fecha_movimiento, A.tipo, A.derivado_a, A.plazo, A.descripcion FROM movimientos A JOIN accionesdemejora T ON A.id=t.id where a.id='$id'";

//$sql2 = mysql_query ("UPDATE movimientos SET movi=movi+1 WHERE movimientos id = '$id'") ;
	

$query = mysqli_query($conn, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>
<html lang="en">
<head>
  <title>Equipos x Filial</title>
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
		             <span>
						<img src="img/logo_pm.png" alt="">
					 </span>
		<center><img src="img/fil.png" alt=""></center>
        <br>
		<hr style="color: #0056b2;" />	
		<!--<input class = "form-control" id = "demo" type = "text" placeholder = "Buscar..">-->
	

		<tr>
		    <th>Nombre Equipo</th>
			<th>FILIAL</th>
			<th>Modelo</th>
			<th>Numero serie</th>
		</tr>
		</thead>
		
				
		<tbody id = "test">
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td><a href="equipos.php?NombreEquipo=' . $row['NombreEquipo'] . '">' . $row['NombreEquipo'] . '</a></td>
					<td>'.$row['FILIAL'].'</td>
					<td>'.$row['Modelo'].'</td>
					<td>'.$row['SerialNumber'].'</td>

				</tr>';
	
		}?>
	
		</tbody>
			 <script>
         $(document).ready(function(){
            $("#demo").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $("#test tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
               });
            });
         });
  </script> 
     </table>  
</div>


