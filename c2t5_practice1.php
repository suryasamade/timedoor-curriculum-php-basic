<!-- APPLYING MATERIAL -->
<!-- MAKE CLASS, PROPERTIES, OBJECT, PUBLIC VISIBILITY -->

<?php
class Person
{
    // make properties and initiate it
    public $name            = "Person One",
        $age                = 24,
        $gender             = "m",
        $height             = 177,
        $weight             = 82,
        $waistCircumference = 68,
        $bmiScore           = 0,
        $bmiCategory        = "",
        $rfmScore           = 0,
        $rfmCategory        = "";
}

// make function to validation input form
function input_checker($inputName)
{
    if (isset($_GET[$inputName])) {
        return $_GET[$inputName];
    } else {
        return "null";
    }
}

// do instantiate the class to object
$objPerson = new Person();

// re-assign the object properties with input form and validate it at once
$objPerson->name        = input_checker('name');
$objPerson->age         = input_checker('age');
$objPerson->gender      = input_checker('gender');
$objPerson->height      = input_checker('height');
$objPerson->weight      = input_checker('weight');
$objPerson->waistCircumference = input_checker('waistCircumference');

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
        <label for="waist_circumference">Waist Circumference</label>
        <input type="number" name="waist_circumference" id="waist_circumference" required>
        <br>
        <input type="submit" value="Count">
    </form>
    <p>User detail:</p>
    <ul>
        <!-- print object properties -->
        <li>Name : <?= $objPerson->name ?></li>
        <li>Age : <?= $objPerson->age ?></li>
        <li>Gender : <?= $objPerson->gender ?></li>
        <li>Height : <?= $objPerson->height ?></li>
        <li>Weight : <?= $objPerson->weight ?></li>
        <li>Waist circumference : <?= $objPerson->waistCircumference ?></li>
        <li>BMI score : <?= $objPerson->bmiCategory ?></li>
        <li>RFM score : <?= $objPerson->rfmCategory ?></li>
    </ul>
</body>

</html>