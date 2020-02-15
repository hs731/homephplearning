<?php
// Only class that reacts with database - Model
// Handles all database interactions
 class UsersModel extends Dbh {
   // all information returned as an array
   protected function getUser($username){
     $sql = "SELECT * FROM users WHERE uidUsers = ?";
     $stmt = $this->connect()->prepare($sql);
     $stmt->execute([$username]);

     $results = $stmt->fetchAll();
     return $results;
   }

   protected function setUser($userid, $userEmail, $password, $adminLevel){
     $sql = "INSERT INTO users(uidUsers, emailUsers, pwdUsers, userLevel) VALUES (?, ?, ?, ?)";
     $stmt = $this->connect()->prepare($sql);
     $stmt->execute([$userid, $userEmail, $password, $adminLevel]);
   }

 }
