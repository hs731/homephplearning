<?php
	session_start();
	if (isset($_SESSION['user']) && isset($_SESSION['pass'])) { //check if sesson variables already set

		$host = "localhost"; //default localhost is 3306
		$database = "hshakil"; //database name
		$user = "hshakil"; //phpmyadmin login
		$password = "password123"; //phpmyadmin	password
		$connection = mysqli_connect($host, $user, $password, $database); //database connection

		//check if admin already logged in - redirect to profile page if so
		$sql = "SELECT * FROM admins"; //query
		$result = mysqli_query($connection, $sql); //result from query to database
		//check each row for matching user and pass accoridng to session
		while ($row = mysqli_fetch_assoc($result)) {
			//check if session variables match admin database user and pass to stay on profile once logged in
			if ($row["username"] == $_SESSION['user'] && $row["password"] == $_SESSION['pass']) {
				//autosubmit form when user already logged in. redirects to profile page until log out
				echo '<form id="myform" name="myform" action="adminLoginPage.php" method="post">
					 <input name="username" value="'.$_SESSION['user'].'">
					 <input name="password" value="'.$_SESSION['pass'].'">
					 <input type="submit" value="Submit">
					 </form>;'; //create form with values of current session details
				// js to direct to profile automatically if already logged in
				echo '<script type="text/javascript"> //autosubmit form
				 	 function formAutoSubmit () {
				 	 var form = document.getElementById("myform");
					 form.submit();
					 }
					 window.onload = formAutoSubmit;
					 </script>'; //autosubmit form when window loads
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="../css/adminLogin12.css"> <!--css ref-->
	<script src="../js/signup-script.js"></script> <!--js import-->
</head>
<body>
	<header id="main-header"> <!--header area-->
		<div class="container">
			<a href="../index.html">
				<img src="../images/list-bullet.png" alt="image not loaded" width="90px" height="90px">
				<h1>&nbspCoffee Time</h1>
			</a> <!--logo and title clickable directs to home-->
		</div>
	</header>

	<nav id="navbar"> <!--navigation bar-->
		<div class="container"> <!--container for styling-->
			<ul> <!--unordered list for navigation-->
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
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today! Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment.
			</p>
		</div>
	</aside>
	
	<div class="container">
		<section id="main-area"> <!--main area-->
			<form action="adminLoginPage.php" method="post"> <!--post log in details to adminLoginPage.php-->
				<h1 id="main-area-header">Log-in (admin)</h1>
				<label id="label-user">Username</label>
				<!--username input-->
				<input type="text" name="username" placeholder="Enter your username" id="forminput-text">
				<!--input properties - type of box, name when refereing to post, placeholder of temp text in box, id for styling and js-->
				<br>
				<label id="label-pass">Password</label>
				<!--password input-->
				<input type="password" name="password" placeholder="Enter your password" id="forminput-text"><!--type password allows asterisks instead of displaying characters-->
				<br>
				<button id="signin-button" type="submit"><span>Sign in</span></button>
			</form>
		</section>
	</div>

	<footer id="footer"> <!--FOOTER-->
		<p>Copyright &copy; 2019, Haris Shakil</p>
	</footer>
</body>
</html>