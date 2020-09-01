<?php
  $page_title = 'Home SAM';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
  page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'sam'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

	if (isset($_POST['submit'])) {
    
    $sql = "INSERT INTO accionesdemejora (tipo, fecha_alta, origen, area, proceso, titulo, descripcion, objetivo, observacion, estado, subestado) 
            VALUES ('".$_POST["tipo"]."','".date('Y-m-d H:i:s')."','".$_POST["origen"]."','".$_POST["area"]."','".$_POST["proceso"]."','".$_POST["titulo"]."','".$_POST["descripcion"]."','".$_POST["objetivo"]."','".$_POST["observacion"]."','".$_POST["estado"]."','".$_POST["subestado"]."')";
       
	   if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='gracias.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
	
//$resultado2 = mysql_query("UPDATE movimientos SET movi='$id' WHERE movimientos id = '$id'");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SAM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
</head>
<body>


<body>

	<!--<div class="container">
		<h2></h2>
-->
	<form action="#" method="post">
    <div class="form-group">
     
	<table class="form-group">
		<tr><td><label for="tipo">TIPO:</label>
	  		<select type="text" name="tipo" class="form-control">
			<option value=""></option> 
			<option value="Accion de mejora">Accion de mejora</option> 
			<option value="Observacion">Observacion</option> 
			<option value="Oportunidad de mejora">Oportunidad de mejora</option>
			<option value="No conformidad">No conformidad</option> 
			</select></td>
        
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>		
		
		<td><label for="origen">ORIGEN:</label>
			<select type="text" name="origen" class="form-control">
			<option value=""></option> 			
			<option value="Auditoria interna">Auditoria interna</option> 
			<option value="Desvio">Desvio</option> 
			<option value="Propuesta">Propuesta</option>
			<option value="Reclamo de clientes">Reclamo de clientes</option> 
			<option value="Encuestas">Encuestas</option>
			</select></td>

		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			
		<td><label for="area">AREA:</label>
			<select type="text" name="area" class="form-control">
			<option value=""></option> 			
			<option value="Administracion del Personal">Administracion del Personal</option> 
			<option value="Admision">Admision</option>
			<option value="Analisis y Desarrollo">Analisis y Desarrollo</option>
			<option value="Base de Datos">Base de Datos</option>
			<option value="Calidad y Procesos">Calidad y Procesos</option>
			<option value="Canales">Canales</option>
			<option value="Clientes y Calidad de Servicios">Clientes y Calidad de Servicios</option>
			<option value="Clima Organizacional">Clima Organizacional</option>
			<option value="Compras">Compras</option>
			<option value="Contabilidad y Finanzas">Contabilidad y Finanzas</option>
			<option value="Control de Gestion">Control de Gestion</option>
			<option value="Desarrollo de Segmentos">Desarrollo de Segmentos</option>
			<option value="Desarrollo de Sucursales">Desarrollo de Sucursales</option>
			<option value="Desarrollo Organizacional">Desarrollo Organizacional</option>
			<option value="Gestion de Riesgo">Gestion de Riesgo</option>
			<option value="Inteligencia de Clientes">Inteligencia de Clientes</option>
			<option value="Marketing y Propuesta de Valor">Marketing y Propuesta de Valor</option>
			<option value="Modelos de Riesgo">Modelos de Riesgo</option>
			<option value="Normalizacion y Cobranza">Normalizacion y Cobranza</option>
			<option value="Riesgo en Sucursales">Riesgo en Sucursales</option>
			<option value="Seguimiento Comercial">Seguimiento Comercial</option>
			<option value="Seguimiento de Sucursales">Seguimiento de Sucursales</option>
			<option value="Seguimiento y Control de Riesgo">Seguimiento y Control de Riesgo</option>
			<option value="Soporte IT">Soporte IT</option>
			<option value="Soporte de Aplicaciones">Soporte de Aplicaciones</option>
			<option value="Subgerencias Zonales">Subgerencias Zonales</option>
			</select></td>
	
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

	<td><label for="proceso">PROCESO:</label>
			<select type="text" name="proceso" class="form-control">
			<option value=""></option> 
			<option value="Alta y baja de usuarios y Sucursales">Alta y baja de usuarios y Sucursales</option> 
			<option value="Analisis y Desarrollo de software">Analisis y Desarrollo de software</option>
			<option value="Asignacion de equipos">Asignacion de equipos</option>
			<option value="Atencion de incidentes">Atencion de incidentes</option>
			<option value="Búsqueda y Seleccion">Búsqueda y Seleccion</option>
			<option value="Capacitacion">Capacitacion</option>
			<option value="Comunicacion Interna">Comunicacion Interna</option>
			<option value="Demanda de Clientes">Demanda de Clientes</option>
			<option value="Desarrollo de Colaboradores">Desarrollo de Colaboradores</option>
			<option value="Fidelizacion de Clientes">Fidelizacion de Clientes</option>
			<option value="Gestion de Finanzas">Gestion de Finanzas</option>
			<option value="Gestion de Documentación">Gestion de Documentación</option>
			<option value="Gestion de Productos y Segmentos">Gestion de Productos y Segmentos</option>
			<option value="Gestion de Personal">Gestion de Personal</option>
			<option value="Gestion de Reclamos">Gestion de Reclamos</option>
			<option value="Gestion Estrategica">Gestion Estrategica</option>
			<option value="Mejora Continua">Mejora Continua</option>
			<option value="Proceso de Credito">Proceso de Credito</option>
			<option value="Proceso de Compras">Proceso de Compras</option>
			<option value="Seguridad Informatica">Seguridad Informatica</option>
	</table></td></tr>
	
    <div class="form-group">
		<label for="titulo">TITULO:</label>
		<input type="text" class="form-control" name="titulo" placeholder="Ingresa titulo">
    </div>
	
	<div class="form-group">
		<label for="descripcion">DESCRIPCION:</label>
		<textarea type="text" class="form-control" name="descripcion" placeholder="Ingresa descripcion" cols="50" rows="7"></textarea>
    </div>
	
	<div class="form-group">
		<label for="objetivo">OBJETIVO:</label>
		<textarea type="text" class="form-control" name="objetivo" placeholder="Ingresa objetivo"></textarea>
    </div>
	
	<div class="form-group">
		<label for="observacion">OBSERVACION:</label>
		<textarea type="text" class="form-control" name="observacion" placeholder="Ingresa observacion"></textarea>
    </div>
	
	
	<table class="form-group">
		<tr><td><label for="estado">ESTADO:</label>
	  		<select type="text" name="estado" class="form-control">
			<option value="Abierta">Abierta</option> 
			<option value="Presentada">Presentada</option> 
			<option value="Cerrada">Cerrada</option>
			</select></td>
    
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	
		<td><label for="subestado">SUBESTADO:</label>
	  		<select type="text" name="subestado" class="form-control">
			<option value="Aprobada">Aprobada</option> 
			<option value="En ejecucion">En ejecucion</option> 
			<option value="En estudio">En estudio</option>
			<option value="Implementada">Implementada</option> 
			<option value="Rechazada">Rechazada</option> 
			<option value="Exitosa">Exitosa</option>
			<option value="Sin exito">Sin exito</option>			
			</select></td>

		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>			
	
		<td><label for="archivo_adjunto">ARCHIVO ADJUNTO:</label>
		<input type="file" name="adjunto" class="form-control"/></td>
		
    </tr></table>
	
	<!-- <div class="form-group">
			<label for="fecha_validacion">Fecha de validacion:</label>
			<input type="date">
	</div> -->
	<div class="form-group">
<tr>
<td colspan="2"><input type="submit" name="submit" value="Cargar" class="btn btn-danger navbar-btn"></td>
</tr>
</div>	
		
	
</form>
	
</body> 
</html>
