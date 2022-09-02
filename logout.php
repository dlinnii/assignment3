<!--
	Function: This code destroy session and redirect to login.php
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Logout Page</title>
	</head>
	
	<body>
		<?php
			session_start();
			session_destroy();   // destroy session
			unset($_SESSION['username']);	// unset username session
			unset($_SESSION['user_type']);	// unset userType session
			header('location: login.php');	// redirect to login page
		?> 
	</body>
</html>