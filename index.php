<?php 
  ob_start();
  include "db.php"; 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hello, world!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">   

    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2>All Student List</h2>
          </div>
          <div class="col-md-4">
            <a href="addStudent.php" class="btn btn-primary">Register New Student</a>
            
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Sl.</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                  $myQuery = "SELECT * FROM users";
                  $allUsers = mysqli_query($db, $myQuery);
                  $i = 0;
                  while ( $row = mysqli_fetch_assoc($allUsers) ) {
                      $id         = $row['id'];
                      $username   = $row['username'];
                      $password   = $row['password'];
                      $firstname  = $row['firstname'];
                      $lastname   = $row['lastname'];
                      $email      = $row['email'];
                      $phone      = $row['phone'];
                      $address    = $row['address'];
                      $join_date  = $row['join_date']; 
                      $i++;
                      ?>
                      

                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="updateStudent.php?update=<?php echo $id; ?>" class="btn btn-success btn-sm">Update</a>
                            <a href="index.php?delete=<?php echo $id; ?>" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </td>
                      </tr>


                <?php  }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <?php

      if ( isset($_GET['delete']) ){
        $theStudent = $_GET['delete'];

        $query = "DELETE FROM users WHERE id='$theStudent' ";

        $deleteStd = mysqli_query($db, $query);

        if ( !$deleteStd ){
          die("MySQL Error, Data Insert Failed");
        }
        else{
          header("Location: index.php");
        }
      }

    ?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <?php 
      ob_end_flush();
    ?>
  </body>
</html>