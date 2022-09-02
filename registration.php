<!--
	Function: This code is for register new users 
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<?php
		$msg = "";
		if (isset($_POST["registration"])) 
		{
			if (isset($_POST["username"]) && isset($_POST["password"]))   // if  username and password submitted
			{
				require "config/db.php";

				$name = $_POST["name"];

				$user = mysqli_real_escape_string($conn, $_POST["username"]);	//get username from submitted form
				$userclean = filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

				$pass = mysqli_real_escape_string($conn, $_POST["password"]);	// get password from submitted form
				$passclean = filter_var($pass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

				$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);	// hassed password

                // user data insert to the database
				$sql = "INSERT INTO users(name , user_name , password , user_type) VALUES ('$name','$user', '$hashedPassword', 'user')";

				$qryResult = mysqli_query($conn, $sql);	// run insert query for save the data

				if ($qryResult == TRUE)    // if data inseted
				{
					$msg = "<br><br><p style=\"color:yellow\"><b> User \" $user \" Created Successfully !!! <b></p><br>";
				} 
				else	// if error occurred 
				{
					$msg = "<br><b><p style=\"color:red\"> Error !!! <b><br>" /* . $sql . "<br>"*/ . mysqli_error($conn) . "</p><br>";
				}
			} 
			else	// if user name or password missing
			{
				$msg = "<br><b><p style=\"color:red\"> Error !!! Username or Password missing !!! <b></p><br>";
			}
		}
	?>


	<head>
		<title>New User Registration</title>
	</head>

		<link href="css/registration.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
	<body id="LoginForm">
		<div class="login-form">
			<div class="userReg">
				<h2>User Registration</h2>
				<p>Please enter your details</p>
			</div>

			<form class="registrationForm" action="registration.php" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="name" placeholder="Name">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="username" id="username" required
						   placeholder="Username">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" id="inputPassword" required
						   placeholder="Password">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="confPassword" id="confPassword" required
						   placeholder="Confirm Password">
				</div>
				<div class="form-group">
				</div>
				<input type="submit" class="btn btn-primary" name="registration" id="registration" value="Register"/>
			</form>
			<a href="login.php">Sign in</a>
			<?php echo $msg; ?>
		</div>
	</body>
</html>


