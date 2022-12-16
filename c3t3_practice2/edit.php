<?php
    require_once "class/Person.php";

    $connection = require_once "helper/connection.php";

    $id = $_GET['id'] ?? 0;

    $selectQuery  = "SELECT * FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($selectQuery);
    $prepareQuery->execute([$id]);
    $personData = $prepareQuery->fetch();

    if (!$personData) {
        echo "<h2>data not found!</h2>";
        die();
    }

    $person = new Person(
        $personData['name'],
        $personData['age'],
        $personData['gender']
    );
    $person->setId($personData['id']);
    $person->bodyFact($personData['height'], $personData['weight'], $personData['waist_size']);
    $person->massIndex($personData['bmi_score'], $personData['bmi_category'], $personData['rfm_score'], $personData['rfm_category']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical Record</title>
</head>

<body>
    <h3>Edit <?= $person->getName() ?>'s Data</h3>
    <form action="update.php" method="GET">
        <input type="hidden" name="id" value="<?= $person->getId() ?>">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $person->getName() ?>" required>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" min="18" max="60" value="<?= $person->getAge() ?>" required>
        <br>
        <p>Select gender:</p>
        <input type="radio" name="gender" id="male" value="m" <?= $person->getGender() === "Male" ? "checked" : "" ?> required>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="f" <?= $person->getGender() === "Female" ? "checked" : "" ?> required>
        <label for="female">Female</label>
        <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" min="120" max="220" value="<?= $person->getHeight() ?>" required>
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" step="0.1" min="40" max="150" value="<?= $person->getWeight() ?>" required>
        <br>
        <label for="waist_size">Waist Circumference</label>
        <input type="number" name="waist_size" id="waist_size" min="50" max="100" value="<?= $person->getWaistSize() ?>" required>
        <br>
        <a href="index.php">Back</a>
        <input type="submit" value="Update">
    </form>

</body>

</html>