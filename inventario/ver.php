<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micr0E123'; // Password
$db_name = 'inventario'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$DNI = $_GET['DNI'];

	if (isset($_POST['submit'])) {
    
   $sql = "SELECT * FROM Nomina WHERE DNI='$DNI'";
       
	   if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='legajos.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
?>

<html lang="en">
<head>
  <title>Cargar</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
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
<body>

  	
		<thead>

   
   <div class="container">
		<table class = "table table-bordered table-striped" id="chupala">
 	
		
		<hr style="color: #0056b2;" />
		             <span>
						<img src="img/logo_pm.png" alt="">
					 </span>
		
		
  
        <br>
		<br>
		<input class = "form-control" id = "demo" type = "text" placeholder = "Buscador">
		<br>
		<tr>
			<!--<th>id</th>-->

			<th>Legajo</th>
			<th>Nombre</th>
    <!-- <th>Borrar</th>
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
echo '<h1 class="' . $DNI . '"></h1>';
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>				       
					<td>'.$row['Legajo'].'</td>
          <td>'.$row['Nombre'].'</td>				
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
</form>
</body>
</html>