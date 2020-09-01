<?php
  $page_title = 'Home Inventario';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}  
?>
<?php
$db_host = 'localhost'; // Servidor
$db_user = 'root'; // usuario
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // base

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * from flota';
//$sql = 'SELECT * FROM celulares';		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}	
?>

<html lang="en">
<head>
  <title>Flota Celulares</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" language="javascript" src="tableFilter/tablefilter.js"></script>  
 <script src="tablefilter/jquery_1_11_0_min.js"></script>
 <script src='tablefilter/multifilter.js'></script>

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

  	
		<thead>

   
   <div class="container">
		<table class = "table table-bordered table-striped" id="chupala">
   
 	
		
		<hr style="color: #0056b2;" /><script language="javascript" type="text/javascript"> 
//<![CDATA[ 
    var tf1 = setFilterGrid("chupala"); 
//]]> 
</script> 
		             <span>
						<img src="img/logo_pm.png" alt="">
					 </span>
		<center><img src="img/flota.png" alt=""></center>
		
        <br>
		<div class="btn-group">
            <a href="inventario.php"><button type="button1" class="btn btn-success">Home</button></a>
            <a href="cargarf.php"><button type="button1" class="btn btn-success">Agregar</button></a>
         </div>
        <br>
		<br>
		<input class = "form-control" id = "demo" type = "text" placeholder = "Buscador">
		<br>
		<tr>
			<th>Linea</th>
			<th>Alias Movistar</th>
			<th>Modelo registrado Movistar</th>
			<th>Fecha Alta</th>
      <th>Contratacion</th>
      <th>Garantia</th>
			<th>Modelo Utilizado</th>
			
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
			    
				      
			    <td>'.$row['Linea'].'</td>  
					<td>'.$row['Alias_Movistar'].'</td>
          <td>'.$row['Modelo_registrado'].'</td>
          <td>'.$row['Fecha'].'</td>
          <td>'.$row['Contratacion'].'</td>
          <td>'.$row['Garantia'].'</td>
          <td>'.$row['Modelo_Utilizado'].'</td>
          <td><a href="borrarf.php?Linea='.$row['Linea'].'"><button class="btn btn-primary" onclick="myFunction()">Borrar</button></a></td>
					<td><a href="editarf.php?Linea='.$row['Linea'].'"><button class="btn btn-danger" onclick="myFunction()">Editar</button></a></td>	
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
