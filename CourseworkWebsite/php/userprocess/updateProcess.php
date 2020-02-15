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

	$column = $_POST["column"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$value = $_POST["value"];

	$updatequery = "UPDATE users SET ".$column." = '".$value."' WHERE username = '".$username."' AND password = '".$password."';";
	if (mysqli_query($connection, $updatequery)) { //will also execute the query
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("Records updated")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}
	else { //locate back when query is faulty
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("Incorrect fields")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}
	?>
	
</body>
</html>