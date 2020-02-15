<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile Page</title> <!--title of tab-->
	<link rel="stylesheet" type="text/css" href="../css/adminProfile8.css"> <!--css ref-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--jquery ref-->
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
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man.
			</p>
		</div>
	</aside>
	
	<div class="container">
	<section id="main-area"> <!--main area-->
		<?php
		$_SESSION['user'] = $_POST["username"]; //set session variables to posted log in details
		$_SESSION['pass'] = $_POST["password"];

		$host = "localhost"; //default localhost is 3306
		$database = "hshakil"; //database name
		$user = "hshakil"; //mysql username
		$password = "password123"; //mysql password
		$connection = mysqli_connect($host, $user, $password, $database); //establish connection

		if(!$connection){ // die if connection failed, avoid error
			die("Connection failed: " . mysqli_connect_error());
		}
		$username = $_POST["username"]; //username to posted login username
		$password = $_POST["password"]; //password to posted login password
		$sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'"; //query to select admin
		$result = mysqli_query($connection, $sql); //database result when applying query

		if (mysqli_num_rows($result) > 0) { //check if rows aren't empty
	    	while($row = mysqli_fetch_assoc($result)) { //while there is something in the next cell
		    	if(strtolower($row["username"]) == strtolower($username) && strtolower($row["password"]) == strtolower($password)){
		    		//display profile according to login details
		    		echo "<h1 id='header-name'>" . $row["username"] . ": Administrator" . "</h1>";
		    		echo '<img id="avatar" src="../profilePics/'. $row["avatar"].'.png">'; //display picture by concatinating picture name from lamp with the src address
		    		echo '<form action="logoutAdmin.php" method="post">
						 <button type="submit" name="submit" id="logout">Logout</button>
					     </form>'; // logout button posts to logoutAdmin.php

		    		echo "<section id='info'>"; //Further profile information
		    		echo "<div id='general-info'>";
		    		echo "<h2 id='info-header'>General Information</h2>";
		    		echo "Admin name: " . $row["username"] . "<br>";
		    		echo "Privileges: Add, Remove, Update and Display information";
		    		echo "</div>";
		    		echo "<div id='contact-info'>";
		    		echo "<h2 id='info-header'>Contact Information</h2>";
		    		echo "Email: " . $row["email"] . "<br>";
		    		echo "Phone Number: " . "07" . $row["number"] . "<br>";
		    		echo "</div>";
		    		echo "</section>";
		    	}
	   		}
		}
		else{ //if no admin found
			session_unset(); //end session to stop infinite loop of redirecting when login is incorrect
			session_destroy();
			header("Location: adminLogin.php"); //go back to login page
			exit(); //prevent further scripts from exec
		}
		?>
	</section>
	</div>

	<br>

	<div id="manipulation">
	<h1>Click what you want to edit:</h1>
	<button id="products-button">Products</button> <!--buttons show div once clicked using jquery-->
	<button id="users-button">Users</button>
	</div>

	<br>
	<br>
	<hr>

	<section id="functions">
		<!--PRODUCT FORMS-->
		<div id="product">
		<h2>Product Database</h2>

		<form action="productprocess/addProcess.php" method="post"> <!--ADD PRODUCTS-->
			<h3>Add a product</h3>
			<input type="text" name="product-name" placeholder="Name" id="product-name"> <!--enter fields-->
			<input type="text" name="product-price" placeholder="Price (£)" id="product-price">
			<input type="text" name="product-description" placeholder="Description" id="product-description">
			<input type="number" name="product-calories" placeholder="Calories" id="product-calories">
			<button id="add">Add</button>
			<br>
		</form>

		<form action="productprocess/removeProcess.php" method="post"> <!--REMOVE PRODUCTS-->
			<h3>Remove a product</h3>
			<input type="text" name="product-name" placeholder="Name" id="product-name"> <!--enter fields-->
			<input type="number" name="id" placeholder="ID" id="product-id">
			<button id="remove">Remove</button>
			<br>
		</form>

		<form action="productprocess/updateProcess.php" method="post"> <!--UPDATE PRODUCTS-->
			<h3>Update a product</h3>
			<select name="column" id="column">
				<option disabled selected value="">Column to edit</option> <!--placeholder-->
				<option value="id">ID</option>
				<option value="name">Name</option>
				<option value="price">Price</option>
				<option value="description">Description</option>
				<option value="calories">Calories</option>
			</select>
			<input type="number" name="id" placeholder="ID of product" id="product-id">
			<input type="text" name="value" placeholder="New Value" id="newvalue">
			<button id="remove">Update</button>
			<br>
		</form>
		</div>

		<br>
		<br>
		<hr>

		<!--USER FORMS-->
		<div id="user">
			<h2>User Database</h2>

		<h3>Add user</h3> <!--ADD USER-->
		<form id="reg-form" action="userprocess/addProcess.php" method="post"> 
			<div id="preinfo">
				<label id="reg-label">Username</label>
				<input type="text" name="username" placeholder="Enter desired username" id="reg-textinput">
				<br>
				<label id="reg-label">Password</label>
				<input type="password" name="password" placeholder="Enter desired password" id="reg-textinput">
				<br>
			</div>
			<div id="nextinfo">
				<div class="nextinfo-pt1">
					<label>Location</label>
					<input type="text" name="reg-loc" placeholder="Location">
					<br>
					<label>Favourite drink</label>
					<input type="text" name="reg-drink" placeholder="Drink">
					<br>
					<label>Email</label>
					<input type="text" name="reg-email" placeholder="example@abc.com">
					<br>
					<label>Phone Number (07...)</label>
					<input type="number" name="reg-phone" min="0" max="999999999999" placeholder="07 * * * * * * * * *">
					<br>
					<label>Birthday</label>
					<select name="date" id="reg-bday">
			          <option value="1">1</option>
			          <option value="2">2</option>
			          <option value="3">3</option>
			          <option value="4">4</option>
			          <option value="5">5</option>
			          <option value="6">6</option>
			          <option value="7">7</option>
			          <option value="8">8</option>
			          <option value="9">9</option>
			          <option value="10">10</option>
			          <option value="11">11</option>
			          <option value="12">12</option>
			          <option value="13">13</option>
			          <option value="14">14</option>
			          <option value="15">15</option>
			          <option value="16">16</option>
			          <option value="17">17</option>
			          <option value="18">18</option>
			          <option value="19">19</option>
			          <option value="20">20</option>
			          <option value="21">21</option>
			          <option value="22">22</option>
			          <option value="23">23</option>
			          <option value="24">24</option>
			          <option value="25">25</option>
			          <option value="26">26</option>
			          <option value="27">27</option>
			          <option value="28">28</option>
			          <option value="29">29</option>
			          <option value="30">30</option>
			          <option value="31">31</option>
			     	</select>

					<select name="month" id="reg-bday">
				        <option value="January">January</option>
				        <option value="February">February</option>
				        <option value="March">March</option>
				        <option value="April">April</option>
				        <option value="May">May</option>
				        <option value="June">June</option>
				        <option value="July">July</option>
				        <option value="August">August</option>
				        <option value="September">September</option>
				        <option value="October">October</option>
				        <option value="November">November</option>
				        <option value="December">December</option>
				     </select> 
					
					<input type="text" name="year" id="reg-bday-year" maxlength="4" placeholder="&nbsp;Year"> <!--maxlength=char amount-->
					<br>
				</div>
				<label>Avatar</label>
				<select name="avatar"> <!--choose avatar-->
					<option>ape</option>
					<option>beanie</option>
					<option>boss</option>
					<option>dragon</option>
					<option>gears</option>
					<option>shark</option>
					<option>skull</option>
					<option>zim</option>
				</select>
				<br>
				<button id="submitbutton">Register</button> <!--default button set to submit-->
			</div>
		</form>

		<br>

		<h3>Remove user</h3> <!--REMOVE USER-->
		<form action="userprocess/removeProcess.php" method="post"> 
			<input type="text" name="username" placeholder="Username"> <!--enter fields-->
			<input type="text" name="password" placeholder="Password">
			<button id="remove">Remove</button>
			<br>
		</form>

		<h3>Update user records</h3>
		<form action="userprocess/updateProcess.php" method="post"> <!--UPDATE PRODUCTS-->
			<select name="column" id="column">
				<option disabled selected>Column to edit</option> <!--placeholder-->
				<option value="username">Username</option>
				<option value="password">Password</option>
				<option value="location">Location (year-month-date)</option>
				<option value="birthday">Birthday</option>
				<option value="favdrink">Favourite Drink</option>
				<option value="email">Email</option>
				<option value="number">Number</option>
				<option value="avatar">Avatar</option>
			</select>
			<input type="text" name="username" placeholder="Username">
			<input type="text" name="password" placeholder="Password">
			<input type="text" name="value" placeholder="New Value">
			<button>Update</button>
			<br>
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

	<script> //display forms
		$(document).ready(function(){ //wait till page is loaded, then run script
			$("#products-button").on('click', function(){ //on-click of product button
			    $("#product").toggle(2000); //toggle display properties with a 2 second animation
			});
			$("#users-button").on('click', function(){ //on-click of users button
			    $("#user").toggle(2000); //toggle display properties with a 2 second animation
			});
	    });
    </script>
</body>
</html>