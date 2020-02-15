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

	$productname = $_POST["product-name"];
	$productid = $_POST["id"];

	if (empty($productname) || empty($productid)) {
		if ($productid != 0) {
			echo '<script language="javascript">'; //alert box when empty form
			echo 'alert("Enter all fields!")';
			echo '</script>';
			header("refresh:0; ../adminLogin.php");
			exit();
		}
	}

	$insertquery = "DELETE FROM drinks WHERE name = '".$productname."' and id = ".$productid.";";
	if (mysqli_query($connection, $insertquery)) { //will also execute the query
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("Records Removed")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}
	?>
	
</body>
</html>