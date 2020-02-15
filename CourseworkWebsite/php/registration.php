<!DOCTYPE html>
<html>
<head>
	<title>Registration processing</title>
</head>
<body>
	<?php
	$host = "localhost"; //default localhost is 3306
	$database = "hshakil"; //db
	$user = "hshakil"; //user
	$password = "password123"; //pass
	$connection = mysqli_connect($host, $user, $password, $database); //connection to db

	if(!$connection){ // die if connection failed, avoid error
		die("Connection failed: " . mysqli_connect_error());
	}

	//check for duplicate users
	$selectall = "SELECT * FROM users"; //query
	$resultall = mysqli_query($connection, $selectall); //result from query to db
	while ($row = mysqli_fetch_assoc($resultall)) { //set $row to each occuring row until no rows left
		if ($row["username"] == $_POST["username"]) { //if user already exists
			header("Location: userLogin.php?user=duplicate"); //return to login page with message
			exit(); //prevent further scripting
		}
	}

	$user = $_POST["username"]; //variables set for registration
	$pass = $_POST["password"];
	$location = $_POST["reg-loc"];
	$favdrink = $_POST["reg-drink"];
	$email = $_POST["reg-email"];
	$phone = $_POST["reg-phone"];
	$avatar = $_POST["avatar"];

	//set $monthvalue to value held within selected option
	if($_POST["month"] == "January"){
		$monthvalue = "01";
	}
	elseif ($_POST["month"] == "February"){
		$monthvalue = "02";
	}
	elseif ($_POST["month"] == "March"){
		$monthvalue = "03";
	}
	elseif ($_POST["month"] == "April"){
		$monthvalue = "04";
	}
	elseif ($_POST["month"] == "May"){
		$monthvalue = "05";
	}
	elseif ($_POST["month"] == "June"){
		$monthvalue = "06";
	}
	elseif ($_POST["month"] == "July"){
		$monthvalue = "07";
	}
	elseif ($_POST["month"] == "August"){
		$monthvalue = "08";
	}
	elseif ($_POST["month"] == "September"){
		$monthvalue = "09";
	}
	elseif ($_POST["month"] == "October"){
		$monthvalue = "10";
	}
	elseif ($_POST["month"] == "November"){
		$monthvalue = "11";
	}
	elseif ($_POST["month"] == "December"){
		$monthvalue = "12";
	}

	$bday = $_POST["year"]."-".$monthvalue."-".$_POST["date"]; //create acceptable date format for mysql insert


	//Error Handling
	if (empty($user) || empty($pass) || empty($location) || empty($favdrink) || empty($email) || empty($phone) || empty($avatar) || empty($bday)) {
		header("Location: userLogin.php?signup=empty"); //redirect if empty form
		exit(); //exit to avoid executing other statements
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //valid email
		header("Location: userLogin.php?signup=invalidemail"); //redirect if invalid email format
		exit(); //exit to avoid executing other statements
	}

	$insertquery = "insert into users values('".$user."', '".$pass."', '".$location."', '".$bday."', '".$favdrink."', '".$email."', ".$phone.", '".$avatar."');"; //concatinate to create query
	if (mysqli_query($connection, $insertquery)) { //exec query
		header("Location: userLogin.php?signup=successful"); //return with success msg
	}
	else { //locate back when query is faulty
		header("Location: userLogin.php?signup=empty");
	}
	?>
	
</body>
</html>