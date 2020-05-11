<?php include('db.php')?>
<?php include('includes/header.php')?>

<div class="container">
    <div class="row m-5">
        <div class="col-md-4">
        <?
        if ($_SESSION['message']) {?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                    </button>
            </div>
       <?php
    session_unset(); //borra el cache
    }?>
            <div class="card card-body">
                <form action="save.php" method="post">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Task description" name="descripcion" id="" rows="2"></textarea>
                    </div>
                    <input class="btn btn-success btn-block" name="save_task" value="save task" type="submit" >
                </form>
            </div>     
        </div>
        <div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM tasks";
            $result_task = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result_task)){?>
            <tr>
                <td><p><?= $row['titulo']?></p></td>
                <td><?= $row['descripcion']?></td>
                <td><?= $row['fecha']?></td>
                <td><a class="btn border-secondary text-secondary"  href="edit.php?id=<?=$row['id']?>"><i class="fas fa-edit"></i></a> <a class="btn text-danger border-danger" href="delete.php?id=<?=$row['id']?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>

