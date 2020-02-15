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

	//get latest id
	$idquery = "SELECT * FROM drinks;";
	$result = mysqli_query($connection, $idquery);
	$lastid;
	while ($row = mysqli_fetch_assoc($result)) { //will fetch all ids and set $lastid to the final id in database
	 	$lastid = $row["id"];
	}

	$id = $lastid + 1; //increment latest id by 1 for new product
	$productprice = $_POST["product-price"];
	$productname = $_POST["product-name"];
	$productdesc = $_POST["product-description"];
	$productcal = $_POST["product-calories"];


	//IF FIELDS EMPTY REDIRECT BACK WHILE STAYING LOGGED IN!
	if (empty($productname) || empty($productprice) || empty($productdesc) || empty($productcal)) {
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("Enter all fields!")';
		echo '</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}

	$insertquery = "INSERT INTO drinks VALUES (".$id.", '".$productprice."', '".$productname."', '".$productdesc."', ".$productcal.");";
	if (mysqli_query($connection, $insertquery)) { //will also execute the query
		echo '<script> function myFunction() {
  		alert("Records added");
		}
		myFunction();
		</script>';
		header("refresh:0; ../adminLogin.php");
		exit();
	}
	?>
	
</body>
</html>