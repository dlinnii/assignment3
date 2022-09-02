<!--
	Function: This code show the products list and can be edited or deleted from DB
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Admin & User Product List Page</title>
		
		<link href="css/product_list.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<?php
			session_start();
			require "config/db.php";
			
			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")    // check weather the user is admin or not
			{
				include("admin_header.php");
			} 
			else if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "user")   // check weather the user is user or not
			{
				include("user_header.php");
			} 
			else    // if no one then send him to login page
			{
				header("location:login.php");
			}
		?>

		<?php
			if (isset($_REQUEST['delete']))     // if delete request
			{
			    $id = $_REQUEST["delete"];
				$det = mysqli_query($conn, "delete from product where id ='$id'");

				if ($det)	// if deleted then go to product list page 
				{
					header("location:product_list.php?del");
				}
			}
		?>
	</head>
		
	<body id="Page">
		<br><br>
		<div id="">
			<h3 align="center" style="color: white">Product List</h3><br>
			<?php if (isset($_REQUEST['del'])) {  // if deleted the successful message show ?>
				<p> Product Deleted Successfully !!! <br><br></p>
			<?php } ?>	
				
			<div width="auto" align="center">
				<form action="" method="post">
					<input id = "searchBox" type="text" placeholder="Search.." name="search"><br><br>
					<input type="submit" value="Search" name="search2" id="search2">
				</form>
			</div>
			<br>
			<table  width="auto" height="auto" border="5px solid" bordercolor="white" style="color: white">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Description</th>
					<?php if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin") { //if admin  ?>
						<th>Edit</th>
						<th>Delete</th>
					<?php } else if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "user") {   // if user ?>
						<th>Details</th>
					<?php } ?>
				</tr>
				<?php
				if (isset($_POST["search2"]))    // if search request  the only then search product list
				{   // query for search product
					$search = $_POST["search"];
					$sql = "SELECT * FROM product where name like '%$search%'";
				} 
				else    // else all product list
				{
					$sql = "SELECT * FROM product " ;
				}
				
				$qryResult = mysqli_query($conn, $sql);	// run select query and get result

				if (mysqli_num_rows($qryResult) > 0)  // if result found from query
				{
					while ($row = mysqli_fetch_assoc($qryResult)) 	// run loop with results
					{ ?>
						<tr><!-- Table Product List -->
							<td align="center"><img class=""
								src="images\product\<?php echo $row['image_path']; ?>"
								style="height:125px; width:125px"></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row["quantity"]; ?></td>
							<td><?php echo $row["price"]; ?></td>
							<td><?php echo $row["description"]; ?></td>
							<td><?php
								if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin") {   //   if admin then can see the Edit and Delete link
								echo "<a href=\"product_edit.php?id=" . $row['id'] . "\">Edit</a>"; ?>
							<td><a class="grey" href="product_list.php?delete=<?php echo $row['id']; ?>"
								   onclick="if(confirm('Are you sure to delete this record')) { return true; } else { return false; }">   <!-- for delete product pop up button -->
									Delete
								</a></td>
							<?php }
							else if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "user") {    // else user only can see the Details button
								echo "<a href=\"product_details.php?id=" . $row['id'] . "\">Details</a>";
							}
							?></td>
						</tr>
					<?php 
					}
				}
				?>
			</table>
		</div>
	</body>
</html>

    

