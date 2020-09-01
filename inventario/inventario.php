<?php
  $page_title = 'Home Inventario';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}  
?>
<?php
$db_host = 'localhost'; // Servidor
$db_user = 'root'; // usuario
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
//$sql = "SELECT  sec1.*, sec2.FILIAL, sec1.Nombre FROM celulares AS sec1 JOIN computadoras AS sec2 ON SUBSTRING(sec1.Sector,1,4) = sec2.FILIAL";
//$sql = 'SELECT  acc1.*, mov2.Usuario, mov2.NombreEquipo, mov2.FILIAL FROM celulares AS acc1 JOIN computadoras AS mov2 ON acc1.Sector = mov2.FILIAL';
$sql = 'SELECT * FROM computadoras';		
$query = mysqli_query($conn, $sql);
  
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}	
?>

<html lang="en">
<head>
  <title>Inventario</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>  
 <script src="js/jquery_1_11_0_min.js"></script>
 <script src="js/funciones.js"></script>
 <script language="javascript" type="text/javascript">  
  function tablas(){
var yea=document.getElementById("chupala").rows.length;
alert(yea);
} 
</script>  
 <style type="text/css">


.table {
   display: table;
   border-collapse: collapse;
}
 
.table .table-row {
   display: table-row;
}
 
.table .table-cell {
   display: table-cell;
   text-align: left;
   vertical-align: top;
   border: 1px solid black;
}
div.scrollmenu {
    background-color: #333;
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 40px;
    text-decoration: none;
}

div.scrollmenu a:hover {
    background-color: #777;
}

</style>

</head>
<body>

<div class="container">
		<table class = "table table-bordered table-striped" id="chupala">
  	
		<thead>
   <br>
		<a href="logout.php"><button type="button3" class="navbar-brand pull-right">Salir
    </button></a>
   
		<hr style="color: #0056b2;" />
		             <span>
						<img src="img/logo_pm.png" alt="">
					 </span>
		<center><img src="img/inv.png" alt=""></center>
		
        <br>
		<div class="btn-group">
            <a href="telefonos.php"><button type="button1" class="btn btn-primary">Telefonos</button></a>
          <!--  <a href="usuarios.php"><button type="button2" class="btn btn-primary">Usuarios</button></a>-->
            <a href="computadoras.php"><button type="button3" class="btn btn-primary">Equipos</button></a>
            <a href="legajos.php"><button type="button3" class="btn btn-primary">Nomina</button></a>
            <a href="flota.php"><button type="button3" class="btn btn-primary">Flota Celulares</button></a>
         </div>
        <br>
		<br>
		</br>
		<input class = "form-control" id = "demo" type = "text" placeholder = "Buscar..">
		<br>
   <a href="cargar.php"><button type="button1" class="btn btn-success">Agregar</button></a></button></a>
   <br>
   </br>  
		<tr>
			<th>FILIAL</th>
			<th>Nombre</th>
			<th>Usuario</th>
			<!--<th>Modelo</th>-->
		 <th>Nombre Equipo</th>
			<th>Serial Number</th>
			<th>IP</th>
			<th>User Windows NT</th>
		<!--<th>Perfil</th>-->
			<th>Editar</th>
			
		<!--<th>Equipos por Filial</th>-->
		</tr>
		</thead>

				
  		<tbody id = "test">
  		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
			        <div style="table-layout: fixed; max-height: 100px; max-width: 100px; width: 100px; overflow: auto;">
				   <td><a href="Modificar_datos.php?FILIAL=' . $row['FILIAL'] . '">' . $row['FILIAL'] . '</a></td>
            <td>'.$row['Nombre'].'</td>           
				  <!--  <td><a href="ver_dato.php?Usuario=' . $row['Usuario'] . '">' . $row['Usuario'] . '</a></td>-->
				    <td>'.$row['Usuario'].'</td>  
					  <td><a href="ver_dato.php?NombreEquipo=' . $row['NombreEquipo'] . '">' . $row['NombreEquipo'] . '</a></td>
					<!--<td>'.$row['Celular_Ultimo'].'</td>-->
					<td>'.$row['SerialNumber'].'</td>
			        <td>'.$row['IP'].'</td>
				    <td>'.$row['UserWindowsNT'].'</td>
					<!--<td><a href="sector.php?telefonosxsucursal="<button>Telefonos Filiales</button></a></td>-->
				
					<!--<td><a href="filial.php?FILIAL=' . $row['FILIAL'] . '">' . $row['FILIAL'] . '</a></td>
					<!--<td><a href="ver_contacto.php?id='.$row['id'].'"><button class="btn btn-primary btn-sm" onclick="myFunction()">Cargar dato</button></a></td>-->
					<td><a href="Modificar_datos.php?id='.$row['id'].'"><button class="btn btn-primary btn-sm" onclick="myFunction()">Modificar</button></a></td>	
</div>					
				</tr>';
		}?>
		</tbody>
     </table>  
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
<? 
echo "Contador " . $_SESSION["cuenta_paginas"] . " "; 
?> 


</body>
</html>


