<?php
// Class which establishes database connection
// Other classes extend from this class to connect
// the database
 class Dbh {
   private $host = "localhost";
   private $user = "root";
   private $pwd = "";
   private $dbName = "harrydb";

   // Connect to database
   protected function connect(){
     $dsn = 'mysql:host='.$this->host.';dbname=' . $this->dbName;
     $pdo = new PDO($dsn, $this->user, $this->pwd);
     // Default attribute for how we pull data
     // Associative arrays
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_ASSOC);
     return $pdo;
   }
 }
