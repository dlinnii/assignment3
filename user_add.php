<!--
	Function: This code is for adding new users 
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Admin User Add Page</title>
		
		<link href="css/user_add.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<?php
			session_start();
			
			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")    // check admin or not
			{
				include("admin_header.php");
			}
			else    // if not admin or user
			{
				header("location:login.php");
			}

			$msg = "";
			
			if (isset($_POST["add_user"]))   // if user add request
			{
				require "config/db.php";
				$id = $_POST["id"];
				$name = $_POST["name"];
				$userName = $_POST["userName"];
				$password = $_POST["password"];
				$hassedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);	// hashed password
				
				$insert = mysqli_query($conn, "INSERT INTO users (name , user_name , password ,user_type) VALUES ('$name' ,'$userName' , '$hassedPassword' , 'user')");
				if ($insert)	// if data inserted show success message
				{						
					$msg = "<p> User '$name' Added Successfully !!! </p><br>";
				}
			}
		?>
	</head>
		
	<body id="Page">
		<br><br><br><br>
			<?php echo $msg; ?>
			<div width="auto" align="center">
				<form action="" method="post" enctype="multipart/form-data">
					<input type="text" id="id" name="id" hidden value="<?php echo $row['id']; ?>">
					<label>Name :</label><br><input type="text" id="name" name="name" placeholder="Name"><br><br>
					<label>User Name :</label><br><input type="text" id="userName" name="userName" required placeholder="UserName"><br><br>
					<label>Password :</label><br><input type="password" id="password" name="password" required placeholder="Password"><br><br><br>
					<input type="submit" value="Add" name="add_user" id="add"><br>
				</form>
			</div>
	</body>
</html>
<br><br><br><br><br><br><br><br><br><br>

    

