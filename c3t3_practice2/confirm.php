<?php
    $connection = require_once "helper/connection.php";
   
    $id = $_GET['id'] ?? 0;

    $selectQuery = "SELECT * FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($selectQuery);
    $prepareQuery->execute([$id]);
    $person = $prepareQuery->fetch();
    
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
    <form action="delete.php" method="GET">
        <input type="hidden" name="id" value="<?= $id ?>">
        <a href="index.php">Back</a>
        <input type="submit" value="Yes">
    </form>
</body>
</html>