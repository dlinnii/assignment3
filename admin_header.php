<!--
	Function: This code hold admin navbar with extra links and possibilities. 
	Programer: Veaceslav Cojocaru
	Student ID: B00099863
	Date written: 10th April 2019
-->

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Admin Navigation Bar</title>
	</head>

	<body>
		<!-- Static navbar Start-->		
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
				 
			<a class="navbar-brand" href="index.php">Navbar</a>
				 
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
				  
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.php">HOME</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="product_add.php">PRODUCT ADD</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="product_list.php">PRODUCT LIST</a>
					</li>  
					<li class="nav-item">
						<a class="nav-link" href="purchase_list.php">PURCHASE LIST</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="user_add.php">USER ADD</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link" href="user_list.php">USER LIST</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link" href="logout.php">LOGOUT</a>
					</li>
				</ul>
			</div>  
		</nav>
	</body>
</html>
