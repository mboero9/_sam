<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micro89$'; // Password
$db_name = 'sam'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$id = $_GET['id'];
$sql = "SELECT * FROM accionesdemejora where id = '$id'";
//$sql = "INSERT INTO movimientos (movi) values ('$id')";


//$sql2 = "INSERT INTO movimientos (movi) 
//            VALUES ('".$_POST["id"]."')";

//$sql2 = mysql_query ("UPDATE movimientos SET movi='$id' WHERE movimientos id = '$id'") ;
	

$query = mysqli_query($conn, $sql);

$resultado = mysql_query('SELECT id FROM accionesdemejora ORDER BY id DESC LIMIT 1');

//$resultado2 = mysql_query("UPDATE movimientos SET movi='$id' WHERE movimientos id = '$id'");

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));

}


?>