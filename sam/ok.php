<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'Micro2017'; // Password
$db_name = 'sam'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$id = $_GET['id'];
//$sql = "INSERT INTO movimientos (movi) values ('$id')";
//$sql = "SELECT * FROM accionesdemejora where id = '$id'";


//$sql2 = "INSERT INTO movimientos (movi) 
//            VALUES ('".$_POST["id"]."')";

$sql = mysql_query ("UPDATE movimientos SET movi='$id' WHERE accionesdemejora id = '$id'") ;


$query = mysqli_query($conn, $sql);

//$resultado = mysql_query('SELECT id FROM accionesdemejora ORDER BY id DESC LIMIT 1');

$resultado = mysql_query("UPDATE movimientos SET movi='$id' WHERE movimientos id = '$id'");

    if ($resultado) {
            //SUCCESS
       header('Location: graciasmov.php');
        } else {
            //FAILURE
            die("Database query failed. " . mysqli_error($connection)); 
            //last bit is for me, delete when done
        }

mysqli_close($connection);
?>


?>
