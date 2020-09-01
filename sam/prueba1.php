<html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

 </head>
 <body>
 <?php echo '<p>SITIO DE ACCIONES DE MEJORA</p>'; ?>
 </body>
		
 <p>N°Acción</p>
 
<form action="datos.php" method="post">
<table>	
	<tr>
		<td><p>Tipo: </p></td>
		<td><select name="Tipo">
			<option value="1">Acción de mejora</option> 
			<option value="2">Observación</option> 
			<option value="3">Oportunidad de mejora</option>
			<option value="4">No conformidad</option> 
			</select>
		</td>
		
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td><p>Origen: </p>
		</td>
		<td><select name="Origen">
			<option value="1">Auditoria interna</option> 
			<option value="2">Desvío</option> 
			<option value="3">Propuesta</option>
			<option value="4">Reclamo de clientes</option> 
			<option value="5">Encuestas</option>
			</select>
		</td>  
</table>  

<table>
	<tr>
		<td><p>Proceso: </p></td>
		<td><input type="text" name="Proceso"/> 
		</td>
		
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		
		<td><p>Área: </p>
		</td>
		<td><select name="Área">
			<option value="1">Análisis y Desarrollo</option> 
			<option value="2">Soporte IT</option> 
			<option value="3">Soporte de apliacciones</option>
			<option value="4">Calidad y Procesos</option> 
			<option value="5">Desarrollo de sucursales</option>
			<option value="6">Compras</option>
			<option value="7">Administración del Personal</option> 
								
			</select>
		</td>  
</table>  

<p> Título: <input type="text" name="Título" /></p>

<p> Descripción: <input type="text" name="Descripción" /></p>

<p> Título: <input type="text" name="Título" /></p>


 

    <button  type="submit" >Guardar</button>
	
	
	
	
	
	
	
 </form>
 
 </html>