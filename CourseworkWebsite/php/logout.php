<?php 
if(isset($_POST["submit"])){ //if logout button pressed
	session_start(); //start to avoid error
	session_unset(); //unset and destroy current session
	session_destroy();
	header("Location: userLogin.php?logout"); //link back to login page
	exit(); //stop exec
}

?>