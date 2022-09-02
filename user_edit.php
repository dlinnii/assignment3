<!--
	Function: This code is for edit  existing users 
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Admin User Edit Page</title>
		
		<link href="css/user_edit.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<?php
			session_start();
			
			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")   // check admin or not
			{
				include("admin_header.php");
			} 
			else  // if not admin nor user
			{
				header("location:login.php");
			}

			$msg = "";
			
			if (isset($_POST["update"]))     // if admin submit form for edit user info
			{
				require "config/db.php";
				$id = $_POST["id"];
				$name = $_POST["name"];
				$userName = $_POST["userName"];
				$hassedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);	//  hashed password
                //update user information
				$insert = mysqli_query($conn, "Update users set name='$name' , user_name = '$userName' , password='$hassedPassword' where id = '$id'");
				if ($insert) 	// if data updated then show success message and redirect to user list page
				{	 // update success message
					echo "<br><br><p>User \" $name \" Updated Successfully </p>";
					//header("location:user_list.php");
				}
				else
				{
					header("location:user_list.php");
				}
			}
		?>
	</head>

	<body id="Page">
		<br><br>
		<?php echo $msg;
			require "config/db.php";
			$id = $_GET["id"];
			$sql = "SELECT * FROM users where id ='$id'";
			$qryResult = mysqli_query($conn, $sql);	// select query for get an user data for edit user information
			$row = mysqli_fetch_assoc($qryResult);	// get results from query
		?>
		<div width="auto" align="center">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="text" id="id" name="id" hidden value="<?php echo $row['id']; ?>">
				<label>Name:</label> <br><input type="text" id="name" name="name" placeholder="Name" value="<?php echo $row['name']; ?>"><br><br>
				
				<label>User Name:</label><br><input type="text" id="userName" name="userName" placeholder="User Name"
					   value="<?php echo $row["user_name"]; ?>"><br><br>
				
				<label>Password:</label>  <br><input type="password" id="password" name="password" placeholder="Password"
					   value="<?php echo $row["password"]; ?>"><br><br><br>
				<input type="submit" value="Update" name="update" id="update">
			</form>
		</div>
	</body>
</html>
<br><br><br><br><br><br><br><br><br><br>



