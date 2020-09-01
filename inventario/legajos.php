<?php
  $page_title = 'Home Inventario';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) || time() - $session['login_time'] > 10) { redirect('index.php', false);}  
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

$sql = 'SELECT * from Nomina';
//$sql = 'SELECT * FROM celulares';		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}	
?>

<html lang="en">
<head>
  <title>Nomina</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>  
 <script src="js/jquery_1_11_0_min.js"></script>
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

 <br>
		<a href="logout.php"><button type="button3" class="navbar-brand pull-right">Salir</button></a>
</head>
<body>

  	
		<thead>

   
   <div class="container">
		<table class = "table table-bordered table-striped" id="chupala">
 	
		
		<hr style="color: #0056b2;" />
		             <span>
						<img src="img/logo_pm.png" alt="">
					 </span>
		<center><img src="img/inv_nom.png" alt=""></center>
		
        <br>
		<div class="btn-group">
            <a href="inventario.php"><button type="button1" class="btn btn-success">Home</button></a>
            <a href="carga.php"><button type="button1" class="btn btn-success">Agregar</button></a>
         </div>
        <br>
		<br>
		<input class = "form-control" id = "demo" type = "text" placeholder = "Buscador">
		<br>
		<tr>
			<!--<th>id</th>-->
			<th>DNI</th>
			<th>Legajo</th>
			<th>Nombre</th>
      <th>Borrar</th>
      <th>Ver</th>
		<!--<th>Celular Ultimo</th>-->
			<!--<th>Numero Movistar</th>-->
			<!--<th>Computadora</th>-->
			<!--<th>Zona</th>-->
		<!--<th>Perfil</th>-->
		<!--	<th>Telefonos</th>-->
			
			
		</tr>
		</thead>

				
		<tbody id = "test">
		
		<?php

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
			    
				      
			    <td>'.$row['DNI'].'</td>  
					<td>'.$row['Legajo'].'</td>
          <td>'.$row['Nombre'].'</td>
          <td><a href="borrar.php?DNI='.$row['DNI'].'"><button class="btn btn-primary" onclick="myFunction()">Borrar</button></a></td>
					<td><a href="ver.php?DNI='.$row['DNI'].'"><button class="btn btn-danger" onclick="myFunction()">Ver</button></a></td>
					
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
</body>
</html>

