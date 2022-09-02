<!--
	Function: This code edit product details and update it into DB
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Admin Product Edit Page</title>
		
		<link href="css/product_edit.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			
		<?php
			session_start();

			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")   // check weather the user is admin or not
			{			
				include("admin_header.php");
			} 
			else   // if no one then send him to login page
			{
				header("location:login.php");
			}

			$msg = "";

			if (isset($_POST["update"]))    // if update request
			{
				require "config/db.php";

				$file_name = $_FILES['image']['name'];	// file name
				$file_size = $_FILES['image']['size'];	// file size
				$file_tmp = $_FILES['image']['tmp_name'];	// file name to tmp
				$file_type = $_FILES['image']['type'];	// file type
				$result=explode('.', $_FILES['image']['name']);
				$file_ext = strtolower(end($result));
				//$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));	// file extension

				$extensions = array("jpeg", "jpg", "png");

				if (in_array($file_ext, $extensions) === false)          // check is the extention is ok or not
				{			
					$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
				}

				if ($file_size > 2097152)    // check file size
				{
					$errors[] = 'File size must be less than 2 MB';
				}

				if (empty($errors) == true) // if no error
				{	

					//$dt = date("dmYhis");
					//$file = $dt . $file_name;
					//move_uploaded_file($file_tmp, "images/product/" . $file);    // unique file name with date and time

					$file = $file_name;
					move_uploaded_file($file_tmp, "images/product/" . $file);    // unique file name with date and time

					$id = $_POST["id"];
					$name = $_POST["name"];
					$quantity = $_POST["quantity"];
					$description = $_POST["description"];
					$price = $_POST["price"];

					$insert = mysqli_query($conn, "Update product set name='$name' , price = '$price' , 
											quantity='$quantity' ,description='$description' , image_path = '$file' 
											where id = '$id'");	// update query for product

					if ($insert) 	// if updated then  show message or redirect to product list page
					{				
						$msg = "<p> Product Updated Successfully !!! </p>";
						//header("location:product_list.php");
					}
				}
				
				else 
				{
					print_r($errors);	// show error message
				}
			}
		?>
	</head>

	<body id="Page">
		<br><br>
		<div id="">
			<?php echo $msg;
				require "config/db.php";
				$id = $_GET["id"];
				$sql = "SELECT * FROM product where id ='$id'";      // select query fot product list
				$qryResult = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($qryResult);	// get result to row form the query
			?>
			<div width="auto" align="center">
				<!--The enctype attribute specifies how the form-data should be encoded when submitting it to the server.-->
				<form action="" method="post" enctype="multipart/form-data">
					<input type="text" id="id" name="id" hidden value="<?php echo $row['id']; ?>">
					<label>Product Name:</label><br><input type="text" id="name" name="name" placeholder="Product name" value="<?php echo $row['name']; ?>"><br><br>
					<label>Product Quantity:</label><br><input type="text" id="quantity" name="quantity" placeholder="Product Quantity"
						   value="<?php echo $row["quantity"]; ?>"><br><br>
					<label>Product Description:</label><br><input type="text" id="description" name="description" placeholder="Product Description"
						   value="<?php echo $row["description"]; ?>"><br><br>
					<label>Product Price:</label><br><input type="text" id="price" name="price" placeholder="Product Price"
						   value="<?php echo $row["price"]; ?>"><br><br><br>
					<input type="file" name="image" id="image"><br><br>
					<input type="submit" value="Update" name="update" id="update"><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</form>
			</div>
		</div>
	</body>
</html>


