<!--
	Function: This code add a product with all details to the DB 
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Admin Product Add Page</title>

		<!--Bootstrap Menu-->
		<link href="css/product_add1.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			
		<?php
			session_start();
			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")   // check weather the user is admin or not
			{
				include("admin_header.php");	// for show the admin menu is user type is admin
			} 
			else 
			{        							// if no one then send him to login page
				header("location:login.php");
			}

			$msg = "";
			if (isset($_POST["add_product"])) 	// if product add request
			{
				require "config/db.php";
				$name = $_POST["name"];
				$quantity = $_POST["quantity"];
				$description = $_POST["description"];
				$price = $_POST["price"];

				$file_name = $_FILES['image']['name'];	// get image name
				$file_size = $_FILES['image']['size'];	// get image size
				$file_tmp = $_FILES['image']['tmp_name'];	// get image name to temp
				$file_type = $_FILES['image']['type'];	// get image type
				$result=explode('.', $_FILES['image']['name']);
				$file_ext = strtolower(end($result));
				//$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));	// get image extension

				$extensions = array("jpeg", "jpg", "png");

				if (in_array($file_ext, $extensions) === false)
				{          // check is the extention is ok or not
					$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
				}

				if ($file_size > 2097152)   // check file size
				{
					$errors[] = 'File size must be less than 2 MB';
				}

				if (empty($errors) == true) 
				{   // if all ok then it will save the data
					//$dt = date("dmYhis");
					//$file = $dt . $file_name;
					$file =  $file_name;
					move_uploaded_file($file_tmp, "images/product/" . $file);	//   move file to folder

					date_default_timezone_set("Europe/Dublin");		// set Europe as default time zone
					$datee = date("d-m-Y H:i:s");

					$insert = mysqli_query($conn, "INSERT INTO product (name , price , quantity ,
											description , image_path) VALUES ('$name' ,'$price' ,
											'$quantity' , '$description' ,'$file')");
				
					if ($insert)	// if data inserted
					{
						$msg = "<p> Product '$name' Added Successfully !!! </p><br>";
					}
				} 
				else 
				{
					print_r($errors);	// print error
				}
			}
		?>
	</head>

	<body id="Page">
		<br><br><br>
		<?php echo $msg; ?>
		<div>
			<form action="" method="post" enctype="multipart/form-data" id = "form">
				<input type="text" id="id" name="id" hidden value="<?php echo $row['id']; ?>">
				<label>Product Name:</label><br><input type="text" id="name" name="name" placeholder="Product name"><br><br>
				<label>Product Quantity:</label><br><input type="text" id="quantity" name="quantity" placeholder="Product Quantity"><br><br>
				<label>Product Description:</label><br><input type="text" id="description" name="description" placeholder="Product Description"><br><br>
				<label>Product Price:</label><br><input type="text" id="price" name="price" placeholder="Product Price"><br><br><br>
				<input type="file" name="image" id="image"><br><br>
				<input type="submit" value="Add" name="add_product" id="add"><br><br><br><br><br><br><br>
			</form>
		</div>
	</body>
</html>

    

