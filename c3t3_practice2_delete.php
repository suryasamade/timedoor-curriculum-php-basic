<?php
    require_once "class/MySQLConnection.php";

    $config = require_once "c3t3_config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    $connection = $connection->getConnection();

    // CEK JUGA 'ID'NYA SEBELUM DI-DELETE

    $id = $_GET['id'];

    $deleteQuery  = "DELETE FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($deleteQuery);

    if ($prepareQuery->execute([$id])) {
        echo "Data is successfully deleted!";
        header('Refresh:3; url=c3t3_practice2.php');
    }