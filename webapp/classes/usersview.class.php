<?php

include 'usersmodel.class.php';

class UsersView extends UsersModel {

public function showUser($username){
  $results = $this->getUser($username);
  echo "Full name: " . $results[0]['uidUsers'];
  echo "<br>";
  echo "Password: " . $results[0]['pwdUsers'];
}

public function showProjects(){
	$result = $this->getProjects();
	// foreach($result as $name){
	//   echo $result[0]['ProjectID'];
 //      echo $name['ProjectID'] . '<br>';
 //    }

	echo 'row amount = '.sizeof($result).'<html><br></html>';
	echo $result[0]['AssignedStudent'].$result[0]['Description'];
	
}

}
