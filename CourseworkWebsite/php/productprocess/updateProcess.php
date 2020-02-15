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
	$productid = $_POST["id"];
	$value = $_POST["value"];

	if (empty($column) || empty($productid) || empty($value)) { //throw error msg if inputs empty
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("Enter all fields!")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}

	$updatequery = "UPDATE drinks SET ".$column." = '".$value."' WHERE id = ".$productid.";";
	if (mysqli_query($connection, $updatequery)) { //will also execute the query
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("Records updated")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}
	?>
	
</body>
</html>