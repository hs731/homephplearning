<?php
include 'includes/autoloader.inc.php'
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Document</title>
  </head>
  <body>
    <?php
    $usersObject = new UsersView();
    // $testObject->getUsersStmt("timmy123", "timmy123@gmail.com");
    $usersObject->showUser("timmy123");

    // $usersObject2 = new UsersContr();
    // $usersObject2->createUser("stepahnie", "stephanie123@gmail.com", "password", "users");
    ?>
  </body>
</html>
