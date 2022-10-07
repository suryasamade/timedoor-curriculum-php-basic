<?php
// option
// require_once "class/Singapore.php";
// require_once "class/Japan.php";
// require_once "class/Hongkong.php";

$name   = $_GET['name'];
$age    = $_GET['age'];
$height = $_GET['height'];
$weight = $_GET['weight'];
$gender = $_GET['gender'];
$waist_circumference    = $_GET['waist_circumference'];
$standard               = $_GET['standard'];

require_once "class/$standard.php";
// echo "$name $age $height $weight $waist_circumference $gender";

// instantiate the object
// set the properties when create an object
$person     = new $standard($name, $age, $height, $weight, $waist_circumference, $gender);
$personBMI  = $person->countBMI();
$personRFM  = $person->countRFM();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $person->name ?> Health Record: BMI and RFM</title>
</head>

<body>
    <h1><?= "{$person->name}'s Body Mass Index (BMI) and Relative Fat Mass (RFM) Result." ?></h1>
    <h3><?= $person->welcomeGreeting() ?></h3>
    <p><?= "BMI: <b>$personBMI</b>, belongs to the category <b>{$person->categoryBMI($personBMI)}</b> based on <b>{$person->standardMeasurement}</b> standard." ?></p>
    <p><?= "RFM: <b>$personRFM%</b>, belongs to the category <b>{$person->categoryRFM($personRFM)}</b>." ?></p>
</body>

</html>