<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micro2017'; // Password
$db_name = 'sam'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM accionesdemejora';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html lang="en">
<head>
  <title>SAM</title>
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
      <a class="navbar-brand" href="#">SISTEMA DE ACCION DE MEJORA</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Acciones</a></li>
      <li><a href="#">Movimientos</a></li>
    </ul>
    <button class="btn btn-danger navbar-btn" onclick="location.href='index.html'">ingresar accion</button> 
  </div>
</nav>

<div class="container">

 
	<h1>Acciones</h1>
	<table class="data-table">
		<caption class="title"></caption>
		<thead>
			<tr>
				<th>Accion</th>
				<th>Titulo</th>
				<th>Origen</th>
				<th>Fecha</th>
				<th>Area</th>
			</tr>
		</thead>
		<tbody>
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['id'].'</td>
					<td>'.$row['titulo'].'</td>
					<td>'. date('F d, Y', strtotime($row['date'])) . '</td>
				</tr>';
			$total += $row['amount'];
			$no++;
		}?>
		</tbody>
     </table>  
</div>

</body>
</html>