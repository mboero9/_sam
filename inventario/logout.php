<?php   
session_start(); 
session_destroy(); 
header("location:index.php"); //redirigir a index
exit();
?>