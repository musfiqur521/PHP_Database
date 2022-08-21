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
  				<div class="col-md-12 text-center">
  					<h1>Update Student Data</h1>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6 offset-md-3">

            <?php
                if ( isset($_GET['update']) ){
                  $updateStudent = $_GET['update'];
                  $myQuery = "SELECT * FROM users WHERE id = '$updateStudent' ";
                  $allUsers = mysqli_query($db, $myQuery);
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
                    ?>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="fname">First Name</label>
                          <input type="text" name="fname" value="<?php echo $firstname; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="lname">Last Name</label>
                          <input type="text" name="lname" value="<?php echo $lastname; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="phone">Phone No.</label>
                          <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <input type="submit" name="updateStudent" class="btn btn-primary" value="Updae Student">
                        </div>
                      </form>

                  <?php  
                  } }
            ?>
  				

  				</div>
  			</div>
  		</div>
  	</section>
  	
    



  <?php

    if ( isset($_POST['updateStudent']) ){
      $username   = $_POST['username'];
      $fname      = $_POST['fname'];
      $lname      = $_POST['lname'];
      $email      = $_POST['email'];
      $phone      = $_POST['phone'];
      $address    = $_POST['address'];

        // Create the Insert Query to the Database
      $query = "UPDATE users SET username='$username', firstname='$fname', lastname='$lname', email='$email', phone='$phone', address='$address' WHERE id = '$updateStudent' ";

        $addStudent = mysqli_query($db, $query);

        if ( !$addStudent ){
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