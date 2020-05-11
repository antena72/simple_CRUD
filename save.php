<?php include('db.php');

//verifica si recibe valor
if (isset($_POST['save_task'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    //conexion a base
    $sql = "INSERT INTO tasks (titulo, descripcion)
VALUES ('$titulo', '$descripcion')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  $_SESSION['message'] = 'Tasked saved successfully';
  $_SESSION['message_type'] = 'success';
  $_SESSION['last'] = $last_id;
   
  header('Location: index.php');  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    // echo 'Guardado';
}



?>