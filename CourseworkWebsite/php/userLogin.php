<?php 
	session_start(); //need to start session to set session variables
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="../css/userLogin10.css"> <!--css ref-->
	<script src="../js/signup-script2.js"></script> <!--javascript-->
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
			Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!Here at Coffee Time, we're dedicated to serving the tastiest and freshest coffee known to man. You will feel comfortable in our shop's welcoming environment. Our staff ensure that your experience at Coffee Time is not one to forget. Delivering the best coffee is our commitment and you are important to us, so don't delay and visit Coffee Time today!
			</p>
		</div>
	</aside>
	
	<div class="container">
		<section id="main-area"> <!--main area-->
			<form action="userLoginPage.php" method="post">
				<h1 id="main-area-header">Log-in (user)</h1>
				<label>User</label>
				<input type="text" name="username" placeholder="Enter your username" id="forminput-text"> <!--placeholder = display message in box until user types-->
				<br>
				<label>Password</label>
				<input type="password" name="password" placeholder="Enter your password" id="forminput-text"> <!--type password allows asterisks instead of displaying characters-->
				<br>
				<button id="signin-button" type="submit"><span>Sign in</span></button>
			</form>
			<button id="register-button">Register</button> <!--onclick="revealSignUp()"-->

			<script> //register button script to show form with animation
			 	$(document).ready(function(){ //wait till page is loaded, then run script
			 		$("#register-button").on('click', function(){ //onclick of x-button do function
			 			$("#fixed-reg").show(2000); //function to hide form by id. wait 2000 miliseconds
			 			$("#preinfo").show();
			 			$("#reg-next").show();
			 			$("#nextinfo").hide(); //hide 2nd page of form
			 			revealSignUp(); //js function resets form when opened
			 		});
			 	});
			 </script>

		</section>
	</div>



	<div id="fixed-reg">
	<img id="x-button" src="../images/x.png"> <!--exit registration button-->

	<script> //x button script to hide
	 	$(document).ready(function(){ //wait till page is loaded, then run script
	 		$("#x-button").on('click', function(){ //onclick of x-button do function
	 			$("#fixed-reg").hide(2000); //function to hide form by id. wait 2000 miliseconds
	 		});
	 	});
	 </script>

	

	<h2>Sign up</h2>
	<p>Enter your details below</p>
		<form id="reg-form" action="registration.php" method="post">
			<div id="preinfo">
				<label id="reg-label">Username</label>
				<input type="text" name="username" placeholder="Enter desired username" id="reg-textinput">
				<br><br>
				<label id="reg-label">Password</label>
				<input type="password" name="password" placeholder="Enter desired password" id="reg-textinput" class="reg-pass">
				<br>
			</div>
			<div id="nextinfo">
				<div class="nextinfo-pt1">
					<label>Location</label>
					<input type="text" name="reg-loc">
					<br>
					<label>Favourite drink</label>
					<input type="text" name="reg-drink">
					<br>
					<label>Email</label>
					<input type="text" name="reg-email">
					<br>
					<label>Phone Number</label>
					<input type="number" name="reg-phone" min="0" max="999999999999">
					<br>
					<label>Birthday</label>
					<!--<input type="text" name="reg-bday" id="reg-bday" maxlength="2" placeholder="&nbsp;Date">-->
					<select name="date" id="reg-bday">
					  <!--<option disabled selected>Date</option>-->
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

			     	<!--<input type="text" name="reg-bday" id="reg-bday" maxlength="2" placeholder="&nbsp;Month">-->
					<select name="month" id="reg-bday">
						<!--<option disabled selected>Month</option>-->
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
					
					<input type="text" name="year" id="reg-bday-year" maxlength="4" placeholder="&nbsp;Year"> <!--maxl=chars-->
					<br>
				</div>
				<label>Avatar</label>
				<select name="avatar" id="avatar">
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
		<button id="reg-next">Next</button>
	</div>

	<?php
		//check if user already logged in. direct to profile with current details
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) { //exec if user logged in
			//autosubmit form when user already logged in. redirects to profile until log out
			$host = "localhost"; //default localhost is 3306
			$database = "hshakil";
			$user = "hshakil";
			$password = "password123";
			$connection = mysqli_connect($host, $user, $password, $database);

			$query = "SELECT * FROM users"; //query
			$selectresult = mysqli_query($connection, $query); //apply query to db
			while ($row = mysqli_fetch_assoc($selectresult)) { //scan through each row of table
				if ($row["username"] == $_SESSION['user'] && $row["password"] == $_SESSION['pass']) {
					//autosubmit form when user already logged in. redirects to profile until log out
					echo '<form id="myform" name="myform" action="userLoginPage.php" method="post">
					<input name="username" value="'.$_SESSION['user'].'">
				 	<input name="password" value="'.$_SESSION['pass'].'">
					<input type="submit" value="Submit">
					</form>;';
					// js to direct to profile if alredy logged in
					echo '<script type="text/javascript"> //autosubmit form
					function formAutoSubmit () {
					var form = document.getElementById("myform");
					form.submit();
					}
					window.onload = formAutoSubmit;
					</script>';
				}
			}
		}

		$fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //url of browser. use to display specific msg
		if (strpos($fullurl, "signup=empty") == true) { //check if have certain string in url
			echo "<p id='errormsg'>Please fill in all fields!</p>";
		}
		else if (strpos($fullurl, "signup=invalidemail") == true) { //email invalid
			echo "<p id='errormsg'>Please enter a valid email</p>";
		}
		/*else if (strpos($fullurl, "signup=invalidnumber") == true) { //phone number not 07 SCRAPPED
			echo "<p id='errormsg'>Please enter a valid uk phone number<br>(07 number<br>11 characters)</p>";
		}*/
		else if (strpos($fullurl, "signup=successful") == true) { //registration successful
			echo "<p id='errormsg'>Registration Successful</p>";
		}
		else if (strpos($fullurl, "login=empty") == true) { //login fields empty
			echo "<p id='errormsg'>Enter a username and password</p>";
		}
		else if (strpos($fullurl, "logout") == true) { //user not found
			echo "<p id='errormsg'>You Have logged Out</p>";
		}
		else if (strpos($fullurl, "login=invalid") == true) { //user not found
			echo "<p id='errormsg'>User not found</p>";
		}
		else if (strpos($fullurl, "user=duplicate") == true) { //user not found
			echo "<p id='errormsg'>Username already taken</p>";
		}
		
	?>

	 <script> //check if reg page 1 input empty
	 	$(document).ready(function(){ //prevent enter on preinfo input text
	 		$("#reg-textinput").on('keydown', function(event){ //when key pressed
	 			if(event.keyCode == 13) { //if enter key
	 				if($(".reg-pass").val() == "" || $("#reg-textinput").val() == ""){ //if inputs are empty
				        alert("Fill in Username and Password fields!"); //display mesasge
				        event.preventDefault(); //prevent form submit
		      	        return false;
				    }
				    else{ //fields are full
						revealNext(); //reveal next page of form
						event.preventDefault(); //prevent form submit to show next
		      	        return false;
					}
		        }
	 		});
	 		$(".reg-pass").on('keydown', function(event){ //upon keydown
	 			if(event.keyCode == 13) { //if enter key
	 				if($(".reg-pass").val() == "" || $("#reg-textinput").val() == ""){ //if fields empty
				        alert("Fill in Username and Password fields!"); //msg
				        event.preventDefault(); //prevent form submit
		      	        return false;
				    }
				    else{ //else, fields must be full
						revealNext(); //reveal next set of the form
						event.preventDefault(); //prevent form submit to show next
		      	        return false;
					}
		        }
	 		});

	 		$("#reg-next").on('click', function(){ //when next button press
	 			if($(".reg-pass").val() == "" || $("#reg-textinput").val() == ""){ //check if fields empty
				        alert("Fill in Username and Password fields!"); //alert and prevent submit
				        event.preventDefault();
		      	        return false;
				}
				else{ //else fields full
					revealNext(); //show next
					event.preventDefault(); //prevent form submit when next press
		      	    return false;
				}
	 		});

	 	});
	 </script>


	<footer id="footer"> <!--FOOTER-->
		<p>Copyright &copy; 2019, Haris Shakil</p>
	</footer>
</body>
</html>