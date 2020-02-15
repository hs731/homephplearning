<?php
// php file that can autoload all classes into a webpage
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
  $path = "classes/";
  $extension = ".class.php";
  $fullPath = $path . $className . $extension;

  // Error message shown when class is not found to load in to a page
  if(!file_exists($fullPath)){
    return false;
  }

  include_once $fullPath;
}
?>
