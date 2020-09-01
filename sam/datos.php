<?php
  $conn = new mysqli('localhost', 'root', 'Micro89$', 'sam');
  $query = "INSERT into acciones (id, fecha_alta, titulo, Descripcion, Observacion, Tipo,) VALUES(?, ?, ?)";

  $stmt = $conn->stmt_init();
  if($stmt->prepare($query)){

     $stmt->bind_param('id', $_POST['fecha_alta'], $_POST['titulo'], $_POST['Descripcion'] ,$_POST['Observacion'], $_POST['Tipo']);
     $stmt->execute();

  }

  if($stmt){

  echo "thank you .we will be in touch soon";
  }
  else{
   echo "there was an error. try again later.";
   }  


?>