<!DOCTYPE html>
<html>
<head>
	<title>Table with database</title>
</head>
<body>
	<?php
	$host = "localhost"; //default localhost is 3306
	$database = "hshakil";
	$user = "hshakil";
	$password = "password123";
	$connection = mysqli_connect($host, $user, $password, $database);

	if(!$connection){ // die if connection failed, avoid error
		die("Connection failed: " . mysqli_connect_error());
	}

	//check if user doens't exist
	$selectall = "SELECT * FROM users";
	$resultall = mysqli_query($connection, $selectall);
	$userfound = false; //boolean to test if user exists
	while ($row = mysqli_fetch_assoc($resultall)) {
		if ($row["username"] == $_POST["username"] && $row["password"] == $_POST["password"]) {
			$userfound = true; //user exists, skips next if statement
		}
	}

	if (!$userfound) { //user doesn't exist, redirect
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("User does not exist")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$removequery = "DELETE FROM users WHERE username = '".$username."' and password = '".$password."';";
	if (mysqli_query($connection, $removequery)) { //will also execute the query
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("User Removed")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}
	?>
	
</body>
</html>