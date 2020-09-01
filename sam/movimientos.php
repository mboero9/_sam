<?php
date_default_timezone_set('america/buenos_aires');
  $page_title = 'Movimientos';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
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

$id = $_GET['id'];
//$sql = "INSERT INTO movimientos (movi) values ('$id')";
$datepicker = date('Y-m-d',strtotime($_POST['datepicker']));
//echo date('Y-m-d', strtotime($datepicker));

	if (isset($_POST['submit'])) {
    
    $sql2 = "INSERT INTO movimientos (movi, tipo, derivado_a, descripcion, plazo) VALUES ('".$id."','".$_POST["tipo"]."','".$_POST["derivado_a"]."','".$_POST["descripcion"]."','".$datepicker."')";
       
	   if ($conn->query($sql2) === TRUE) {
        echo "<script>location.href='graciasmov.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
	
//$resultado2 = mysql_query("UPDATE movimientos SET movi='$id' WHERE movimientos id = '$id'");


?>

<html lang="en">
<head>
  <title>Carga de Movimientos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
   	<script type="text/javascript">
$(function() {
    $( "#datepicker" ).datepicker();
    $( "#format" ).change(function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  });
  $(document).ready(function () {
    $('#example1').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
    });

    //Alternativa 2
    $('#example2').datepicker({
      format: "dd/mm/yyyy"
    }).on('change', function(){
        $('.datepicker').hide();
    });

});
</script>
</head>
<body>


</nav>

<div class="container">
	<h3 style="font-family:verdana;">Carga de Movimientos</h3>	
	<form action="#" method="post">
    <div class="form-group">
<tr>
					
					<table>
				    <tr><td><label for="observacion">ACCION:</label><select type="text" name="tipo" class="form-control"><option value="observacion"><?php echo $id ?></option></select></td>
					</table>
					<tr>&nbsp;&nbsp;</tr>
					<table>
					<td><label for="tipo">TIPO:</label><select type="text" name="tipo" class="form-control"><option value="Analisis causa raiz">Analisis causa raiz</option><option value="Accion de contingencia">Accion de contingencia</option> <option value="Accion correctiva">Accion correctiva</option><option value="Accion propuesta a realizar">Accion propuesta a realizar</option><option value="Derivacion">Derivacion</option> <option value="Accion para verificar">Accion para verificar</option><option value="Cierre de la accion">Cierre de la accion</option> </select><td>
			        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><label for="derivado_a">DERIVADO A:</label><input type="text" class="form-control" name="derivado_a" placeholder="Ingresa derivacion"></td></tr>
					</table>
					<tr>&nbsp;&nbsp;</tr>
					
					<tr><td><div class="form-group"><label for="descripcion">DESCRIPCION:</label><textarea type="text" class="form-control" name="descripcion" placeholder="Ingresa descripcion" cols="50" rows="7"></textarea></div></td></tr>
					
					<table>
					<tr><td><label for="plazo">PLAZO:</label></td>&nbsp;&nbsp;<td><td><input type="text" name="datepicker"  placeholder="dd/mm/aaaa" id="datepicker" size="15" /></td></tr>
					</table>
	<br></br>
					</tr>
							<tr>
<td colspan="2"><input type="submit" name="submit" value="Cargar" class="btn btn-danger navbar-btn"></td>

</tr>

</nav>
	
</form>

</body>
</html>


