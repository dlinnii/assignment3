<!--
	Function: This code idisplay all users list
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Admin User List Page</title>
		
		<link href="css/user_list.css" rel="stylesheet" id="bootstrap-css">
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
				require "config/db.php";
			} 
			else    // if not admin or user
			{
				header("location:login.php");
			}
		?>


		<?php
			if (isset($_REQUEST['delete']))    // if admin click the link for delete user
			{
				$id = addslashes($_REQUEST['delete']);
				$del = mysqli_query($conn, "delete from users where id ='$id'");

				if ($del) 	// if deleted successfully then redirect
				{
					header("location:user_list.php?del");
				}
			}
		?>


	</head>

	<body id="Page">
		<br><br>
		<div id="">
			<h3 align="center" style="color: white">User List</h3>

			<?php if (isset($_REQUEST['del'])) {     // if successfully delete the show message
				?>
				
				<p>User Deleted Successfully !!!</p>
				<!--<br>
				<div class="alert alert-block alert-error" align="center">
					<button type="button" class="close" data-dismiss="alert">
						<i class="icon-remove"></i>
					</button>
					<i class="icon-trash red"></i>
					<strong class="red" style="color:red">
						User Deleted Successfully !!!
					</strong><br><br>

				</div>
				-->
			<?php } ?>
			<table width="100%" border="3px solid" bordercolor="white" style="color: white">
				<tr>
					<th>Name</th>
					<th>Username</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
				$sql = "SELECT * FROM users where user_type='user' ";	// select query for get all user data for user list page
				$qryResult = mysqli_query($conn, $sql);	// run the query and get all user data

				if (mysqli_num_rows($qryResult) > 0) {     // if user exits the show list
					while ($row = mysqli_fetch_assoc($qryResult)) { 	// run a loop with result ?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row["user_name"]; ?></td>
							<td><a href="user_edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
							<td><a class="grey" href="user_list.php?delete=<?php echo $row['id']; ?>"
								   onclick="if(confirm('Are you sure to delete this record')) { return true; } else { return false; }">Delete</a></td>
						</tr>
					<?php }
				}
				?>
			</table>
		</div>
	</body>
</html>
<br><br><br><br><br><br><br><br><br><br>


