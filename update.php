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
    <h1 class="m-3">Employee info</h1>


    <div class="container mt-3">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">

              <!-- Message alert -->
              <?php
              
                  include './message.php';
              
              ?>
              <!-- Message alert -->

              <h4>Employee update</h4>
              
              <a href="index.php" class="btn btn-danger float-end">Back</a>
            </div>
            <div class="card-body">
              <?php
              
              if(isset($_GET['id'])){
                $employee_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM employee WHERE id = '$employee_id' ";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0){

                  $employee = mysqli_fetch_array($query_run);
                  // print_r($employee);
                  ?>

                    <form action="./code.php" method="POST">
                      <input type="hidden" name="id" value="<?= $employee['id']; ?>">

                      <div class="mb-3">
                        <label for="">Employee name</label>
                        <input type="text" name="name" value="<?= $employee['fullname']; ?>" class="form-control" require>
                      </div>
                      <div class="mb-3">
                          <label for="">Email</label>
                          <input type="email" name="email" value="<?= $employee['email']; ?>" class="form-control" require>
                      </div>
                      <div class="mb-3">
                          <label for="">Phone</label>
                          <input type="text" name="phone" value="<?= $employee['phone']; ?>" class="form-control" require>
                      </div>
                      <div class="mb-3">
                          <label for="">Position</label>
                          <input type="text" name="position" value="<?= $employee['position']; ?>" class="form-control" require>
                      </div>
                      <div class="mb-3">
                          <button type="submit" name="update_employee" class="btn btn-primary float-end">Update</button>
                      </div>
                    </form>

                  <?php
                } else{
                  echo "No such id found";
                }
              }
              
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>