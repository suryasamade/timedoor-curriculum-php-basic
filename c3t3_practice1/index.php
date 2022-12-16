<!-- APPLYING MATERIAL -->
<!-- CONNECTING PHP WITH DATABASE -->

<?php
    require_once "helper/get_input.php";

    require_once "class/Person.php";
    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";
    require_once "class/MySQLConnection.php";

    $config = require_once "helper/config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);

    $name      = get_input('name', '');
    $age       = get_input('age', 0);
    $gender    = get_input('gender', 'm');
    $height    = get_input('height', 0);
    $weight    = get_input('weight', 0);
    $waistSize = get_input('waist_size', 0);

    $person = new Person($name, $age, $gender);
    $person->bodyFact($height, $weight, $waistSize);

    $bmi = new BodyMassIndex();
    $bmi->calculate($height, $weight);
    
    $rfm = new RelativeFatMass($height, $waistSize, $gender);
    $rfm->calculate($height, $waistSize, $gender);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical Record</title>
</head>

<body>
<h3>Body Mass Index (BMI) and Relative Fat Mass (RFM) Category Calculator</h3>
    <p>Input New Data</p>
    <form action="" method="GET">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" required>
        <br>
        <p>Select gender:</p>
        <input type="radio" name="gender" id="male" value="m" required>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="f" required>
        <label for="female">Female</label>
        <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" required>
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" step="0.1" required>
        <br>
        <label for="waist_size">Waist Size</label>
        <input type="number" name="waist_size" id="waist_size" required>
        <br>
        <input type="submit" value="Count">
    </form>

    <p>User detail:</p>
    <ul>
        <li>Name : <?= $person->getName() ?></li>
        <li>Age : <?= $person->getAge() ?></li>
        <li>Gender : <?= $person->getGender() ?></li>
        <li>Height : <?= $person->getHeight() ?></li>
        <li>Weight : <?= $person->getWeight() ?></li>
        <li>Waist Size : <?= $person->getWaistSize() ?></li>
        <li>BMI score : <?= "<b>{$bmi->getScore()}</b>, belongs to the category <b>{$bmi->getCategory()}</b>" ?></li>
        <li>RFM score : <?= "<b>{$rfm->getScore()}%</b>, belongs to the category <b>{$rfm->getCategory()}</b>" ?></li>
    </ul>
</body>

</html>