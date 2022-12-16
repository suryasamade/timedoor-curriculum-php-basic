<?php
    require_once "../class/MySQLConnection.php";
    
    $config = require_once "config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    
    return $connection->getConnection();
?>