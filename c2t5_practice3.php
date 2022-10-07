<!-- APPLYING MATERIAL -->
<!-- MAKE CONSTRUCTOR, VISIBILITY: PROTECTED & PRIVATE, ENCAPSULATION, INHERITANCE, REQUIRE/INCLUDE -->

<?php
    require_once "class/Person.php";
    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";

    function get_input(string $inputName, mixed $default = null) : mixed
    {
        if (isset($_GET[$inputName])) {
            return $_GET[$inputName];
        } 

        return $default;
    }

    $name      = get_input('name', "");
    $age       = get_input('age', 0);
    $gender    = get_input('gender', 'm');
    $height    = get_input('height', 0);
    $weight    = get_input('weight', 0);
    $waistSize = get_input('waist_size', 0);
    
    $person = new Person($name, $age, $gender);
    $person->bodyFact($height, $weight, $waistSize);

    $bmi = new BodyMassIndex($height, $weight);
    $bmi->calculate();
    $bmiScore    = $bmi->getScore();
    $bmiCategory = $bmi->getCategory();

    $rfm = new RelativeFatMass($height, $waistSize, $gender);
    $rfm->calculate();
    $rfmScore    = $rfm->getScore();
    $rfmCategory = $rfm->getCategory();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical Record</title>
</head>

<body>
<h3>Body Mass Index (BMI) and Relative Fat Mass (RFM) Category Calculator</h3>
    <p>Form input</p>
    <form action="" method="GET">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
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
        <!-- print object properties -->
        <li>Name : <?= $person->getName() ?></li>
        <li>Age : <?= $person->getAge() ?></li>
        <li>Gender : <?= $person->getGender() ?></li>
        <li>Height : <?= $person->getHeight() ?></li>
        <li>Weight : <?= $person->getWeight() ?></li>
        <li>Waist Size : <?= $person->getWaistSize() ?></li>
        <li>BMI score : <?= "<b>{$bmiScore}</b>, belongs to the category <b>{$bmiCategory}</b>" ?></li>
        <li>RFM score : <?= "<b>{$rfmScore}%</b>, belongs to the category <b>{$rfmCategory}</b>" ?></li>
    </ul>
</body>

</html>