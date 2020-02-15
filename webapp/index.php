<?php
include 'classes/usersview.class.php';
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
    $usersObject->showProjects();
    ?>
  </body>
</html>
