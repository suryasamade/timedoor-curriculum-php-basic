<?php
    require_once "helper/Database.php";
    require_once "helper/get_input.php";

    $connection = require_once "helper/connection.php";
   
    if (!$_POST) {
        echo "<h2>access not allowed!</h3>";
        die();
    }

    $id = get_input('id', 0);

    $database = new Database($connection);
    $person = $database->selectSpecified("persons", "id", "=", $id);
    
    if (!$person) {
        echo "<h2>Data not found!</h2>";
        die();
    }

    $delete = $database->delete("persons", "id", "=", $id);

    if ($delete) {
        echo "<h2>ata is successfully deleted!</h2>";
        header('Refresh:3; url=index.php');
    } else {
        echo "<h2>failed to deleting data!</h2>";
    }
?>