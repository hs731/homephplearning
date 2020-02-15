<?php
//Interacting with database
class Test extends Dbh {

  // how to pull data without prepared statements
  // Without user input
  public function getUsers(){
    $sql = "SELECT * FROM users";
    $stmt = $this->connect()->query($sql);
    while($row = $stmt->fetch()){
      echo $row['emailUsers'] . '<br>';
    }
  }

  // Taking user input
  //Prepared statements
  public function getUsersStmt($firstname, $lastname){
    $sql = "SELECT * FROM users WHERE uidUsers = ? AND emailUsers = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$firstname, $lastname]);
    $names = $stmt->fetchAll();

    foreach($names as $name){
      echo $name['uidUsers'] . '<br>';
    }
  }

  //Prepared statements
  //Insert into db
  public function setUsersStmt($userid, $userEmail, $password, $adminLevel){
    $sql = "INSERT INTO users(uidUsers, emailUsers, pwdUsers, userLevel) VALUES (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userid, $userEmail, $password, $adminLevel]);
  }

  // Exact same way to update database
  // Following three lines as displayed above
}
