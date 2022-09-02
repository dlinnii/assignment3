<!--
	Function: This code check if admin details entered then redirect to admin page admin_header.php
			  else to the user page user_header.php and if nothing entered then stay on login page.php
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>User & Admin Home Page</title>

		<!--Bootstrap Menu-->
		<link href="css/home.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			
		<?php
			session_start();
			
			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")   // check weather the user is admin or not, if yes send to admin_header.php
			{
				include("admin_header.php");
			} 
			else if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "user")   // check weather the user is admin or not, if yes send to user_header.php
			{
				include("user_header.php");
			}
			else    // if no one then redirect him to login page
			{
				header("location:login.php");
			}
		?>
	</head>
	
	<body id="Page">
		
		<div class="">
		
				<h1> Welcome to Electro Products </h1>
				
		</div>
		
	</body>
</html>

    

