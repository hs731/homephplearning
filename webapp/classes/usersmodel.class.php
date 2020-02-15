<?php
include 'dbh.class.php';

 class UsersModel extends Dbh {

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

   protected function getProjects(){
    $sql = "SELECT * FROM Projects";
     $stmt = $this->connect()->prepare($sql);
     $stmt->execute();

     $results = $stmt->fetchAll();
     return $results;
   }

 }
