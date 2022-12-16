<?php
    require_once "helper/get_input.php";

    $connection = require_once "helper/connection.php";

    if (!$_GET) {
        echo "<h2>access not allowed!</h3>";
        die();
    }

    $id = get_input('id', 0);

    $selectQuery = "SELECT * FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($selectQuery);
    $prepareQuery->execute([$id]);
    $person = $prepareQuery->fetch();

    if (!$person) {
        echo "<h2>Data not found!</h2>";
        die();
    }

    $deleteQuery  = "DELETE FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($deleteQuery);

    if ($prepareQuery->execute([$id])) {
        echo "<h2>data is successfully deleted!</h2>";
        header('Refresh:3; url=index.php');
    } else {
        echo "<h2>failed to deleting data!</h2>";
    }
?>