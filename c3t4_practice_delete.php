<?php
    require_once "class/MySQLConnection.php";

    $config = require_once "c3t4_config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    $connection = $connection->getConnection();

    $id = $_GET['id'];

    $deleteQuery  = "DELETE FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($deleteQuery);

    if ($prepareQuery->execute([$id])) {
        echo "Data is successfully deleted!";
        header('Refresh:3; url=c3t4_practice.php');
    }
?>