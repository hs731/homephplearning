<?php
$user = 'root';
$pass = '';
$db = 'harrydb';

$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
?>