<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php

 page_require_level(1);

 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
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

    <td><button class="btn btn-danger navbar-btn" onclick="location.href='index.php'">Volver</button></td> 
	
  </div>
</nav>
</body>
</html>
<?php
$enlace = mysql_connect('localhost', 'root', 'Micr0E123');
if (!$enlace) {
    die('No se pudo conectar: ' . mysql_error());
}
if (!mysql_select_db('sam')) {
    die('No se pudo seleccionar la base de datos: ' . mysql_error());
}
$resultado = mysql_query('SELECT id FROM accionesdemejora ORDER BY id DESC LIMIT 1');
if (!$resultado) {
    die('No se pudo consultar:' . mysql_error());
}


echo "Se ha cargado con exito la acción N°:" ; 

echo mysql_result($resultado,0);

mysql_close($enlace);
	

?>