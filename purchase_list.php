<!--
	Function: This code show the products users purchased .
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Purchase List Page</title>
		
		<link href="css/home.css" rel="stylesheet" id="bootstrap-css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<?php
			session_start();
			$qr = "";
			
			if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")   // check admin or not
			{
				include("admin_header.php");
			} 
			else if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "user")   // check user or not
			{
				$user = $_SESSION["username"];
				$qr = "where user_name = '$user'";
				include("user_header.php");
			}
			else     // if not user nor admin
			{
				header("location:login.php");
			}
		?>
	</head>
		

	<body id="Page">
		<br><br>
		<div id="">
			<h3 align="center" style="color: white">Purchase List</h3><br>
			<table width="100%" border="3px solid" bordercolor="white" style="color: white">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<?php if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin") { // if admin he can show the user name?>
						<th>User</th>
					<?php } ?>
				</tr>
				<?php
				require "config/db.php";
				$sql = "SELECT pr.image_path image ,prc.user_name user, prc.product_quantity qty, 
						prc.total_price price ,pr.name name FROM user_purchase prc
						left join product pr on pr.id = prc.product_id " . $qr;
				$qryResult = mysqli_query($conn, $sql);	// run query

				if (mysqli_num_rows($qryResult) > 0) {  // if any purchase found then show the list
					while ($row = mysqli_fetch_assoc($qryResult)) { // run loop with results  ?>	 
						<tr>
							<td align="center"><img class=""
								src="images\product\<?php echo $row['image']; ?>"
								style="height:100px; width:100px"></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row["qty"]; ?></td>
							<td><?php echo $row["price"]; ?></td>
							<?php
							if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin") {    // if admin
								echo "<td>" . $row["user"] . "</td>";
							}
							?>
						</tr>
					<?php }
				}
				?>
			</table>
		</div>
	</body>
</html>

    

