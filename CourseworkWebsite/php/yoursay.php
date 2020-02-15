<!DOCTYPE html>
<html>
<head>
	<title>Your Say</title>
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
	//redirect when form empty
	if (empty($_POST["question1"]) || empty($_POST["question2"]) || empty($_POST["question3"]) || empty($_POST["question4"])) {
		echo '<script> function myFunction() {
  		alert("PLEASE FILL IN ALL FIELDS");
		}
		myFunction();
		</script>'; //alert with error msg
		header("refresh:0; ../yoursay.html"); //redirect refresh 0 so alert msg isn't skipped
		exit(); //prevent exec of further code
	}

	//variable set to posted values
	$q1 = $_POST["question1"];
	$q2 = $_POST["question2"];
	$q3 = $_POST["question3"];
	$q4 = $_POST["question4"];

	$insertquery = "insert into yoursay values('".$q1."', '".$q2."', '".$q3."', ".$q4.");"; //build query
	if (mysqli_query($connection, $insertquery)) { //exec query with success msg and redirect
		echo '<script> function myFunction() {
  		alert("Thank you for your participation");
		}
		myFunction();
		</script>';
		header("refresh:0; yoursayResults.php");
		exit();
	}
	else {
	 echo "Couldn't add values, please try later";
	}
	?>
	
</body>
</html>