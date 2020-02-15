<?php
// Simple fetches results - View
class UsersView extends UsersModel {

public function showUser($username){
  $results = $this->getUser($username);
  echo "Full name: " . $results[0]['uidUsers'];
  echo "<br>";
  echo "Password: " . $results[0]['pwdUsers'];
}

}
