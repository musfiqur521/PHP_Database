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

	<?php
		// To show any Error
		$error = "";


		if ( isset($_POST['register']) ){
			$username 	= $_POST['username'];
			$fname 		= $_POST['fname'];
			$lname 		= $_POST['lname'];
			$email 		= $_POST['email'];
			$phone 		= $_POST['phone'];
			$address 	= $_POST['address'];
			$password 	= $_POST['password'];
			$cpassword 	= $_POST['cpassword'];

			if( $password != $cpassword ){
				$error = '<div class="alert alert-danger">Password Doesn\'t Match</div>';
			}
			else{
				$hassedPassword = sha1($password);
				
				// Create the Insert Query to the Database
				$query = "INSERT INTO users (username, password, firstname, lastname, email, phone, address, join_date) VALUES ('$username', '$hassedPassword', '$fname', '$lname', '$email', '$phone', '$address', now())";

				$addStudent = mysqli_query($db, $query);

				if ( !$addStudent ){
					die("MySQL Error, Data Insert Failed");
				}
				else{
					header("Location: index.php");
				}

			}
		}

	?>

  	<section>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12 text-center">
  					<h1>Insert New Student Data</h1>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6 offset-md-3">
  					
  					<form action="" method="POST" enctype="multipart/form-data">
  						<div class="form-group">
  							<label for="username">Username</label>
  							<input type="text" name="username" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="fname">First Name</label>
  							<input type="text" name="fname" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="lname">Last Name</label>
  							<input type="text" name="lname" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="email">Email</label>
  							<input type="email" name="email" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="phone">Phone No.</label>
  							<input type="text" name="phone" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="address">Address</label>
  							<input type="text" name="address" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="password">Password</label>
  							<input type="password" name="password" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="cPassword">Confirm Password</label>
  							<input type="password" name="cpassword" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<input type="submit" name="register" class="btn btn-primary" value="Register New Student">
  						</div>

						  <div class="form-group">
  							<input type="button" name="back" class="btn btn-primary" value="backword">
							
							  
  						</div>
  					</form>

  					<div class="form-group">
  						<?php echo $error; ?>
  					</div>

  				</div>
  			</div>
  		</div>
  	</section>
  	
    




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