<?php
    require_once "class/MySQLConnection.php";

    $config = require_once "c3t3_config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    $connection = $connection->getConnection();

    $id = $_GET['id'];

    $selectQuery  = "SELECT * FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($selectQuery);
    $prepareQuery->execute([$id]);
    $person = $prepareQuery->fetch();

    if ($person) {
        // override variable person
        // $person = new Person;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical Record</title>
</head>

<body>
<h3>Edit <?= $person['name'] ?>'s Bio</h3>
    <form action="c3t3_practice2_update.php" method="GET">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $person['name'] ?>" required>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="<?= $person['age'] ?>" required>
        <br>
        <p>Select gender:</p>
        <input type="radio" name="gender" id="male" value="m" <?= $person['gender'] === "m" ? "checked" : "" ?> required>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="f" <?= $person['gender'] === "f" ? "checked" : "" ?> required>
        <label for="female">Female</label>
        <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" value="<?= $person['height'] ?>" required>
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" step="0.1" value="<?= $person['weight'] ?>" required>
        <br>
        <label for="waist_size">Waist Circumference</label>
        <input type="number" name="waist_size" id="waist_size" value="<?= $person['waist_size'] ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>

</body>

</html>