<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<title>Database Configuration</title>
	</head>

    <body>
		<?php			
					$serverName = "localhost";
					$userName = "root";
					$password = "pass";
					$dbName = "product_manage_db";
					
					$conn = mysqli_connect($serverName, $userName, $password, $dbName);  // db connection
					//if not connected to DB get error
					if (!$conn) 
					{				
						die("Connection failed:" . mysqli_connect_error());
					}
					else 
					{
						echo "";
					}	
		?>
	</body>
</html>