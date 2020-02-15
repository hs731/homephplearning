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

	//check for duplicate users
	$selectall = "SELECT * FROM users";
	$resultall = mysqli_query($connection, $selectall);
	while ($row = mysqli_fetch_assoc($resultall)) {
		if ($row["username"] == $_POST["username"]) {
			echo '<script language="javascript">'; //alert box when empty form
			echo 'alert("User already exists")';
			echo '</script>';
			header("refresh:0; ../adminLogin.php");
			exit();
		}
	}

	$user = $_POST["username"];
	$pass = $_POST["password"];
	$location = $_POST["reg-loc"];
	$favdrink = $_POST["reg-drink"];
	$email = $_POST["reg-email"];
	$phone = $_POST["reg-phone"];
	$avatar = $_POST["avatar"];

	//month needs changing to int value depending on string ALSO CHANGE DATES ACCORDING TO MONTH
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

	$bday = $_POST["year"]."-".$monthvalue."-".$_POST["date"];

	$insertquery = "insert into users values('".$user."', '".$pass."', '".$location."', '".$bday."', '".$favdrink."', '".$email."', ".$phone.", '".$avatar."');";
	if (mysqli_query($connection, $insertquery)) {
		echo '<script language="javascript">'; //alert box when empty form
		echo 'alert("User Added")';
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