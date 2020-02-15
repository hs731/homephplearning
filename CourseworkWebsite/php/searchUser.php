<!DOCTYPE html>
<html>
<head>
	<title>User Search</title>
	<link rel="stylesheet" type="text/css" href="../css/searchUser4.css"> <!--css ref-->
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
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget.
			</p>
		</div>
	</aside>

	<!--SEARCH RESULT-->
	<div class="fullmenu">
	<h1>Results for '<?php echo $_POST["rowinput"]; ?>'</h1> <!--header for search results-->
	<table align="center" id="table"> <!--table opened for usage in php-->
		<tr> <!--row-->
		<th>Username</th> <!--heading-->
		<th>Location</th>
		<th>Birthday</th>
		<th>Favdrink</th>
		<th>Email</th>
		<th>Number</th>
		</tr>
	<?php
	$host = "localhost"; //db connection
	$database = "hshakil";
	$user = "hshakil";
	$password = "password123";
	$connection = mysqli_connect($host, $user, $password, $database);

	//read
	if(!$connection){ // die if connection failed, avoid error
		die("Connection failed: " . mysqli_connect_error());
	}
	$rowinput = $_POST["rowinput"]; //rowinput set to posted string of user
	$sql = "SELECT * FROM users WHERE username='$rowinput'"; //query
	$result = mysqli_query($connection, $sql); //query to database
	if (mysqli_num_rows($result) > 0) { //check if rows aren't empty
    	while($row = mysqli_fetch_assoc($result)) { //while there is something in the next cell
	    	if(strtolower($row["username"]) == strtolower($rowinput)){ //lowercase comparison
	    		echo "<tr><td>" . $row["username"] . "</td><td>". $row["location"] . "</td><td>" . $row["birthday"] . "</td><td>". $row["favdrink"] . "</td><td>". $row["email"] . "</td><td>" . '+44 ' .$row["number"] . "</td></tr>"; //echo user details
	    	}
   		}
   		echo "</table>";
	}
	else { //if no results, print msg and hide table
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
	<center>
	<a href="userLogin.php"><button id="return">Return to profile</button></a> <!--return to menu-->
	</center>
	
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