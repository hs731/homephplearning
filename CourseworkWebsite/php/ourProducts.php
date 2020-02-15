<!DOCTYPE html>
<html>
<head>
	<title>Our Products</title>
	<link rel="stylesheet" type="text/css" href="../css/ourProducts8.css">
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
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment.Sample text Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man.we're dedicated to serving the best aaafreshest coffee known to man.
			</p>
		</div>
	</aside>
	
	<div class="container">
		<section id="main-area"> <!--main area-->
			<form action="mmconnect.php" method="post">
				<h1 id="search-header">Search for a product!</h1>
				<input type="text" name="rowinput" id="textinput" autocomplete="off">
				<!--autocom = non previous search history-->
				<br>
				<input type="submit" id="search-button">
				<input type="reset" id="search-button"> <!--reset button sets values to defaults-->
			</form>
		</section>
	</div>

	<br>
	<br>
	<hr>

	<!--FULL MENU-->
	<div class="fullmenu">
	<h1>Our Menu</h1>
	<table align="center"> <!--open table tags-->
		<tr>
		<th>ID</th> <!--table headings-->
		<th>Name</th>
		<th>Price</th>
		<th>Description</th>
		<th>Calories</th>
		</tr>
	<?php
	$host = "localhost"; //default localhost is 3306
	$database = "hshakil"; //db
	$user = "hshakil"; //user
	$password = "password123"; //pass
	$connection = mysqli_connect($host, $user, $password, $database); //make connection to db
	if(!$connection){ // die if connection failed, avoid error
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM drinks"; //var to make query - rows select here will be the only ones in result
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0) { //check if rows aren't empty
    	while($row = mysqli_fetch_assoc($result)) { //print each array containing each row
    		echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . "£" . $row["price"] . "</td><td>" . $row["description"] . "</td><td>". $row["calories"] . "</td></tr>";
   		}
   		echo "</table>";
	}
	else { //if no results
	    echo "0 results";
	}
	?>
	</div>


	<footer id="footer"> <!--FOOTER-->
		<h3 id="find">Find us at:</h3>
		<iframe width="20%" height="275" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=bd7%203hr+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Map a route</a>
		</iframe>
		<div id="copyright">
		<p><cite>Copyright &copy; 2019, Haris Shakil</cite></p>
		</div>
	</footer>
</body>
</html>