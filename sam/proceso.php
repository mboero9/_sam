<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Micro89$";
$dbaccion = "sam";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbaccion);

//Test if connection occurred.
if (mysqli_connect_errno()) {
die("Database connection failed: " .
mysqli_connect_error() .
" (" . mysqli_connect_errno() . ")"
);
}

//Perform database query
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$origen = $_POST['origen'];
//$fecha = $_POST['fecha'];
$area = $_POST['area'];
$descripcion = $_POST['descripcion'];
$objetivo = $_POST['objetivo'];
$observacion = $_POST['observacion'];
$estado = $_POST['estado'];
$subestado = $_POST['subestado'];
$proceso = $_POST['proceso'];
$fecha_validacion = $_POST['fecha_validacion'];

//$vencimiento = $_POST['vencimiento'];

//This function will clean the data and add slashes.
// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
$id = mysqli_real_escape_string($connection, $id);
$titulo = mysqli_real_escape_string($connection, $titulo);
$tipo = mysqli_real_escape_string($connection, $tipo);
$origen = mysqli_real_escape_string($connection, $origen);
//$fecha = mysqli_real_escape_string($connection, $fecha)
$area = mysqli_real_escape_string($connection, $area);
$proceso = mysqli_real_escape_string($connection, $proceso);
//$vencimiento = mysqli_real_escape_string($connection, $vencimiento)
$descripcion = mysqli_real_escape_string($connection, $descripcion);
$objetivo = mysqli_real_escape_string($connection, $objetivo);
$observacion = mysqli_real_escape_string($connection, $observacion);
$estado = mysqli_real_escape_string($connection, $estado);
$subestado = mysqli_real_escape_string($connection, $subestado);
$fecha_validacion = mysqli_real_escape_string($connection, $fecha_validacion);

//This should retrive HTML form data and insert into database
$query  = "INSERT INTO accionesdemejora (id, titulo, tipo, origen, area, proceso, descripcion, objetivo, observacion, estado, subestado, fecha_validacion) 
            VALUES ('".$_POST["id"]."','".$_POST["titulo"]."','".$_POST["tipo"]."','".$_POST["origen"]."','".$_POST["area"]."','".$_POST["proceso"]."','".$_POST["descripcion"]."','".$_POST["objetivo"]."','".$_POST["observacion"]."','".$_POST["estado"]."','".$_POST["subestado"]."','".date('Y-m-d H:i:s')."')";

        $result = mysqli_query($connection, $query);
        //Test if there was a query error
        if ($result) {
            //SUCCESS
       header('Location: gracias.php');
        } else {
            //FAILURE
            die("Database query failed. " . mysqli_error($connection)); 
            //last bit is for me, delete when done
        }

mysqli_close($connection);
?>