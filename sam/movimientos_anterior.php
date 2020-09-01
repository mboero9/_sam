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
		
	<form action="procesomov.php" method="post">
    <div class="form-group">
     
<!--	 <label for="accion">Accion:</label>
      <input type="accion" class="form-control" id="accion" placeholder="Ingresa accion">
	  
    </div> -->

	
<?php
$enlace = mysql_connect('localhost', 'root', 'Micro2017');
if (!$enlace) {
    die('No se pudo conectar: ' . mysql_error());
}
if (!mysql_select_db('sam')) {
    die('No se pudo seleccionar la base de datos: ' . mysql_error());
}
$resultado = mysql_query('SELECT id FROM accionesdemejora ORDER BY id DESC LIMIT 1');

$id = $_GET['id'];
//$sql = "SELECT * FROM accionesdemejora where id = '$id'";
$sql = "SELECT id, titulo, tipo, origen, area, proceso, descripcion, objetivo, 
		 observacion, estado, subestado, fecha_validacion FROM accionesdemejora WHERE id='$id'";

// $accion = "INSERT INTO `movimientos` SET `movi` = '$id' WHERE `movimientos`.`id` = '$id'"


		 
if (!$resultado) {
    die('No se pudo consultar:' . mysql_error());
}
	
?>	
<?php
 
	echo '<div class="form-group"><label for="observacion">Accion N°: '.$row['id'].'</div>';

	?>
	<div class="form-group">
		<label for="tipo">Tipo:</label>
	  		<select type="text" name="tipo" class="form-control">
			<option value="Analisis causa raiz">Analisis causa raiz</option> 			
			<option value="Accion de contingencia">Accion de contingencia</option> 
			<option value="Accion correctiva">Accion correctiva</option> 
			<option value="Accion propuesta a realizar">Accion propuesta a realizar</option>
			<option value="Derivacion">Derivacion</option> 
			<option value="Accion para verificar">Accion para verificar</option> 
			<option value="Cierre de la accion">Cierre de la accion</option> 
			</select>
    </div>
	
	
		<script>
		function habilitar(value)
		{
			if(value=="Derivacion" || value==true)
			{
				// habilitamos
				document.getElementById("Derivad_a").disabled=false;
			}else if(value=="2" || value==false){
				// deshabilitamos
				document.getElementById("Derivado_a").disabled=true;
			}
		}
	</script>
		
	
    <div class="form-group">
		<label for="derivado_a">Derivado a:</label>
		<input type="text" class="form-control" name="derivado_a" placeholder="Ingresa derivacion">
    </div>
	
	<div class="form-group">
		<label for="descripcion">Descripcion:</label>
		<textarea type="text" class="form-control" name="descripcion" placeholder="Ingresa descripcion" cols="50" rows="7"></textarea>
    </div>	
	
		
	<div class="form-group">
			<label for="plazo">Plazo:</label>
			<input type="date">
	</div>
		
	<div class="form-group">
	    <button type="submit" value="$accion"	class="btn btn-default">Cargar movimiento</button>
  	</div>

	
</form>
	
</body> 
</html>