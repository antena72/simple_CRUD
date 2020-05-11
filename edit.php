<?php 
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE tasks SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id ";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task updated successfully!';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');

}
include('includes/header.php')?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?=$_GET['id']?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" value="<?=$titulo?>" name="titulo" placeholder="title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="descripcion" id="" cols="30" rows="10" placeholder="Task description"><?= $descripcion?></textarea>
                    </div>
                    <button class="btn-success" name="update" >Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>