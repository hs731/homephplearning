<?php
// Inserting data or updating data in the users table
// Controller
class UsersContr extends UsersModel {

  public function createUser($userid, $userEmail, $password, $adminLevel){
    $this->setUser($userid, $userEmail, $password, $adminLevel);
  }

}
