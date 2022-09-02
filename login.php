<!--
	Function: This code check username and password if correct redirect to index.php
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">
	
	<?php
		session_start();
		$msg = "";
		if (isset($_POST["login"])) 
		{
			if (isset($_POST["username"]) && isset($_POST["password"]))     // check weather the username and password is submitted or not
			{
				$pass = $_POST["password"];
				$user_type = $_POST["user_type"];

				require "config/db.php";     // include db connection to this page
				$user = mysqli_real_escape_string($conn, $_POST["username"]);
				$userclean = filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); //Remove HTML tags and all characters with ASCII value > 127, Remove all illegal characters

				$hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);	// password hashed

				$sql = "SELECT * FROM users WHERE user_name = '$user' and user_type='$user_type' ";
				$qryResult = mysqli_query($conn, $sql);	// run query and get the result

				if (mysqli_num_rows($qryResult) > 0)         //check the if user name and user type is exist or not in DB
				{
					while ($row = mysqli_fetch_assoc($qryResult))    // if multiple username found then run a loop
					{
						if (password_verify($pass, $row["password"]))     // verify password entered from form and DB are the same if then redirect to index.php
						{
							$_SESSION['username'] = $user;
							$_SESSION['user_type'] = $row["user_type"];
							header("location:index.php");
						}
						else 
						{	
							$msg = "<br><p> Wrong Password !!! </p>";	// message for wrong password
						}
					}
				} 
				else 
				{				
					$msg = "<br><p> User \"$user\" not exist !!! </p>";	// show message if user doesn't exits
				}
			} 
		}
	?>

	<head>
		<title>Login Page</title>
		
		<link href="css/login.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
	</head>

	<body id="LoginForm">
		<div class="login-form">
			<div class="userLog">
				<h2>User Login</h2><br>
				<h6>Please enter your Username and Password</h6><br>
			</div>
				<div width="auto" align="center">
					<form id="Login" action="login.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="username" id="username" required
								   placeholder="Enter your Username">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" required
								   placeholder="Enter your Password">
						</div>
						<div class="form-group">
							<select name="user_type" class="form-control">
								<option value="user">User</option>
								<option value="admin">Admin</option>
							</select>
						</div>
						<br><br>
						<input type="submit" class="btn btn-primary" name="login" id="login" value="Sign in your account"/>
				   </form>
			   </div>
					<br><a href="registration.php">New User Registration</a>
				<div>
					<?php echo $msg ?>
				</div>
			</div>
		</div>
	</body>
</html>	
