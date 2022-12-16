<?php
    require_once "helper/Database.php";
    require_once "helper/get_input.php";

    $connection = require_once "helper/connection.php";
   
    $id = get_input('id', 0, 'get');

    $database = new Database($connection);
    $person = $database->selectSpecified("persons", "id", "=", $id);
    
    if (!$person) {
        echo "<h2>Data not found!</h2>";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Medical Record</title>
</head>
<body>
    <h3>Delete confirmation</h3>
    <p>Are you sure to delete it?</p>
    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <a href="index.php">Back</a>
        <input type="submit" value="Yes">
    </form>
</body>
</html>