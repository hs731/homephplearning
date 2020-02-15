<!--RESULTS FROM SEARCH BAR-->

<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
	<link rel="stylesheet" type="text/css" href="../css/ourProducts8.css"> <!--css ref-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--jquery-->
</head>
<body>
	<header id="main-header"> <!--header area-->
		<div class="container">
			<a href="../index.html">
				<img src="../images/list-bullet.png" alt="image not loaded" width="90px" height="90px">
				<h1>&nbspCoffee Time</h1>
			</a>
		</div>
	</header>

	<nav id="navbar"> <!--navigation bar-->
		<div class="container">
			<ul>
				<li><a href="../index.html">Home</a></li>

				<li><a href="#">The Cafe</a>
					<ul>
					<li><a href="../gallery.html">Gallery</a></li>
					<li><a href="../yoursay.html">Your say</a></li>
					</ul>
				</li>

				<li><a href="ourProducts.php">Our Products</a></li>
				<li><a href="../contact.html">Contact Us</a></li>
				<li id="loginbutton"><a href="#">Log in</a>
					<ul id="logindropdown">
					<li><a href="userLogin.php">User</a></li>
					<li><a href="adminLogin.php">Admin</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>

	<section id="showcase"> <!--showcase area-->
		<div class="container">
			<h1>Welcome</h1>
			<p></p>
		</div>
	</section>

	
	<aside id="sidebar"> <!--sidebar-->
		<div class="container">
			<h3>Coffee Blog</h3>
			<p>
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. We make the best coffee and are rated the best coffee shop.
			</p>
		</div>
	</aside>

	<!--SEARCH RESULT-->
	<div class="fullmenu">
	<h1>Results for '<?php echo $_POST["rowinput"]; ?>'</h1> <!--header for search results-->
	<table align="center" id="table"> <!--open table tags for usage in php echo-->
		<tr>
		<th>ID</th> <!--table headings-->
		<th>Name</th>
		<th>Price</th>
		<th>Description</th>
		<th>Calories</th>
		</tr>
	<?php
	$host = "localhost"; //default localhost is 3306
	$database = "hshakil"; //db name
	$user = "hshakil"; //username
	$password = "password123"; //password
	$connection = mysqli_connect($host, $user, $password, $database); //establish connection

	//read
	if(!$connection){ // die if connection failed, avoid error
		die("Connection failed: " . mysqli_connect_error());
	}
	$rowinput = $_POST["rowinput"]; //set rowinput to posted value from search bar
	$sql = "SELECT * FROM drinks WHERE name='$rowinput'"; //query to select according to input
	$result = mysqli_query($connection, $sql); //query to database
	if (mysqli_num_rows($result) > 0) { //check if rows aren't empty
    	while($row = mysqli_fetch_assoc($result)) { //while there is something in the next cell
	    	if(strtolower($row["name"]) == strtolower($rowinput)){ //strtolower = case insensitive comparison
	    		//echo table containing feteched rows form result
	    		echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . "£" . $row["price"] . "</td><td>" . $row["description"] . "</td><td>". $row["calories"] . "</td></tr>";
	    	}
   		}
   		echo "</table>"; //close table tag
	}
	else { //if no results, print msg and hide table with javascript function
	    echo "<h2>0 results</h2>";
	    echo' <script>
	 	$(document).ready(function(){
	 		$("#table").hide();
	 	});
	 	</script>';
	}
	?>
	</div>

	<br>
	<center> <!--keep return button in middle-->
	<a href="ourProducts.php"><button id="return">Return to menu</button></a> <!--return to menu-->
	</center>
	<footer id="footer"> <!--FOOTER-->
		<p>Copyright &copy; 2019, Haris Shakil</p>
	</footer>
</body>
</html>