<!--
	Function: This code show product details before user buy it 
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Product Details</title>
		
		<link href="css/product_details.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<?php
			session_start();
			
			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "user")   // check weather the user is admin or not
			{
				include("user_header.php");
			} 
			else   // if no one then send him to login page
			{
				header("location:login.php");
			}
			
			$msg = "";
			
			if (isset($_POST["buy"])) 	// if user submit form for buy product
			{
				require "config/db.php";
				$id = $_POST["id"];
				$quantity = $_POST["quantity"];
				$price = $_POST["price"];
				$user = $_SESSION["username"];
				$total_price = $quantity * $price;
				$insert = mysqli_query($conn, "INSERT INTO user_purchase (user_name , 
										product_id, product_quantity , total_price) 
										VALUES('$user','$id', '$quantity' , '$total_price ')");
				
				if ($insert)    //  insert product to purchase list and update product quantity to product table
				{
					mysqli_query($conn, "UPDATE product set quantity = quantity-'$quantity' where id = $id");	// update quantity after buy
					$msg = "<p> Product Purchased Successfully !!! </p><br>";	// success message
					//header("location:product_list.php");	// redirect to the product_list page
				}
			}
		?>
	</head>
		
	<body id="Page">
		<br><br>
		<?php echo $msg;
			require "config/db.php";
			$id = $_GET["id"];
			$sql = "SELECT * FROM product where id ='$id'";
			$qryResult = mysqli_query($conn, $sql);	// query run for get selected product
			$row = mysqli_fetch_assoc($qryResult);	// get selected product information for show
		?>
		
		<table  width="100%" height="auto" border="5px solid" bordercolor="white" style="color: white">
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Available</th>
			</tr>	
			<tr>	
				<td><img id="img" src="images\product\<?php echo $row['image_path']; ?>"
						 style="height:100px width:100px" align="center"></td>
				<td><h3><?php echo $row['name']; ?></h3></td>
				<td><h4><?php echo $row["description"]; ?></h4></td>
				<td><h5><?php echo $row["price"]; ?> </h5></td>						
				<td><h5><?php echo $row["quantity"]; ?></h5></td>
			</tr>
		</table>
		
		<div width="auto" align="center">
			<form action="" method="post" enctype="multipart/form-data" id="form">
				<input type="text" id="id" name="id" hidden value="<?php echo $row['id']; ?>">
				<input type="text" id="id" name="price" hidden value="<?php echo $row['price']; ?>"><br><br>
				<label>Quantity</label><br>
				<input type="number" id="quantity" name="quantity" placeholder="Product Quantity"
					   value="1"><br><br><br>
				<input type="submit" value="Buy" name="buy" id="buy">
			</form>
		</div>
	</body>
</html>



