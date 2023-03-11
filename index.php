<?php
session_start();
require_once './dbconn.php';


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD basics</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="m-3">Employee database</h1>

    <div class="container">

        <!-- Message alert -->
        <?php
            include './message.php';
        ?>
        <!-- Message alert -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee details</h4>
                        <a href="create.php" class="btn btn-success float-end">Create one</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                    $query = "SELECT * FROM employee";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $employee){
                                            // echo $employee['fullname'];
                                ?>
                                            <tr>
                                                <td><?= $employee['id'] ?></td>
                                                <td><?= $employee['fullname'] ?></td>
                                                <td><?= $employee['email'] ?></td>
                                                <td><?= $employee['phone'] ?></td>
                                                <td><?= $employee['position'] ?></td>
                                                <td>
                                                    <a href="./view.php?view_id=<?= $employee['id']; ?>" class="btn btn-sm btn-info">View</a>
                                                    <a href="./update.php?id=<?= $employee['id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                                    <form action="./code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_record" value="<?= $employee['id'] ?>" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    } else{
                                        echo "<h5>No record found.</h5>";
                                    }

                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>