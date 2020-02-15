<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="../css/userProfile7.css"> <!--css ref-->
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
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget.
			</p>
		</div>
	</aside>
	
	<div class="container">
	<section id="main-area"> <!--main area-->
		<?php
		$_SESSION['user'] = $_POST["username"]; //set session variable
		$_SESSION['pass'] = $_POST["password"];

		$host = "localhost"; //db connection
		$database = "hshakil";
		$user = "hshakil";
		$password = "password123";
		$connection = mysqli_connect($host, $user, $password, $database);

		if(!$connection){ // die if connection failed, avoid error
			die("Connection failed: " . mysqli_connect_error());
		}
		$username = $_POST["username"]; //set variables to posted login details
		$password = $_POST["password"];
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'"; //query
		$result = mysqli_query($connection, $sql); //database result according to login detials

		if (mysqli_num_rows($result) > 0) { //check if rows aren't empty
	    	while($row = mysqli_fetch_assoc($result)) { //while there is something in the next row
		    	if(strtolower($row["username"]) == strtolower($username) && strtolower($row["password"]) == strtolower($password)){ //case insensitive comparison
		    		//display profile page according to database records of user - incorporates html with php
		    		echo "<h1 id='header-name'>" . $row["username"] . ": Profile" . "</h1>";
		    		echo '<img id="avatar" src="../profilePics/'. $row["avatar"].'.png">'; //avatar displayed according to db avatar value. concatinate to create address
		    		echo '<form action="logout.php" method="post">
						 <button type="submit" name="submit" id="logout">Logout</button>
					     </form>'; //logout button
		    		echo "<section id='info'>"; //further info
		    		echo "<div id='general-info'>";
		    		echo "<h2 id='info-header'>General Information</h2>";
		    		echo "Alias: " . $row["username"] . "<br>";
		    		echo "Location: " . $row["location"] . "<br>";
		    		echo "Birthday: " . $row["birthday"] . "<br>";
		    		echo "Favourite drink: " . $row["favdrink"];
		    		echo "</div>";
		    		
		    		echo "<div id='contact-info'>";
		    		echo "<h2 id='info-header'>Contact Information</h2>";
		    		echo "Email: " . $row["email"] . "<br>";
		    		echo "Phone Number: " . "+44 " . $row["number"] . "<br>";
		    		echo "</div>";
		    		
		    		echo "</section>"; //close section tag

		    	}
	   		}
		}
		else { //if no results
			if (empty($username) || empty($password)) { //throw error is empty fields
				session_unset(); //end session to stop infinite loop of redirecting when login is incorrect
				session_destroy();
				header("Location: userLogin.php?login=empty"); //redirect back to login page
				exit(); //stop execuing other scripts
			}
			else{ //throw error if user not found
				session_unset();
				session_destroy();
				header("Location: userLogin.php?login=invalid");
				exit();
			}
		}
		?>
	</section>
	</div>

	<section id="forms">
		<!--Search product-->
		<div id="productform">
		<form action="searchProductProfile.php" method="post">
				<h1 id="search-header">Search for a product!</h1>
				<input type="text" name="rowinput" id="textinput" autocomplete="off">
				<br>
				<input type="submit" id="search-button">
				<input type="reset" id="search-button"> <!--reset button sets values to defaults-->
		</form>
		</div>
		<!--Search User-->
		<div id="userform">
		<form action="searchUser.php" method="post">
				<h1 id="search-header">Search for a User!</h1>
				<input type="text" name="rowinput" id="textinput" autocomplete="off">
				<br>
				<input type="submit" id="search-button">
				<input type="reset" id="search-button"> <!--reset button sets values to defaults-->
		</form>
		</div>
	</section>

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