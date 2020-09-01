<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Micr0E123";
$dbaccion = "sam";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbaccion);

//Test if connection occurred.
if (mysqli_connect_errno()) {
die("Database connection failed: " .
mysqli_connect_error() .
" (" . mysqli_connect_errno() . ")"
);
}
$id = $_POST['id'];
//Perform database query
$id_mov = $_POST['id_mov'];
$id = $_GET['id'];
$movi = $_POST['movi'];
$tipo = $_POST['tipo'];
$derivado_a = $_POST['derivado_a'];
$descripcion = $_POST['descripcion'];
$plazo = $_POST['plazo'];


//This function will clean the data and add slashes.
// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
$id_mov = mysqli_real_escape_string($connection, $id_mov);
$movi = mysqli_real_escape_string($connection, $movi);
$id = mysqli_real_escape_string($connection, $id);
$tipo = mysqli_real_escape_string($connection, $tipo);
$derivado_a = mysqli_real_escape_string($connection, $derivado_a);
$descripcion = mysqli_real_escape_string($connection, $descripcion);
$plazo = mysqli_real_escape_string($connection, $plazo);

//This should retrive HTML form data and insert into database
$query  = "INSERT INTO movimientos (id_mov, movi, tipo, derivado_a, descripcion, plazo) 
           VALUES ('".$_POST["id_mov"]."','".$_POST["$id->movi"]."','".$_POST["tipo"]."','".$_POST["derivado_a"]."','".$_POST["descripcion"]."','".date('Y-m-d H:i:s')."')";


//INSERT INTO productImages(order) SELECT (MAX(order)+1) FROM productImages;


        $result = mysqli_query($connection, $query);
//$sql_1 = "INSERT INTO movimientos (movi) SELECT (MAX(order)+1) FROM movimientos; 
     
//Test if there was a query error
        if ($result) {
            //SUCCESS
       header('Location: graciasmov.php');
        } else {
            //FAILURE
            die("Database query failed. " . mysqli_error($connection)); 
            //last bit is for me, delete when done
        }

mysqli_close($connection);
?>

