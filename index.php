<?php
$user = "root";
$pass = "";
// database handle
// try {
//     // database source name
//     $dsn = "mysql:host=localhost;dbname=medical_records";
//     // database handler
//     $dbh = new PDO($dsn, $user, $pass);
// } catch (PDOException $e) {
    //     print "Error!: " . $e->getMessage() . "<br>";
    // }
    
    
    
$dsn = "mysql:host=localhost;dbname=medical_records";
$dbh = new PDO($dsn, $user, $pass);