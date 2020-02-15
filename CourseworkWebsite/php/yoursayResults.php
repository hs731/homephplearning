<!DOCTYPE html>
<html>
<head>
	<title>Survey Results</title>
	<link rel="stylesheet" type="text/css" href="../css/ourProducts8.css"> <!--css ref-->
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
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment.Sample text Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man.we're dedicated to serving the best aaafreshest coffee known to man. we're dedicated to serving the best coffee.
			</p>
		</div>
	</aside>

	<?php
	$host = "localhost"; //db connection
	$database = "hshakil";
	$user = "hshakil";
	$password = "password123";
	$connection = mysqli_connect($host, $user, $password, $database);

	if(!$connection){ // die if connection failed, avoid error
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM yoursay;"; //query for all results from yoursay table
	$result = mysqli_query($connection, $query); //result from query to db

	//variables for displaying results
	$amount=0;

	$vs=0; //satisfied variables
	$s=0;
	$n=0;
	$u=0;
	$vu=0;

	$def=0; //recommendation variables
	$prob=0;
	$not=0;
	$probnot=0;
	$no=0;

	$will=0; //return variables
	$wont=0;

	$taste=0; //taste variable

	if (mysqli_num_rows($result) > 0) { //if rows not empty
		while($row = mysqli_fetch_assoc($result)) { //while next row exists
			//if statements increment values if certian results found within table

			//satisfaction
			if ($row["satisfied"] == "v.satisfied") {
				$amount++; //increment when product found
				$vs++; //increment specified product
			}
			elseif  ($row["satisfied"] == "satisfied") {
				$amount++;
				$s++;
			}
			elseif  ($row["satisfied"] == "neutral") {
				$amount++;
				$n++;
			}
			elseif  ($row["satisfied"] == "unsatisfied") {
				$amount++;
				$u++;
			}
			elseif  ($row["satisfied"] == "v.unsatisfied") {
				$amount++;
				$vu++;
			}

			//recommend
			if ($row["recommend"] == "definitely") {
				$def++;
			}
			elseif ($row["recommend"] == "probably") {
				$prob++;
			}
			elseif ($row["recommend"] == "notsure") {
				$not++;
			}
			elseif ($row["recommend"] == "prob not") {
				$probnot++;
			}
			elseif ($row["recommend"] == "no") {
				$no++;
			}

			//return
			if ($row["returning"] == "yes") {
				$will++;
			}
			elseif ($row["returning"] == "no") {
				$wont++;
			}

			$taste = $taste + $row["taste"];
		}
	}

	echo "<div style='margin-left: 30px;'>"; //display results

	echo "<h2>Satisfaction</h2>";
	echo $vs." out of $amount customers are Very Satisfied";
	echo "<br>";
	echo $s." out of $amount customers are Satisfied";
	echo "<br>";
	echo $n." out of $amount customers are Neutral";
	echo "<br>";
	echo $u." out of $amount customers are Unsatisfied";
	echo "<br>";
	echo $vu." out of $amount customers are Unsatisfied";

	echo "<br><br>";

	echo "<h2>Recommendation</h2>";
	echo $def." out of $amount customers Defintely recommend us";
	echo "<br>";
	echo $prob." out of $amount customers Probably recommend us";
	echo "<br>";
	echo $not." out of $amount customers are Not Sure if recommend us";
	echo "<br>";
	echo $probnot." out of $amount customers Probably Don't recommend us";
	echo "<br>";
	echo $no." out of $amount customers Don't recommend us";

	echo "<br><br>";

	echo "<h2>Returning</h2>";
	echo $will." out of $amount customers Will return";
	echo "<br>";
	echo $wont." out of $amount customers Won't return";

	echo "<br><br>";

	echo "<h2>Taste</h2>";
	$avgtaste = $taste / $amount; //work out average taste
	echo "Our coffee taste is rated: ".ceil($avgtaste)."%"; //ceil rounds up
	echo "</div>";
	?>


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