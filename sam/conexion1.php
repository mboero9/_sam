<?php		
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Prome2017";
$dbaccion = "sam";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbaccion);
//Test if connection occurred.
if (mysqli_connect_errno()) {
die("Database connection failed: " .
mysqli_connect_error() .
" (" . mysqli_connect_errno() . ")"
);
}
?>