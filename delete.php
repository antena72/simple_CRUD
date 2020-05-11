<?php 
include('db.php');

$sql = "DELETE FROM tasks WHERE 'id= $_GET[id]' ";

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = 'Tasked removed successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>